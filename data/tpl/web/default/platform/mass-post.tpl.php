<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(empty($id)) { ?>
	<ul class="we7-page-tab">
		<?php  if(is_array($active_sub_permission)) { foreach($active_sub_permission as $active_menu) { ?>
		<?php  if(permission_check_account_user($active_menu['permission_name'], false) && (empty($active_menu['is_display']) || is_array($active_menu['is_display']) && in_array($_W['account']['type'], $active_menu['is_display']))) { ?>
		<li <?php  if($do == $active_menu['active']) { ?>class="active"<?php  } ?>><a href="<?php  echo $active_menu['url'];?>"><?php  echo $active_menu['title'];?></a></li>
		<?php  } ?>
		<?php  } } ?>
	</ul>
<?php  } ?>
<div class="">
	<?php  if(!empty($id)) { ?>
		<ol class="breadcrumb we7-breadcrumb">
			<a href="<?php  echo url('platform/mass/send')?>"><i class="wi wi-back-circle"></i> </a>
			<li><a href="<?php  echo url('platform/mass/')?>">定时群发</a></li>
			<li><a href="<?php  echo url('platform/mass/post')?>">编辑</a></li>
		</ol>
	<?php  } ?>
	<div class="we7-form" id="js-mass-post" ng-controller="MassPost" ng-cloak>
		<form action="" method="post" ng-submit="checkSubmit($event)">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<div class="clearfix row ">
				<div class="form-group col-sm-3">
					<label class="control-label col-sm-4">群发对象</label>
					<div class="form-controls col-sm-8">
						<input type="hidden" name="group" value="">
						<select class="we7-select mass-group">
							<option value="-1">全部粉丝</option>
							<option ng-repeat="group in groups" ng-selected="group.name == massdata.groupname" ng-bind="group.name" ng-value="group.id" ></option>
						</select>
						<span class="help-block"> 根据条件对群发对象进行筛选</span>
					</div>
				</div>
				<div class="form-group col-sm-9">
					<label class="control-label col-sm-1">发送时间</label>
					<div class="form-controls col-sm-8">
						<select class="col-sm-3 mass-type" name="type" ng-model="massdata.type">
							<option value="0" >实时发送</option>
							<option value="1" >定时发送</option>
						</select>
						<div class="col-sm-6" ng-show="massdata.type==1">
							<?php  echo tpl_form_field_date('sendtime',$mass_info['sendtime'],true)?>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-1">发送内容</label>
				<div class="form-controls col-sm-8">
					<?php  echo module_build_form('core', $mass_info['id'], $show_post_content)?>
				</div>
			</div>
			<div class="col-sm-offset-1">
				<input type="submit" name="submit" value="发布" class="btn btn-primary btn-submit"/>
			</div>
		</form>
	</div>
</div>
<script>
require(['underscore', 'clockpicker'], function() {
	angular.module('massApp').value('config', {
		massdata: <?php  echo json_encode($mass_info)?>,
		groups: <?php  echo json_encode($groups)?>,
		day: <?php  echo json_encode($_GPC['day'])?>
	});
	angular.bootstrap($('#js-mass-post'), ['massApp']);
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>