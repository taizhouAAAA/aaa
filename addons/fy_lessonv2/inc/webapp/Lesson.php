<?php
/**
 * 课程详情页
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

$mobile = $_SESSION['fy_lessonv2_'.$uniacid.'_mobile'];
$nickname = $_SESSION['fy_lessonv2_'.$uniacid.'_nickname'];

$site_common->check_black_list('visit', $uid); /* 访问权限 */

$index_page  = $common['index_page'];  /* 首页字体 */
$lesson_page = $common['lesson_page']; /* 课程页面字体 */
$lesson_config = json_decode($setting['lesson_config'], true); /* 课程页面设置 */

/* 课程id */
$id = intval($_GPC['id']);
/* 播放章节id */
$sectionid = $_GPC['sectionid'];

$lesson = pdo_fetch("SELECT a.*,b.teacher,b.qq,b.qqgroup,b.qqgroupLink,b.weixin_qrcode,b.online_url,b.teacherphoto,b.teacherdes FROM " .tablename($this->table_lesson_parent). " a LEFT JOIN " .tablename($this->table_teacher). " b ON a.teacherid=b.id WHERE a.uniacid=:uniacid AND a.id=:id AND a.status!=:status LIMIT 1", array(':uniacid'=>$uniacid, ':id'=>$id, ':status'=>0));
if(!$lesson || $lesson['status']==0 || $lesson['status']==2){
	message("该课程已下架，您可以看看其他课程~", $_W['siteroot'].$uniacid."/index.html", "error");
}

$title = $lesson['bookname'];

/* 用户信息 */
if($uid){
	$member = pdo_fetch("SELECT a.*,b.follow,c.avatar,c.nickname,c.realname,c.mobile,c.msn,c.idcard,c.occupation,c.company,c.graduateschool,c.grade,c.address,c.education,c.position FROM " .tablename($this->table_member). " a LEFT JOIN " .tablename($this->table_fans). " b ON a.uid=b.uid LEFT JOIN " .tablename($this->table_mc_members). " c ON a.uid=c.uid WHERE a.uid=:uid", array(':uid'=>$uid));
}

/* 非报名课程检查、报名课程开启后也检查 */
if ($setting['mustinfo']==2 && ($lesson['lesson_type']!=1 || ($lesson['lesson_type']==1 && $setting['appoint_mustinfo']))) {
	if(!$uid){
		header("Location:".$_W['siteroot']."{$uniacid}/login.html?refurl=".urlencode($_W['siteroot']."{$uniacid}/lesson.html?id={$id}"));
	}

	$user_info = json_decode($setting['user_info']);
	$jumpurl = $_W['siteroot']."{$uniacid}/memberInfo.html?lessonid={$id}&sectionid={$sectionid}&type=lesson";

	if(!empty($common_member_fields)){
		foreach($common_member_fields as $v){
			if(in_array($v['field_short'],$user_info) && empty($member[$v['field_short']])){
				 message("请完善您的".$v['field_name'], $jumpurl, "warning");
			}
		}
	}
}


/* 课程总数 */
$lessonNumber = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_lesson_parent). " WHERE teacherid=:teacherid", array(':teacherid'=>$lesson['teacherid']));

/* 点播章节 */
if($sectionid){
	$section = pdo_fetch("SELECT * FROM " .tablename($this->table_lesson_son). " WHERE parentid=:parentid AND id=:id AND status=:status LIMIT 1", array(':parentid'=>$id,':id'=>$sectionid,':status'=>1));
	if(!$section){
		message("该章节不存在或已下架", $_W['siteroot'].$uniacid."/index.html", "error");
	}
}

/* 学习人数 */
$lesson['buyTotal'] = $lesson['buynum'] + $lesson['virtual_buynum'] + $lesson['vip_number'] + $lesson['teacher_number'];
if($lesson['price']==0){
	$lesson['buyTotal'] += $lesson['visit_number'];
}


/* 分享课程信息 */
$mobile_site_root = $setting_pc['mobile_site_root'] ? $setting_pc['mobile_site_root'] : $_W['siteroot'];
$wap_url = $mobile_site_root."app/index.php?i={$uniacid}&c=entry&id={$id}&sectionid={$sectionid}&do=lesson&m=fy_lessonv2";

$share_alone = json_decode($lesson['share'], true);   /* 课程单独分享信息 */
$share_all = unserialize($comsetting['sharelesson']); /* 全局课程分享信息 */

if(!empty($share_alone['title'])){
	$share['title'] = $share_alone['title'];
}else{
	if(empty($section)){
		$share['title'] = $lesson['bookname'];
	}else{
		$share['title'] = $section['title'].' - '.$lesson['bookname'];
	}
}

$share['desc'] = $share_alone['descript'] ? $share_alone['descript'] : str_replace("【课程名称】","《".$title."》",$share_all['desc']);
if(!$share['desc']){
	$share['desc'] = mb_substr(strip_tags(html_entity_decode($lesson['descript'])), 0, 100);
}

$share['images'] = $share_alone['images'] ? $share_alone['images'] : $share_all['images'];
if(!$share['images']){
	$share['images'] = $lesson['images'];
}
$share['images'] = $_W['attachurl'].$share['images'];
$share['link'] = $_W['siteroot']."{$uniacid}/lesson.html?id={$id}&sectionid={$sectionid}&uid={$uid}";


/* 课程规格 */
$spec_condition = " uniacid=:uniacid AND lessonid=:lessonid ";
$spec_params = array(
	':uniacid' => $uniacid,
	':lessonid' => $id,
);
if($setting['stock_config']){
	$spec_condition .= " AND spec_stock>:spec_stock";
	$spec_params[':spec_stock'] = 0;
}
$spec_list = pdo_fetchall("SELECT * FROM " .tablename($this->table_lesson_spec). " WHERE {$spec_condition} ORDER BY spec_sort DESC,spec_price ASC", $spec_params);

/* 显示折扣 */
$discount_lesson = pdo_fetch("SELECT * FROM " .tablename($this->table_discount_lesson). " WHERE uniacid=:uniacid AND lesson_id=:lesson_id AND starttime<:time AND endtime>:time", array(':uniacid'=>$uniacid,':lesson_id'=>$id,':time'=>time()));
if($discount_lesson){
	foreach($spec_list as $k=>$v){
		$v['market_price'] = $v['spec_price'];
		$v['spec_price'] = round($v['spec_price']*0.01 * $discount_lesson['discount'], 2);
		$spec_list[$k] = $v;
	}
	$discount_endtime = date('Y/m/d H:i:s', $discount_lesson['endtime']);
	$diacount_price = explode('.', $spec_list[0]['spec_price']);
}

/* 课程详情页海报入口 */
$poster_show = false;
if($setting['lesson_poster_status']==1 && ($lesson['poster_bg'] || $lesson['images'])){
	$poster_show = true;
}elseif($setting['lesson_poster_status']==2 && $lesson['poster_bg']){
	$poster_show = true;
}

/* 分享赚取佣金 */
$lesson_commission = unserialize($lesson['commission']);
$commission1 = $lesson_commission['commission1'];
if(empty($commission1)){
	if($member['agent_level']){
		$commission_level = pdo_get($this->table_commission_level, array('id'=>$member['agent_level']));
		$commission1 = $commission_level['commission1'];
	}else{
		$commission = unserialize($comsetting['commission']);
		$commission1 = $commission['commission1'];
	}
}
$commisson1_amount = round($commission1 * $spec_list[count($spec_list)-1]['spec_price'] * 0.01, 2);
$lesson_qrcode_url = $_W['siteroot']."app/index.php?i={$uniacid}&c=entry&lessonid={$id}&do=lessonqrcode&m=fy_lessonv2";

/* 购买按钮名称 */
$buynow_info = json_decode($lesson['buynow_info'], true);
$buynow_name = $buynow_info['buynow_name'] ? $buynow_info['buynow_name'] : $config['buynow_name'];
$buynow_link = $buynow_info['buynow_link'] ? $buynow_info['buynow_link'] : $config['buynow_link'];
$study_name  = $buynow_info['study_name']  ? $buynow_info['study_name']  : $config['study_name'];
$study_link  = $buynow_info['study_link']  ? $buynow_info['study_link']  : $config['study_link'];

/* 非直播课程 */
if($lesson['lesson_type']!=3){
	/* 第一个章节 */
	$first_section = pdo_fetch("SELECT id FROM " .tablename($this->table_lesson_son). " WHERE parentid=:parentid AND status=:status ORDER BY displayorder DESC,id ASC LIMIT 1", array(':parentid'=>$id,':status'=>1));
	/* 第一个试听章节 */
	$free_section = pdo_fetch("SELECT id FROM " .tablename($this->table_lesson_son). " WHERE parentid=:parentid AND status=:status AND is_free=:is_free ORDER BY displayorder DESC,id ASC LIMIT 1", array(':parentid'=>$id,':status'=>1, ':is_free'=>1));
}


/* 免费学习的VIP等级 */
$lesson_vip_list = array();
if(is_array(json_decode($lesson['vipview'])) && $lesson['price']>0){
	foreach(json_decode($lesson['vipview']) as $v){
		$level = $site_common->getLevelById($v);
		if(!empty($level['level_name']) && $level['is_show']==1){
			$lesson_vip_list[] = $level;
		}
	}
}

/**
  $play  用户学习资格标识
  $plays 是否试听用户组
  $show_isbuy 显示开始学习按钮
 */
if($section['is_free']==1){
	$play = true;
	$plays = false;
}
if($lesson['price']==0){
	$play = true;
	$plays = true;
	$show_isbuy = true;
}

if($uid){
	/* 查询是否购买该课程 */
	$isbuy = pdo_fetch("SELECT id,validity FROM " .tablename($this->table_order). " WHERE uid=:uid AND lessonid=:lessonid AND status>=:status AND (validity>:validity OR validity=0) AND is_delete=:is_delete ORDER BY id DESC LIMIT 1", array(':uid'=>$uid,':lessonid'=>$id,':status'=>1,':validity'=>time(),':is_delete'=>0));
	if($isbuy){
		if($isbuy['validity']==0){
			$play = true;
			$plays = true;
			$show_isbuy = true;
		}else{
			if($isbuy['validity']>time()){
				$play = true;
				$plays = true;
				$show_isbuy = true;
			}
		}
	}

	if($lesson['lesson_type']==0 || $lesson['lesson_type']==3){
		/* vip免费学习课程对于普通课程生效 */
		$memberVip_list = pdo_fetchall("SELECT level_id FROM  " .tablename($this->table_member_vip). " WHERE uid=:uid AND validity>:validity", array(':uid'=>$uid,':validity'=>time()));
		if(!empty($memberVip_list)){
			foreach($memberVip_list as $v){
				if(in_array($v['level_id'], json_decode($lesson['vipview']))){
					$play = true;
					$plays = true;
					$show_isbuy = true;
					$freeEvaluate = true; /* VIP免费评价标识 */
					$viplesson = true;    /* vip等级相应课程 */
					break;
				}
			}
		}
	}elseif($lesson['lesson_type']==1){
		/* 查询是否存在未核销的报名课程订单 */
		$apply_order = pdo_fetch("SELECT id,verify_number FROM " .tablename($this->table_order). " WHERE uid=:uid AND lesson_type=:lesson_type AND lessonid=:lessonid AND status>=:status AND is_delete=:is_delete ORDER BY id DESC LIMIT 1", array(':uid'=>$uid,':lesson_type'=>1,':lessonid'=>$id,':status'=>1,':is_delete'=>0));
		if($apply_order){
			$verify_log = $site_common->getOrderVerifyLog($apply_order['id']);
			if($verify_log['count']<$apply_order['verify_number']){
				$show_qrcode = true;
			}
		}
	}

	/* 讲师自己课程免费 */
	$teacher = pdo_fetch("SELECT id FROM " .tablename($this->table_teacher). " WHERE uid=:uid", array(':uid'=>$uid));
	if($lesson['teacherid'] == $teacher['id']){
		$play = true;
		$plays = true;
		$show_isbuy = true;
	}

	/* 已购买讲师服务 */
	$buy_teacher = pdo_fetch("SELECT id FROM " .tablename($this->table_member_buyteacher). " WHERE uid=:uid AND teacherid=:teacherid AND validity>:validity LIMIT 1", array(':uid'=>$uid, ':teacherid'=>$lesson['teacherid'], ':validity'=>time()));
	if($buy_teacher){
		$play = true;
		$plays = false;
		$show_isbuy = true;
	}

	/* 查询是否收藏课程 */
	$collect = pdo_get($this->table_lesson_collect, array('uniacid'=>$uniacid,'uid'=>$uid,'outid'=>$id,'ctype'=>1), array('id'));

	/* 增加会员访问足迹 */
	$history = pdo_fetch("SELECT * FROM " .tablename($this->table_lesson_history). " WHERE lessonid=:lessonid AND uid=:uid LIMIT 1", array(':lessonid'=>$id,':uid'=>$uid));
	$insertdata = array(
		'uniacid'  => $uniacid,
		'uid'	   => $uid,
		'lessonid' => $id,
		'addtime'  => time(),
	);
	$parent_data = array();
	if($viplesson){
		$insertdata['vipview'] = 1;
		$parent_data['vip_number +='] = 1;
	}
	if($buy_teacher){
		$insertdata['teacherview'] = 1;
		$parent_data['teacher_number +='] = 1;
	}
	if(!$history){
		pdo_insert($this->table_lesson_history, $insertdata);
		
		$parent_data['visit_number +='] = 1;
		pdo_update($this->table_lesson_parent, $parent_data, array('id'=>$lesson['id']));
	}else{
		if(($viplesson && !$history['vipview']) || ($buy_teacher && !$history['teacherview'])){
			pdo_update($this->table_lesson_parent, $parent_data, array('id'=>$lesson['id']));
		}
		if((!$history['vipview'] && $insertdata['vipview']) || !$history['teacherview'] && $insertdata['teacherview']){
			pdo_update($this->table_lesson_history, $insertdata, array('lessonid'=>$id,'uid'=>$uid));
		}else{
			pdo_update($this->table_lesson_history, array('addtime'=>time()), array('lessonid'=>$id,'uid'=>$uid));
		}
	}
}

if(!$isbuy && !$viplesson && $lesson['status']=='-1'){
	message("该课程已下架，您可以看看其他课程~", $_W['siteroot'].$uniacid."/index.html", "error");
}

/* 购买讲师价格 */
$teacher_price = pdo_get($this->table_teacher_price, array('uniacid'=>$uniacid, 'teacherid'=>$lesson['teacherid']));


/* 非直播课程 */
if($lesson['lesson_type']!=3){
	/* 已归纳课程目录的章节 */
	$title_list = pdo_fetchall("SELECT * FROM " .tablename($this->table_lesson_title)." WHERE lesson_id=:lesson_id ORDER BY displayorder DESC,title_id ASC", array('lesson_id'=>$id));
	foreach($title_list as $k=>$v){
		$title_list[$k]['section'] = pdo_fetchall("SELECT * FROM " .tablename($this->table_lesson_son). " WHERE parentid=:parentid AND title_id=:title_id AND status=:status ORDER BY displayorder DESC,id ASC", array(':parentid'=>$id,':title_id'=>$v['title_id'],':status'=>1));

		if(empty($title_list[$k]['section'])){
			unset($title_list[$k]);
		}
	}

	/* 未归纳课程目录的章节 */
	$section_list = pdo_fetchall("SELECT * FROM " .tablename($this->table_lesson_son). " WHERE parentid=:parentid AND title_id=:title_id AND status=:status ORDER BY displayorder DESC,id ASC", array(':parentid'=>$id,':title_id'=>0,':status'=>1));

	/* 课程章节总数 */
	$section_count = pdo_fetchcolumn("SELECT COUNT(*) FROM " .tablename($this->table_lesson_son). " WHERE parentid=:parentid AND status=:status", array(':parentid'=>$id,':status'=>1));

	/* 评价总数 */
	$evaluate_total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_evaluate) . " WHERE lessonid=:lessonid AND status=:status", array(':lessonid'=>$id,':status'=>1));

	/* 好评率 */
	$evaluate_page = $common['evaluate_page'];
	$evaluate_score = pdo_get($this->table_evaluate_score, array('lessonid'=>$id));
	if(!$evaluate_score){
		$evaluate_score['score']			= $lesson['score']*100;
		$evaluate_score['global_score']		= '5.00';
		$evaluate_score['content_score']	= '5.00';
		$evaluate_score['understand_score'] = '5.00';
	}else{
		$evaluate_score['score'] = $evaluate_score['score']*100 > 100 ? 100 : $evaluate_score['score']*100;
	}
}


if($sectionid){
	if(!$play){
		$nobuyTip = $lesson_page['nobuyTip'] ? $lesson_page['nobuyTip'] : '请先购买课程再学习';
		message($nobuyTip, $_W['siteroot'].$uniacid."/lesson.html?id={$id}", "error");
	}

	/**
	 * 视频课程格式
	 * @sectiontype 1.视频章节 2.图文章节 3.音频课程 4、外链章节
	 * @savetype	0.其他存储 1.七牛存储 2.内嵌播放代码模式 3.腾讯云存储 4.阿里云点播 5.腾讯云点播 6.阿里云OSS
	 */
	if(in_array($section['sectiontype'], array('1','3'))){
		/* 已购买用户获取下一个章节id */
		if($show_isbuy){
			$next_sectionid = $site_common->getNextSectionid($section, $title_list);
		}

		$systemType = $site_common->checkSystenType();
		if($section['savetype']==1){
			$qiniu = unserialize($setting['qiniu']);
			if($qiniu['https']==1){
				$section['videourl'] = str_replace("http://", "https://", $section['videourl']);
			}
			$section['videourl'] = $site_common->privateDownloadUrl($qiniu['access_key'],$qiniu['secret_key'],$section['videourl']);

		}elseif($section['savetype']==2){
			$section['videourl'] = str_replace("height=240px", "height=100%", $section['videourl']);

		}elseif($section['savetype']==3){
			$qcloud = unserialize($setting['qcloud']);
			if($qcloud['https']==1){
				$section['videourl'] = str_replace("http://", "https://", $section['videourl']);
			}
			$section['videourl'] = $site_common->tencentDownloadUrl($qcloud, $section['videourl']);

		}elseif($section['savetype']==4){
			$aliyun = unserialize($setting['aliyunvod']);
			$aliyunVod = new AliyunVod($aliyun['region_id'],$aliyun['access_key_id'],$aliyun['access_key_secret']);

			if($section['sectiontype']==3){/* 音频章节 */
				try {
					$response = $aliyunVod->get_mezzanine_info($section['videourl']);
					$section['videourl'] = $response->Mezzanine->FileURL;
				} catch (Exception $e) {
					message("播放失败，错误原因:".$e->getMessage(), "", "error");
				}

				if(empty($section['videourl'])){
					message("获取播放地址失败，请联系管理员", "", "error");
				}

			}else{/* 视频章节 */
				$file = pdo_get($this->table_aliyun_upload, array('uniacid'=>$uniacid,'videoid'=>$section['videourl']), array('name'));
				$suffix = substr(strrchr($file['name'], '.'), 1);
				$audio = strtolower($suffix)=='mp3' ? true : false;

				try {
					$response = $aliyunVod->getVideoPlayAuth($section['videourl']);
					$playAuth = $response->PlayAuth;
				} catch (Exception $e) {
					message("播放失败，错误原因:".$e->getMessage(), "", "error");
				}
			}
			
		
		}elseif($section['savetype']==5){
			$qcloudvod = unserialize($setting['qcloudvod']);
			$newqcloudVod = new QcloudVod($qcloudvod['secret_id'], $qcloudvod['secret_key']);

			
			if($section['sectiontype']==3){/* 音频章节 */
				$section['videourl'] = $newqcloudVod->getUrlPlaySign($qcloudvod['safety_key'],$section['videourl'],$exper='');
				if(empty($section['videourl'])){
					message("获取播放地址失败，请联系管理员", "", "error");
				}

			}else{/* 视频章节 */
				try {
					$qcloudVodRes = $newqcloudVod->getPlaySign($qcloudvod['safety_key'], $qcloudvod['appid'], $section['videourl'], $exper='');
				} catch (Exception $e) {
					message("播放失败，错误原因:".$e->getMessage(), "", "error");
				}
			}
		
		}elseif($section['savetype']==6){
			include_once dirname(__FILE__).'/../common/AliyunOSS.php';

			$aliyunoss = unserialize($setting['aliyunoss']);
			$params = parse_url($section['videourl']);
			$com_name = trim($params['path'], '/');

			$ossClient = new AliyunOSS($aliyunoss['access_key_id'], $aliyunoss['access_key_secret'], $aliyunoss['endpoint']);
			$default_url = $ossClient->getSignUrl($aliyunoss['bucket'], $com_name, $timeout=7200);
			$section['videourl'] = $site_common->aliyunOssPlayUrl($default_url, $aliyunoss);
		
		}

		if($section['sectiontype']==3){
			$audio_bg_list = $webAppCommon->getLessonAudioBg();
			$audio_bg = $audio_bg_list[rand(0, count($audio_bg_list)-1)];
			$audio_bg_pic = $audio_bg['picture'] ? $_W['attachurl'].$audio_bg['picture'] : '';
		}
	}
	
	/* 图文章节 */
	if($section['sectiontype']==2){
		$lastAndNext = $site_common->getArticleLastAndNext($section, $title_list);
		include $this->template("../webapp/{$template}/lessonArticle");
		exit();
	}

	/* 外链章节 */
	if($section['sectiontype']==4){
		header("Location:".$section['videourl']);
	}
}

/* 章节图标集 */
$section_icon = array(
	'1' => 'icon-video',
	'2' => 'icon-article',
	'3' => 'icon-audio',
	'4' => 'icon-urllink',
);

if($op=='display'){
	/* 详情、目录切换 */
	if($lesson['lesson_show']==1 || ($lesson['lesson_show']!=1 && $section['content'])){
		$show_details = true;
	}elseif($lesson['lesson_show']==2 && !$section['content']){
		$show_dir = true;
	}else{
		if($section['content'] || $setting['lesson_show']==0){
			$show_details = true;
		}
		if(!$section['content'] && $setting['lesson_show']==1){
			$show_dir = true;
		}
	}

	/* 课件资料 */
	$document_list = pdo_fetchall("SELECT * FROM " .tablename($this->table_document). " WHERE uniacid=:uniacid AND lessonid=:lessonid ORDER BY displayorder DESC, id ASC ", array(':uniacid'=>$uniacid,'lessonid'=>$id));
}

/* 直播课程 */
if($lesson['lesson_type']==3){
	$live_info = json_decode($lesson['live_info'], true);
	$starttime = strtotime($live_info['starttime']);
	$endtime = strtotime($live_info['endtime']);
	if(time() < $starttime){
		//未开始
		$count_down  = $starttime - time();
		$live_status = 0;

		if($uid && $_GPC['play']){
			message('直播未开始，请稍等...');
		}
	}elseif(time() > $endtime){
		//已结束
		$icon_live_status = 'icon-live-ended';
		$live_status = -1;

		if($uid && $_GPC['play']){
			message('直播已结束，下次早点来哦');
		}
	}elseif(time() > $starttime && time() < $endtime){
		//直播中
		$icon_live_status = 'lesson-live-starting';
		$live_status = 1;
	}
	//获取直播地址
	if($_GPC['play']){
		$live_url = $site_common->getLiveUrl($setting, $live_info, $play_type='pc');
	}

	if($_GPC['req_login']){
		checkauth();
	}

	$login_url = $_W['siteroot']."{$uniacid}/login.html?refurl=".urlencode($_W['siteroot']."/{$uniacid}/lesson.html?id={$id}&play=".$_GPC['play']);
	if(!$play && $_GPC['play']){
		if(!$uid){
			 header("Location:". $login_url);
		}
		message("请先购买课程再学习");
	}

	/* 聊天室配置 */
	$im_config = json_decode($setting['im_config'], true);

	if($uid && $live_status==1 && $live_info['chatroom']){
		/* 当前用户 */
		$nickname = $member['nickname'] ? $member['nickname'].'('.$uid.')' : '编号'.$uid.'的用户';

		if($im_config['type']==2){
			/* 奥点云IM */
			$room_status = true;
			$api = new TisApi($im_config['aodianyun']['accessId'], $im_config['aodianyun']['accessKey']);

			/* 聊天室状态 */
			$chatroom = pdo_fetch("SELECT * FROM " .tablename($this->table_live_chatroom). " WHERE uniacid=:uniacid AND type=:type AND lessonid=:lessonid ORDER BY id ASC", array(':uniacid'=>$uniacid,':type'=>2,':lessonid'=>$id));
			$tisId = $chatroom['roomid'];
			if(empty($tisId)){
				$aodianyun = array(
					's_key'		  => $im_config['aodianyun']['s_key'],
					'filterKeys'  => $im_config['aodianyun']['filterKeys'],
					'description' => $uniacid.'_'.$id.'_'.random(8),
				);
				$res = $api->createTisRoom($aodianyun);
				if($res['Flag']==100){
					$roomid = $res['GroupId'];
					$room_data = array(
						'uniacid'	=> $uniacid,
						'type'		=> 2,
						'lessonid'	=> $id,
						'roomname'	=> $aodianyun['description'],
						'roomid'	=> $res['id'],
						'addtime'	=> time(),
						'endtime'	=> strtotime($live_info['endtime']),
					);
					pdo_insert($this->table_live_chatroom, $room_data);
				}else{
					$create_room_status = -1; //创建聊天室失败
				}
			}
		}
	}

	include $this->template("../webapp/{$template}/lesson_live");
}else{
	include $this->template("../webapp/{$template}/lesson");
}


?>