<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 文章公告管理
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
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/article/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/article/_header', TEMPLATE_INCLUDEPATH));?>

<?php  if($op=='display') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/article/display', TEMPLATE_INCLUDEPATH)) : (include template('web/article/display', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='post') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/article/post', TEMPLATE_INCLUDEPATH)) : (include template('web/article/post', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='category') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/article/category', TEMPLATE_INCLUDEPATH)) : (include template('web/article/category', TEMPLATE_INCLUDEPATH));?>

<?php  } else if($op=='postCategory') { ?>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/article/postCategory', TEMPLATE_INCLUDEPATH)) : (include template('web/article/postCategory', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>