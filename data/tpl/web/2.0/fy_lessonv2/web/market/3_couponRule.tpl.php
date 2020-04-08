<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">优惠券规则列表</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">【新会员注册】</label>
					<div class="col-xs-9 col-sm-9" style="margin-top: 7px;">
					   <?php  if(is_array($coupon_list)) { foreach($coupon_list as $item) { ?>
							<label>
								<input type="checkbox" name="reg_give[]" value="<?php  echo $item['id'];?>" <?php  if(in_array($item['id'],$regGive)) { ?>checked<?php  } ?>><?php  echo $item['name'];?>&nbsp;&nbsp;
							</label>
					   <?php  } } ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">新会员优惠券图片</label>
					<div class="col-xs-9 col-sm-9">
					   <?php  echo tpl_form_field_image('reg_coupon_image', $market['reg_coupon_image']);?>
					   <span class="help-block">建议尺寸750*740px，新用户获得优惠券后进入首页会弹出提醒一次</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">【推荐下级】</label>
					<div class="col-xs-9 col-sm-9" style="margin-top: 7px;">
					   <?php  if(is_array($coupon_list)) { foreach($coupon_list as $item) { ?>
							<label>
								<input type="checkbox" name="recommend[]" value="<?php  echo $item['id'];?>" <?php  if(in_array($item['id'],$recommend)) { ?>checked<?php  } ?>><?php  echo $item['name'];?>&nbsp;&nbsp;
							</label>
					   <?php  } } ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-5">
						<div class="input-group">
							<span class="input-group-addon">最多可获取</span>
							<input type="text" name="recommend_time" value="<?php  echo $market['recommend_time'];?>" class="form-control">
							<span class="input-group-addon">张</span>
						</div>
						<span class="help-block">非严格数值，填写0为不限制</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">【购买课程】</label>
					<div class="col-xs-9 col-sm-9" style="margin-top: 7px;">
					   <?php  if(is_array($coupon_list)) { foreach($coupon_list as $item) { ?>
							<label>
								<input type="checkbox" name="buy_lesson[]" value="<?php  echo $item['id'];?>" <?php  if(in_array($item['id'],$buyLesson)) { ?>checked<?php  } ?>><?php  echo $item['name'];?>&nbsp;&nbsp;
							</label>
					   <?php  } } ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-5">
						<div class="input-group">
							<span class="input-group-addon">最多可获取</span>
							<input type="text" name="buy_lesson_time" value="<?php  echo $market['buy_lesson_time'];?>" class="form-control">
							<span class="input-group-addon">张</span>
						</div>
						<span class="help-block">非严格数值，填写0为不限制</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">【分享课程】</label>
					<div class="col-xs-9 col-sm-9" style="margin-top: 7px;">
					   <?php  if(is_array($coupon_list)) { foreach($coupon_list as $item) { ?>
							<label>
								<input type="checkbox" name="share_lesson[]" value="<?php  echo $item['id'];?>" <?php  if(in_array($item['id'],$shareLesson)) { ?>checked<?php  } ?>><?php  echo $item['name'];?>&nbsp;&nbsp;
							</label>
					   <?php  } } ?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"></label>
					<div class="col-sm-5">
						<div class="input-group">
							<span class="input-group-addon">最多可获取</span>
							<input type="text" name="share_lesson_time" value="<?php  echo $market['share_lesson_time'];?>" class="form-control">
							<span class="input-group-addon">张</span>
						</div>
						<span class="help-block">非严格数值，填写0为不限制</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">优惠券说明</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="coupon_desc" style="height:150px;"><?php  echo $market['coupon_desc'];?></textarea>
						<span class="help-block">该说明将显示在前台优惠券页面底部，第一行为标题，从第二行开始换行标识新的一段</span>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<input type="hidden" name="id" value="<?php  echo $setting['id'];?>" />
			<input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>