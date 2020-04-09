<?php defined('IN_IA') or exit('Access Denied');?><ul class="we7-page-tab">
	<!--<li <?php  if($type == 'system') { ?>class="active"<?php  } ?>><a href="<?php  echo url('system/thirdlogin', array('type' => 'system'))?>">系统登录</a></li>-->
	<li <?php  if($action == 'registerset' && $do == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('user/registerset/display');?>">登录/注册设置</a></li>
	<li <?php  if($action == 'thirdlogin') { ?>class="active"<?php  } ?>><a href="<?php  echo url('system/thirdlogin')?>">第三方配置</a></li>
	<li <?php  if($do == 'clerk') { ?>class="active"<?php  } ?>><a href="<?php  echo url('user/registerset/clerk')?>">应用操作员登录/注册设置</a></li>
</ul>