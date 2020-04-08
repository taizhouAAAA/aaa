<?php
/**
 * 阿里云点播方法
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

require_once dirname(__FILE__).'/../../library/aliyunVod/aliyun-php-sdk-core/Config.php';
use vod\Request\V20170321 as vod;

class AliyunVod{
	public $regionId;
	public $accessKeyId;
	public $accessKeySecret;

	function __construct($regionId='cn-shanghai', $accessKeyId, $accessKeySecret) {
		$this->regionId = $regionId;
		$this->accessKeyId = $accessKeyId;
		$this->accessKeySecret = $accessKeySecret;
	}

	public function init_vod_client(){
		$profile = DefaultProfile::getProfile($this->regionId, $this->accessKeyId, $this->accessKeySecret);
		$client = new DefaultAcsClient($profile);

		return $client;
	}

	/**
	 * 获取上传地址
	 * $title     文件标题
	 * $filename  完整文件名(包含后缀名)
	 */
	public function create_upload_video($title, $filename, $template_groupid=''){
		$client = $this->init_vod_client();

		$request = new vod\CreateUploadVideoRequest();
		$request->setTitle($title);
		$request->setFileName($filename);

		$suffix = strtolower(substr(strrchr($filename, '.'), 1));
		if($suffix=='mp3' && $template_groupid){
			$request->setTemplateGroupId($template_groupid);
		}
		$response = $client->getAcsResponse($request);

		return $response;
	}

	/**
	 * 刷新视频上传凭证
	 * $videoid  视频ID
	 */
	public function refresh_upload_video($videoid) {
		$client = $this->init_vod_client();

		$request = new vod\RefreshUploadVideoRequest();
		$request->setVideoId($videoid);
		$response = $client->getAcsResponse($request);

		return $response;
	}

	/**
	 * 获取视频播放凭证
	 */
	public function getVideoPlayAuth($videoid) {
		$client = $this->init_vod_client();

		$request = new vod\GetVideoPlayAuthRequest();
		$request->setAcceptFormat('JSON');
		$request->setRegionId($this->regionId);
		$request->setVideoId($videoid);
		$request->setAuthInfoTimeout(7200);
		$response = $client->getAcsResponse($request);
		return $response;
	}

	/**
	 * 删除视频
	 */
	public function delete_videos($videoIds) {
		$client = $this->init_vod_client();

		$request = new vod\DeleteVideoRequest();
		$request->setVideoIds($videoIds);   // 支持批量删除视频；videoIds为传入的视频ID列表，多个用逗号分隔
		$request->setAcceptFormat('JSON');
		
		return $client->getAcsResponse($request);
	}

	/**
	 * 获取视频信息
	 */
	public function get_video_info($videoId) {
		$client = $this->init_vod_client();

		$request = new vod\GetVideoInfoRequest();
		$request->setVideoId($videoId);
		$request->setAcceptFormat('JSON');
		return $client->getAcsResponse($request);
	}

	/**
	 * 获取源文件地址
	 */
	 public function get_mezzanine_info($videoId){
		$client = $this->init_vod_client();

		$request = new vod\GetMezzanineInfoRequest();
		$request->setVideoId($videoId);
		$request->setAuthTimeout(7200);
		$request->setAcceptFormat('JSON');
		return $client->getAcsResponse($request);
	 }

}


