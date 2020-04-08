<?php
/**
 * 常见状态类型
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
 */

class TypeStatus{
	
	//课程章节管理存储方式
	public function sectionSaveType(){
		return array(
			'0'  => '其他存储',
			'1'  => '七牛云存储',
			'2'  => '内嵌代码方式',
			'3'  => '腾讯云存储',
			'4'  => '阿里云点播',
			'5'  => '腾讯云点播',
			'6'  => '阿里云OSS',
		);
	}

	/** 基本设置
	 *  视频存储方式
	 */
	public function videoSaveType(){
		return array(
			'0' => '其他存储方式',
			'1' => '七牛云对象存储',
			'2' => '腾讯云对象存储',
			'3' => '阿里云点播',
			'4' => '腾讯云点播',
			'5' => '阿里云OSS',
		);
	}

	//广告位管理
	public function bannerType(){
		return array(
			'0' => '0、首页轮播图广告',
			'1' => '1、课程底部广告',
			'2' => '2、首页限时折扣广告',
			'3' => '3、首页开屏广告',
			'4' => '4、首页公告广告',
			'5' => '5、优惠券顶部广告',
			'6' => '6、我的课程图片',
			'7' => '7、个人中心图片',
			'8' => '8、VIP服务图片',
			'9' => '9、讲师服务图片',
			'10'=> '10、讲师主页图片',
			'11'=> '11、音频播放背景图',
			'12'=> '12、公告页右侧广告',
		);
	}

	//推荐板块样式
	public function recommendType(){
		return array(
			'1' => '单图文课程样式',
			'2' => '专题+图文课程样式',
			'3' => '单专题样式',
			'4' => '单标题文字样式',
			'5' => '最新课程样式',
		);
	}

	//获取优惠券途径
	public function couponSource(){
		return array(
			'1' => '优惠码转换',
			'2' => '购买课程赠送',
			'3' => '邀请下级成员赠送',
			'4' => '分享课程赠送',
			'5' => '积分兑换',
			'6' => '新会员注册',
			'7' => '后台发放',
			'8' => '链接领取',
		);
	}

	//课程状态
	public function lessonStatus(){
		return array(
			'1'  => '上架',
			'2'  => '审核中',
			'3'  => '隐藏',
			'0'  => '下架',
			'-1' => '暂停销售',
		);
	}

	//讲师状态
	public function teacherStatus(){
		return array(
			'-1' => '审核未通过',
			'1'  => '正常',
			'2'  => '审核中',
		);
	}

	//订单状态
	public function orderStatus(){
		return array(
			'-2' => '已退款',
			'-1' => '已取消',
			'0'  => '待付款',
			'1'  => '已付款',
			'2'  => '已评价',
		);
	}

	//支付状态
	public function orderPayType(){
		return array(
			'credit'   => '余额支付',
			'wechat'   => '微信支付',
			'alipay'   => '支付宝',
			'offline'  => '线下支付',
			'admin'	   => '后台支付',
			'vipcard'  => '服务卡支付',
			'wxapp'    => '微信小程序',
			'recgive'  => '推广赠送',
		);
	}

	//会员状态
	public function userStatus(){
		return array(
			'0'  => '正常',
			'1'  => '禁止下单',
			'2'  => '禁止访问',
		);
	}
	
	//分销商状态
	public function agentStatus(){
		return array(
			'1'  => '正常',
			'0'  => '冻结',
		);
	}

	//提现状态
	public function cashStatus(){
		return array(
			'0'   => '待审核',
			'1'   => '提现成功',
			'-2'  => '驳回申请',
			'-1'  => '无效作废佣金',
		);
	}

	//提现方式
	public function cashWayList(){
		return array(
			'1'  => '帐户余额',
			'2'  => '微信钱包',
			'3'  => '支付宝',
		);
	}
	
	//【手机端】底部导航列表
	public function navigationType(){
		return array(
			'index' => array(
				'name'  => '首页',
			),
			'search' => array(
				'name'  => '全部课程',
			),
			'diynav' => array(
				'name'  => '自定义导航',
			),
			'mylesson' => array(
				'name'  => '我的课程',
			),
			'self' => array(
				'name'  => '个人中心',
			),
		);
	}

	//手机端模版
	public function templateList(){
		return array(
			'默认模版'   => 'default',
			'自定义1'   => 'style1',
			'自定义2'   => 'style2',
			'自定义3'   => 'style3',
		);
	}

	//课程海报邀请活动状态
	public function activityStatus(){
		return array(
			'0'   => '进行中',
			'1'   => '已完成',
			'-1'  => '已失败',
		);
	}

	//会员完善信息字段
	public function memberFields(){
		return array(
			'1'  => 'realname', //姓名【改】
			'5'  => 'mobile', //手机号码
			'31' => 'msn', //微信号【改】
			'12' => 'idcard', //身份证号【改】
			'22' => 'occupation', //职业
			'20' => 'company', //公司
			'19' => 'graduateschool', //学校【改】
			'14' => 'grade', //班级
			'15' => 'address', //地址【改】
			'21' => 'education', //学历
			'23' => 'position', //职位
		);
	}

	//导航栏位置
	public function navigationLocation(){
		return array(
			'1'  => '底部导航栏',
			'2'	 => '主菜单导航栏',
			'3'	 => '个人中心导航栏',
			'4'	 => '顶部跳转栏',
		);
	}

	//课程类型
	public function lessonTypeList(){
		return array(
			'0'	 => '普通课程',
			'1'  => '报名课程',
			'2'	 => '小程序课程',
			'3'	 => '直播课程',
		);
	}

	//直播平台类型
	public function videoLiveType(){
		return array(
			'0' => '其他直播',
			'1' => '腾讯云直播',
			'2' => '阿里云直播',
			'3' => 'YY直播',
		);
	}


}


