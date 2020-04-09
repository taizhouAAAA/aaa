<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="we7-page-tab"></ul>
<div class="main">
	<table class="table we7-table table-hover site-list" id="system-info" ng-controller="systemInfoCtrl" ng-cloak>
		<tr>
			<th colspan="2" class="text-left">系统信息</th>
		</tr>
		<tr>
			<td class="text-left">系统程序版本</td>
			<td class="text-left">WeEngine <?php  echo IMS_VERSION;?> Release <?php  echo IMS_RELEASE_DATE;?> &nbsp; &nbsp;
				<a href="http://www.w7.cc" target="_blank" style="color: #428bca;">查看最新版本</a>
			</td>
		</tr>
		<tr>
			<td class="text-left">产品系列</td>
			<td class="text-left"><?php  echo $info['family'];?></td>
		</tr>
		<tr>
			<td class="text-left">服务器系统</td>
			<td class="text-left"><?php  echo $info['os'];?></td>
		</tr>
		<tr>
			<td class="text-left">PHP版本 </td>
			<td class="text-left">PHP Version <?php  echo $info['php'];?></td>
		</tr>
		<tr>
			<td class="text-left">服务器软件</td>
			<td class="text-left"><?php  echo $info['sapi'];?></td>
		</tr>
		<tr>
			<td class="text-left">服务器 MySQL 版本</td>
			<td class="text-left"><?php  echo $info['mysql']['version'];?></td>
		</tr>
		<tr>
			<td class="text-left">上传许可</td>
			<td class="text-left"><?php  echo $info['limit'];?></td>
		</tr>
		<tr>
			<td class="text-left">当前数据库尺寸</td>
			<td class="text-left"><?php  echo $info['mysql']['size'];?></td>
		</tr>
		<tr>
			<td class="text-left">当前附件根目录</td>
			<td class="text-left"><?php  echo $info['attach']['url'];?></td>
		</tr>
		<tr>
			<td class="text-left">当前附件尺寸</td>
			<td class="text-left">
				<a href="javascript:;" id="attach-size" ng-click="attachSize()" style="color: #428bca;" >{{ content }}</a>
			</td>
		</tr>
	</table>

	<?php  if($_W['isfounder']) { ?>
	<table class="table we7-table table-hover site-list">
		<col width="150px" />
		<col width="" />
		<th colspan="2" class="text-left">系统开发团队</th>
		<tr>
			<td class="text-left">版权所有</td>
			<td>
				<a href="http://www.w7.cc/" target="_blank" style="color: #428bca;"><b><?php  echo $info['company'];?></b></a>
			</td>
		</tr>
		<tr>
			<td class="text-left">Team 成员</td>
			<td class="text-left">
				<?php  if(is_array($info['developers'])) { foreach($info['developers'] as $developer) { ?>
				<a href="javascript:;" class="lightlink2 smallfont" target="_blank" style="color: #428bca;"><?php  echo $developer;?></a>; &nbsp;
				<?php  } } ?>
				<br /><br />
				<?php  if(is_array($info['operators'])) { foreach($info['operators'] as $operator) { ?>
				<a href="javascript:;" class="lightlink2 smallfont" target="_blank" style="color: #428bca;"><?php  echo $operator;?></a>; &nbsp;
				<?php  } } ?>
			</td>
		</tr>
		<tr>
			<td class="text-left">官方交流群</td>
			<td>
				<a target="_blank" href="<?php  echo $info['exchange_group']['link'];?>" style="color: #428bca;"><?php  echo $info['exchange_group']['title'];?></a>
			</td>
		</tr>
		<tr>
			<td class="text-left">相关链接</td>
			<td>
				<a href="https://www.w7.cc/" class="lightlink2" target="_blank" style="color: #428bca;">公司网站</a>&nbsp;&nbsp;
				<a href="https://s.w7.cc/goods-1.html" class="lightlink2" target="_blank" style="color: #428bca;">购买授权</a>&nbsp;&nbsp;
				<a href="https://s.w7.cc/" class="lightlink2" target="_blank" style="color: #428bca;">更多模块</a>&nbsp;&nbsp;
				<a href="https://s.w7.cc/index.php?c=wiki&do=view&id=1" class="lightlink2" target="_blank" style="color: #428bca;">文档</a>&nbsp;&nbsp;
			</td>
		</tr>
	</table>
	<?php  } ?>
	<script type="text/javascript">
        angular.module('systemApp').value('config', {
            'get_attach_size_url' : "<?php  echo url('system/systeminfo', array('do' => 'get_attach_size'))?>"
        });
        angular.bootstrap($('#system-info'), ['systemApp']);
	</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
