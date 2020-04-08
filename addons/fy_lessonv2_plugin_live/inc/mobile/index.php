<?php
/**
 * 首页
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */
checkauth();

/* 用户信息 */
$uid = $_W['member']['uid'];
$mc_member = pdo_get($this->table_mc_members, array('uniacid'=>$uniacid, 'uid'=>$uid), array('nickname'));
$nickname = $mc_member['nickname'] ? $mc_member['nickname'] : '编号'.$uid.'的用户';

/* IM信息 */
$tencent_im = json_decode($setting['tencent_im'], true);
$TLSSig = new TLSSigAPIv2($tencent_im['appid'], $tencent_im['key']);
$qcloudIM = new QcloudIM($tencent_im['appid'], $tencent_im['admin_name']);

/* 聊天室状态 */
$lessonid = $_GPC['lessonid'];
$chatroom = pdo_get($this->table_live_chatroom, array('uniacid'=>$uniacid,'lessonid'=>$lessonid));
$roomid = $chatroom['roomid'];
if(empty($roomid)){
	$adminSign = $TLSSig->genSig($tencent_im['admin_name'], 3600);
	
	$random = random(32, true);
	$room_info = array(
		'Owner_Account' => $tencent_im['admin_name'],
		'Type' => 'ChatRoom',
		'Name' => '直播聊天室', //课程名称
	);
	$res = $qcloudIM->createGroup($adminSign, $random, json_encode($room_info));
	if($res['ErrorCode']===0){
		$roomid = $res['GroupId'];
		$room_data = array(
			'uniacid'	=> $uniacid,
			'lessonid'	=> $lessonid,
			'roomname'	=> $room_info['Name'],
			'roomid'	=> $res['GroupId'],
			'addtime'	=> time(),
			'endtime'	=> '',
		);
		pdo_insert($this->table_live_chatroom, $room_data);
	}else{
		$create_room_status = -1; //创建聊天室失败
	}
}


if($uid){
	$userSign = $TLSSig->genSig($nickname, 8*3600);
}

include $this->template("../mobile/index");

?>