<?php
/**
 * 腾讯云即时通信IM
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

class QcloudIM{

    private $sdkappid = 0;
	private $identifier = '';

    public function __construct($sdkappid, $identifier) {
        $this->sdkappid = $sdkappid;
        $this->identifier = $identifier;
    }

	/*
	 * 创建群组
	 * $usersig App 管理员帐号生成的签名
	 * $random  随机的32位无符号整数
	 * $data    请求数据包
	 */
	public function createGroup($usersig, $random, $data){
		$req_url = "https://console.tim.qq.com/v4/group_open_http_svc/create_group?"
			."sdkappid=" . $this->sdkappid
			."&identifier=" . $this->identifier
			."&usersig=" . $usersig
			."&random=" . $random
			."&contenttype=json";

		$result = $this->http_request($req_url, $data);

		return json_decode($result, true);
	}

	/*
	 * 解散群组
	 * $usersig App 管理员帐号生成的签名
	 * $random  随机的32位无符号整数
	 * $data    请求数据包
	 */
	public function destroyGroup($usersig, $random, $data){
		$req_url = "https://console.tim.qq.com/v4/group_open_http_svc/destroy_group?"
			."sdkappid=" . $this->sdkappid
			."&identifier=" . $this->identifier
			."&usersig=" . $usersig
			."&random=" . $random
			."&contenttype=json";

		$result = $this->http_request($req_url, $data);

		return json_decode($result, true);
	}


	/* https请求（支持GET和POST） */
    private function http_request($url, $data = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
	


}


