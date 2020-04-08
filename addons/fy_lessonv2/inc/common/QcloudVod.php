<?php
/**
 * 腾讯云点播
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

class QcloudVod{
	public $secretId;
	public $secretKey;

	function __construct($secretId, $secretKey) {
		$this->secretId = $secretId;
		$this->secretKey = $secretKey;
	}

	/**
	 * 获取上传凭证
	 */
	public function getUploadSign($suffix=''){
		//确定签名的当前时间和失效时间
		$current = time();
		$expired = $current + 7200;

		// 向参数列表填入参数
		$arg_list = array(
			'secretId' => $this->secretId,
			'currentTimeStamp' => $current,
			'expireTime' => $expired,
			'random' => rand(1000,9999),
			'procedure' => 'QCVB_SimpleProcessFile(1,1,10)',
		);

		if($suffix=='mp3'){
			$arg_list['procedure'] = 'QCVB_SimpleProcessFile(0,0,10)';
		}

		// 计算签名
		$orignal = http_build_query($arg_list);
		$signature = base64_encode(hash_hmac('SHA1', $orignal, $this->secretKey, true).$orignal);

		return $signature;
	}

	/**
	 * 点播播放器播放参数
	 * $safety_key string 防盗链参数
	 * $appid      string 项目appid
	 * $videoid    string 视频id
	 * $t          string 播放地址的过期时间戳
	 * $exper      string 试看时长，单位为秒
	 * $us         string 链接标识
	 * $sign       string 防盗链签名
	 */
	 public function getPlaySign($safety_key, $appid, $videoid, $exper=''){
		
		$t = dechex(time() + 7200);
		$us = $this->getRandStr();
		$sign = md5($safety_key.$appid.$videoid.$t.$exper.$us);

		return array(
			't'    => $t,
			'us'   => $us,
			'sign' => $sign
		);

	 }

	private function getRandStr(){
		$str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";

		return substr(str_shuffle($str),5,8);
	}

	/**
	 * 获取媒体文件信息
	 * $videoid string 媒体文件id
	 * $type string    获取内容[basicInfo(基础内容)、transcodeInfo(视频转码结果信息)、metaData(视频元信息)]
	 */
	 public function getBasicInfo($videoid, $type='basicInfo'){
		$paramArray = array(
			'Action' => 'GetVideoInfo',
			'fileId' => $videoid,
			'priority' => 0,
		);

		$responseUrl = $this->generateUrl($paramArray, 'GET', 'vod.api.qcloud.com', '/v2/index.php');
		$response = $this->http_request($responseUrl);
		$res = json_decode($response, true);

		if($res['code'] != 0){
			return $res['message'];
		}

		return $res[$type];
	 }

	/**
	 * 直接链接播放音频参数
	 * $safety_key string 防盗链参数
	 * $videoid    string 音频文件id
	 * $t          string 播放地址的过期时间戳
	 * $exper      string 试看时长，单位为秒
	 * $us         string 链接标识
	 * $sign       string 防盗链签名
	 */
	 public function getUrlPlaySign($safety_key, $videoid, $exper=''){
		$paramArray = array(
			'Action' => 'GetVideoInfo',
			'fileId' => $videoid,
			'priority' => 0,
		);

		$responseUrl = $this->generateUrl($paramArray, 'GET', 'vod.api.qcloud.com', '/v2/index.php');
		$response = $this->http_request($responseUrl);
		$res = json_decode($response, true);

		$videoUrl = $res['basicInfo']['sourceVideoUrl'];
		if(!empty($res['transcodeInfo']['transcodeList'])){
			$transcodeList = array_reverse($res['transcodeInfo']['transcodeList']);
			foreach($transcodeList as $value){
				if($value['container']=='mp3'){
					$videoUrl = $value['url'];
				}
			}
		}

		if(empty($videoUrl)){
			return '';
		}

		$pathinfo = pathinfo($videoUrl);
		$parse_url = parse_url($videoUrl);
		$dir = str_replace($pathinfo['basename'], '', $parse_url['path']);
		
		$t = dechex(time() + 7200);
		$us = $this->getRandStr();
		$sign = md5($safety_key.$dir.$t.$exper.$us);


		return $videoUrl.'?t='.$t.'&us='.$us.'&sign='.$sign;
	 }

	
	/**
     * generateUrl
     * 生成请求的URL
     *
     * @param  array  $paramArray 请求参数
     * @param  string $secretId
     * @param  string $secretKey
	 * @param  string $requestMethod
     * @param  string $requestHost
     * @param  string $requestPath
     * @return
     */
    public function generateUrl($paramArray, $requestMethod, $requestHost, $requestPath) {

        if(!isset($paramArray['SecretId']))
            $paramArray['SecretId'] = $this->secretId;

        if (!isset($paramArray['Nonce']))
            $paramArray['Nonce'] = rand(1, 65535);

        if (!isset($paramArray['Timestamp']))
            $paramArray['Timestamp'] = time();
        
        $signMethod = 'HmacSHA1';
        if (isset($paramArray['SignatureMethod']) && $paramArray['SignatureMethod'] == "HmacSHA256")
            $signMethod= 'HmacSHA256';

        $paramArray['RequestClient'] = 'SDK_PHP_2.0.6';
        $plainText = $this->makeSignPlainText($paramArray, $requestMethod, $requestHost, $requestPath);

        $paramArray['Signature'] = $this->sign($plainText, $this->secretKey, $signMethod);

        $url = 'https://' . $requestHost . $requestPath;
        if ($requestMethod == 'GET') {
            $url .= '?' . http_build_query($paramArray);
        }

        return $url;
    }

	/**
     * makeSignPlainText
     * 生成拼接签名源文字符串
     * @param  array $requestParams  请求参数
     * @param  string $requestMethod 请求方法
     * @param  string $requestHost   接口域名
     * @param  string $requestPath   url路径
     * @return
     */
    public function makeSignPlainText($requestParams, $requestMethod = 'GET', $requestHost, $requestPath = '/v2/index.php'){

        $url = $requestHost . $requestPath;

        // 取出所有的参数
        $paramStr = $this->_buildParamStr($requestParams, $requestMethod);

        $plainText = $requestMethod . $url . $paramStr;

        return $plainText;
    }

	/**
     * _buildParamStr
     * 拼接参数
     * @param  array $requestParams  请求参数
     * @param  string $requestMethod 请求方法
     * @return
     */
    protected function _buildParamStr($requestParams, $requestMethod = 'GET'){
        $paramStr = '';
        ksort($requestParams);
        $i = 0;
        foreach ($requestParams as $key => $value){
            if ($key == 'Signature')
            {
                continue;
            }
            // 排除上传文件的参数
            if ($requestMethod == 'POST' && substr($value, 0, 1) == '@') {
                continue;
            }
            // 把 参数中的 _ 替换成 .
            if (strpos($key, '_'))
            {
                $key = str_replace('_', '.', $key);
            }

            if ($i == 0)
            {
                $paramStr .= '?';
            }
            else
            {
                $paramStr .= '&';
            }
            $paramStr .= $key . '=' . $value;
            ++$i;
        }

        return $paramStr;
    }

	/**
     * sign
     * 生成签名
     * @param  string $srcStr    拼接签名源文字符串
     * @param  string $secretKey secretKey
     * @param  string $method    请求方法
     * @return
     */
    public function sign($srcStr, $secretKey, $method = 'HmacSHA1'){
        switch ($method) {
        case 'HmacSHA1':
            $retStr = base64_encode(hash_hmac('sha1', $srcStr, $secretKey, true));
            break;
        case 'HmacSHA256':
            $retStr = base64_encode(hash_hmac('sha256', $srcStr, $secretKey, true));
            break;
        default:
            throw new Exception($method . ' is not a supported encrypt method');
            return false;
            break;
        }

        return $retStr;
    }

	/* https请求（支持GET和POST） */
    private function http_request($url, $messageDatas = null) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($messageDatas)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $messageDatas);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }



}


