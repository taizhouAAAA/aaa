<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('user/user-header', TEMPLATE_INCLUDEPATH)) : (include template('user/user-header', TEMPLATE_INCLUDEPATH));?>
<div class="clearfix we7-margin-bottom search-box">
	<form action="" class="search-form" method="get">
		<input type="hidden" name="c" value="user">
		<input type="hidden" name="a" value="fields">
		<div class="input-group ">
			<input type="text" name="keyword" id="" value="<?php  echo $_GPC['keyword'];?>" class="form-control" placeholder="请输入标题"/>
			<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
		</div>
	</form>
	<a href="<?php  echo url('user/fields/post');?>" class="btn btn-primary">添加字段</a>
</div>
<form action="" method="post"  id="js-fields-display" ng-controller="FieldsDisplay" ng-cloak>
	<table class="table we7-table table-hover vertical-middle">
		<col width="100px"/>
		<col />
		<col />
		<col />
		<col />
		<col />
		
		<tr>
			<th >排序</th>
			<th class="text-left">字段名</th>
			<th>标题</th>
			<th>是否启用</th>
			<th>注册页显示</th>
			<th>是否必填</th>
			<th class="text-right">操作</th>
		</tr>
		<tr ng-repeat="field in fields">
			<td ng-bind="field.displayorder"></td>
			<td class="text-left" ng-bind="field.field"></td>
			<td ng-bind="field.title"></td>
			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="field.available == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeStatus(field.id, 'available', field.available)"></div>
				</label>
			</td>

			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="field.showinregister == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeStatus(field.id, 'showinregister', field.showinregister)"></div>
				</label>
			</td>

			<td>
				<label>
					<input name="" class="form-control" type="checkbox"  style="display: none;">
					<div ng-class="field.required == 1 ? 'switch switchOn' : 'switch'"  ng-click="changeStatus(field.id, 'required', field.required)"></div>
				</label>
			</td>

			<td>
				<div class="link-group">
					<a href="javascript:;" data-toggle="modal" data-target="#name" ng-click="editInfo(field)">修改</a>
				</div>
			</td>
		</tr>
	</table>

	<!-- 编辑弹出框 start-->
	<div class="modal fade" id="name" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改 {{field.title}}</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<span class="col-xs-8 col-sm-2 col-md-2 col-lg-1 control-label">排序</span>
						<div class="col-sm-10 col-xs-12">
							<input type="text" ng-model="field.displayorder" class="form-control" placeholder="" />
						</div>
					</div>


					<div class="form-group">
						<span class="col-xs-8 col-sm-2 col-md-2 col-lg-1 control-label">字段</span>
						<div class="col-sm-10 col-xs-12">
							<input type="text" ng-model="field.field" class="form-control" placeholder="" />
						</div>
					</div>

					<div class="form-group">
						<span class="col-xs-8 col-sm-2 col-md-2 col-lg-1 control-label">名称</span>
						<div class="col-sm-10 col-xs-12">
							<input type="text" ng-model="field.title" class="form-control" placeholder="" />
						</div>
					</div>

					<div class="form-group">
						<span class="col-xs-8 col-sm-2 col-md-2 col-lg-1 control-label">描述</span>
						<div class="col-sm-10 col-xs-12">
							<textarea type="text" ng-model="field.description" class="form-control" placeholder=""></textarea>
						</div>
					</div>

					<div class="form-group">
						<span class="col-xs-8 col-sm-2 col-md-2 col-lg-1 control-label">提交后不可修改</span>
						<div class="col-sm-10 col-xs-12">
							<input id='radio-5' type="radio" ng-model="field.unchangeable" value="1" ng-checked="field.unchangeable">
							<label for="radio-5">是</label>
							<input id='radio-6' type="radio" ng-model="field.unchangeable" value="0" ng-checked="!field.unchangeable">
							<label for="radio-6">否</label>
						</div>
					</div>

					<div class="form-group">
						<span class="col-xs-8 col-sm-1 col-md-2 col-lg-1 control-label">字段长度</span>
						<div class="col-sm-10 col-xs-12">
							<select ng-model="field.field_length" class="we7-select">
								<option value="64" ng-selected="field.field_length == 64">64</option>
								<option value="128" ng-selected="field.field_length == 128">128</option>
								<option value="255" ng-selected="field.field_length == 255">255</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="saveInfo(field)">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 编辑弹出框 end-->
</form>
<script>
	angular.module('userManageApp').value('config', {
		fields: <?php echo !empty($fields) ? json_encode($fields) : 'null'?>,
		links: {
			fieldPost: "<?php  echo url('user/fields/post')?>",
			fieldDisplay: "<?php  echo url('user/fields/display')?>",
		},
	});
	angular.bootstrap($('#js-fields-display'), ['userManageApp']);
</script>		
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>