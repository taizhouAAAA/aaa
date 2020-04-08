<?php
/**
 * 对象存储视频管理 / 七牛云对象存储 Vs 腾讯云对象存储
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$qiniu = unserialize($setting['qiniu']);
if(!empty($qiniu['url'])){
	$qiniu['url'] = "http://".str_replace("http://","",$qiniu['url'])."/";
}

$qcloud = unserialize($setting['qcloud']);
if(!empty($qcloud['url'])){
	$qcloud['url'] = "http://".$qcloud['url'];
}

if($op=='display'){
	if(!$setting['savetype'] || $setting['savetype']==1){
		header("Location:" .$this->createWebUrl('video', array('op'=>'qiniu')));
	}elseif($setting['savetype']==2){
		header("Location:" .$this->createWebUrl('video', array('op'=>'qcloud')));
	}elseif($setting['savetype']==3){
		header("Location:" .$this->createWebUrl('aliyunvod'));
	}elseif($setting['savetype']==4){
		header("Location:" .$this->createWebUrl('qcloudvod'));
	}elseif($setting['savetype']==5){
		header("Location:" .$this->createWebUrl('aliyunoss'));
	}

}elseif($op=='qiniu'){
	$pindex = max(1, intval($_GPC['page']));
	$psize = 10;

	$condition = " uniacid=:uniacid AND teacher=:teacher ";
	$params[':uniacid'] = $uniacid;
	$params[':teacher'] = intval($_GPC['teacherid']);
	if(!empty($_GPC['keyword'])){
		$condition .= " AND name LIKE :name ";
		$params[':name'] = "%".trim($_GPC['keyword'])."%";
	}

	if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
		$starttime = strtotime($_GPC['time']['start']);
		$endtime = strtotime($_GPC['time']['end']) + 86399;

		$condition .= " AND addtime>=:starttime AND addtime<=:endtime";
		$params[':starttime'] = $starttime;
		$params[':endtime'] = $endtime;
	}
	
	$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_qiniu_upload). " WHERE {$condition} ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
	$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_qiniu_upload). " WHERE {$condition}", $params);
	$pager = pagination($total, $pindex, $psize);

	include $this->template('web/qiniu');

}elseif($op=='upqiniu'){
	/* 引入七牛云存储API接口 */
	require_once(MODULE_ROOT.'/library/Qiniu/autoload.php');

	$auth = new Qiniu\Auth($qiniu['access_key'], $qiniu['secret_key']);
	$token = $auth->uploadToken($qiniu['bucket']);

	include $this->template('web/qiniu');

}elseif($op=='saveQiniuUrl'){
	$data = array(
		'uniacid'	=> $uniacid,
		'uid'		=> '',
		'openid'	=> '',
		'teacher'	=> '',
		'name'		=> trim($_GPC['name']),
		'com_name'	=> trim($_GPC['com_name']),
		'qiniu_url' => $qiniu['url'].trim($_GPC['com_name']),
		'size'		=> intval($_GPC['size']),
		'addtime'	=> time(),
	);
	pdo_insert($this->table_qiniu_upload, $data);

}elseif($op=='delQiniu'){
	$id = intval($_GPC['id']);
	$file = pdo_fetch("SELECT * FROM " .tablename($this->table_qiniu_upload). " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid, ':id'=>$id));
	if(empty($file)){
		message("该文件不存在!", "", "error");
	}

	/* 引入七牛云存储API接口 */
	require_once(MODULE_ROOT.'/library/Qiniu/autoload.php');

	$auth = new Qiniu\Auth($qiniu['access_key'], $qiniu['secret_key']);
	$config = new Qiniu\Config();
	$bucketManager = new Qiniu\Storage\BucketManager($auth, $config);
	$bucketManager->delete($qiniu['bucket'], $file['com_name']);

	pdo_delete($this->table_qiniu_upload, array('id'=>$id));

	$refurl = $_GPC['refurl'] ? urldecode($_GPC['refurl']) : $this->createWebUrl('video', array('op'=>'qiniu'));
	message("删除成功!", $refurl, "success");

}elseif($op=='qiniuPreview'){
	$id = intval($_GPC['id']);
	$file = pdo_get($this->table_qiniu_upload, array('uniacid'=>$uniacid, 'id'=>$id));
	if(empty($file)){
		message("该文件不存在!", "", "error");
	}

	if(!empty($qiniu['url'])){
		$videourl = $qiniu['url'].$file['com_name'];
	}

	$playurl = $site_common->privateDownloadUrl($qiniu['access_key'], $qiniu['secret_key'], $videourl);
	if($qiniu['https']){
		$playurl = str_replace("http://", "https://", $playurl);
	}

	include $this->template('web/qiniu');

/* 腾讯云对象存储 */
}elseif($op=='qcloud'){
	$pindex = max(1, intval($_GPC['page']));
	$psize = 10;

	$condition = " uniacid=:uniacid AND teacherid=:teacherid ";
	$params[':uniacid'] = $uniacid;
	$params[':teacherid'] = intval($_GPC['teacherid']);
	if(!empty($_GPC['keyword'])){
		$condition .= " AND name LIKE :name ";
		$params[':name'] = "%".trim($_GPC['keyword'])."%";
	}
	if (strtotime($_GPC['time']['start']) || strtotime($_GPC['time']['end'])) {
		$starttime = strtotime($_GPC['time']['start']);
		$endtime = strtotime($_GPC['time']['end']) + 86399;

		$condition .= " AND addtime>=:starttime AND addtime<=:endtime";
		$params[':starttime'] = $starttime;
		$params[':endtime'] = $endtime;
	}

	$list = pdo_fetchall("SELECT * FROM " .tablename($this->table_qcloud_upload). " WHERE {$condition} ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $params);
	foreach($list as $key=>$value){
		if(!empty($qcloud['url'])){
			$tmp_url = explode("myqcloud.com", $value['sys_link']);
			$list[$key]['sys_link'] = $qcloud['url'].$tmp_url[1];
		}
	}
	$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_qcloud_upload). " WHERE {$condition}", $params);
	$pager = pagination($total, $pindex, $psize);

	include $this->template('web/qcloud');

}elseif($op=='upqcloud'){
	/* 引入腾讯云存储API接口 */
	require_once(MODULE_ROOT.'/library/Qcloud/include.php');
	
	$auth = new QcloudCos\Auth($qcloud['appid'], $qcloud['secretid'], $qcloud['secretkey']);
	$expired = time() + 3600;
	$signature = $auth->createReusableSignature($expired, $qcloud['bucket']);

	include $this->template('web/qcloud');

}elseif($op=='saveQcloudUrl'){
	$com_name = urldecode($_GPC['com_name']);
	$sys_link = trim($_GPC['sys_link']);
	$size = trim($_GPC['size']);

	$data = array(
		'uniacid'	=> $uniacid,
		'uid'		=> '',
		'teacherid'	=> '',
		'name'		=> str_replace("/admin/", "", $com_name),
		'com_name'	=> $_GPC['com_name'],
		'sys_link'  => $sys_link,
		'size'		=> $size,
		'addtime'	=> time(),
	);
	pdo_insert($this->table_qcloud_upload, $data);

}elseif($op=='delQcloud'){
	$id = intval($_GPC['id']);
	$file = pdo_fetch("SELECT * FROM " .tablename($this->table_qcloud_upload). " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid, ':id'=>$id));
	if(empty($file)){
		message("该文件不存在!", "", "error");
	}

	/* 引入腾讯云存储API接口 */
	require_once(MODULE_ROOT.'/library/Qcloud/include.php');

	$config = array(
		'app_id'	 => $qcloud['appid'],
		'secret_id'	 => $qcloud['secretid'],
		'secret_key' => $qcloud['secretkey'],
		'region'	 => $qcloud['qcloud_area'],
		'timeout'	 => 60
	);
	$cosApi = new QcloudCos\Api($config);
	$cosApi->delFile($qcloud['bucket'], urldecode($file['com_name']));

	pdo_delete($this->table_qcloud_upload, array('id'=>$id));

	$refurl = $_GPC['refurl'] ? urldecode($_GPC['refurl']) : $this->createWebUrl('video', array('op'=>'qcloud'));
	message("删除成功!", $refurl, "success");

}elseif($op=='qcloudPreview'){
	$id = intval($_GPC['id']);
	$file = pdo_fetch("SELECT * FROM " .tablename($this->table_qcloud_upload). " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid, ':id'=>$id));
	if(empty($file)){
		message("该文件不存在!", "", "error");
	}

	if(!empty($qcloud['url'])){
		$tmp_url = explode("myqcloud.com", $file['sys_link']);
		$sys_link = $qcloud['url'].$tmp_url[1];
	}

	$playurl = $site_common->tencentDownloadUrl($qcloud, $sys_link);
	if($qcloud['https']){
		$playurl = str_replace("http://", "https://", $playurl);
	}

	include $this->template('web/qcloud');
}



