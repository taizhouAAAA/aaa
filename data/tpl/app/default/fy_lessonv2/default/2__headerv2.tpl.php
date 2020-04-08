<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="format-detection" content="telephone=no">
		<meta name="full-screen" content="yes">
		<meta name="browsermode" content="application">
		<meta name="x5-orientation" content="portrait">
		<meta name="x5-fullscreen" content="true">
		<meta name="x5-page-mode" content="app">
		<title>
			<?php  if(!empty($title)) { ?>
				<?php  echo $title;?>
			<?php  } else if(empty($title) && !empty($setting['sitename'])) { ?>
				<?php  echo $setting['sitename'];?>
			<?php  } else if(empty($title) && empty($setting['sitename'])) { ?>
				微课堂
			<?php  } ?>		
		</title>
		<link rel="stylesheet" href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/weui.css?v=<?php  echo $versions;?>" />
		<link rel="stylesheet" href="<?php echo MODULE_URL;?>static/public/fontawesome/font-awesome.min.css?v=<?php  echo $versions;?>"/>
		<link rel="stylesheet" href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/index.css?v=<?php  echo $versions;?>"/>
		<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/alert/alert.css?v=<?php  echo $versions;?>" rel="stylesheet" />
		
		<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/jsv2/jquery.min.js?v=<?php  echo $versions;?>"></script>
		<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/jsv2/swiper.3.4.1.min.js"></script>
		<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/jsv2/jquery.qrcode.min.js?v=<?php  echo $versions;?>"></script>
		<script type="text/javascript" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/alert/alert.js?v=<?php  echo $versions;?>"></script>


		<?php  echo register_jssdk(false);?>
		<script type="text/javascript">
		wx.ready(function(){
			var shareData = {
				title: '<?php echo $title ? $title : $sharelink["title"]?>',
				desc: '<?php  echo $sharelink["desc"];?>',
				link: '<?php echo $_W["siteurl"] ? $_W["siteurl"]."&uid=".$_W["member"]["uid"] : $shareurl;?>',
				imgUrl: '<?php  echo $_W["attachurl"];?><?php  echo $sharelink["images"];?>',
				trigger: function (res) {},
				complete: function (res) {},
				success: function (res) {},
				cancel: function (res) {},
				fail: function (res) {}
			};
			wx.onMenuShareTimeline(shareData);
			wx.onMenuShareAppMessage(shareData);
			wx.onMenuShareQQ(shareData);
			wx.onMenuShareWeibo(shareData);
			wx.onMenuShareQZone(shareData);
		});

		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			var miniprogram_environment = false;
			wx.miniProgram.getEnv(function(res) {
				if(res.miniprogram) {
					miniprogram_environment = true;
				}
			})
			if((window.__wxjs_environment === 'miniprogram' || miniprogram_environment)) {
				wx.miniProgram.getEnv(function(res) {
					wx.miniProgram.postMessage({ 
						data: {
							'title': "<?php  echo $title;?>",
							'images': "",
						}
					})
				});

				//隐藏ios支付价格
				<?php  if($systemType=='ios'){ ?>
					var ios_head = document.head || document.getElementsByTagName('head')[0];
					var ios_system = document.createElement('style');
					ios_system.innerHTML = '.ios-system{display:none !important;}';
					ios_head.appendChild(ios_system);
				<?php  } ?>
			}
		});

		//去除系统弹出框网址标题
		window.alert = function(name){
			 var iframe = document.createElement("IFRAME");
			 iframe.style.display="none";
			 document.documentElement.appendChild(iframe);
			 window.frames[0].window.alert(name);
			 iframe.parentNode.removeChild(iframe)
		}
		</script>
		<style type="text/css">
		<?php  echo $setting['front_color'];?>
		</style>
	</head>
	<body>
		<div class="page-container" id="page-container">
