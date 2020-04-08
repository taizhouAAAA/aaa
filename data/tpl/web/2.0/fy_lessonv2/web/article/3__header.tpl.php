<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('article');?>">文章列表</a></li>
	<?php  if($op=='post') { ?>
	<li <?php  if($op=='post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('article', array('op'=>'post','id'=>$_GPC['id']));?>"><?php  if($_GPC['aid']>0) { ?>编辑<?php  } else { ?>添加<?php  } ?>文章</a></li>
	<?php  } ?>
	<li <?php  if($op=='category') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('article', array('op'=>'category'));?>">分类管理</a></li>
	<?php  if($op=='postCategory') { ?>
	<li <?php  if($op=='postCategory') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('article', array('op'=>'postCategory','id'=>$_GPC['id']));?>"><?php  if($_GPC['cate_id']>0) { ?>编辑<?php  } else { ?>添加<?php  } ?>分类</a></li>
	<?php  } ?>
</ul>