<?php
/**
 * 腾讯云直播
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

require_once dirname(__FILE__).'/../../library/tencentCloud/TCloudAutoLoader.php';
use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;
use TencentCloud\Live\V20180801\LiveClient;
use TencentCloud\Live\V20180801\Models\DescribeStreamPlayInfoListRequest;

class QcloudLive{
	public $secretId;
	public $secretKey;

	function __construct($secretId, $secretKey) {
		$this->secretId = $secretId;
		$this->secretKey = $secretKey;
	}

	/* 获取直播流某个时间段在线人数
	 * RequestDomain 请求接口域名
	 * PlayDomain 播放域名
	 * StreamName 流名称
	 * StartTime  开始时间 格式为yyyy-mm-dd HH:MM:SS
	 * EndTime    结束时间 格式为yyyy-mm-dd HH:MM:SS
	 */	
	public function getPlayInfoList($paramArray){
		$cred = new Credential($this->secretId, $this->secretKey);
		$httpProfile = new HttpProfile();
		$httpProfile->setEndpoint($paramArray['RequestDomain']);
		  
		$clientProfile = new ClientProfile();
		$clientProfile->setHttpProfile($httpProfile);
		$client = new LiveClient($cred, "", $clientProfile);

		$req = new DescribeStreamPlayInfoListRequest();
		
		$params = array(
			'PlayDomain' => $paramArray['PlayDomain'],
			'StreamName' => $paramArray['StreamName'],
			'StartTime'	 => $paramArray['StartTime'],
			'EndTime'	 => $paramArray['EndTime'],
		);
		$req->fromJsonString(json_encode($params));
		$resp = $client->DescribeStreamPlayInfoList($req);

		return $resp->toJsonString();
	}


}


