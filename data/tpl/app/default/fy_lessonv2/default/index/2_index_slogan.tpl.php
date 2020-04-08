<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($config['index_slogan'])) { ?>
<div class="slogan_wrap">
	<div class="slogan_bd" style="background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $config['index_slogan'];?>);"></div>
</div>
<?php  } ?>