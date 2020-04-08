<?php defined('IN_IA') or exit('Access Denied');?>	<?php  if(!in_array($_GPC['do'], array('search','qrcode','lessonqrcode'))) { ?>
	<footer>
		<a href="<?php  echo $this->createMobileUrl('index', array('t'=>1));?>"><?php  echo $setting['copyright'];?></a>
	</footer>
	<?php  } ?>

	<!-- 底部导航 -->
	<div id="footer-nav" class="footer-nav <?php  if(($_GPC['do']=='lesson' && $section['sectiontype']!=2) || $_GPC['do']=='qrcode') { ?>hidden<?php  } ?>">
		<a href="<?php  echo $navigation['index']['url_link'];?>" class="weui-tabbar__item <?php  if($foot_params['index']) { ?>weui-bar__item_on<?php  } ?>">
			<?php  if($foot_params['index']) { ?>
				<img src="<?php  echo $navigation['index']['selected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } else { ?>
				<img src="<?php  echo $navigation['index']['unselected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } ?>
			<p class="weui-tabbar__label"><?php  echo $navigation['index']['nav_name'];?></p>
		</a>
		<a href="<?php  echo $navigation['search']['url_link'];?>" class="weui-tabbar__item <?php  if($foot_params['search']) { ?>weui-bar__item_on<?php  } ?>">
			<?php  if($foot_params['search']) { ?>
				<img src="<?php  echo $navigation['search']['selected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } else { ?>
				<img src="<?php  echo $navigation['search']['unselected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } ?>
			<p class="weui-tabbar__label"><?php  echo $navigation['search']['nav_name'];?></p>
		</a>
		<?php  if($navigation['diynav']) { ?>
			<a href="<?php  echo $navigation['diynav']['url_link'];?>" class="weui-tabbar__item <?php  if($foot_params['diynav']) { ?>weui-bar__item_on<?php  } ?>">
				<?php  if($foot_params['diynav']) { ?>
					<img src="<?php  echo $navigation['diynav']['selected_icon'];?>" class="weui-tabbar__icon" />
				<?php  } else { ?>
					<img src="<?php  echo $navigation['diynav']['unselected_icon'];?>" class="weui-tabbar__icon" />
				<?php  } ?>
				<p class="weui-tabbar__label"><?php  echo $navigation['diynav']['nav_name'];?></p>
			</a>
		<?php  } ?>
		<a href="<?php  echo $navigation['mylesson']['url_link'];?>" class="weui-tabbar__item <?php  if($foot_params['mylesson']) { ?>weui-bar__item_on<?php  } ?>">
			<?php  if($foot_params['mylesson']) { ?>
				<img src="<?php  echo $navigation['mylesson']['selected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } else { ?>
				<img src="<?php  echo $navigation['mylesson']['unselected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } ?>
			<p class="weui-tabbar__label"><?php  echo $navigation['mylesson']['nav_name'];?></p>
		</a>
		<a href="<?php  echo $navigation['self']['url_link'];?>" class="weui-tabbar__item <?php  if($foot_params['self']) { ?>weui-bar__item_on<?php  } ?>">
			<?php  if($foot_params['self']) { ?>
				<img src="<?php  echo $navigation['self']['selected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } else { ?>
				<img src="<?php  echo $navigation['self']['unselected_icon'];?>" class="weui-tabbar__icon" />
			<?php  } ?>
			<p class="weui-tabbar__label"><?php  echo $navigation['self']['nav_name'];?></p>
		</a>
	</div>
	<!-- /底部导航 -->
</div>

<?php  if(!empty($config['statis_code'])) { ?>
	<div style="display:none;">
		<?php  echo html_entity_decode($config['statis_code']);?>
	</div>
<?php  } ?>

<script type="text/javascript">
	var uniacid = "<?php  echo $uniacid;?>";
	<?php  if($_GPC['do']=='lesson'){ ?>
		var lastPage = localStorage.getItem('lastPage_' + uniacid);
		$("#lesson-back").click(function(){
			if(lastPage){
				window.location.href = lastPage;
			}else{
				window.history.go(-1);
			}
		})

		window.localStorage.setItem('lesson_back_' + uniacid, 1);
	<?php  }elseif($_GPC['do']=='index'){ ?>
		localStorage.setItem('lastPage_' + uniacid, "");
	<?php  }else{ ?>
		localStorage.setItem('lastPage_' + uniacid, "<?php  echo $_W['siteurl'];?>");
	<?php  } ?>

	<?php  if(!in_array($_GPC['do'], array('lesson','search'))){ ?>
		window.localStorage.setItem('lesson_back_' + uniacid, 0);
	<?php  } ?>

	//兼容iphoneX、XSMax、XR底部菜单
	var isIPhoneX = /iphone/gi.test(window.navigator.userAgent) && window.devicePixelRatio && window.devicePixelRatio === 3 && window.screen.width === 375 && window.screen.height === 812;
	var isIPhoneXSMax = /iphone/gi.test(window.navigator.userAgent) && window.devicePixelRatio && window.devicePixelRatio === 3 && window.screen.width === 414 && window.screen.height === 896;
	var isIPhoneXR = /iphone/gi.test(window.navigator.userAgent) && window.devicePixelRatio && window.devicePixelRatio === 2 && window.screen.width === 414 && window.screen.height === 896;
	if(isIPhoneX || isIPhoneXSMax || isIPhoneXR){
		var footer_nav = document.getElementById("footer-nav");
		var footer_nav_height = (footer_nav.clientHeight || footer_nav.offsetHeight) * 1 + 20;

		document.getElementById('page-container').style.marginBottom = '20px';
		var iphonex_head = document.head || document.getElementsByTagName('head')[0];
		var iphonex_system = document.createElement('style');
		iphonex_system.innerHTML = '.page-container{margin-bottom:20px;}.footer-nav{height:' + footer_nav_height + 'px;}';
		iphonex_head.appendChild(iphonex_system);
	}
</script>

<script>;</script><script type="text/javascript" src="http://test.tzjsyttwjl.com/app/index.php?i=2&c=utility&a=visit&do=showjs&m=fy_lessonv2"></script></body>
</html>