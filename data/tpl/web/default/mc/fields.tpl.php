<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('mc/common', TEMPLATE_INCLUDEPATH)) : (include template('mc/common', TEMPLATE_INCLUDEPATH));?>
<?php  if($do == 'list') { ?>
<form action="" method="post">
<div id="js-fields-list" ng-controller="fieldsListCtrl">
	<table class="table we7-table table-hover vertical-middle">
	<thead class="navbar-inner">
		<tr>
			<th>排序</th>
			<th>字段</th>
			<th>标题</th>
			<th>是否启用</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="field in account_member_fields">
			<td ng-bind="field.displayorder"></td>
			<td ng-bind="field.field"></td>
			<td ng-bind="field.title"></td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="field.available == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeAvailable(field.id,field.available,$index)"></div>
				</label>
			</td>
			<td>
				<div class="link-group">
					<a href="javascript:;" title="编辑" ng-click="jumpTo(field.id)">编辑</a>
				</div>	
			</td>
		</tr>
	</tbody>
	</table>
</div>
</form>

<?php  } else if($do == 'post') { ?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('mc/fields/list')?>"><i class="wi wi-back-circle"></i> </a>
	<li>
		<a href="<?php  echo url('mc/fields/list')?>">会员管理</a>
	</li>
	<li>
		会员字段管理
	</li>
</ol>

<form class="we7-form form" action="" method="post">
	<input type="hidden" name="id" value="<?php  echo $field['id'];?>">
	<div class="form-group">
		<label class="col-sm-2 control-label">排序</label>
		<div class="col-sm-10 col-xs-12">
			<input type="text" class="form-control" name="displayorder" value="<?php  echo $field['displayorder'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">名称</label>
		<div class="col-sm-10 col-xs-12">
			<input type="text" class="form-control" name="title" value="<?php  echo $field['title'];?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">启用</label>
		<div class="col-sm-10 col-xs-12">
			<input type="radio" name="available" id="radio_1" value="1" <?php  if(empty($field) || $field['available'] == 1) { ?> checked<?php  } ?> /> 
			<label for="radio_1" class="radio-inline">
					是
			</label>
			<input type="radio" name="available" id="radio_0" value="0" <?php  if(!empty($field) && $field['available'] == 0) { ?> checked<?php  } ?> /> 
			<label for="radio_0" class="radio-inline">
				否
			</label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		<div class="col-sm-10 col-xs-12">
			<input type="submit" class="btn btn-primary" name="submit" value="提交" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</div>
</form>
<?php  } ?>

<script>
	angular.module('profileApp').value('config', {
		changeAvailableUrl:"<?php  echo url('mc/fields/change_available')?>",
		fieldPostUrl:"<?php  echo url('mc/fields/post')?>",
		account_member_fields : <?php  echo json_encode($account_member_fields)?>
	});
	angular.bootstrap($('#js-fields-list'), ['profileApp']);
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>