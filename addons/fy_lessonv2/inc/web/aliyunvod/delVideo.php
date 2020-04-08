<?php

$id = intval($_GPC['id']);
$file = pdo_fetch("SELECT * FROM " .tablename($this->table_aliyun_upload). " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid, ':id'=>$id));
if(empty($file)){
	message("该文件不存在!", "", "error");
}

pdo_delete($this->table_aliyun_upload, array('id'=>$id));
try {
	$aliyunVod->delete_videos($file['videoid']);

	$refurl = $_GPC['refurl'] ? urldecode($_GPC['refurl']) : $this->createWebUrl('aliyunvod');
	message("删除成功!", $refurl, "success");

} catch (Exception $e) {
	message("删除成功!", $this->createWebUrl('aliyunvod'), "success");
}