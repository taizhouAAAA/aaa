<?php

$data = array(
	'uniacid'	=> $uniacid,
	'uid'		=> '',
	'teacherid'	=> '',
	'name'		=> trim($_GPC['file_name']),
	'com_name'	=> trim($_GPC['com_name']),
	'size'		=> round(($_GPC['size']/1024)/1024, 2),
	'addtime'	=> time(),
);
$result = pdo_insert($this->table_aliyunoss_upload, $data);

if($result){
	$this->resultJson(array('code'=>0,'msg'=>'保存成功'));
}else{
	$this->resultJson(array('code'=>-1,'msg'=>'保存失败'));
}