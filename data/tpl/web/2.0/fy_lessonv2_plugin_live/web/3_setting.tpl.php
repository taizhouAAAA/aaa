<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/_header', TEMPLATE_INCLUDEPATH));?>

<?php  if($op == 'display') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/display', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/display', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'im') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/setting/im', TEMPLATE_INCLUDEPATH)) : (include template('web/setting/im', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>