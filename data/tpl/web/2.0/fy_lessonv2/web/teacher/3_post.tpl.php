<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/lessonTab/lesson-tab.css?v=<?php  echo $versions;?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/lessonTab/prefixfree.min.js?v=<?php  echo $versions;?>"></script>

<div class="main">
	<div class="alert alert-info">
	    后台添加类型的讲师为虚拟存在讲师，用户购买课程时不会给讲师分成，只有会员自行申请的讲师才会结算课程讲师分成。
	</div>
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="tab-group">
			<section id="tab1" title="讲师基本信息" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;">*</span> 讲师名称</label>
						<div class="col-sm-9">
							<input type="text" name="teacher" class="form-control" value="<?php  echo $teacher['teacher'];?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;">*</span> 讲师分成</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="teacher_income" class="form-control" value="<?php  echo $teacher['teacher_income'];?>" />
								<span class="input-group-addon">%</span>
							</div>
							<span class="help-block">该讲师分成仅做初始值，讲师最终的分成以课程里面的讲师分成为准。讲师佣金 = 售价 x 产品讲师分成%</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;">*</span> 手机号码</label>
						<div class="col-sm-9">
							<input type="text" name="mobile" class="form-control" value="<?php  echo $teacher['mobile'];?>" />
							<span class="help-block">手机号码为隐私项，不显示在前台</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">微讲师帐号</label>
						<div class="col-sm-9">
							<input type="text" name="account" class="form-control" value="<?php  echo $teacher['account'];?>" <?php  if($teacher['account']) { ?>readonly<?php  } ?> autocomplete="off" />
							<span class="help-block">登录微讲师平台帐号，设置后不能修改，如没有微讲师，请不要理会</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">微讲师密码</label>
						<div class="col-sm-9">
							<input type="password" name="password" class="form-control" autocomplete="new-password" />
							<span class="help-block">登录微讲师平台密码，不修改请留空</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师QQ</label>
						<div class="col-sm-9">
							<input type="text" name="qq" class="form-control" value="<?php  echo $teacher['qq'];?>" />
							<span class="help-block">留空将不显示在前台</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师QQ群</label>
						<div class="col-sm-9">
							<input type="text" name="qqgroup" class="form-control" value="<?php  echo $teacher['qqgroup'];?>" />
							<span class="help-block">留空将不显示在前台</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">添加QQ群链接</label>
						<div class="col-sm-9">
							<input type="text" name="qqgroupLink" class="form-control" value="<?php  echo $teacher['qqgroupLink'];?>" />
							<span class="help-block">添加QQ群加群连接后，前台点击“咨询—QQ群”后将自动添加群。</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">在线咨询链接</label>
						<div class="col-sm-9">
							<input type="text" name="online_url" class="form-control" value="<?php  echo $teacher['online_url'];?>" />
							<span class="help-block">第三方在线咨询链接请以http://或https://开头</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师信息</label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">讲师头像</span>
								<?php  echo tpl_form_field_image('teacherphoto', $teacher['teacherphoto']);?>
								<span class="input-group-addon">微信二维码</span>
								<?php  echo tpl_form_field_image('weixin_qrcode', $teacher['weixin_qrcode']);?>
								<span class="input-group-addon">手机端头部图片</span>
								<?php  echo tpl_form_field_image('teacher_bg', $teacher['teacher_bg']);?>
								<span class="input-group-addon">PC端头部图片</span>
								<?php  echo tpl_form_field_image('teacher_bg_pc', $teacher['teacher_bg_pc']);?>
							</div>
							<span class="help-block">
								1、头像、微信二维码请使用正方形尺寸，建议200 * 200px；<br>
								2、讲师主页头部图片建议尺寸：手机端750px * 300px；PC端1200px * 300px；
							</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;">*</span> 讲师状态</label>
						<div class="col-sm-9">
							<p class="form-control-static">
								<input type="radio" id="status1" name="status" value="1" <?php  if($teacher['status']==1) { ?>checked<?php  } ?>>
								<label for="status1">
									<span class="label label-success" style="vertical-align:text-top;">审核通过</span>
								</label>
								&nbsp;&nbsp;
								<input type="radio" id="status2" name="status" value="2" <?php  if($teacher['status']==2) { ?>checked<?php  } ?>>
								<label for="status2">
									<span class="label label-danger" style="vertical-align:text-top;">待审核</span>
								</label>
								&nbsp;&nbsp;
								<input type="radio" id="status3" name="status" value="3" <?php  if($teacher['status']==3) { ?>checked<?php  } ?>>
								<label for="status3">
									<span class="label label-info" style="vertical-align:text-top;">隐藏中</span>
								</label>
								&nbsp;&nbsp;
								<input type="radio" id="status0" name="status" value="-1" <?php  if($teacher['status']==-1) { ?>checked<?php  } ?>>
								<label for="status0">
									<span class="label label-default" style="vertical-align:text-top;">审核未通过</span>
								</label>
							</p>
							<p class="form-control-static reason-div" <?php  if($teacher['status']!=-1) { ?>style="display:none;"<?php  } ?>>
								<input type="text" name="reason" class="form-control" placeholder="请输入未通过申请原因" />
							</p>
							<span class="help-block">隐藏中的讲师仅仅不显示在前台讲师列表里，讲师的其他功能权限不受影</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;">*</span> 首页推荐</label>
						<div class="col-sm-9">
							<p class="form-control-static">
								<input type="radio" id="is_recommend1" name="is_recommend" value="1" <?php  if($teacher['is_recommend']==1) { ?>checked<?php  } ?>>
								<label for="is_recommend1">
									<span class="label label-success" style="vertical-align:text-top;">开启推荐</span>
								</label>
								&nbsp;&nbsp;
								<input type="radio" id="is_recommend0" name="is_recommend" value="0" <?php  if($teacher['is_recommend']==0) { ?>checked<?php  } ?>>
								<label for="is_recommend0">
									<span class="label label-default" style="vertical-align:text-top;">取消推荐</span>
								</label>
								<span class="help-block">开启推荐到首页的讲师将显示在首页</span>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red;">*</span> 上传课程权限</label>
						<div class="col-sm-9">
							<p class="form-control-static">
								<input type="radio" id="upload1" name="upload" value="1" <?php  if($teacher['upload']==1) { ?>checked<?php  } ?>>
								<label for="upload1">
									<span class="label label-success" style="vertical-align:text-top;">允许上传</span>
								</label>
								&nbsp;&nbsp;
								<input type="radio" id="upload0" name="upload" value="0" <?php  if($teacher['upload']==0) { ?>checked<?php  } ?>>
								<label for="upload0">
									<span class="label label-danger" style="vertical-align:text-top;">禁止上传</span>
								</label>
								<span class="help-block">禁止上传状态下的讲师将无法在讲师平台上传课程</span>
							</p>
						</div>
					</div>
					<?php  if($setting['company_income']) { ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">上级机构uid</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="company_uid" id="company_uid" class="form-control" value="<?php  echo $teacher['company_uid'];?>" style="display:inline-block;width:88%;" readonly />&nbsp;&nbsp;<a id="removeread" href="javascript:;">开启修改</a>
							<span class="help-block">上级机构uid为指定会员uid，该讲师课程出售时，上级机构获得指定课程售价的分成收入。</span>
						</div>
					</div>
					<?php  } ?>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师介绍</label>
						<div class="col-sm-9">
							<?php  echo tpl_ueditor('teacherdes', $teacher['teacherdes']);?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">讲师简介</label>
						<div class="col-sm-9">
							<textarea style="height:95px;width:750px;" class="form-control" name="digest" maxlength="120"><?php  echo $teacher['digest'];?></textarea>
							<span class="help-block">最多120个字符，讲师简介将用于前端首页和讲师列表页端显示，如留空，将调取讲师介绍显示</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">首拼音字母</label>
						<div class="col-xs-12 col-sm-2">
						   <select class="form-control" name="first_letter">
							 <option value="">请选择...</option>
							 <?php  if(is_array($letter)) { foreach($letter as $let) { ?>
							  <option value="<?php  echo $let;?>" <?php  if($teacher['first_letter']==$let) { ?>selected<?php  } ?>><?php  echo $let;?></option>
							 <?php  } } ?>
						   </select>
					   </div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-xs-12 col-sm-9">
						   <span>讲师名称首拼音字母，例如：李明，请选择L</span>
					   </div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
						<div class="col-sm-9">
							<input type="text" name="displayorder" class="form-control" value="<?php  echo $teacher['displayorder'];?>" />
							<span class="help-block">序号越大，排序越靠前</a></span>
						</div>
					</div>
				</div>
			</section>
			<section id="tab2" title="购买讲师价格" class="lesson-tab-section">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">购买讲师价格</label>
						<div class="col-sm-9">
							<div class="input-group">
								<span class="input-group-addon">有效期</span>
								<input type="text" name="price_info[validity_time]" value="<?php  echo $teacher_price['validity_time'];?>" class="form-control">
								<span class="input-group-addon">天</span>
								<span class="input-group-addon">需</span>
								<input type="text" name="price_info[price]" value="<?php  echo $teacher_price['price'];?>" class="form-control">
								<span class="input-group-addon">元</span>
								<span class="input-group-addon">赠送</span>
								<input type="text" name="price_info[integral]" value="<?php  echo $teacher_price['integral'];?>" class="form-control">
								<span class="input-group-addon">积分</span>
								<span class="input-group-addon">讲师分成</span>
								<input type="text" name="price_info[income]" value="<?php  echo $teacher_price['teacher_income'];?>" class="form-control">
								<span class="input-group-addon">%</span>
							</div>
							<span class="help-block">
								购买讲师后，在指定时间内可以免费学习该讲师所有课程，该功能解决了用户购买vip等级后，讲师无法分成的矛盾，vip等级更适合用于平台自营课程<br/>
								有效期和价格任何一项留空都自动删除该购买价格
							</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">购买讲师分销开关</label>
						<div class="col-sm-9">
							<p class="form-control-static">
								<input type="radio" id="is_distribution1" name="is_distribution" value="1" <?php  if($teacher['is_distribution']==1) { ?>checked<?php  } ?>>
								<label for="is_distribution1">
									<span class="label label-success" style="vertical-align:text-top;">开启分销</span>
								</label>
								&nbsp;&nbsp;
								<input type="radio" id="is_distribution0" name="is_distribution" value="0" <?php  if($teacher['is_distribution']==0) { ?>checked<?php  } ?>>
								<label for="is_distribution0">
									<span class="label label-default" style="vertical-align:text-top;">关闭分销</span>
								</label>
								<span class="help-block">开启分销后，下级购买讲师服务时，上级会获得分销佣金；反之，关闭分销后，下级购买讲师服务，上级不会获得分销佣金。</span>
							</p>
						</div>
					</div>
					<div class="distribution-div" <?php  if(!$teacher['is_distribution']) { ?>style="display:none;"<?php  } ?>>
						<div class="form-group item">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">一级佣金比例</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" name="commission[commission1]" value="<?php  echo $commission['commission1'];?>" class="form-control"><span class="input-group-addon">%</span>
								</div>
								<span class="help-block">
									1、留空或为0表示使用系统全局佣金比例；<br/>
									2、根据国家相关法规，各级分销佣金比例总和不得超过50%。
								</span>
							</div>
						</div>
						<div class="form-group item <?php  if(in_array($comsetting['level'],array('1'))) { ?>hide<?php  } ?>">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">二级佣金比例</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" name="commission[commission2]" value="<?php  echo $commission['commission2'];?>" class="form-control"><span class="input-group-addon">%</span>
								</div>
								<span class="help-block">留空或为0表示使用系统全局佣金比例</span>
							</div>
						</div>
						<div class="form-group item <?php  if(in_array($comsetting['level'],array('1','2'))) { ?>hide<?php  } ?>">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">三级佣金比例</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" name="commission[commission3]" value="<?php  echo $commission['commission3'];?>" class="form-control"><span class="input-group-addon">%</span>
								</div>
								<span class="help-block">留空或为0表示使用系统全局佣金比例</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="id" value="<?php  echo $id;?>" />
        </div>
	</form>
</div>

<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/lessonTab/jquery-tab.js?v=<?php  echo $versions;?>"></script>
<script type="text/javascript">
$("#removeread").click(function(){
	document.getElementById("company_uid").readOnly = false;
});

$(function() {
	$(':radio[name="status"]').click(function() {
		if($(this).val() == '-1') {
			$('.reason-div').show();
		} else {
			$('.reason-div').hide();
		}
	});
	
	$(':radio[name="is_distribution"]').click(function() {
		if($(this).val() == '1') {
			$('.distribution-div').show();
		} else {
			$('.distribution-div').hide();
		}
	});



	$('.tab-group').tabify();
});

</script>