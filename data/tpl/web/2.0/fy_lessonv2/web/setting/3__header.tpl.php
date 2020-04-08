<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting');?>">全局设置</a>
	</li>
	<li <?php  if($op=='frontshow') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'frontshow'));?>">手机端显示</a>
	</li>
	<li <?php  if($op=='templatemsg') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'templatemsg'));?>">模版消息</a>
	</li>
	<li <?php  if($op=='picture' || $op=='addPic') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'picture'));?>">广告位管理</a>
	</li>
	<li <?php  if($op=='navigation' || $op=='addNav') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'navigation'));?>">导航栏管理</a>
	</li>
	<li <?php  if($op=='savetype') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'savetype'));?>">存储方式</a>
	</li>
	<li <?php  if($op=='sms') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'sms'));?>">短信配置</a>
	</li>
	<li <?php  if($op=='pageText') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'pageText'));?>">页面文字</a>
	</li>
	<li <?php  if($op=='service') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('setting', array('op'=>'service'));?>">加群客服</a>
	</li>
</ul>
<style>
.item_box img {width:100%; height:100%;}
.focus-setting {border-bottom:1px #428BCA dashed; padding-bottom:20px;}
</style>