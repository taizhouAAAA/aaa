<?php defined('IN_IA') or exit('Access Denied');?><style>
.item_box img{
	width: 100%;
	height: 100%;
}
.focus-setting{
	border-bottom:1px #428BCA dashed;
	padding-bottom:20px;
}
</style>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
            <div class="panel-heading">分销功能</div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销功能</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="is_sale" value="1" id="issale1" <?php  if($comsetting['is_sale'] == 1) { ?>checked="true"<?php  } ?> /> 开启</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="is_sale" value="0" id="issale2"  <?php  if(empty($comsetting) || $comsetting['is_sale'] == 0) { ?>checked="true"<?php  } ?> /> 关闭</label>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">小程序端操作</label>
                    <div class="col-sm-9">
						<label class="radio-inline" style="padding-left:0;"><input name="hidden_sale" type="checkbox" value="1" <?php  if($comsetting['hidden_sale']) { ?>checked<?php  } ?>> 开启小程序模式</label>
						<label class="radio-inline"><input name="hidden_login" type="checkbox" value="1" <?php  if($comsetting['hidden_login']) { ?>checked<?php  } ?>> 关闭微信端强制登录</label>
						<span class="help-block">
							小程序提交审核使用步骤见使用手册《12-6、小程序提交审核步骤》
						</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销内购</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="self_sale" value="1" id="selfsale1" <?php  if($comsetting['self_sale'] == 1) { ?>checked="true"<?php  } ?> /> 开启</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="self_sale" value="0" id="selfsale2"  <?php  if(empty($comsetting) || $comsetting['self_sale'] == 0) { ?>checked="true"<?php  } ?> /> 关闭</label>
                        <span class="help-block ">
							1、开启分销内购，购买人获得一级分销佣金；<br/>
							<span class="color-red">2、根据国家相关法规，关闭分销内购后，最高只能做二级分销，请自觉遵守国家法律法规进行合法运营。</span>
						</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商默认状态</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="agent_status" value="1" <?php  if($comsetting['agent_status'] == 1) { ?>checked="true"<?php  } ?> onclick="changeAgentStatus(this.value)"/> 正常</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="agent_status" value="0" <?php  if(empty($comsetting) || $comsetting['agent_status'] == 0) { ?>checked="true"<?php  } ?> onclick="changeAgentStatus(this.value)"/> 冻结</label>
                        <span class="help-block">正常状态即用户进入微课堂即成为分销商，可以发展下级；冻结状态的分销商不能发展下级，需要满足分销商条件后转为正常状态方可发展下级。</span>
                    </div>
                </div>
				<div class="form-group <?php  if($comsetting['agent_status']==1) { ?>hide<?php  } ?>" id="agent_condition">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商冻结状态转正常</label>
                    <div class="col-sm-4">
						<span class="help-block">1、购买订单累计金额满指定金额</span>
						<div class="input-group">
							<input type="text" name="order_amount" value="<?php  echo $agent_condition['order_amount'];?>" class="form-control" placeholder="0表示不限制"><span class="input-group-addon">元</span>
						</div>
					</div>
					<div class="col-sm-4">
						<span class="help-block">2、购买订单累计满指定订单数</span>
						<div class="input-group">
							<input type="text" name="order_total" value="<?php  echo $agent_condition['order_total'];?>" class="form-control" placeholder="0表示不限制"><span class="input-group-addon">单</span>
						</div>
					</div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销获得佣金身份</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="sale_rank" value="1" id="selfsale1" <?php  if(empty($comsetting) || $comsetting['sale_rank'] == 1) { ?>checked="true"<?php  } ?> /> 任何人</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="sale_rank" value="2" id="selfsale2"  <?php  if($comsetting['sale_rank'] == 2) { ?>checked="true"<?php  } ?> /> VIP身份</label>
                        <span class="help-block">分销身份是指用户A推广了下级B，下级B消费付款时，上级A即可获得佣金(或上级A必须为VIP身份时才能获得佣金)</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金提现方式</label>
                    <div class="col-sm-9">
						<label class="radio-inline" style="padding-left:0;"><input name="cash_way[]" type="checkbox" value="credit" <?php  if(in_array('credit',$cash_way)) { ?>checked<?php  } ?> /> 提现到余额</label>
						<label class="radio-inline"><input name="cash_way[]" type="checkbox" value="weachat" <?php  if(in_array('weachat',$cash_way)) { ?>checked<?php  } ?> /> 提现到微信钱包</label>
						<label class="radio-inline"><input name="cash_way[]" type="checkbox" value="alipay" <?php  if(in_array('alipay',$cash_way)) { ?>checked<?php  } ?> /> 提现到支付宝</label>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金提现处理方式</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="cash_type" value="1" id="cashtype1" <?php  if(empty($comsetting) || $comsetting['cash_type'] == 1) { ?>checked="true"<?php  } ?> /> 人工审核 <span class="label label-success">推荐</span></label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="cash_type" value="2" id="cashtype2"  <?php  if($comsetting['cash_type'] == 2) { ?>checked="true"<?php  } ?> /> 自动到账</label>
                        <span class="help-block">
							1、余额只能用于系统里面消费，默认自动到账；<br/>
							2、提现到微信钱包可设置人工审核或自动到账，<span class="color-red">强烈建议设置为人工审核，且平时不要存放太多金额在微信支付商户号里，防止后台密码泄漏被盗刷。</span><br/>
							3、支付宝没有在线转账接口，提现到支付宝须管理员线下打款，该方式主要用于过渡新开通微信没法开通微信企业付款。
						</span>
                    </div>
                </div>
				<div class="form-group item">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提现最低金额</label>
					<div class="col-sm-9">
                        <div class="input-group">
							<span class="input-group-addon">普通用户最低提现</span>
							<input type="text" name="cash_lower_common" class="form-control" value="<?php  echo $comsetting['cash_lower_common'];?>">
							<span class="input-group-addon">元起</span>

							<span class="input-group-addon">VIP用户最低提现</span>
							<input type="text" name="cash_lower_vip" class="form-control" value="<?php  echo $comsetting['cash_lower_vip'];?>">
							<span class="input-group-addon">元起</span>

							<span class="input-group-addon">讲师最低提现</span>
							<input type="text" name="cash_lower_teacher" class="form-control" value="<?php  echo $comsetting['cash_lower_teacher'];?>">
							<span class="input-group-addon">元起</span>

							<span class="input-group-addon">提现手续费</span>
							<input type="text" name="cash_service_num" class="form-control" value="<?php  echo $comsetting['cash_service_num'];?>"  onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
							<span class="input-group-addon">%</span>
                        </div>
                        <span class="help-block">最低提现为1元起，提现手续费仅针对微信零钱和支付宝提现方式生效</span>
                    </div>
				</div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商升级条件</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="upgrade_condition" value="1" <?php  if($comsetting['upgrade_condition'] == 1) { ?>checked="true"<?php  } ?> /> 分销累计佣金</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="upgrade_condition" value="2" <?php  if($comsetting['upgrade_condition'] == 2) { ?>checked="true"<?php  } ?> /> 购买订单总额</label>
                        &nbsp;
						<label class="radio-inline"><input type="radio" name="upgrade_condition" value="3" <?php  if($comsetting['upgrade_condition'] == 3) { ?>checked="true"<?php  } ?> /> 购买订单笔数</label>
                    </div>
                </div>
				<div class="form-group item">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分销等级</label>
					<div class="col-sm-4">
						<select name="level" id="sale_level" class="form-control" onchange="checklevel(this.value);">
							<option value="1" <?php  if($comsetting['level']==1) { ?>selected<?php  } ?>>一级分销</option>
							<option value="2" <?php  if($comsetting['level']==2) { ?>selected<?php  } ?>>二级分销</option>
							<option value="3" <?php  if($comsetting['level']==3) { ?>selected<?php  } ?> id="sale_level3" <?php  if(!$comsetting['self_sale']) { ?>style="display:none;"<?php  } ?>>三级分销</option>
						</select>
					</div>
				</div>
				<div class="form-group item" id="level1">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">一级佣金比例</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" name="commission1" value="<?php  echo $commission['commission1'];?>" class="form-control"><span class="input-group-addon">%</span>
						</div>
						<span class="help-block color-red">根据国家相关法规，各级分销佣金比例总和不得超过50%，请自觉遵守国家法律法规进行合法运营。</span>
					</div>
				</div>
				<div class="form-group item <?php  if(in_array($comsetting['level'],array('1'))) { ?>hide<?php  } ?>" id="level2">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">二级佣金比例</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" name="commission2" value="<?php  echo $commission['commission2'];?>" class="form-control"><span class="input-group-addon">%</span>
						</div>
					</div>
				</div>
				<div class="form-group item <?php  if(in_array($comsetting['level'],array('1','2'))) { ?>hide<?php  } ?>" id="level3">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">三级佣金比例</label>
					<div class="col-sm-4">
						<div class="input-group">
							<input type="text" name="commission3" value="<?php  echo $commission['commission3'];?>" class="form-control"><span class="input-group-addon">%</span>
						</div>
					</div>
				</div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">升级条件</label>
                    <div class="col-sm-4 col-xs-12">
                        <div class="input-group">
							<span class="input-group-addon" id="upgrade_type">
								<?php  if($comsetting['upgrade_condition']==1) { ?>分销累计佣金
								<?php  } else if($comsetting['upgrade_condition']==2) { ?>购买订单额
								<?php  } else if($comsetting['upgrade_condition']==3) { ?>购买订单
								<?php  } ?>满
							</span>
							<input type="text" name="updatemoney" class="form-control" value="<?php  echo $commission['updatemoney'];?>">
							<span class="input-group-addon" id="upgrade_unit">
								<?php  if($comsetting['upgrade_condition']==1 || $comsetting['upgrade_condition']==2) { ?>元
								<?php  } else if($comsetting['upgrade_condition']==3) { ?>单
								<?php  } ?>
							</span>
                        </div>
                        <span class="help-block">分销商升级条件，留空或为0为不自动升级</span>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">直接推荐下级奖励</label>
					<div class="col-sm-8 col-xs-12">
                        <div class="input-group">
							<input type="text" name="rec_income[credit1]" class="form-control" value="<?php  echo $rec_income['credit1'];?>" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
							<span class="input-group-addon">积分</span>
							<input type="text" name="rec_income[credit2]" class="form-control" value="<?php  echo $rec_income['credit2'];?>" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
							<span class="input-group-addon">佣金</span>
                        </div>
                        <span class="help-block">0为不开启奖励；每直接推荐一个下级成员，给予推荐人的奖励，可选择积分或佣金。</span>
                    </div>
				</div>

				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页分享标题</label>
                    <div class="col-sm-9">
						<input type="text" name="sharelinktitle" value="<?php  echo $sharelink['title'];?>" class="form-control">
						<span class="help-block">该分享用于手机端首页分享</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页分享描述</label>
                    <div class="col-sm-9">
                        <textarea style="height:70px;" class="form-control" name="sharelinkdesc"><?php  echo $sharelink['desc'];?></textarea>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页分享图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("sharelinkimg", $sharelink['images']);?>
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享课程描述</label>
                    <div class="col-sm-9">
                        <textarea style="height:70px;" class="form-control" name="sharelessontitle"><?php  echo $sharelesson['title'];?></textarea>
						<span>变量：【课程名称】</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享课程图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("sharelessonimg", $sharelesson['images']);?>
						<span>留空将使用课程封面图</span>
                    </div>
                </div>

				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享讲师描述</label>
                    <div class="col-sm-9">
                        <textarea style="height:70px;" class="form-control" name="shareteachertitle"><?php  echo $shareteacher['title'];?></textarea>
						<span>变量：【讲师名称】</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享讲师图片</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image("shareteacherimg", $shareteacher['images']);?>
						<span>留空将使用讲师相片</span>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分销说明</label>
					<div class="col-sm-9">
						<textarea class="form-control" name="sale_desc" style="height:150px;"><?php  echo $comsetting['sale_desc'];?></textarea>
						<span class="help-block">该说明将显示在前端“个人中心—分销中心—我的海报”页面</span>
					</div>
				</div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">会员海报缓存</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="qrcode_cache" value="1" id="selfsale1" <?php  if($comsetting['qrcode_cache'] == 1) { ?>checked="true"<?php  } ?> /> 开启缓存</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="qrcode_cache" value="0" id="selfsale2"  <?php  if(empty($comsetting) || $comsetting['qrcode_cache'] == 0) { ?>checked="true"<?php  } ?> /> 关闭缓存</label>
                        <span class="help-block">开启缓存会员海报，可以大幅度的减少会员生成海报对服务器的压力，在调试会员海报的时候可以关闭缓存</span>
                    </div>
                </div>
			</div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">证书设置(佣金提现使用，需开通微信“企业付款到零钱”功能)</div>
			<div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信支付商户号(MchId)</label>
                    <div class="col-sm-9">
                        <input type="text" name="mchid" value="<?php  echo $comsetting['mchid'];?>" class="form-control"/>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付密钥(API密钥)</label>
                    <div class="col-sm-9">
                        <input type="text" name="mchkey" value="<?php  echo $comsetting['mchkey'];?>" class="form-control"/>
						<span>此值需要和系统的微信支付API密钥保持一致</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">服务器IP</label>
                    <div class="col-sm-9">
                        <input type="text" name="serverIp" value="<?php  echo $comsetting['serverIp'];?>" class="form-control"/>
						<span>企业付款正常时可忽略此项；当提示“client_ip非法未填写时”可手动配置IP地址</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">CERT证书文件</label>
                    <div class="col-sm-4 col-xs-12">
                        <input type="file" name="apiclient_cert" class="form-control" />
						<span class="help-block">
							<?php  if($apiclient_cert) { ?>
							<span class='label label-success'>已上传</span>
							<?php  } else { ?>
							<span class='label label-danger'>未上传</span>
							<?php  } ?>
							下载证书 cert.zip 中的 apiclient_cert.pem 文件
						</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">KEY密钥文件</label>
                    <div class="col-sm-4 col-xs-12">
                        <input type="file" name="apiclient_key" class="form-control" />
						<span class="help-block">
							<?php  if($apiclient_key) { ?>
							<span class='label label-success'>已上传</span>
							<?php  } else { ?>
							<span class='label label-danger'>未上传</span>
							<?php  } ?>
							下载证书 cert.zip 中的 apiclient_key.pem 文件
						</span>
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
<script type="text/javascript">
function checklevel(obj){
	if(obj==1){
		$("#level2").addClass("hide");
		$("#level3").addClass("hide");
	}else if(obj==2){
		$("#level2").removeClass("hide");
		$("#level3").addClass("hide");
	}else if(obj==3){
		$("#level2").removeClass("hide");
		$("#level3").removeClass("hide");
	}
}

function changeAgentStatus(status){
	if(status==0){
		$("#agent_condition").removeClass("hide");
	}else{
		$("#agent_condition").addClass("hide");
	}
}

$(function(){
	$(':radio[name="upgrade_condition"]').click(function(){
		if($(this).val()==1){
			var upgrade_type = '分销累计佣金 满';
			var upgrade_unit = '元';

		}else if($(this).val()==2){
			var upgrade_type = '购买订单额 满';
			var upgrade_unit = '元';
		
		}else if($(this).val()==3){
			var upgrade_type = '购买订单 满';
			var upgrade_unit = '单';
		
		}
		document.getElementById("upgrade_type").innerHTML = upgrade_type;
		document.getElementById("upgrade_unit").innerHTML = upgrade_unit;
	});
	
	$(':radio[name="self_sale"]').click(function(){
		if($(this).val()==1){
			$("#sale_level3").show();
		}else if($(this).val()==0){
			$("#sale_level").val("2");
			$("#level3").hide();
			$("#sale_level3").hide();
		}
	});


});
</script>
