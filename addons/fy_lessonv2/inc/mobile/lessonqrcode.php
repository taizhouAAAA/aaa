<?php
/**
 * 课程海报
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

$title = "课程海报";
$uid = $_W['member']['uid'];
$lessonid = intval($_GPC['lessonid']);/* 课程id */

$member = pdo_fetch("SELECT a.*,b.avatar,b.nickname AS mc_nickname FROM " .tablename($this->table_member). " a LEFT JOIN ".tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE a.uniacid=:uniacid AND a.uid=:uid", array(':uniacid'=>$uniacid,':uid'=>$uid));

if(empty($member['avatar'])){
	$avatar = MODULE_URL."template/mobile/{$template}/images/default_avatar.jpg";
}else{
	$inc = strstr($member['avatar'], "http://") || strstr($member['avatar'], "https://");
	$avatar = $inc ? $member['avatar'] : $_W['attachurl'].$member['avatar'];
}

$lesson = pdo_fetch("SELECT * FROM " .tablename($this->table_lesson_parent). " WHERE uniacid=:uniacid AND id=:id AND status!=:status LIMIT 1", array(':uniacid'=>$uniacid, ':id'=>$lessonid, ':status'=>0));

if(empty($lesson)){
	message("该课程已下架，您可以看看其他课程~", "", "error");
}
if($setting['lesson_poster_status']==0){
	message("课程海报功能未开启", "", "error");
}
if($setting['lesson_poster_status']==2 && !$lesson['poster_bg']){
	message("该课程未开启海报功能", "", "error");
}

/* 查询历史推广订单 */
$order = pdo_get($this->table_order, array('uid'=>$uid,'lessonid'=>$lessonid,'paytype'=>'recgive','is_delete'=>0));

/* 海报配置参数 */
$poster = json_decode($lesson['poster_setting'], true);
if(!empty($poster)){
	foreach($poster as $item){
		if($item['type']=='qr'){
			$poster_qr['left'] = $item['left'] * 2;
			$poster_qr['top'] = $item['top'] * 2;
			$poster_qr['width'] = $item['width'] * 2;
			$poster_qr['height'] = $item['height'] * 2;
		}
		if($item['type']=='head'){
			$poster_head['left'] = $item['left'] * 2;
			$poster_head['top'] = $item['top'] * 2;
			$poster_head['width'] = $item['width'] * 2;
			$poster_head['height'] = $item['height'] * 2;
		}
		if($item['type']=='nickname'){
			$poster_name['left'] = $item['left'] * 2;
			$poster_name['top'] = $item['top'] * 2;
			$poster_name['size'] = intval($item['size']);
			$poster_name['rgb'] = $site_common->hexTorgb($item['color']);
		}
	}
}else{
	$poster_qr = array(
		'width'  => 180,
		'height' => 180,
		'left'   => 240,
		'top'    => 565,
	);
	$poster_head = array(
		'width'  => 60,
		'height' => 60,
		'left'   => 80,
		'top'    => 67,
	);
	$poster_name = array(
		'left'   => 150,
		'top'    => 38,
		'size'	 => 22,
		'rgb'    => $site_common->hexTorgb('#D24916'),
	);
}

/* 设置字体的路径 */
$font = MODULE_ROOT."/template/mobile/{$template}/ttf/Alibaba-PuHuiTi-Medium.ttf";

/* 检查目录是否存在 */
$dirpath = "../attachment/images/{$uniacid}/fy_lessonv2/";
$this->checkdir($dirpath);
$dirpath .="poster/";
$this->checkdir($dirpath);

if($_GPC['op']=='delete'){
	unlink($dirpath."lesson_{$lessonid}_uid_{$uid}_ok.png");
	if(!$lesson['poster_bg']){
		unlink($dirpath."lesson_{$lessonid}_posterbg.png");
	}
	header("Location:".$this->createMobileUrl('lessonqrcode', array('lessonid'=>$lessonid)));
}

$imagepath = $dirpath."lesson_{$lessonid}_uid_{$uid}_ok.png";
if(!file_exists($imagepath) || $comsetting['qrcode_cache']==0){
	set_time_limit(60); 
	ignore_user_abort(true);

	/* 背景图片 */
	if($lesson['poster_bg']){
		$bgimg = $dirpath."lesson_{$lessonid}_posterbg.jpg";
		if(!file_exists($bgimg)){
			$site_common->saveImage($_W['attachurl'].$lesson['poster_bg'], $dirpath."lesson_{$lessonid}_posterbg.", '');
		}
	}else{
		//加封面水印
		$lesson_bgimg = $dirpath."lesson_{$lessonid}_posterbg.png";
		if(!file_exists($lesson_bgimg)){
			$bgimg = MODULE_URL."template/mobile/{$template}/images/lesson_default_poster.png";
		
			$lesson_cover = $dirpath."lesson_{$lessonid}_conver.jpg";
			$site_common->saveImage($_W['attachurl'].$lesson['images'], $dirpath."lesson_{$lessonid}_conver.", '');
			$site_common->resize($lesson_cover, $lesson_cover, '450', '274', "100");
			$site_common->img_water_mark($bgimg, $lesson_cover, $dirpath, "lesson_{$lessonid}_posterbg.png", '96', '158');
		}
		$bgimg = $lesson_bgimg;

		//加课程标题
		$title_arr = $site_common->char_array($lesson['bookname'], $charset='utf-8');
		$tmp_title = '';
		foreach($title_arr as $k=>$v){
			$tmp_title .= $v;
			if($k==12){
				$bookname[0] = $tmp_title;
				$tmp_title = '';
			}
			if(count($title_arr)-1 > 24 && $k==24){
				$bookname[1] = $tmp_title;
				break;
			}
			if(count($title_arr)-1 <= 24 && $k==count($title_arr)-1){
				$bookname[1] = $tmp_title;
				break;
			}
		}

		$info = getimagesize($bgimg);
		/* 通过编号获取图像类型 */
		$type = image_type_to_extension($info[2],false);
		/* 图片复制到内存 */
		if($type=='jpg' || $type=='jpeg'){
			$image = imagecreatefromjpeg($bgimg);
		}else{
			$image = imagecreatefrompng($bgimg);
		}
		/* 设置标题字体颜色和透明度 */
		$title_color = imagecolorallocatealpha($image, 117, 117, 117, 0);

		/* 写入文字 */
		$fun = "image".$type;
		foreach($bookname as $k=>$v){
			imagettftext($image, 24, 0, 110, 475+($k*43), $title_color, $font, $v);
			$fun($image, $dirpath."lesson_{$lessonid}_posterbg.png");
		}
	}
	

	/* 二维码图片 */
	if($poster_qr){
		$errorCorrectionLevel = 'L';  /* 纠错级别：L、M、Q、H */
		$qrcode = $dirpath."lesson_{$lessonid}_uid_{$uid}.png"; /* 生成的文件名 */
		$lessonUrl = $_W['siteroot'] .'app/'. $this->createMobileUrl('lesson', array('id'=>$lessonid,'uid'=>$uid));

		include(IA_ROOT."/framework/library/qrcode/phpqrcode.php");
		QRcode::png($lessonUrl, $qrcode, $errorCorrectionLevel, $poster_qr['size']=5, 3);
		$site_common->resize($qrcode, $qrcode, $poster_qr['width'], $poster_qr['height'], "100");
		
		$savefield = $site_common->img_water_mark($bgimg, $qrcode, $dirpath, "lesson_{$lessonid}_uid_{$uid}.png", $poster_qr['left'], $poster_qr['top']);
	}
	
	/* 合成头像 */
	if($poster_head){
		if(empty($member['avatar'])){
			$avatar = MODULE_URL."template/mobile/{$template}/images/default_avatar.jpg";
		}else{
			$inc = strstr($member['avatar'], "http://") || strstr($member['avatar'], "https://");
			$avatar = $inc ? $member['avatar'] : $_W['attachurl'].$member['avatar'];
		}
		
		$suffix = $site_common->saveImage($avatar, $dirpath."avatar_{$uid}.", 'avatar');

		$avatar_size = filesize($dirpath."avatar_{$uid}.".$suffix);
		if($avatar_size==0){
			message("获取头像失败，请在个人中心点击头像更新", $this->createMobileUrl('self'), "error");
		}

		if($suffix=='png'){
			$im = imagecreatefrompng($dirpath."avatar_{$uid}.".$suffix);
		}elseif($suffix=='jpeg' || $suffix=='jpg'){
			$im = imagecreatefromjpeg($dirpath."avatar_{$uid}.".$suffix);
		}else{
			$im = imagecreatefromjpeg(MODULE_URL."template/mobile/{$template}/images/default_avatar.jpg");
		}
		imagejpeg($im, $dirpath."avatar_{$uid}.jpg");
		imagedestroy($im);
		
		$site_common->resize($dirpath."avatar_{$uid}.jpg", $dirpath."avatar_{$uid}.jpg", $poster_head['width'], $poster_head['height'], "100");
		$savefield = $site_common->img_water_mark($savefield, $dirpath."avatar_{$uid}.jpg", $dirpath, "lesson_{$lessonid}_uid_{$uid}.png", $poster_head['left'], $poster_head['top']);
	}

	$info = getimagesize($savefield);
	/* 通过编号获取图像类型 */
	$type = image_type_to_extension($info[2],false);
	/* 图片复制到内存 */
	if($type=='jpg' || $type=='jpeg'){
		$image = imagecreatefromjpeg($savefield);
	}else{
		$image = imagecreatefrompng($savefield);
	}

	/* 合成昵称 */
	if($poster_name){
		/* 设置字体颜色和透明度 */
		$color = imagecolorallocatealpha($image, $poster_name['rgb']['r'], $poster_name['rgb']['g'], $poster_name['rgb']['b'], 0);
		/* 写入文字 */
		$fun = $dirpath."lesson_{$lessonid}_uid_{$uid}.png";
		imagettftext($image, $poster_name['size'], 0, $poster_name['left'], $poster_name['top']+45, $color, $font, $member['mc_nickname']);
	}

	/* 保存图片 */
	$fun = "image".$type;
	$okfield = $dirpath."lesson_{$lessonid}_uid_{$uid}_ok.png";
	$fun($image, $okfield);  
	/*销毁图片*/  
	imagedestroy($image);

	/* 删除多余文件 */
	unlink($dirpath."lesson_{$lessonid}_uid_{$uid}.png");
	unlink($dirpath."avatar_{$uid}.".$suffix);
	unlink($dirpath."lesson_{$lessonid}_conver.jpg");
}

$imagepath .= "?v=".time();

/* 构造分享信息开始 */
$share_info = json_decode($lesson['share'], true);    /* 课程单独分享信息 */
$sharelesson = unserialize($comsetting['sharelesson']);  /* 全局课程分享信息 */

if(!empty($share_info['title'])){
	$sharelesson['title'] = $share_info['title'];
}else{
	$sharelesson['desc'] = $sharelesson['title'];
	if(empty($section)){
		$sharelesson['title'] = $lesson['bookname'];
	}else{
		$sharelesson['title'] = $section['title'].' - '.$lesson['bookname'];
	}
}

$sharelesson['desc'] = $share_info['descript'] ? $share_info['descript'] : str_replace("【课程名称】","《".$title."》",$sharelesson['desc']);

$sharelesson['images'] = $share_info['images'] ? $share_info['images'] : $sharelesson['images'];
if(empty($sharelesson['images'])){
	$sharelesson['images'] = $lesson['images'];
}

$sharelesson['link'] = $_W['siteroot'] .'app/'. $this->createMobileUrl('lesson', array('id'=>$lessonid, 'uid'=>$uid));
/* 构造分享信息结束 */


include $this->template("../mobile/{$template}/lessonqrcode");

?>