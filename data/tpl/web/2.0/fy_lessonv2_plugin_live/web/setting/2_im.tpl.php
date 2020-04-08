<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.qcloud-im, .aodianyun-im{display:none;}
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">直播聊天室</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">聊天室状态</label>
					<div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="im_config[type]" value="0" <?php  if(!$im_config['type']) { ?>checked<?php  } ?>> 关闭</label>
						<label class="radio-inline"><input type="radio" name="im_config[type]" value="2" <?php  if($im_config['type']==2) { ?>checked<?php  } ?>> 奥点云IM</label>
						<span class="help-block">
							奥点云IM：https://www.aodianyun.com/product/dms.html<br/>
						</span>
					</div>
				</div>
				<div class="aodianyun-im" <?php  if($im_config['type']==2) { ?>style="display:block;"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">AccessID</label>
						<div class="col-sm-9">
							<input type="text" name="im_config[aodianyun][accessId]" value="<?php  echo $im_config['aodianyun']['accessId'];?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">AccessKey</label>
						<div class="col-sm-9">
							<input type="text" name="im_config[aodianyun][accessKey]" value="<?php  echo $im_config['aodianyun']['accessKey'];?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">s_key</label>
						<div class="col-sm-9">
							<input type="text" name="im_config[aodianyun][s_key]" value="<?php  echo $im_config['aodianyun']['s_key'];?>" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">关键字过滤</label>
						<div class="col-sm-9">
							<textarea name="im_config[aodianyun][filterKeys]" id="filterKeys" class="form-control" maxlength="250"><?php  echo $im_config['aodianyun']['filterKeys'];?></textarea>
							<span class="">最多250个字符，多个关键字用英文逗号 ,分开，包含关键字的直接替换为*</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>

<script type="text/javascript">
$(function() {
	$(':radio[name="im_config[type]"]').click(function() {
		if($(this).val() == '0') {
			$(".aodianyun-im").hide();
		}else if($(this).val() == '2') {
			$(".aodianyun-im").show();
		}
	});

	$('#filterKeys').bind('keypress', function(e) {
		if (e.keyCode == "13") {
			return false;
		}
	});
});
</script>