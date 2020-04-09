<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div id="js-user-edit-base" ng-controller="UserEditOperatoers" ng-cloak>

	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('account/account-header', TEMPLATE_INCLUDEPATH)) : (include template('account/account-header', TEMPLATE_INCLUDEPATH));?>

	<div class="search-box clearfix we7-margin-bottom">
		<form action="" method="get" class="search-form">
			<input type="hidden" name="c" value="<?php  echo $controller;?>">
			<input type="hidden" name="a" value="<?php  echo $action;?>">
			<input type="hidden" name="do" value="<?php  echo $do;?>">
			<input type="hidden" name="uid" value="<?php  echo $uid;?>">
			<input type="hidden" name="uniacid" value="<?php  echo $uniacid;?>">
			<input type="hidden" name="page" value="1">
			<div class="input-group">
				<input class="form-control" name="username" value="<?php  echo $username;?>" type="text" placeholder="请输入要搜索的用户名">
				<span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
			</div>
		</form>
	</div>
	<table class="table we7-table">
		<tr>
			<th>用户名</th>
			<th>操作应用</th>
			<th>权限信息</th>
			<th>操作</th>
		</tr>
		<?php  if(is_array($clerks)) { foreach($clerks as $clerk) { ?>
		<tr>
			<td><?php  echo $users_info[$clerk['uid']]['username'];?></td>
			<td><?php  echo $modules_info[$clerk['type']]['title'];?></td>
			<td class="color-default"><?php  echo count($clerk['permission'])?> 项</td>
			<td class="color-default">
				<a target="_blank" href="<?php  echo url('module/display/switch', array('module_name' => $clerk['permission_module'], 'uniacid' => $clerk['uniacid'], 'redirect' => urlencode(url('module/permission/post', array('uid' => $clerk['uid'], 'm' => $clerk['permission_module'], 'uniacid' => $clerk['uniacid']))) ))?>">
					权限设置
				</a>
				<?php  if(empty($clerk['main_module'])) { ?>
				<a ng-click="deleteClerk('<?php  echo url('module/permission/delete',  array('uid' => $clerk['uid'], 'm' => $clerk['permission_module'], 'uniacid' => $clerk['uniacid']))?>')" href="javascript:;">
					删除
				</a>
				<?php  } ?>
			</td>
		</tr>
		<?php  } } ?>
		<?php  if(empty($clerks)) { ?>
		<tr>
			<td colspan="10" class="text-center">暂无操作员...</td>
		</tr>
		<?php  } ?>
	</table>
	<div class="text-right">
		<?php  echo $pager;?>
	</div>
</div>
<script>
	angular.module('userProfile').value('config', {
		user: <?php echo !empty($user) ? json_encode($user) : 'null'?>,
        profile: <?php echo !empty($profile) ? json_encode($profile) : 'null'?>,
		links: {
			recycleUser: "<?php  echo url('user/display/operate', array('type' => 'recycle'))?>",
		},
    });
	angular.bootstrap($('#js-user-edit-base'), ['userProfile']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>

