<?php

$appName = "/live/";
$streamName = trim($_GPC['streamName']);

/* 推流地址 */
$uri = $appName.$streamName;
$timestamp = time() + 60*$video_live['aliyun']['push_validity'];
$rand = random(32, true);
$uid = 0;
$hashValue = md5($uri."-".$timestamp."-".$rand."-".$uid."-".$video_live['aliyun']['push_key']);

$server_url = "rtmp://".$video_live['aliyun']['push_domain'].$appName;
$stream_sign = $streamName."?auth_key=".$timestamp."-".$rand."-".$uid."-".$hashValue;
$push_url = $server_url.$stream_sign;


/* 播放地址 */
$uri = $appName.$streamName.".m3u8";
$timestamp = time() + 60*$video_live['aliyun']['play_validity'];
$rand = random(32, true);
$uid = 0;
$hashValue = md5($uri."-".$timestamp."-".$rand."-".$uid."-".$video_live['aliyun']['play_key']);

$play_url = $_W['sitescheme'].$video_live['aliyun']['play_domain'].$uri."?auth_key=".$timestamp."-".$rand."-".$uid."-".$hashValue;


/* 输出结果 */
$data = array(
	'code' => 0,
	'server_url'  => $server_url,
	'stream_sign' => $stream_sign,
	'push_url'	  => $push_url,
	'play_url'	  => $play_url,
);
$this->resultJson($data);