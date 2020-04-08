<?php defined('IN_IA') or exit('Access Denied');?> <!-- 
 * 参数设置
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/_header', TEMPLATE_INCLUDEPATH));?>

<?php  if($op=='display') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/display', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/display', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='frontshow') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/frontshow', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/frontshow', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='moduleshow') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/moduleshow', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/moduleshow', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='templatemsg') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/templatemsg', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/templatemsg', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='templateformat') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/templateformat', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/templateformat', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='picture') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/picture', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/picture', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='addPic') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/addPic', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/addPic', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='navigation') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/navigation', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/navigation', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='addNav') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/addNav', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/addNav', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='savetype') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/savetype', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/savetype', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='sms') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/sms', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/sms', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='pageText') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/pageText', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/pageText', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op== 'service') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/service', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/service', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>