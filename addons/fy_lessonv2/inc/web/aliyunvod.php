<?php
/**
 * 阿里云点播
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$we7_version = intval(IMS_VERSION) ? intval(IMS_VERSION) : 2;

/* 阿里云点播全局配置 */
include_once MODULE_ROOT."/inc/common/AliyunVod.php";
$aliyun = unserialize($setting['aliyunvod']);
$aliyunVod = new AliyunVod($aliyun['region_id'],$aliyun['access_key_id'],$aliyun['access_key_secret']);

if($op=='display'){
	
	include_once "aliyunvod/display.php";

}elseif($op=='getUploadInfo'){

	include_once "aliyunvod/getUploadInfo.php";

}elseif($op=='refreshUploadInfo'){

	include_once "aliyunvod/refreshUploadInfo.php";

}elseif($op=='saveVideo'){

	include_once "aliyunvod/saveVideo.php";

}elseif($op=='delVideo'){
	
	include_once "aliyunvod/delVideo.php";

}elseif($op=='preview'){
	
	include_once "aliyunvod/preview.php";

}


include $this->template('web/aliyunVod');