<?php
/**
 * 腾讯云短信
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

require_once dirname(__FILE__).'/../../library/Qcloud/Sms/index.php';
use Qcloud\Sms\SmsSingleSender;

class QcloudSMS{
	
	/**
	 * 执行发送短信
	 * $sms 短信配置信息
	 * $mobile 接收手机号码
	 * $templateId 模版ID
	 * $data 发送参数
	 **/
	public function sendSMS($sms, $mobile, $templateId, $data){

		$ssender = new SmsSingleSender($sms['appid'], $sms['appkey']);
		$params = [$data['code']];
		$result = $ssender->sendWithParam("86", $mobile, $templateId, $params, $sms['sign'], "", "");
		$rsp = json_decode($result);
			
		return $result;
	}
	

}


