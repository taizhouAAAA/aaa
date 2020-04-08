<?php defined('IN_IA') or exit('Access Denied');?> <!-- 
 * 清空缓存
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
<ul class="nav nav-tabs">
	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('clearcache');?>">清空缓存</a>
	</li>
</ul>

<?php  if($op=='display') { ?>
<div class="main">
	<div class="alert alert-info">
		清空缓存仅限于清空本模块应用的数据缓存，该操作不会清除前端用户已登录状态。如果您希望清空整个站点的缓存数据(包括前端用户登录状态)，请点击 <a href="javascript:;" class="label label-primary" id="clearCache">更新缓存</a>
	</div>
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">更多选项</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">操作会员海报</label>
					<div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="clearposter" value="1"> 清空会员海报</label> &nbsp;
						<label class="radio-inline"><input type="radio" name="clearposter" value="0" checked> 不操作</label>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="清空缓存" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#clearCache').on('click', function(){
		$('.loader').show();
		$.post("<?php  echo url('system/updatecache/updatecache');?>", {}, function(data) {
			$('.loader').hide();
			util.message('更新缓存成功！', '', 'success');
		})
	});
</script>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>