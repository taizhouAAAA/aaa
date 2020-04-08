<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/fycommon.css" rel="stylesheet">

<ul class="nav nav-tabs">
    <li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('teacher');?>">讲师列表</a></li>
	<li <?php  if($op=='order') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'order','status'=>1));?>">购买讲师订单</a></li>
	<?php  if($op=='createOrder') { ?>
	<li class="active"><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'createOrder','teacherid'=>$_GPC['teacherid']));?>">创建订单</a></li>
	<?php  } ?>
	<li <?php  if($op=='teacherMember' || $op=='editTeacherMember') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'teacherMember'));?>">购买讲师会员</a></li>
	<li <?php  if($op=='income') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('teacher', array('op'=>'income'));?>">讲师收入明细</a></li>
</ul>