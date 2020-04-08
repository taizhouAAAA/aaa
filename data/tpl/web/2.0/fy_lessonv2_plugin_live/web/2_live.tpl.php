<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/live/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/live/_header', TEMPLATE_INCLUDEPATH));?>

<?php  if($op == 'qcloud') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/live/qcloud', TEMPLATE_INCLUDEPATH)) : (include template('web/live/qcloud', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'aliyun') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/live/aliyun', TEMPLATE_INCLUDEPATH)) : (include template('web/live/aliyun', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'stream') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/live/stream', TEMPLATE_INCLUDEPATH)) : (include template('web/live/stream', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op == 'streamDetails') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/live/streamDetails', TEMPLATE_INCLUDEPATH)) : (include template('web/live/streamDetails', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>