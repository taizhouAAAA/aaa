<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div id="js-module-plugin" class="module-plugin-container" ng-controller="modulePluginCtrl">
	<div class="row">
		<div class="col-sm-3">
			<div class="input-group">
				<input type="text" name="search" id="" value="" class="form-control" placeholder="输入要搜索的插件">
				<span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
			</div>
		</div>
	</div>
	<div class="module-plugin-list">
		<?php  if(is_array($plugin_list)) { foreach($plugin_list as $plugin) { ?>
		<div class="item">
			<div class="item-box">
				<a class="info" href="<?php  echo url('home/welcome/ext', array('m' => $plugin['plugin_info']['name'], 'version_id' => intval($_GPC['version_id'])))?>">
					<?php  if(!empty($plugin['plugin_info']['logo'])) { ?>
						<img src="<?php  echo $plugin['plugin_info']['logo'];?>" alt="" class="logo">
					<?php  } else { ?>
						<?php  if(file_exists(IA_ROOT. "/addons/". $plugin['plugin_info']['name'] . "/icon-custom.jpg")) { ?>
							<img src="<?php  echo tomedia("addons/" . $plugin['plugin_info']['name'] . "/icon-custom.jpg")?>" class="logo" onerror="this.src='./resource/images/gw-wx.gif'">
						<?php  } else { ?>
							<img src="<?php  echo tomedia("addons/" .$plugin['plugin_info']['name'] . "/icon.jpg")?>" class="logo" onerror="this.src='./resource/images/gw-wx.gif'">
						<?php  } ?>
					<?php  } ?>
					<span class="name text-over"><?php  echo $plugin['plugin_info']['title'];?></span>
				</a>
				<div class="action">
					<?php  if($plugin['module_shortcut']==0) { ?>
					<a href="<?php  echo url('module/plugin/module_shortcut', array('plugin_name' => $plugin['plugin_info']['name'], 'module_shortcut' => 1))?>" class="action-show" data-toggle="tooltip" data-placement="bottom" data-title="显示到菜单">
						<i class="wi wi-eye"></i>
					</a>
					<?php  } else { ?>
					<a href="<?php  echo url('module/plugin/module_shortcut', array('plugin_name' => $plugin['plugin_info']['name'], 'module_shortcut' => 0))?>" class="action-show" data-toggle="tooltip" data-placement="bottom" data-title="从菜单移除">
						<i class="wi wi-eye"></i>
					</a>
					<?php  } ?>
					<a href="<?php  echo url('module/plugin/rank', array('main_module_name' => $plugin['plugin_info']['main_module'], 'plugin_name' => $plugin['plugin_info']['name'], 'uniacid' => intval($_GPC['uniacid'])))?>" class="action-up" data-toggle="tooltip" data-placement="bottom" data-title="置顶"><i class="wi wi-stick-sign"></i></a>
					<a href="<?php  echo url('home/welcome/ext', array('m' => $plugin['plugin_info']['name'], 'version_id' => intval($_GPC['version_id'])))?>" class="action-in"><i class="wi wi-denglu"></i> 进入</a>
				</div>
			</div>
		</div>
		<?php  } } ?>
	</div>
</div>
<script>
	angular.module('moduleApp').value('config', {

	});
	angular.bootstrap($('#js-module-plugin'), ['moduleApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>