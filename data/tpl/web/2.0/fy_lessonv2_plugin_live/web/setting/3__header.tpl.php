<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting');?>">直播配置</a></li>
	<li <?php  if($op=='im') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('op'=>'im'));?>">直播聊天室</a></li>
</ul>