<?php

$id = intval($_GPC['id']);
$file = pdo_fetch("SELECT * FROM " .tablename($this->table_aliyun_upload). " WHERE uniacid=:uniacid AND id=:id", array(':uniacid'=>$uniacid, ':id'=>$id));
if(empty($file)){
	message("该文件不存在!", "", "error");
}

$suffix = substr(strrchr($file['name'], '.'), 1);
$audio = strtolower($suffix)=='mp3' ? true : false;


try {
	$response = $aliyunVod->getVideoPlayAuth($file['videoid']);
	$playAuth = $response->PlayAuth;
} catch (Exception $e) {
	message("播放失败，错误原因:".$e->getMessage(), "", "error");
}