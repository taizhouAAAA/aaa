<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab">
	<li<?php  if($do == 'wechat' || $do == 'detail') { ?> class="active"<?php  } ?>><a href="<?php  echo url('system/logs/wechat');?>">微信日志</a></li>
	<li<?php  if($do == 'system') { ?> class="active"<?php  } ?>><a href="<?php  echo url('system/logs/system');?>">系统日志</a></li>
	<li<?php  if($do == 'database') { ?> class="active"<?php  } ?>><a href="<?php  echo url('system/logs/database');?>">数据库日志</a></li>
	<li<?php  if($do == 'sms') { ?> class="active"<?php  } ?>><a href="<?php  echo url('system/logs/sms');?>">短信发送日志</a></li>
	<li<?php  if($do == 'attachment') { ?> class="active"<?php  } ?>><a href="<?php  echo url('system/logs/attachment');?>">附件操作日志</a></li>
</ul>
<div class="clearfix">
	<!--<h5 class="page-header">日志信息</h5>-->
	<!-- 筛选功能 -->
	<?php  if(($do != 'wechat')) { ?>
		<form action="./index.php" method="get" class="we7-form form-inline" role="form">
			<input type="hidden" name="c" value="system">
			<input type="hidden" name="a" value="logs">
			<input type="hidden" name="do" value="<?php  echo $do;?>">
				<div class="form-group">
					<div class="col-sm-8 we7-padding-none">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>$_GPC['time']['start'],'endtime'=>$_GPC['time']['end']));?>
					</div>
					<?php  if(!in_array($do, array('sms', 'attachment'))) { ?>
					<div class="col-sm-1 we7-padding-left">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
					<?php  } ?>
				</div>
				<?php  if($do == 'sms') { ?>
				<div class="form-group we7-margin-left">
					<div class="input-group">
						<input type="text" class="form-control" name="mobile" value="<?php  echo $_GPC['mobile'];?>" placeholder="请输入手机号">
						<div class="input-group-btn">
							<button class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
				<?php  } ?>
				<?php  if($do == 'attachment') { ?>
				<div class="form-group we7-margin-left">
					<div class="input-group">
						<input type="text" class="form-control" name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入要搜索的平台名称">
						<div class="input-group-btn">
							<button class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
				<?php  } ?>
		</form>
	<?php  } ?>
	
	<!-- 微信日志 -->
	<?php  if(($do == 'wechat')) { ?>
	<form action="./index.php" method="get" class="we7-form" role="form">
		<input type="hidden" name="c" value="system">
		<input type="hidden" name="a" value="logs">
		<input type="hidden" name="do" value="<?php  echo $do;?>">
			<div class="form-group">
				<div class="col-sm-4 form-controls">
					<select name="searchtime" class="form-control">
						<?php  if(is_array($tree)) { foreach($tree as $row) { ?>
						<option value="<?php  echo $row;?>" <?php  if($_GPC['searchtime'] == $row) { ?>selected<?php  } ?>><?php  echo $row;?></option>
						<?php  } } ?>
					</select>
					
				</div>
				<div class="col-sm-1 we7-padding-left">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
	</form>
	<pre>
		<?php  if($contents) { ?>
		<?php  echo $contents;?>
		<?php  } else { ?>
		暂无
		<?php  } ?>
	</pre>
	<?php  } ?>
	
	<!-- 系统日志 -->
	<?php  if(($do == 'system')) { ?>
	<table class="table we7-table table-hover">
		<tr>
			<th style="width:150px;">日志类型</th>
			<th style="width:150px;">页面执行时间</th>
			<th style="width:150px;">页面URL</th>
			<th style="width:200px;">日志记录时间</th>
		</tr>
		<?php  if(is_array($list)) { foreach($list as $item) { ?>
		<tr>
			<td><?php  echo $item['type'];?></td>
			<td><?php  echo $item['runtime'];?></td>
			<td>
				<a href="<?php  echo $item['runurl'];?>" target="_blank"><?php  echo $item['runurl'];?></a>
			</td>
			<td><?php  echo $item['createtime'];?></td>
		</tr>
		<?php  } } ?>
	</table>
	<div class="text-right">
		<?php  echo $pager;?>
	</div>
	<?php  } ?>
	
	<!-- 数据据日志 -->
	<?php  if(($do == 'database')) { ?>
	<table class="table we7-table table-hover">
		<tr>
			<th style="width:150px;">日志类型</th>
			<th style="width:150px;">SQL执行时间</th>
			<th style="width:150px;">SQL语句</th>
			<th style="width:200px;">日志记录时间</th>
		</tr>
		<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<tr>
				<td><?php  echo $item['type'];?></td>
				<td><?php  echo $item['runtime'];?></td>
				<td><?php  echo $item['runsql'];?></td>
				<td><?php  echo $item['createtime'];?></td>
			</tr>
		<?php  } } ?>
	</table>
	<div class="text-right">
		<?php  echo $pager;?>
	</div>
	<?php  } ?>
	<?php  if($do == 'sms') { ?>
		<table class="table we7-table table-hover site-list">
			<tr>
				<th style="width:150px;">接收手机</th>
				<th style="width:150px;">发送内容</th>
				<th style="width:150px;">错误报告</th>
				<th style="width:200px;">发送时间</th>
			</tr>
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<tr>
				<td><?php  echo $item['mobile'];?></td>
				<td><?php  echo $item['content'];?></td>
				<td><?php  echo $item['result'];?></td>
				<td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
			</tr>
			<?php  } } ?>
		</table>
	<div class="text-right">
		<?php  echo $pager;?>
	</div>
	<?php  } ?>

	<!-- 附件操作日志 -->
    <?php  if($do == 'attachment') { ?>
    <table class="table we7-table table-hover site-list">
        <tr>
            <th style="width:150px;">用户</th>
            <th style="width:150px;">操作</th>
            <th style="width:150px;">平台</th>
            <th style="width:200px;">时间</th>
        </tr>
        <?php  if(is_array($list)) { foreach($list as $item) { ?>
        <tr>
            <td><?php  echo $item['username'];?></td>
            <td>上传图片:<?php  echo $item['filename'];?></td>
            <td><?php echo $item['name'] ? $item['name'] : '系统';?></td>
            <td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
        </tr>
        <?php  } } ?>
    </table>
    <div class="text-right">
        <?php  echo $pager;?>
    </div>
    <?php  } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
