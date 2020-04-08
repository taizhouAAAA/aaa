<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('comment');?>">评价列表</a></li>
	<?php  if($op=='reply') { ?>
	<li <?php  if($op=='reply') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('comment', array('op'=>'reply','id'=>$_GPC['id']));?>">评价详情</a></li>
	<?php  } ?>
</ul>