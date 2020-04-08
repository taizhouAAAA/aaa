<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				VIP等级设置
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 等级名称</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="level_name" class="form-control" value="<?php  echo $level['level_name'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 有效期</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="level_validity" class="form-control" value="<?php  echo $level['level_validity'];?>">
							<span class="input-group-addon">天</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 价格</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="level_price" class="form-control" value="<?php  echo $level['level_price'];?>">
							<span class="input-group-addon">元</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 赠送积分</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="integral" class="form-control" value="<?php  echo $level['integral'];?>">
							<span class="input-group-addon">积分</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">等级图标</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_image('level_icon', $level['level_icon']);?>
						<span class="help-block">建议尺寸100 * 100px</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 是否显示</label>
					<div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="is_show" value="1" <?php  if($level['is_show']==1) { ?>checked<?php  } ?> /> 显示</label> &nbsp;
						<label class="radio-inline"><input type="radio" name="is_show" value="0" <?php  if($level['is_show']==0) { ?>checked<?php  } ?> /> 隐藏</label>
						<span class="help-block">隐藏的VIP等级不会显示在手机端，且用户无法购买</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 购买课程折扣</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="discount" class="form-control" value="<?php  echo $level['discount'];?>">
							<span class="input-group-addon">%</span>
						</div>
						<span class="help-block">会员购买课程时，享受的折扣，100%表示不享受任何折扣</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span> 续费会员折扣</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group">
							<input type="text" name="renew_discount" class="form-control" value="<?php  echo $level['renew_discount'];?>">
							<span class="input-group-addon">%</span>
						</div>
						<span class="help-block">VIP会员到期前续费该VIP等级享受的折扣，100%表示不享受任何折扣</span>
					</div>
				</div>


				<div class="form-group item">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">一级佣金比例</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="commission[commission1]" value="<?php  echo $commission['commission1'];?>" class="form-control"><span class="input-group-addon">%</span>
						</div>
						<span class="help-block">
							1、下级购买该VIP等级时，一级分销人获得的佣金比例。留空或为0表示使用系统全局佣金比例；<br/>
							2、根据国家相关法规，各级分销佣金比例总和不得超过50%。
						</span>
					</div>
				</div>
				<div class="form-group item <?php  if(in_array($comsetting['level'],array('1'))) { ?>hide<?php  } ?>">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">二级佣金比例</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="commission[commission2]" value="<?php  echo $commission['commission2'];?>" class="form-control"><span class="input-group-addon">%</span>
						</div>
						<span class="help-block">下级购买该VIP等级时，二级分销人获得的佣金比例。留空或为0表示使用系统全局佣金比例</span>
					</div>
				</div>
				<div class="form-group item <?php  if(in_array($comsetting['level'],array('1','2'))) { ?>hide<?php  } ?>">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">三级佣金比例</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="commission[commission3]" value="<?php  echo $commission['commission3'];?>" class="form-control"><span class="input-group-addon">%</span>
						</div>
						<span class="help-block">下级购买该VIP等级时，三级分销人获得的佣金比例。留空或为0表示使用系统全局佣金比例</span>
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="sort" class="form-control" value="<?php  echo $level['sort'];?>">
						<span class="help-block">排序越大，排序越靠前</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1">
			<input type="hidden" name="id" value="<?php  echo $level_id;?>">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		</div>
	</form>
</div>