<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                直播接口配置信息
            </div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">直播接口</label>
					<div class="col-sm-9">
						<label class="radio-inline"><input type="radio" name="video_live[type]" value="1" <?php  if($video_live['type']==1) { ?>checked<?php  } ?> /> 腾讯云直播</label>
						<label class="radio-inline"><input type="radio" name="video_live[type]" value="2" <?php  if($video_live['type']==2) { ?>checked<?php  } ?> /> 阿里云直播</label>
						<span class="help-block">
							1、腾讯云直播：指标准直播LVB，详情见：https://cloud.tencent.com/product/lvb<br/>
							2、阿里云直播：指视频直播，详情见：https://www.aliyun.com/product/live<br/>
							3、以下各项参数必须与直播平台保持一致。
						</span>
					</div>
				</div>

				<!-- 腾讯云直播 -->
				<div class="qcloud-live" <?php  if($video_live['type']!=1) { ?>style="display:none;"<?php  } ?>>
					
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">腾讯云SecretID</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[qcloud][secretid]" class="form-control" value="<?php  echo $video_live['qcloud']['secretid'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">腾讯云SecretKey</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[qcloud][secretkey]" class="form-control" value="<?php  echo $video_live['qcloud']['secretkey'];?>">
						</div>
					</div><div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">推流域名</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[qcloud][push_domain]" class="form-control" value="<?php  echo $video_live['qcloud']['push_domain'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">推流鉴权主KEY</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[qcloud][push_key]" class="form-control" value="<?php  echo $video_live['qcloud']['push_key'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">播放域名</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[qcloud][play_domain]" class="form-control" value="<?php  echo $video_live['qcloud']['play_domain'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">播放鉴权主KEY</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[qcloud][play_key]" class="form-control" value="<?php  echo $video_live['qcloud']['play_key'];?>">
						</div>
					</div>
				</div>

				<!-- 阿里云直播 -->
				<div class="aliyun-live" <?php  if($video_live['type']!=2) { ?>style="display:none;"<?php  } ?>>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">推流域名</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[aliyun][push_domain]" class="form-control" value="<?php  echo $video_live['aliyun']['push_domain'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">推流鉴权主KEY</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[aliyun][push_key]" class="form-control" value="<?php  echo $video_live['aliyun']['push_key'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">推流鉴权有效时长</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="video_live[aliyun][push_validity]" class="form-control" value="<?php  echo $video_live['aliyun']['push_validity'];?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
								<span class="input-group-addon">分钟</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">播放域名</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[aliyun][play_domain]" class="form-control" value="<?php  echo $video_live['aliyun']['play_domain'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">播放鉴权主KEY</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[aliyun][play_key]" class="form-control" value="<?php  echo $video_live['aliyun']['play_key'];?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">播放鉴权有效时长</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input type="text" name="video_live[aliyun][play_validity]" class="form-control" value="<?php  echo $video_live['aliyun']['play_validity'];?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
								<span class="input-group-addon">分钟</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label">直播转码模板ID</label>
						<div class="col-sm-9">
							<input type="text" name="video_live[aliyun][transcoding_id]" class="form-control" value="<?php  echo $video_live['aliyun']['transcoding_id'];?>">
							<span class="help-block">如果阿里云直播平台没有开启转码模板，请留空。</span>
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
	$(':radio[name="video_live[type]"]').click(function() {
		if($(this).val() == '1') {
			$(".qcloud-live").show();
			$(".aliyun-live").hide();
		}else if($(this).val() == '2') {
			$(".qcloud-live").hide();
			$(".aliyun-live").show();
		}
	});
});
</script>