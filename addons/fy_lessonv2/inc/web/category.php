<?php
/**
 * 课程分类管理
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */
 
if ($operation == 'display') {
	if (checksubmit('submit')) { /* 排序 */
		if (is_array($_GPC['category'])) {
			foreach ($_GPC['category'] as $pid => $val) {
				$data = array('displayorder' => intval($_GPC['category'][$pid]));
				pdo_update($this->table_category, $data, array('id' => $pid));
			}
		}
		if (is_array($_GPC['son'])) {
			foreach ($_GPC['son'] as $sid => $val) {
				$data = array('displayorder' => intval($_GPC['son'][$sid]));
				pdo_update($this->table_category, $data, array('id' => $sid));
			}
		}
		message('操作成功!', referer, 'success');
	}

	$pindex = max(1, intval($_GPC['page']));
	$psize = 10;
	
	$condition = " uniacid=:uniacid AND parentid=:parentid ";
	$params[':uniacid'] = $uniacid;
	$params[':parentid'] = 0;

	$category = pdo_fetchall("SELECT * FROM " . tablename($this->table_category) . " WHERE {$condition} ORDER BY displayorder DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
	foreach($category as $k=>$v){
		$category[$k]['son'] = pdo_fetchall("SELECT * FROM " . tablename($this->table_category) . " WHERE uniacid=:uniacid AND parentid=:parentid ORDER BY displayorder DESC, id DESC", array(':uniacid'=>$uniacid,':parentid'=>$v['id']));
	}

	$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_category) . " WHERE {$condition}", $params);
	$pager = pagination($total, $pindex, $psize);

}elseif($operation == 'post') {
	$id = intval($_GPC['id']); /* 当前分类id */
	$list = pdo_fetchall("SELECT * FROM " . tablename($this->table_category) . " WHERE uniacid=:uniacid AND parentid=:parentid ORDER BY displayorder DESC", array(':uniacid'=>$uniacid,':parentid'=>0));

	if (!empty($id)) {
		$category = pdo_fetch("SELECT * FROM " . tablename($this->table_category) . " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid,':id'=>$id));
		if(empty($category)){
			message("该分类不存在或已被删除", "", "error");
		}
	}

	if (checksubmit('submit')) {
		if (empty($_GPC['catename'])) {
			message("抱歉，请输入分类名称");
		}

		$data = array(
			'uniacid'      => $_W['uniacid'],
			'name'         => trim($_GPC['catename']),
			'ico'          => trim($_GPC['ico']),
			'link'		   => trim($_GPC['link']),
			'link_pc'	   => trim($_GPC['link_pc']),
			'parentid'     => intval($_GPC['parentid']),
			'displayorder' => intval($_GPC['displayorder']),
			'is_hot'	   => intval($_GPC['is_hot']),
			'is_show'	   => intval($_GPC['is_show']),
			'search_show'  => intval($_GPC['search_show']),
			'addtime'      => time(),
		);

		if($data['parentid']){
			$parent_cate = pdo_get($this->table_category, array('id'=>$data['parentid'], 'parentid'=>0));
			if(!$parent_cate){
				message("父分类不存在，请重新选择"); 
			}
		}

		if (!empty($id)) {
			unset($data['addtime']);
			$res = pdo_update($this->table_category, $data, array('id' => $id));
			if($res){
				$site_common->addSysLog($_W['uid'], $_W['username'], 3, "课程分类", "编辑ID:{$id}的课程分类");
			}
		} else {
			pdo_insert($this->table_category, $data);
			$cid = pdo_insertid();
			if($cid){
				$site_common->addSysLog($_W['uid'], $_W['username'], 3, "课程分类", "新增ID:{$cid}的课程分类");
			}
		}
		cache_delete('fy_lesson_'.$uniacid.'_categorylist');
		message("更新分类成功！", $this->createWebUrl('category', array('op' => 'display')), "success");
	}

}elseif($operation == 'delete') {
	$id = intval($_GPC['id']);
	$category = pdo_get($this->table_category, array('uniacid'=>$uniacid, 'id'=>$id));
		
	if (empty($category)) {
		message("抱歉，分类不存在或是已经被删除！", $this->createWebUrl('category', array('op' => 'display')), "error");
	}

	$res = pdo_delete($this->table_category, array('uniacid'=>$uniacid,'id' => $id));
	if($res){
		if(!$category['parentid']){
			//删除子分类
			pdo_delete($this->table_category, array('uniacid'=>$uniacid,'parentid' => $id));
		}
		$site_common->addSysLog($_W['uid'], $_W['username'], 2, "课程分类", "删除ID:{$id}的课程分类");
	}

	cache_delete('fy_lesson_'.$uniacid.'_categorylist');
	message("删除分类成功！", $this->createWebUrl('category', array('op' => 'display')), "success");

}elseif($op=='changeShow'){
	$id = intval($_GPC['id']);
	$category = pdo_fetch("SELECT * FROM " . tablename($this->table_category) . " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid,':id'=>$id));
	if (empty($category)) {
		message("抱歉，分类不存在或是已经被删除！", $this->createWebUrl('category', array('op' => 'display')), "error");
	}

	if($_GPC['type']=='index'){
		if($category['is_show']==1){
			$data['is_show'] = 0;
			$message = "隐藏首页分类";
		}else{
			$data['is_show'] = 1;
			$message = "显示首页分类";
		}
	}elseif($_GPC['type']=='search'){
		if($category['search_show']==1){
			$data['search_show'] = 0;
			$message = "隐藏分类";
		}else{
			$data['search_show'] = 1;
			$message = "显示分类";
		}
	}
	
	if(pdo_update($this->table_category, $data, array('id'=>$id))){
		cache_delete('fy_lesson_'.$uniacid.'_categorylist');
		message("{$message}成功", $this->createWebUrl('category', array('op' => 'display')), "success");
	}else{
		message("{$message}失败", $this->createWebUrl('category', array('op' => 'display')), "error");
	}

}elseif($op=='optimize'){

	$hot_list = pdo_fetchall("SELECT id,parentid FROM " .tablename($this->table_category). " WHERE uniacid=:uniacid AND parentid>:parentid", array(':uniacid'=>$uniacid, ':parentid'=>0));

	$t = 0;
	foreach($hot_list as $item){
		if($item['id']==$item['parentid']){
			pdo_delete($this->table_category, array('uniacid'=>$uniacid,'id'=>$item['id']));
			$t++;
		}
	}

	message('处理完成，共优化'.$t.'个分类', $this->createWebUrl('category'), 'success');

}

include $this->template('web/category');

?>