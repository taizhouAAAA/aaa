<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.input-group-addon{min-width:115px;}
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
            <div class="panel-heading">分销文字</div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">分销文字修改</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">分销中心</span>
							<input type="text" name="font[sale_center]" value="<?php  echo $font['sale_center'];?>" class="form-control" placeholder="位置：个人中心">
							<span class="input-group-addon">可提现佣金</span>
							<input type="text" name="font[nopay_commission]" value="<?php  echo $font['nopay_commission'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
						</div>
						<div class="input-group">
							<span class="input-group-addon">累计佣金</span>
							<input type="text" name="font[total_commission]" value="<?php  echo $font['total_commission'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
							<span class="input-group-addon">我要提现</span>
							<input type="text" name="font[cash]" value="<?php  echo $font['cash'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
						</div>
						<div class="input-group">
							<span class="input-group-addon">提现明细</span>
							<input type="text" name="font[cash_log]" value="<?php  echo $font['cash_log'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
							<span class="input-group-addon">我的团队</span>
							<input type="text" name="font[my_team]" value="<?php  echo $font['my_team'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
						</div>
						<div class="input-group">
							<span class="input-group-addon">佣金明细</span>
							<input type="text" name="font[commission_log]" value="<?php  echo $font['commission_log'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
							<span class="input-group-addon">推广海报</span>
							<input type="text" name="font[poster]" value="<?php  echo $font['poster'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
						</div>
						<div class="input-group">
							<span class="input-group-addon">佣金提现</span>
							<input type="text" name="font[commission_cash]" value="<?php  echo $font['commission_cash'];?>" class="form-control" placeholder="位置：分销中心—佣金提现">
							<span class="input-group-addon">佣金提现明细</span>
							<input type="text" name="font[commossion_cash_log]" value="<?php  echo $font['commossion_cash_log'];?>" class="form-control" placeholder="位置：分销中心—佣金提现明细">
						</div>
						<div class="input-group">
							<span class="input-group-addon">分销奖励</span>
							<input type="text" name="font[commossion_award]" value="<?php  echo $font['commossion_award'];?>" class="form-control" placeholder="位置：分销中心—佣金提现明细">
							<span class="input-group-addon">Ta的佣金/成员</span>
							<input type="text" name="font[his_commission]" value="<?php  echo $font['his_commission'];?>" class="form-control" placeholder="位置：分销中心—我的团队">
						</div>
						<div class="input-group">
							<span class="input-group-addon">默认等级</span>
							<input type="text" name="font[default_level]" value="<?php  echo $font['default_level'];?>" class="form-control" placeholder="位置：个人中心—分销中心">
							<span class="input-group-addon">提现备注标题</span>
							<input type="text" name="font[commission_cash_title]" value="<?php  echo $font['commission_cash_title'];?>" class="form-control" placeholder="提现成功微信支付通知备注标题">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
            <input type="hidden" name="id" value="<?php  echo $comsetting['id'];?>" />
            <input type="submit" name="submit" value="保存设置" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
	</form>
</div>