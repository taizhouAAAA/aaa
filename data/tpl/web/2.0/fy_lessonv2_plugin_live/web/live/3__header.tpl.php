<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($op=='qcloud') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('live', array('op'=>'qcloud'));?>">生成腾讯云直播流</a></li>
	<li <?php  if($op=='aliyun') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('live', array('op'=>'aliyun'));?>">生成阿里云直播流</a></li>
	<li <?php  if($op=='stream' || $op=='streamDetails') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('live', array('op'=>'stream'));?>">直播流管理</a></li>
</ul>