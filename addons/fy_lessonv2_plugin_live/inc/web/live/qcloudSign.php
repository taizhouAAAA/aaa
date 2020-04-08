<?php

$streamName = trim($_GPC['streamName']);
$validity = trim($_GPC['validity']);

if(strtotime($validity) <= time()){
	$data = array(
		'code' => -1,
		'message' => '过期时间不能小于当前时间',
	);
	$this->resultJson($data);
}

/* 过期时间(十六进制) */
$txTime = strtoupper(base_convert(strtotime($validity),10,16));

//推流地址
$push_txSecret = md5($video_live['qcloud']['push_key'].$streamName.$txTime);
$pushext_str = "?".http_build_query(array(
	  "txSecret"=> $push_txSecret,
	  "txTime"=> $txTime
));

$server_url = "rtmp://".$video_live['qcloud']['push_domain']."/live/";
$stream_sign = $streamName . (isset($pushext_str) ? $pushext_str : "");
$push_url = $server_url.$stream_sign;

/* 播放地址 */
$play_txSecret = md5($video_live['qcloud']['play_key'].$streamName.$txTime);
$playext_str = "?".http_build_query(array(
	  "txSecret"=> $play_txSecret,
	  "txTime"=> $txTime
));
$play_url = $_W['sitescheme'].$video_live['qcloud']['play_domain']."/live/".$streamName.".m3u8".$playext_str;


/* 输出结果 */
$data = array(
	'code' => 0,
	'server_url'  => $server_url,
	'stream_sign' => $stream_sign,
	'push_url'	  => $push_url,
	'play_url'	  => $play_url,
);
$this->resultJson($data);