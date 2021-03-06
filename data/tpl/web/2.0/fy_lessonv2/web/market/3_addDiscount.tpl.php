<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">限时折扣活动设置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动名称</label>
					<div class="col-sm-9">
						<input type="text" name="title" value="<?php  echo $discount['title'];?>" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">会员折扣叠加</label>
					<div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="member_discount" value="0" <?php  if($discount['member_discount']==0) { ?>checked<?php  } ?> /> 不叠加</label>&nbsp;
						<label class="radio-inline"><input type="radio" name="member_discount" value="1" <?php  if($discount['member_discount']==1) { ?>checked<?php  } ?> /> 叠加</label>
						<span class="help-block">开启会员折扣叠加后，例如100元课程，VIP会员折扣8折，如果此时限时折扣6折，那会员实际支付就是100元x80%x60%=48元 </span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>$starttime,'endtime'=> $endtime), true);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
					<div class="col-sm-9">
						<input type="text" name="displayorder" value="<?php  echo $discount['displayorder'];?>" class="form-control" />
						<span class="help-block">排序越大，活动越靠前</span>
					</div>
				</div>

				<?php  if($discount_id) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动链接(手机端)</label>
					<div class="col-sm-9">
						<a href="javascript:;" id="copy-wap-btn" style="line-height:33px;"><?php  echo $_W['siteroot'];?>app/<?php  echo str_replace("./", "", $this->createMobileUrl('discount', array('discount_id'=>$discount_id)));?></a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动链接(PC端)</label>
					<div class="col-sm-9">
						<a href="javascript:;" id="copy-pc-btn" style="line-height:33px;"><?php  echo $setting_pc['site_root'];?><?php  echo $uniacid;?>/discount.html?discount_id=<?php  echo $discount_id;?></a>
					</div>
				</div>
				<?php  } ?>
			</div>
		</div>

		<div class="form-group col-sm-12">
			<input type="hidden" name="id" value="<?php  echo $discount_id;?>" />
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<script type="text/javascript">
require(['jquery', 'util'], function($, util){
	$(function(){
		util.clip($("#copy-wap-btn")[0], $("#copy-wap-btn").text());
		util.clip($("#copy-pc-btn")[0], $("#copy-pc-btn").text());
	});
});
</script>