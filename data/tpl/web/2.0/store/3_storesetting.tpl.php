<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">商城设置</div>
<ul class="we7-page-tab">
	<li <?php  if($operate == 'store_status') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('operate' => 'store_status','direct' => '1'))?>">状态设置</a></li>
	<li <?php  if($operate == 'menu') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('setting', array('operate' => 'menu','direct' => '1'))?>">菜单设置</a></li>
</ul>
<?php  if($operate == 'store_status') { ?>
<!--
<table class="table we7-table table-form">
	<col width="140px">
	<col>
	<col width="120px">
	<tr>
		<th colspan="3">商城设置</th>
	</tr>
	<tr>
		<td class="table-label">商城开关</td>
		<td>(已开启)</td>
		<td class="text-right">
			<a href="" class="color-default">关闭站点</a>
		</td>
	</tr>
	<tr>
		<td class="table-label">访问权限</td>
		<td>21231</td>
		<td class="text-right">
			<a href="#showEdit" data-toggle="modal" data-target="#showEdit" class="color-default">设置</a>
		</td>
	</tr>
</table>
<div class="modal fade store-status-show" id="showEdit" role="dialog">
	<div class="we7-modal-dialog modal-dialog we7-form">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<div class="modal-title">访问权限</div>
			</div>
			<div class="modal-body">
				<div class="alert we7-page-alert">
					<i class="wi wi-info-sign"></i>设置用户的访问权限
				</div>
				<div class="form-group">
					<div class="col-sm-8 form-control-static">
						<input type="radio" name="status" id="status-0" value="0" checked>
						<label class="radio-inline" for="status-0">
							登录前可见
						</label>
						<input type="radio" name="status" id="status-1"  value="1">
						<label class="radio-inline" for="status-1">
							登陆后可见
						</label>
					</div>
				</div>
				<div class="form-group js-show-group store-status-show-login" style="display: none">
					<div class="form-control-static">
						<input id="checkall-0" type="checkbox" name="group[]">
						<label class="checkbox-inline" for="checkall-0">
							普通用户
						</label>
						<input id="checkall-1" type="checkbox" name="group[]">
						<label class="checkbox-inline" for="checkall-1">
							操作员
						</label>
						<input id="checkall-2" type="checkbox" name="group[]">
						<label class="checkbox-inline" for="checkall-2">
							管理员
						</label>
						<input id="checkall-3" type="checkbox" name="group[]">
						<label class="checkbox-inline" for="checkall-3">
							主管理员
						</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="httpChange()">确定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			</div>
		</div>
	</div>
</div>
<script>
$('[name="status"]').change(function() {
	if(this.value == 1) {
		$('.js-show-group').show()
	} else {
		$('.js-show-group').hide()
	}
})
</script>
-->
<form action="" class="form we7-form" method="post">
	<div class="form-group">
		<label class="control-label col-sm-2">关闭商城</label>
		<div class="col-sm-8 form-control-static">
			<input type="radio" name="status" id="status-1" <?php  if($settings['status'] == 1) { ?> checked="checked"<?php  } ?> value="1">
			<label class="radio-inline" for="status-1">
				是
			</label>
			<input type="radio" name="status" id="status-0" <?php  if($settings['status'] == 0) { ?> checked="checked"<?php  } ?> value="0">
			<label class="radio-inline" for="status-0">
				否
			</label>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2">是否开启预购应用</label>
		<div class="col-sm-8 form-control-static">
			<input type="radio" name="wish_module_status" id="wish_module_status-1" <?php  if($settings['wish_module_status'] == 1) { ?> checked="checked"<?php  } ?> value="1">
			<label class="radio-inline" for="wish_module_status-1">
				是
			</label>
			<input type="radio" name="wish_module_status" id="wish_module_status-0" <?php  if($settings['wish_module_status'] == 0) { ?> checked="checked"<?php  } ?> value="0">
			<label class="radio-inline" for="wish_module_status-0">
				否
			</label>
		</div>
	</div>

	<div class="form-group">
		<div class="control-label col-sm-2"></div>
		<div class="col-sm-8">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<input type="submit" class="btn btn-primary" name="submit" value="提交">
		</div>
	</div>
</form>
<?php  } else if($operate == 'menu') { ?>
<form action="" class="form we7-form" method="post">
	<?php  if(!empty($goods_menu)) { ?>
	<?php  if(is_array($goods_menu)) { foreach($goods_menu as $key => $menu) { ?>
	<div class="form-group">
		<label class="control-label col-sm-2"><?php  echo $menu['title'];?></label>
		<div class="col-sm-8 form-control-static">
			<input type="radio" name="hide[<?php  echo $key;?>]" id="status-<?php  echo $key;?>-0" <?php  if($settings[$key] == 0) { ?> checked="checked"<?php  } ?> value="0">
			<label class="radio-inline" for="status-<?php  echo $key;?>-0">
				显示
			</label>
			<input type="radio" name="hide[<?php  echo $key;?>]" id="status-<?php  echo $key;?>-1" <?php  if($settings[$key] == 1) { ?> checked="checked"<?php  } ?> value="1">
			<label class="radio-inline" for="status-<?php  echo $key;?>-1">
				隐藏
			</label>
		</div>
	</div>	
	<?php  } } ?>
	<?php  } ?>
	<div class="form-group">
		<div class="control-label col-sm-2"></div>
		<div class="col-sm-8">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
			<input type="submit" class="btn btn-primary" name="submit" value="提交">
		</div>
	</div>
</form>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>