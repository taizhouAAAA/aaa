<?php defined('IN_IA') or exit('Access Denied');?><script type="text/javascript" src="<?php echo MODULE_URL;?>static/js/jquery.qrcode.min.js"></script>
<div class="main">
	<?php  if(!$video_live['qcloud']['push_domain'] || !$video_live['qcloud']['play_domain']) { ?>
	<div class="alert alert-info color-red">
	    您还没有配置直播推流域名和播放域名，请到 <a href="<?php  echo $this->createWebUrl('setting');?>" class="label label-danger"><i class="fa fa-cog"> </i> 点击此处</a> 进行配置“腾讯云直播”里各项参数。
	</div>
	<?php  } ?>
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                腾讯云直播
            </div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">直播流名称</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><?php  echo $prefix;?></span>
							<input type="text" name="streamName" class="form-control" onkeyup="this.value=this.value.replace(/[^\u0000-\u00FF]/g,'')" placeholder="仅支持英文字母、数字和符号">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">过期时间</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_date('validity', strtotime('today')+86399, true);?>
						<span class="help-block">直播推流链接和播放链接的过期时间，一般保持该选项留空即可</span>
					</div>
				</div>
            </div>
        </div>
        <div class="form-group col-sm-12">
			<input type="hidden" name="prefix" value="<?php  echo $prefix;?>" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="submit" name="submit" class="btn btn-primary col-lg-1" value="生成直播流" />
        </div>
	</form>
</div>