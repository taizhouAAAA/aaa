<?php
/**
 * 阿里云OSS
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

include_once dirname(__FILE__).'/../common/AliyunOSS.php';
$aliyunoss = unserialize($setting['aliyunoss']);

//播放域名
if($aliyunoss['https']){
	$play_domain = 'https://'.$aliyunoss['bucket_url'];
}else{
	$play_domain = 'http://'.$aliyunoss['bucket_url'];
}


if($op=='display'){
	
	include_once "aliyunoss/display.php";

}elseif($op=='getUploadInfo'){

	include_once "aliyunoss/getUploadInfo.php";

}elseif($op=='saveVideo'){

	include_once "aliyunoss/saveVideo.php";

}elseif($op=='delVideo'){
	
	include_once "aliyunoss/delVideo.php";

}elseif($op=='preview'){
	
	include_once "aliyunoss/preview.php";

}


include $this->template('web/aliyunOSS');