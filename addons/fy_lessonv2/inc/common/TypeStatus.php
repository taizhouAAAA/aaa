<?php
/**
 * 常见状态类型
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！不允许对程序代码以任何形式任何目的的再发布，作者将保留
 * 追究法律责任的权力和最终解释权。
 */

class TypeStatus{
	/**
	 * 课程章节管理存储方式
	 */
	public function sectionSaveType(){
		return array(
			'0'  => '其他存储',
			'1'  => '七牛云存储',
			'2'  => '内嵌代码方式',
			'3'  => '腾讯云存储',
			'4'  => '阿里云点播',
			'5'  => '腾讯云点播',
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
		);
	}


	/**
	 * 视频播放器
	 */
	public function videoPlayerType(){
		return array(
			'0' => '系统播放器',
			'1' => 'ckPlayer',
		);
	}

	/**
	 * 广告位管理
	 */
	public function bannerType(){
		return array(
			'0' => '首页轮播图',
			'1' => '课程底部广告',
			'2' => '首页限时折扣',
			'3' => '首页开屏广告',
		);
	}

	/**
	 * 推荐板块样式
	 */
	public function recommendType(){
		return array(
			'1' => '单图文课程样式',
			'2' => '专题+图文课程样式',
			'3' => '单专题样式',
			'4' => '单标题文字样式',
		);
	}

	/* 获取优惠券途径 */
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

	/**
	 * 讲师状态
	 */
	public function teacherStatus(){
		return array(
			'-1' => '审核未通过',
			'1'  => '正常',
			'2'  => '审核中',
		);
	}

	/**
	 * 订单状态
	 */
	public function orderStatus(){
		return array(
			'-2' => '已退款',
			'-1' => '已取消',
			'0'  => '待付款',
			'1'  => '已支付',
			'2'  => '已评价',
		);
	}

	/**
	 * 支付状态
	 */
	public function orderPayType(){
		return array(
			'credit'   => '余额支付',
			'wechat'   => '微信支付',
			'alipay'   => '支付宝',
			'offline'  => '线下支付',
			'admin'	   => '后台支付',
			'wxapp'    => '微信小程序',
		);
	}

	/**
	 * 会员状态
	 */
	public function userStatus(){
		return array(
			'0'  => '正常',
			'1'  => '禁止下单',
			'2'  => '禁止访问',
		);
	}
	
	/**
	 * 分销商状态
	 */
	public function agentStatus(){
		return array(
			'1'  => '正常',
			'0'  => '冻结',
		);
	}

	/**
	 * 提现状态
	 */
	public function cashStatus(){
		return array(
			'0'   => '待审核',
			'1'   => '提现成功',
			'-2'  => '驳回申请',
			'-1'  => '作废无效佣金',
		);
	}
	
	/**
	 * 底部导航列表
	 */
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

	/**
	 * 手机端模版
	 */
	public function templateList(){
		return array(
			'默认模版'   => 'default',
			'自定义1'   => 'style1',
			'自定义2'   => 'style2',
			'自定义3'   => 'style3',
		);
	}

}


