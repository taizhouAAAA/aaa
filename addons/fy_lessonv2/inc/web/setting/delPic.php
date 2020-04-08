<?php

$banner_id = intval($_GPC['banner_id']);
if($banner_id){
	$pictrue = pdo_get($this->table_banner, array('uniacid'=>$uniacid,'banner_id'=>$banner_id));
	if(empty($pictrue)){
		message("该广告位不存在", "", "error");
	}
}

if(pdo_delete($this->table_banner, array('banner_id'=>$banner_id))){
	message("删除成功", $this->createWebUrl('setting',array('op'=>'picture')), "success");
}else{
	message("删除失败", "", "error");
}