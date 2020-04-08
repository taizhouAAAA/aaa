<?php defined('IN_IA') or exit('Access Denied');?><!--
 * 讲师管理
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
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/_header', TEMPLATE_INCLUDEPATH));?>

<?php  if($op == 'display') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/display', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/display', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'post') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/post', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/post', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'order') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/order', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/order', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'createOrder') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/createOrder', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/createOrder', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'teacherMember') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/teacherMember', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/teacherMember', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'editTeacherMember') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/editTeacherMember', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/editTeacherMember', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'orderDetail') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/orderDetail', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/orderDetail', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'income') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/teacher/income', TEMPLATE_INCLUDEPATH)) : (include template('web/teacher/income', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>