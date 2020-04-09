<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('system/user-setting-header', TEMPLATE_INCLUDEPATH)) : (include template('system/user-setting-header', TEMPLATE_INCLUDEPATH));?>
<div id="js-system-thirdparty-login" ng-controller="SystemThirdpartyLogin" ng-cloak>
<?php  if($type == 'system') { ?>
	<table class="table we7-table table-hover table-form we7-form">
		<col width="220px " />
		<col />
		<col width="230px" />
		<tr>
			<th class="text-left" colspan="2">网站平台登录配置</th>
			<th class="we7-padding-right"></th>
		</tr>
		<tr>
			<td class="table-label" colspan="2">是否启用站点登录</td>
			<td>
				<label>
					<div class="switch" ng-class="{'switchOn' : thirdlogin.system.authstate}" ng-click="httpChange('authstate')"></div>
				</label>
			</td>
		</tr>
	</table>
<?php  } ?>
<?php  if($type == 'qq' || $type == 'wechat') { ?>
	<div class="form-files-box">
		<div class="form-files we7-margin-bottom">
			
			<div class="form-file header">绑定设置</div>
			<div class="form-file">
				<div class="form-label">强制绑定信息</div>
				<div class="form-value" ng-if="bind.id != 'null'" ng-bind="bind.name"></div>
				<div class="form-value" ng-if="bind.id == 'null'">选择后，用户登录后，将强制绑定所选方式</div>
				<div class="form-edit">
					<we7-modal-form type="'select'" label="'强制绑定信息'" key="'name'" value="bind" on-confirm="saveSetting(formValue, 'bind')" options="binds"></we7-modal-form>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">第三方登录入口</div>
				<div class="form-value">开启后，登录页面显示第三方登录入口，可以登录已关联账户或注册新帐号</div>
				<div class="form-edit">
					<div ng-class="!thirdlogin.oauth_bind ? 'switch' : 'switch switchOn'"  ng-click="saveSettingSwitch('oauth_bind', thirdlogin.oauth_bind)"></div>
				</div>
			</div>
		</div>

		<div class="form-files we7-margin-bottom">
			<div class="form-file header">QQ配置</div>
			<div class="form-file">
				<div class="form-label">QQ授权登录</div>
				<div class="form-value"></div>
				<div class="form-edit">
					<div ng-class="!thirdlogin.qq.authstate ? 'switch' : 'switch switchOn'"  ng-click="saveSettingSwitch('qqauthstate', thirdlogin.qq.authstate)"></div>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">AppID</div>
				<div class="form-value" ng-if="thirdlogin.qq.appid" ng-bind="thirdlogin.qq.appid"></div>
				<div class="form-value" ng-if="!thirdlogin.qq.appid">在QQ互联平台注册创建应用后可以获取到AppId</div>
				<div class="form-edit">
					<we7-modal-form type="'text'" label="'AppID'" value="thirdlogin.qq.appid" on-confirm="saveSetting(formValue, 'qqappid')"></we7-modal-form>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">AppSecret</div>
				<div class="form-value" ng-if="thirdlogin.qq.appsecret" ng-bind="thirdlogin.qq.appsecret"></div>
				<div class="form-value" ng-if="!thirdlogin.qq.appsecret">在QQ互联平台注册创建应用后可以获取到AppSecret</div>
				<div class="form-edit">
					<we7-modal-form type="'text'" label="'AppSecret'" value="thirdlogin.qq.appsecret" on-confirm="saveSetting(formValue, 'qqappsecret')"></we7-modal-form>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">网站地址</div>
				<div class="form-value"><?php  echo $siteroot_parse_array['host'];?></div>
				<div class="form-edit">
					<div class="link-group"><a href="javascript:;" id="copy-0" clipboard supported="supported" text="url.host" on-copied="success('0')">点击复制</a></div>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">网站回调域</div>
				<div class="form-value"><?php  echo $_W['siteroot'];?>web/index.php</div>
				<div class="form-edit">
					<div class="link-group"><a href="javascript:;" id="copy-1" clipboard supported="supported" text="siteroot+'web/index.php'" on-copied="success('1')">点击复制</a></div>
				</div>
			</div>
		</div>

		<div class="form-files we7-margin-bottom">
			
			<div class="form-file header">微信配置</div>
			<div class="form-file">
				<div class="form-label">微信授权登录</div>
				<div class="form-value"></div>
				<div class="form-edit">
					<div ng-class="!thirdlogin.wechat.authstate ? 'switch' : 'switch switchOn'"  ng-click="saveSettingSwitch('wechatauthstate', thirdlogin.wechat.authstate)"></div>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">AppID</div>
				<div class="form-value" ng-if="thirdlogin.wechat.appid" ng-bind="thirdlogin.wechat.appid"></div>
				<div class="form-value" ng-if="!thirdlogin.wechat.appid">在微信开放平台注册创建网站应用后可以获取到AppId</div>
				<div class="form-edit">
					<we7-modal-form type="'text'" label="'AppID'" value="thirdlogin.wechat.appid" on-confirm="saveSetting(formValue, 'wechatappid')"></we7-modal-form>
				</div>
			</div>
			<div class="form-file">
				<div class="form-label">AppSecret</div>
				<div class="form-value" ng-if="thirdlogin.wechat.appsecret" ng-bind="thirdlogin.wechat.appsecret"></div>
				<div class="form-value" ng-if="!thirdlogin.wechat.appsecret">在微信开放平台注册创建网站应用后可以获取到AppSecret</div>
				<div class="form-edit">
					<we7-modal-form type="'text'" label="'AppSecret'" value="thirdlogin.wechat.appsecret" on-confirm="saveSetting(formValue, 'wechatappsecret')"></we7-modal-form>
				</div>
			</div>
		</div>
	</div>
<?php  } ?>
</div>
<script type="text/javascript">
	angular.module('systemApp').value('config', {
		'thirdlogin' : <?php echo !empty($thirdlogin) ? json_encode($thirdlogin) : 'null'?>,
		'binds' : <?php echo !empty($binds) ? json_encode($binds) : 'null'?>,
		'bind' : <?php echo !empty($bind) ? json_encode($bind) : 'null'?>,
		'siteroot': "<?php  echo $_W['siteroot']?>",
		'saveSettingUrl': "<?php  echo url('system/thirdlogin/save_setting')?>",
		'links': {
			'save_setting': "<?php  echo url('system/thirdlogin/save_setting', array('type' => $type))?>",
		},
		'url' : {
			'host' : "<?php  echo $siteroot_parse_array['host'];?>",
		},
	});
	angular.bootstrap($('#js-system-thirdparty-login'), ['systemApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>