<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <form method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading"><?php  if($_GPC['coupon_id']>0) { ?>编辑<?php  } else { ?>添加<?php  } ?>优惠券</div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>优惠券名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="<?php  echo $coupon['name'];?>" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠券图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('images', $coupon['images'])?>
                        <span class="help-block">建议尺寸 200px * 200px，也可根据自己的实际情况做图片尺寸</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>优惠券面值</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" name="amount" value="<?php  echo $coupon['amount'];?>" class="form-control">
                            <span class="input-group-addon">元</span>
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>使用金额条件</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="text" name="conditions" value="<?php  echo $coupon['conditions'];?>" class="form-control">
                            <span class="input-group-addon">元</span>
                        </div>
                        <div class="help-block">
                            课程订单需满足指定金额方可使用该优惠券
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>使用分类条件</label>
                    <div class="col-sm-9">
                        <select name="category_id" class="form-control">
							<option value="0">全部分类</option>
							<?php  if(is_array($category_list)) { foreach($category_list as $item) { ?>
							<option value="<?php  echo $item['id'];?>" <?php  if($item['id']==$coupon['category_id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
						</select>
                        <div class="help-block">
                            指定分类下的课程可使用
                        </div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>积分兑换</label>
                    <div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="is_exchange" value="1" <?php  if($coupon['is_exchange']==1) { ?>checked<?php  } ?> /> 启用</label>&nbsp;
						<label class="radio-inline"><input type="radio" name="is_exchange" value="0" <?php  if($coupon['is_exchange']==0) { ?>checked<?php  } ?> /> 不启用</label>
						<span class="help-block">选择启用积分兑换优惠券，优惠券将展示在手机端供用户自行兑换</span>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">兑换积分</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="exchange_integral" value="<?php  echo $coupon['exchange_integral'];?>" class="form-control">
							<span class="input-group-addon">积分</span>
						</div>
						<span class="help-block">设置兑换每张优惠券需要消耗的积分</span>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">最大兑换数量</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="max_exchange" value="<?php  echo $coupon['max_exchange'];?>" class="form-control">
							<span class="input-group-addon">张</span>
						</div>
						<span class="help-block">每位用户最多可兑换的优惠券数量</span>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">兑换总数量</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="total_exchange" value="<?php  echo $coupon['total_exchange'];?>" class="form-control">
							<span class="input-group-addon">张</span>
						</div>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">已兑换数量</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="already_exchange" value="<?php  echo $coupon['already_exchange'];?>" class="form-control">
							<span class="input-group-addon">张</span>
						</div>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>有效期方式</label>
                    <div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="validity_type" value="1" <?php  if($coupon['validity_type']==1) { ?>checked<?php  } ?> onclick="changeType(this.value)"/> 固定日期</label>&nbsp;
						<label class="radio-inline"><input type="radio" name="validity_type" value="2" <?php  if($coupon['validity_type']==2) { ?>checked<?php  } ?> onclick="changeType(this.value)"/> 自增天数</label>
						<span class="help-block">固定日期为指定日期前有效，自增天数为自用户领取时往后指定时间内有效</span>
					</div>
                </div>
				<div id="validity1" class="form-group" <?php  if($coupon['validity_type']!=1) { ?>style="display:none;"<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">固定有效期</label>
                    <div class="col-sm-9">
						<?php  echo tpl_form_field_date('days1', $coupon['days1'], true);?>
						<span class="help-block">指定日期前，该优惠券有效</span>
					</div>
                </div>
				<div id="validity2" class="form-group" <?php  if($coupon['validity_type']!=2) { ?>style="display:none;"<?php  } ?>>
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自增有效期</label>
					<div class="col-sm-9">
						<div class="input-group">
							<input type="text" name="days2" value="<?php  echo $coupon['days2'];?>" class="form-control">
							<span class="input-group-addon">天</span>
						</div>
						<span class="help-block">用户领取之后，指定天数内该优惠券有效</span>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" value="<?php  echo $coupon['displayorder'];?>" class="form-control">
						<span class="help-block">排序越大，排名越靠前</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>状态</label>
                    <div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($coupon['status']==1) { ?>checked<?php  } ?>/> 上架</label>&nbsp;
						<label class="radio-inline"><input type="radio" name="status" value="0" <?php  if($coupon['status']==0) { ?>checked<?php  } ?>/> 下架</label>
						<span class="help-block">用户将无法在线领取兑换下架的优惠券，已获得的优惠券继续使用</span>
					</div>
                </div>
				<?php  if($coupon['id']) { ?>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="request">*</span>手机端链接领取</label>
                    <div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="receive_link" value="1" <?php  if($coupon['receive_link']==1) { ?>checked<?php  } ?>/> 支持</label>&nbsp;
						<label class="radio-inline"><input type="radio" name="receive_link" value="0" <?php  if($coupon['receive_link']==0) { ?>checked<?php  } ?>/> 不支持</label>
						<span class="help-block">
							<a href="javascript:;" id="copy-btn"><?php  echo $_W['siteroot'];?>app/<?php  echo str_replace("./", "", $this->createMobileUrl('getcoupon', array('op'=>'free','id'=>$coupon['id'])));?></a><br/>
							链接领取指用户通过链接即可免费领取优惠券，每人最大兑换数量同“最大兑换数量”一样
						</span>
					</div>
                </div>
				<?php  } ?>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
function changeType(type){
	if(type==1){
		$("#validity1").show();
		$("#validity2").hide();
	}else{
		$("#validity2").show();
		$("#validity1").hide();
	}
}

require(['jquery', 'util'], function($, util){
	$(function(){
		util.clip($("#copy-btn")[0], $("#copy-btn").text());
	});
});
</script>
