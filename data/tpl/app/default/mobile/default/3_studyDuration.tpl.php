<?php defined('IN_IA') or exit('Access Denied');?><!--
 * 学习时长
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_headerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_headerv2', TEMPLATE_INCLUDEPATH));?>

<div class="header-2 cbox">
	<a href="javascript:history.go(-1);" class="ico go-back"></a>
	<div class="flex title"><?php  echo $title;?></div>
</div>

<?php  if($op=='display') { ?>
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/studyDuration.css?v=<?php  echo $versions;?>" rel="stylesheet" />

<div class="mine_head" style="background-image:url(<?php  echo $ucenter_bg;?>);">
		<div class="mine_head_body">
		<div class="tx">
			<img src="<?php  echo $avatar;?>" alt="会员头像" />
		</div>
		<div class="nickname"><?php echo $memberinfo['nickname'] ? $memberinfo['nickname'] : '您好';?>，欢迎回来</div>
		<div class="idno"><?php echo $common['self_page']['studentno'] ? $common['self_page']['studentno'] : '学号';?>：<?php  echo $uid;?></div>
	</div>
</div>
<div class="study-main">
	<section class="info-total">
		<h2><span class="bor-l"></span>累计学习时长<span class="bor-2"></span></h2>
		<ul>
			<li>
				<p class="info-title">累计学习视频</p>
				<p class="info-total-cnt"> <span class="info-total-cnt-num"><?php  echo $member['video_duration'];?></span>分钟 </p>
			</li>
			<li>
				<p class="info-title">累计学习音频</p>
				<p class="info-total-cnt"> <span class="info-total-cnt-num"><?php  echo $member['audio_duration'];?></span>分钟 </p>
			</li>
			<li>
				<p class="info-title">累计学习图文</p>
				<p class="info-total-cnt"> <span class="info-total-cnt-num"><?php  echo $member['article_duration'];?></span>分钟 </p>
			</li>
		</ul>

		<h2><span class="bor-l"></span>今日学习时长<span class="bor-2"></span></h2>
		<ul>
			<li>
				<p class="info-title">今日学习视频</p>
				<p class="info-total-cnt"> <span class="info-total-cnt-num"><?php  echo $today['video_duration'];?></span>分钟 </p>
			</li>
			<li>
				<p class="info-title">今日学习音频</p>
				<p class="info-total-cnt"> <span class="info-total-cnt-num"><?php  echo $today['audio_duration'];?></span>分钟 </p>
			</li>
			<li>
				<p class="info-title">今日学习图文</p>
				<p class="info-total-cnt"> <span class="info-total-cnt-num"><?php  echo $today['article_duration'];?></span>分钟 </p>
			</li>
		</ul>
	</section>

	<?php  if($duration_setting['switch'] && $duration_setting['exchange_credit1'] && $duration_setting['max_exchange_minute']) { ?>
	<div class="hei10"></div>
		<section class="info">
			<ul>
				<li>
					<p class="info-title">今天共学习</p>
					<p class="info-cnt"> <span class="info-cnt-num"><?php  echo $total_duration;?></span>分钟 </p>
				</li>
				<li>
					<p class="info-title">今天已兑换</p>
					<p class="info-cnt"> <span class="info-cnt-num"><?php  echo $today_already_credit1;?></span>积分 </p>
				</li>
				<li>
					<p class="info-title">高于平台</p>
					<p class="info-cnt"> <span class="info-cnt-num"><?php  echo intval($durationLog['ranking']);?>%</span>学员 </p>
				</li>
			</ul>
			<p class="info-des">
				每学习1分钟可以兑换<?php  echo $duration_setting['exchange_credit1'];?>积分，每天最多可兑换<?php  echo $max_exchange_credit1;?>积分
			</p>
		</section>
		<section class="exchange">
			<p class="exchange-des">当前可兑换积分</p>
			<p class="exchange-price"> <i class="icon-font i-kedian exchange-price-kedian"></i> <span class="exchange-price-num js-price"><?php  echo $today_remain_credit1;?></span>
			</p>
			<a class="exchange-btn js-exchange">兑换</a>
		</section>
	</div>

	<script type="text/javascript">
	$(".exchange-btn").click(function(){
		var setTitle = '系统提示';
		var setContents = '';
		var setButton = '';
		var setCancelUrl = 'javascript:;';
		var setConfirmUrl = 'javascript:;';

		var remain_exchange = <?php  echo $today_remain_credit1; ?>;
		if(remain_exchange<=0){
			setContents = '您没有可兑换积分，赶紧去学习吧~';
			setButton = '["稍后再说","前往学习"]';
			setConfirmUrl = "<?php  echo $this->createMobileUrl('index', array('t'=>1));?>";
			$(this).openWindow(setTitle,setContents,setButton,setCancelUrl,setConfirmUrl);
		}else{
			setContents = '您将使用学习时长兑换'+remain_exchange+'积分，是否继续?';
			setButton = '["取消","确定"]';
			setConfirmUrl = "<?php  echo $this->createMobileUrl('studyDuration', array('op'=>'exchange'));?>";
			$(this).openWindow(setTitle,setContents,setButton,setCancelUrl,setConfirmUrl);
		}
	});
	</script>
	<?php  } ?>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>