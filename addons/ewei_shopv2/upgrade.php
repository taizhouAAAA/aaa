<?php
$sql00="
DROP TABLE IF EXISTS `ims_ewei_shop_express`;
CREATE TABLE `ims_ewei_shop_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `express` varchar(50) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

INSERT INTO `ims_ewei_shop_express` VALUES ('1', '顺丰', 'shunfeng', '1', '0', 'JH_014');
INSERT INTO `ims_ewei_shop_express` VALUES ('2', '申通', 'shentong', '1', '0', 'JH_005');
INSERT INTO `ims_ewei_shop_express` VALUES ('3', '韵达快运', 'yunda', '1', '0', 'JH_003');
INSERT INTO `ims_ewei_shop_express` VALUES ('4', '天天快递', 'tiantian', '1', '0', 'JH_004');
INSERT INTO `ims_ewei_shop_express` VALUES ('5', '圆通速递', 'yuantong', '1', '0', 'JH_002');
INSERT INTO `ims_ewei_shop_express` VALUES ('6', '中通速递', 'zhongtong', '1', '0', 'JH_006');
INSERT INTO `ims_ewei_shop_express` VALUES ('7', 'ems快递', 'ems', '1', '0', 'JH_001');
INSERT INTO `ims_ewei_shop_express` VALUES ('8', '百世汇通', 'huitongkuaidi', '1', '0', 'JH_012');
INSERT INTO `ims_ewei_shop_express` VALUES ('9', '全峰快递', 'quanfengkuaidi', '1', '0', 'JH_009');
INSERT INTO `ims_ewei_shop_express` VALUES ('10', '宅急送', 'zhaijisong', '1', '0', 'JH_007');
INSERT INTO `ims_ewei_shop_express` VALUES ('11', 'aae全球专递', 'aae', '1', '0', 'JHI_049');
INSERT INTO `ims_ewei_shop_express` VALUES ('12', '安捷快递', 'anjie', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('13', '安信达快递', 'anxindakuaixi', '1', '0', 'JH_131');
INSERT INTO `ims_ewei_shop_express` VALUES ('14', '彪记快递', 'biaojikuaidi', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('15', 'bht', 'bht', '1', '0', 'JHI_008');
INSERT INTO `ims_ewei_shop_express` VALUES ('16', '百福东方国际物流', 'baifudongfang', '1', '0', 'JH_062');
INSERT INTO `ims_ewei_shop_express` VALUES ('17', '中国东方（COE）', 'coe', '1', '0', 'JHI_038');
INSERT INTO `ims_ewei_shop_express` VALUES ('18', '长宇物流', 'changyuwuliu', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('19', '大田物流', 'datianwuliu', '1', '0', 'JH_050');
INSERT INTO `ims_ewei_shop_express` VALUES ('20', '德邦物流', 'debangwuliu', '1', '0', 'JH_011');
INSERT INTO `ims_ewei_shop_express` VALUES ('21', 'dhl', 'dhl', '1', '0', 'JHI_002');
INSERT INTO `ims_ewei_shop_express` VALUES ('22', 'dpex', 'dpex', '1', '0', 'JHI_011');
INSERT INTO `ims_ewei_shop_express` VALUES ('23', 'd速快递', 'dsukuaidi', '1', '0', 'JH_049');
INSERT INTO `ims_ewei_shop_express` VALUES ('24', '递四方', 'disifang', '1', '0', 'JHI_080');
INSERT INTO `ims_ewei_shop_express` VALUES ('25', 'fedex（国外）', 'fedex', '1', '0', 'JHI_014');
INSERT INTO `ims_ewei_shop_express` VALUES ('26', '飞康达物流', 'feikangda', '1', '0', 'JH_088');
INSERT INTO `ims_ewei_shop_express` VALUES ('27', '凤凰快递', 'fenghuangkuaidi', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('28', '飞快达', 'feikuaida', '1', '0', 'JH_151');
INSERT INTO `ims_ewei_shop_express` VALUES ('29', '国通快递', 'guotongkuaidi', '1', '0', 'JH_010');
INSERT INTO `ims_ewei_shop_express` VALUES ('30', '港中能达物流', 'ganzhongnengda', '1', '0', 'JH_033');
INSERT INTO `ims_ewei_shop_express` VALUES ('31', '广东邮政物流', 'guangdongyouzhengwuliu', '1', '0', 'JH_135');
INSERT INTO `ims_ewei_shop_express` VALUES ('32', '共速达', 'gongsuda', '1', '0', 'JH_039');
INSERT INTO `ims_ewei_shop_express` VALUES ('33', '恒路物流', 'hengluwuliu', '1', '0', 'JH_048');
INSERT INTO `ims_ewei_shop_express` VALUES ('34', '华夏龙物流', 'huaxialongwuliu', '1', '0', 'JH_129');
INSERT INTO `ims_ewei_shop_express` VALUES ('35', '海红', 'haihongwangsong', '1', '0', 'JH_132');
INSERT INTO `ims_ewei_shop_express` VALUES ('36', '海外环球', 'haiwaihuanqiu', '1', '0', 'JHI_013');
INSERT INTO `ims_ewei_shop_express` VALUES ('37', '佳怡物流', 'jiayiwuliu', '1', '0', 'JH_035');
INSERT INTO `ims_ewei_shop_express` VALUES ('38', '京广速递', 'jinguangsudikuaijian', '1', '0', 'JH_041');
INSERT INTO `ims_ewei_shop_express` VALUES ('39', '急先达', 'jixianda', '1', '0', 'JH_040');
INSERT INTO `ims_ewei_shop_express` VALUES ('40', '佳吉物流', 'jiajiwuliu', '1', '0', 'JH_030');
INSERT INTO `ims_ewei_shop_express` VALUES ('41', '加运美物流', 'jymwl', '1', '0', 'JH_054');
INSERT INTO `ims_ewei_shop_express` VALUES ('42', '金大物流', 'jindawuliu', '1', '0', 'JH_079');
INSERT INTO `ims_ewei_shop_express` VALUES ('43', '嘉里大通', 'jialidatong', '1', '0', 'JH_060');
INSERT INTO `ims_ewei_shop_express` VALUES ('44', '晋越快递', 'jykd', '1', '0', 'JHI_046');
INSERT INTO `ims_ewei_shop_express` VALUES ('45', '快捷速递', 'kuaijiesudi', '1', '0', 'JH_008');
INSERT INTO `ims_ewei_shop_express` VALUES ('46', '联邦快递（国内）', 'lianb', '1', '0', 'JH_122');
INSERT INTO `ims_ewei_shop_express` VALUES ('47', '联昊通物流', 'lianhaowuliu', '1', '0', 'JH_021');
INSERT INTO `ims_ewei_shop_express` VALUES ('48', '龙邦物流', 'longbanwuliu', '1', '0', 'JH_019');
INSERT INTO `ims_ewei_shop_express` VALUES ('49', '立即送', 'lijisong', '1', '0', 'JH_044');
INSERT INTO `ims_ewei_shop_express` VALUES ('50', '乐捷递', 'lejiedi', '1', '0', 'JH_043');
INSERT INTO `ims_ewei_shop_express` VALUES ('51', '民航快递', 'minghangkuaidi', '1', '0', 'JH_100');
INSERT INTO `ims_ewei_shop_express` VALUES ('52', '美国快递', 'meiguokuaidi', '1', '0', 'JHI_044');
INSERT INTO `ims_ewei_shop_express` VALUES ('53', '门对门', 'menduimen', '1', '0', 'JH_036');
INSERT INTO `ims_ewei_shop_express` VALUES ('54', 'OCS', 'ocs', '1', '0', 'JHI_012');
INSERT INTO `ims_ewei_shop_express` VALUES ('55', '配思货运', 'peisihuoyunkuaidi', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('56', '全晨快递', 'quanchenkuaidi', '1', '0', 'JH_055');
INSERT INTO `ims_ewei_shop_express` VALUES ('57', '全际通物流', 'quanjitong', '1', '0', 'JH_127');
INSERT INTO `ims_ewei_shop_express` VALUES ('58', '全日通快递', 'quanritongkuaidi', '1', '0', 'JH_029');
INSERT INTO `ims_ewei_shop_express` VALUES ('59', '全一快递', 'quanyikuaidi', '1', '0', 'JH_020');
INSERT INTO `ims_ewei_shop_express` VALUES ('60', '如风达', 'rufengda', '1', '0', 'JH_017');
INSERT INTO `ims_ewei_shop_express` VALUES ('61', '三态速递', 'santaisudi', '1', '0', 'JH_065');
INSERT INTO `ims_ewei_shop_express` VALUES ('62', '盛辉物流', 'shenghuiwuliu', '1', '0', 'JH_066');
INSERT INTO `ims_ewei_shop_express` VALUES ('63', '速尔物流', 'sue', '1', '0', 'JH_016');
INSERT INTO `ims_ewei_shop_express` VALUES ('64', '盛丰物流', 'shengfeng', '1', '0', 'JH_082');
INSERT INTO `ims_ewei_shop_express` VALUES ('65', '赛澳递', 'saiaodi', '1', '0', 'JH_042');
INSERT INTO `ims_ewei_shop_express` VALUES ('66', '天地华宇', 'tiandihuayu', '1', '0', 'JH_018');
INSERT INTO `ims_ewei_shop_express` VALUES ('67', 'tnt', 'tnt', '1', '0', 'JHI_003');
INSERT INTO `ims_ewei_shop_express` VALUES ('68', 'ups', 'ups', '1', '0', 'JHI_004');
INSERT INTO `ims_ewei_shop_express` VALUES ('69', '万家物流', 'wanjiawuliu', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('70', '文捷航空速递', 'wenjiesudi', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('71', '伍圆', 'wuyuan', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('72', '万象物流', 'wxwl', '1', '0', 'JH_115');
INSERT INTO `ims_ewei_shop_express` VALUES ('73', '新邦物流', 'xinbangwuliu', '1', '0', 'JH_022');
INSERT INTO `ims_ewei_shop_express` VALUES ('74', '信丰物流', 'xinfengwuliu', '1', '0', 'JH_023');
INSERT INTO `ims_ewei_shop_express` VALUES ('75', '亚风速递', 'yafengsudi', '1', '0', 'JH_075');
INSERT INTO `ims_ewei_shop_express` VALUES ('76', '一邦速递', 'yibangwuliu', '1', '0', 'JH_064');
INSERT INTO `ims_ewei_shop_express` VALUES ('77', '优速物流', 'youshuwuliu', '1', '0', 'JH_013');
INSERT INTO `ims_ewei_shop_express` VALUES ('78', '邮政快递包裹', 'youzhengguonei', '1', '0', 'JH_077');
INSERT INTO `ims_ewei_shop_express` VALUES ('79', '邮政国际包裹挂号信', 'youzhengguoji', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('80', '远成物流', 'yuanchengwuliu', '1', '0', 'JH_024');
INSERT INTO `ims_ewei_shop_express` VALUES ('81', '源伟丰快递', 'yuanweifeng', '1', '0', 'JH_141');
INSERT INTO `ims_ewei_shop_express` VALUES ('82', '元智捷诚快递', 'yuanzhijiecheng', '1', '0', 'JH_126');
INSERT INTO `ims_ewei_shop_express` VALUES ('83', '运通快递', 'yuntongkuaidi', '1', '0', 'JH_145');
INSERT INTO `ims_ewei_shop_express` VALUES ('84', '越丰物流', 'yuefengwuliu', '1', '0', 'JH_068');
INSERT INTO `ims_ewei_shop_express` VALUES ('85', '源安达', 'yad', '1', '0', 'JH_067');
INSERT INTO `ims_ewei_shop_express` VALUES ('86', '银捷速递', 'yinjiesudi', '1', '0', 'JH_148');
INSERT INTO `ims_ewei_shop_express` VALUES ('87', '中铁快运', 'zhongtiekuaiyun', '1', '0', 'JH_015');
INSERT INTO `ims_ewei_shop_express` VALUES ('88', '中邮物流', 'zhongyouwuliu', '1', '0', 'JH_027');
INSERT INTO `ims_ewei_shop_express` VALUES ('89', '忠信达', 'zhongxinda', '1', '0', 'JH_086');
INSERT INTO `ims_ewei_shop_express` VALUES ('90', '芝麻开门', 'zhimakaimen', '1', '0', 'JH_026');
INSERT INTO `ims_ewei_shop_express` VALUES ('91', '安能物流', 'annengwuliu', '1', '0', 'JH_059');
INSERT INTO `ims_ewei_shop_express` VALUES ('92', '京东快递', 'jd', '1', '0', 'JH_046');
INSERT INTO `ims_ewei_shop_express` VALUES ('93', '微特派', 'weitepai', '1', '0', '');
INSERT INTO `ims_ewei_shop_express` VALUES ('94', '九曳供应链', 'jiuyescm', '1', '0', '');

DROP TABLE IF EXISTS `ims_ewei_shop_member_message_template_type`;
CREATE TABLE `ims_ewei_shop_member_message_template_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `typecode` varchar(255) DEFAULT NULL,
  `templatecode` varchar(255) DEFAULT NULL,
  `templateid` varchar(255) DEFAULT NULL,
  `templatename` varchar(255) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `showtotaladd` tinyint(1) DEFAULT '0',
  `typegroup` varchar(255) DEFAULT '',
  `groupname` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('1', '订单付款通知', 'saler_pay', 'OPENTM405584202', 'gV0iXUVPCt_NC4gEZ5VXTTeRfpY7OB1H9kiS2QPTJa4', '订单付款通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('2', '自提订单提交成功通知', 'carrier', 'OPENTM201594720', '_xnknLOzMfFVtL9fTTe2UcCD5F1HMy9e-eo_8KBj0Vk', '订单付款通知', '{{first.DATA}}自提码：{{keyword1.DATA}}商品详情：{{keyword2.DATA}}提货地址：{{keyword3.DATA}}提货时间：{{keyword4.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('3', '订单取消通知', 'cancel', 'OPENTM201764653', 'H9mHUsTajBdPCAVE3CEZ0HycPr659rTTJML_LVN0P60', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('4', '订单即将取消通知', 'willcancel', 'OPENTM201764653', 'H9mHUsTajBdPCAVE3CEZ0HycPr659rTTJML_LVN0P60', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('5', '订单支付成功通知', 'pay', 'OPENTM405584202', 'gV0iXUVPCt_NC4gEZ5VXTTeRfpY7OB1H9kiS2QPTJa4', '订单支付通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('6', '订单发货通知', 'send', 'OPENTM401874827', 'aG13iFLlF3wh-T2IDFO1Rpkx0AgqfmlFK0FQVdejh1g', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('7', '自动发货通知(虚拟物品及卡密)', 'virtualsend', 'OPENTM207793687', 'VeRZUdi3plcZrBvnXlheBWifsClCNcE-1h42SU4BlG8', '自动发货通知', '{{first.DATA}}商品名称：{{keyword1.DATA}}订单号：{{keyword2.DATA}}订单金额：{{keyword3.DATA}}卡密信息：{{keyword4.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('8', '订单状态更新(修改收货地址)(修改价格)', 'orderstatus', 'TM00017', '0PJz5opDoC-LRw8rpAmtgJ1YLcCm12eOuDG5WQpwP2k', '订单付款通知', '{{first.DATA}}订单编号:{{OrderSn.DATA}}订单状态:{{OrderStatus.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('9', '退款成功通知', 'refund1', 'TM00430', '7EE2f6zZgmyYKBZv_hZ2AZLtB5U78OA6vJrh_vQidI0', '退款成功通知', '{{first.DATA}}退款金额：{{orderProductPrice.DATA}}商品详情：{{orderProductName.DATA}}订单编号：{{orderName.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('10', '换货成功通知', 'refund3', 'OPENTM200605630', 'xZmqMzjHINgZiVcqiqpJpfAM8HB93Ht1IxLFvo0-yaU', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('11', '退款申请驳回通知', 'refund2', 'OPENTM200605630', 'xZmqMzjHINgZiVcqiqpJpfAM8HB93Ht1IxLFvo0-yaU', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('12', '充值成功通知', 'recharge_ok', 'OPENTM207727673', 'vlj4bwrW18_q-8erwCHnkKHNL3wLgHYLAUIeiOjxgaE', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('13', '提现成功通知', 'withdraw_ok', 'OPENTM207422808', '3QbmrxEfAY_ojAg8n-IwmByrYM5prGEXvPmqXczAeoA', '提现通知', '{{first.DATA}}申请提现金额：{{keyword1.DATA}}取提现手续费：{{keyword2.DATA}}实际到账金额：{{keyword3.DATA}}提现渠道：{{keyword4.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('14', '会员升级通知(任务处理通知)', 'upgrade', 'OPENTM200605630', 'xZmqMzjHINgZiVcqiqpJpfAM8HB93Ht1IxLFvo0-yaU', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('15', '充值成功通知（后台管理员手动）', 'backrecharge_ok', 'OPENTM207727673', 'vlj4bwrW18_q-8erwCHnkKHNL3wLgHYLAUIeiOjxgaE', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('16', '积分变动提醒', 'backpoint_ok', 'OPENTM207509450', 'JhXETvtL2Mlq_-hiIfG8aJy8b17po9-2DD_eHa_f0MY', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('17', '换货发货通知', 'refund4', 'OPENTM401874827', 'aG13iFLlF3wh-T2IDFO1Rpkx0AgqfmlFK0FQVdejh1g', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('18', '砍价活动通知', 'bargain_message', 'OPENTM200605630', null, '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'bargain', '砍价消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('19', '拼团活动通知', 'groups', null, null, null, null, '0', 'groups', '拼团消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('20', '人人分销通知', 'commission', null, null, null, null, '0', 'commission', '分销消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('21', '商品付款通知', 'saler_goodpay', 'OPENTM200605630', 'xZmqMzjHINgZiVcqiqpJpfAM8HB93Ht1IxLFvo0-yaU', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('22', '砍到底价通知', 'bargain_fprice', 'OPENTM200605630', '', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'bargain', '砍价消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('23', '订单收货通知(卖家)', 'saler_finish', 'OPENTM200605630', 'xZmqMzjHINgZiVcqiqpJpfAM8HB93Ht1IxLFvo0-yaU', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('24', '余额兑换成功通知', 'exchange_balance', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', 'exchange', '兑换中心消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('25', '积分兑换成功通知', 'exchange_score', 'OPENTM207509450', '', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', '0', 'exchange', '兑换中心消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('26', '兑换中心余额充值通知', 'exchange_recharge', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', 'exchange', '兑换中心消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('27', '游戏中心通知', 'lottery_get', 'OPENTM200605630', '', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'lottery', '抽奖消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('35', '库存预警通知', 'saler_stockwarn', 'OPENTM200605630', '', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('36', '卖家核销商品核销通知', 'o2o_sverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', '0', 'o2o', 'O2O消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('37', '核销商品核销通知', 'o2o_bverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', '0', 'o2o', 'O2O消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('38', '卖家商品预约通知', 'o2o_snorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', '0', 'o2o', 'O2O消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('39', '商品预约成功通知', 'o2o_bnorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', '0', 'o2o', 'O2O消息通知');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('42', '商品下单通知', 'saler_goodsubmit', 'OPENTM200605630', '', '任务处理通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}通知类型：{{keyword2.DATA}}{{remark.DATA}}', '0', 'sys', '系统消息通知');

DROP TABLE IF EXISTS `ims_ewei_shop_plugin`;
CREATE TABLE `ims_ewei_shop_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayorder` int(11) DEFAULT '0',
  `identity` varchar(50) DEFAULT '',
  `category` varchar(255) DEFAULT '',
  `name` varchar(50) DEFAULT '',
  `version` varchar(10) DEFAULT '',
  `author` varchar(20) DEFAULT '',
  `status` int(11) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `desc` text,
  `iscom` tinyint(3) DEFAULT '0',
  `deprecated` tinyint(3) DEFAULT '0',
  `isv2` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_identity` (`identity`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `ims_ewei_shop_plugin` VALUES ('1', '1', 'qiniu', 'tool', '七牛存储', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/qiniu.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('2', '2', 'taobao', 'tool', '商品小助手', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/taobao.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('3', '3', 'commission', 'biz', '分销中心', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/commission.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('4', '4', 'poster', 'sale', '超级海报', '1.2', '官方', '1', '../addons/ewei_shopv2/static/images/poster.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('5', '5', 'verify', 'biz', 'O2O核销', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/verify.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('6', '6', 'tmessage', 'tool', '会员群发', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/tmessage.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('7', '7', 'perm', 'help', '分权系统', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/perm.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('8', '8', 'sale', 'sale', '营销宝', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/sale.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('9', '9', 'designer', 'help', '店铺装修V1', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/designer.jpg', null, '0', '1', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('10', '10', 'creditshop', 'biz', '积分商城', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/creditshop.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('11', '11', 'virtual', 'biz', '虚拟物品', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/virtual.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('12', '11', 'article', 'help', '文章营销', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/article.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('13', '13', 'coupon', 'sale', '超级券', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/coupon.jpg', null, '1', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('14', '14', 'postera', 'sale', '活动海报', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/postera.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('15', '16', 'system', 'help', '系统工具', '1.0', '官方', '0', '../addons/ewei_shopv2/static/images/system.jpg', null, '0', '1', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('17', '16', 'diyform', 'help', '自定表单', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/diyform.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('16', '15', 'exhelper', 'help', '快递助手', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/exhelper.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('18', '19', 'groups', 'biz', '人人拼团', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/groups.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('19', '20', 'diypage', 'help', '店铺装修', '2.0', '官方', '1', '../addons/ewei_shopv2/static/images/designer.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('20', '23', 'globonus', 'biz', '全民股东', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/globonus.jpg', '', '0', '0', '0');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('21', '22', 'merch', 'biz', '多商户', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/merch.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('22', '26', 'qa', 'help', '帮助中心', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/qa.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('24', '27', 'sms', 'tool', '短信提醒', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/sms.jpg', '', '1', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('25', '29', 'sign', 'tool', '积分签到', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/sign.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('26', '30', 'sns', 'sale', '全民社区', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/sns.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('27', '33', 'wap', 'tool', '全网通', '1.0', '官方', '1', '', '', '1', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('28', '34', 'h5app', 'tool', 'H5APP', '1.0', '官方', '1', '', '', '1', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('29', '26', 'abonus', 'biz', '区域代理', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/abonus.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('30', '33', 'printer', 'tool', '小票打印机', '1.0', '官方', '1', '', '', '1', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('31', '34', 'bargain', 'biz', '砍价活动', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/bargain.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('32', '35', 'task', 'sale', '任务中心', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/task.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('33', '36', 'cashier', 'biz', '收银台', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/cashier.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('34', '37', 'messages', 'tool', '消息群发', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/messages.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('35', '38', 'seckill', 'sale', '整点秒杀', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/seckill.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('36', '39', 'exchange', 'biz', '兑换中心', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/exchange.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('37', '65', 'wxcard', 'sale', '微信卡券', '1.0', '官方', '1', '', null, '1', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('38', '42', 'quick', 'biz', '快速购买', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/quick.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('39', '43', 'mmanage', 'tool', '手机端商家管理中心', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/mmanage.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('40', '44', 'polyapi', 'tool', '进销存-网店管家', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/polyapi.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('41', '45', 'lottery', 'sale', '游戏营销', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/lottery.jpg', '抽奖游戏：大转盘、九宫格、刮刮卡 ', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('42', '48', 'pc', 'tool', 'PC端', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/pc.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('43', '46', 'live', 'sale', '互动直播', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/live.jpg', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('44', '47', 'invitation', 'sale', '邀请卡', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/invitation.png', '', '0', '0', '1');
INSERT INTO `ims_ewei_shop_plugin` VALUES ('45', '49', 'app', 'help', '小程序', '1.0', '官方', '1', '../addons/ewei_shopv2/static/images/app.jpg', '', '0', '0', '1');


";
pdo_run($sql00);

if(!pdo_tableexists('ims_ewei_shop_live_goods')){
$sql1="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_goods` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`uniacid`  int(11) NOT NULL DEFAULT 0 ,
`goodsid`  int(11) NOT NULL DEFAULT 0 ,
`liveid`  int(11) NOT NULL DEFAULT 0 ,
`liveprice`  decimal(10,2) NOT NULL DEFAULT 0.00 ,
`minliveprice`  decimal(10,2) NOT NULL DEFAULT 0.00 ,
`maxliveprice`  decimal(10,2) NOT NULL DEFAULT 0.00 ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql1);
}

if(!pdo_tableexists('ims_ewei_shop_live_goods_option')){
$sql2="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_goods_option` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`uniacid`  int(11) NOT NULL DEFAULT 0 ,
`goodsid`  int(11) NOT NULL ,
`optionid`  int(11) NOT NULL DEFAULT 0 ,
`liveid`  int(11) NOT NULL DEFAULT 0 ,
`liveprice`  decimal(10,2) NOT NULL DEFAULT 0.00 ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql2);
}

if(!pdo_tableexists('ims_ewei_shop_live_status')){
$sql3="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_status` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`uniacid`  int(11) NOT NULL DEFAULT 0 ,
`roomid`  int(11) NOT NULL DEFAULT 0 ,
`starttime`  int(11) NOT NULL DEFAULT 0 ,
`endtime`  int(11) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql3);
}

if(!pdo_tableexists('ims_ewei_shop_sendticket')){
$sql4="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sendticket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cpid` varchar(200) NOT NULL,
  `expiration` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '新人礼包',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql4);
}

if(!pdo_tableexists('ims_ewei_shop_sendticket_draw')){
$sql4="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sendticket_draw` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cpid` varchar(50) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql4);
}

if(!pdo_tableexists('ims_ewei_shop_sendticket_share')){
$sql5="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sendticket_share` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `sharetitle` varchar(255) NOT NULL,
  `shareicon` varchar(255) DEFAULT NULL,
  `sharedesc` varchar(255) DEFAULT NULL,
  `expiration` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `paycpid1` int(11) DEFAULT NULL,
  `paycpid2` int(11) DEFAULT NULL,
  `paycpid3` int(11) DEFAULT NULL,
  `paycpnum1` int(11) DEFAULT NULL,
  `paycpnum2` int(11) DEFAULT NULL,
  `paycpnum3` int(11) DEFAULT NULL,
  `sharecpid1` int(11) DEFAULT NULL,
  `sharecpid2` int(11) DEFAULT NULL,
  `sharecpid3` int(11) DEFAULT NULL,
  `sharecpnum1` int(11) DEFAULT NULL,
  `sharecpnum2` int(11) DEFAULT NULL,
  `sharecpnum3` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `enough` decimal(10,2) DEFAULT NULL,
  `issync` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql5);
}

if(!pdo_tableexists('ims_ewei_shop_newstore_category')){
$sql6="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_newstore_category` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`uniacid`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql6);
}

if(!pdo_tableexists('ims_ewei_shop_live')){
$sql7="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `livetype` tinyint(3) NOT NULL DEFAULT '0',
  `liveidentity` varchar(50) NOT NULL,
  `screen` tinyint(3) NOT NULL DEFAULT '0',
  `goodsid` varchar(255) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `url` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `hot` tinyint(3) NOT NULL DEFAULT '0',
  `recommend` tinyint(3) NOT NULL DEFAULT '0',
  `living` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `livetime` int(10) NOT NULL DEFAULT '0',
  `lastlivetime` int(11) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `introduce` text NOT NULL,
  `packetmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packettotal` int(11) NOT NULL DEFAULT '0',
  `packetprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packetdes` varchar(255) NOT NULL,
  `couponid` varchar(255) NOT NULL,
  `share_title` varchar(255) NOT NULL,
  `share_icon` varchar(1000) NOT NULL,
  `share_desc` text NOT NULL,
  `share_url` varchar(1000) NOT NULL DEFAULT '',
  `subscribe` int(11) NOT NULL DEFAULT '0',
  `subscribenotice` tinyint(3) NOT NULL DEFAULT '0',
  `visit` int(11) NOT NULL DEFAULT '0',
  `video` varchar(1000) NOT NULL DEFAULT '',
  `covertype` tinyint(3) NOT NULL DEFAULT '0',
  `cover` varchar(1000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`),
  KEY `idx_category` (`category`),
  KEY `idx_hot` (`hot`),
  KEY `idx_recommend` (`recommend`),
  KEY `idx_living` (`living`),
  KEY `idx_status` (`status`),
  KEY `idx_livetime` (`livetime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql7);
}

if(!pdo_tableexists('ims_ewei_shop_live_adv')){
$sql8="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql8);
}

if(!pdo_tableexists('ims_ewei_shop_live_category')){
$sql9="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql9);
}

if(!pdo_tableexists('ims_ewei_shop_live_coupon')){
$sql10="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `roomid` int(11) NOT NULL DEFAULT '0',
  `couponid` int(11) NOT NULL DEFAULT '0',
  `coupontotal` int(11) NOT NULL DEFAULT '0',
  `couponlimit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_roomid` (`roomid`),
  KEY `idx_couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql10);
}

if(!pdo_tableexists('ims_ewei_shop_live_favorite')){
$sql11="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `roomid` int(11) NOT NULL DEFAULT '0',
  `openid` tinytext NOT NULL,
  `deleted` tinyint(3) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_roomid` (`roomid`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql11);
}

if(!pdo_tableexists('ims_ewei_shop_live_setting')){
$sql12="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `ismember` tinyint(3) NOT NULL DEFAULT '0',
  `share_title` varchar(255) NOT NULL,
  `share_icon` varchar(1000) NOT NULL,
  `share_desc` varchar(255) NOT NULL,
  `share_url` varchar(255) NOT NULL,
  `livenoticetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_ismember` (`ismember`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql12);
}

if(!pdo_tableexists('ims_ewei_shop_live_view')){
$sql13="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL,
  `roomid` int(11) NOT NULL DEFAULT '0',
  `viewing` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_roomid` (`roomid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql13);
}

if(!pdo_tableexists('ims_ewei_shop_goods_cards')){
$sql14="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `card_title` varchar(255) DEFAULT NULL,
  `card_brand_name` varchar(255) DEFAULT NULL,
  `card_totalquantity` int(11) DEFAULT NULL,
  `card_quantity` int(11) DEFAULT NULL,
  `card_logoimg` varchar(255) DEFAULT NULL,
  `card_logowxurl` varchar(255) DEFAULT NULL,
  `card_backgroundtype` tinyint(1) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `card_backgroundimg` varchar(255) DEFAULT NULL,
  `card_backgroundwxurl` varchar(255) DEFAULT NULL,
  `prerogative` varchar(255) DEFAULT NULL,
  `card_description` varchar(255) DEFAULT NULL,
  `freewifi` tinyint(1) DEFAULT NULL,
  `withpet` tinyint(1) DEFAULT NULL,
  `freepark` tinyint(1) DEFAULT NULL,
  `deliver` tinyint(1) DEFAULT NULL,
  `custom_cell1` tinyint(1) DEFAULT NULL,
  `custom_cell1_name` varchar(255) DEFAULT NULL,
  `custom_cell1_tips` varchar(255) DEFAULT NULL,
  `custom_cell1_url` varchar(255) DEFAULT NULL,
  `color2` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql14);
}

if(!pdo_tableexists('ims_ewei_shop_verifygoods')){
$sql15="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_verifygoods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `ordergoodsid` int(11) DEFAULT NULL,
  `storeid` int(11) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `limitdays` int(11) DEFAULT NULL,
  `limitnum` int(11) DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  `verifycode` varchar(20) DEFAULT NULL,
  `codeinvalidtime` int(11) DEFAULT NULL,
  `invalid` tinyint(1) DEFAULT '0',
  `getcard` tinyint(1) DEFAULT '0',
  `activecard` tinyint(1) DEFAULT '0',
  `cardcode` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `verifycode` (`verifycode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql15);
}

if(!pdo_tableexists('ims_ewei_shop_verifygoods_log')){
$sql16="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_verifygoods_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `verifygoodsid` int(11) DEFAULT NULL,
  `salerid` int(11) DEFAULT NULL,
  `storeid` int(11) DEFAULT NULL,
  `verifynum` int(11) DEFAULT NULL,
  `verifydate` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql16);
}

if(!pdo_tableexists('ims_ewei_shop_wxapp_tmessage')){
$sql17="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_tmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `templateid` varchar(50) DEFAULT '',
  `datas` text,
  `emphasis_keyword` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql17);
}



if(!pdo_tableexists('ims_ewei_scratch_award')){
$sql18="
CREATE TABLE IF NOT EXISTS `ims_ewei_scratch_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `rid` int(11) DEFAULT '0',
  `fansID` int(11) DEFAULT '0',
  `from_user` varchar(50) DEFAULT '0' COMMENT '用户ID',
  `name` varchar(50) DEFAULT '' COMMENT '名称',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `prizetype` varchar(10) DEFAULT '' COMMENT '类型',
  `award_sn` varchar(50) DEFAULT '' COMMENT 'SN',
  `createtime` int(10) DEFAULT '0',
  `consumetime` int(10) DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rid` (`rid`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql18);
}

if(!pdo_tableexists('ims_ewei_scratch_fans')){
$sql19="
CREATE TABLE IF NOT EXISTS `ims_ewei_scratch_fans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT '0',
  `fansID` int(11) DEFAULT '0',
  `from_user` varchar(50) DEFAULT '' COMMENT '用户ID',
  `tel` varchar(20) DEFAULT '' COMMENT '登记信息(手机等)',
  `todaynum` int(11) DEFAULT '0',
  `totalnum` int(11) DEFAULT '0',
  `awardnum` int(11) DEFAULT '0',
  `last_time` int(10) DEFAULT '0',
  `createtime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql19);
}

if(!pdo_tableexists('ims_ewei_scratch_reply')){
$sql20="
CREATE TABLE IF NOT EXISTS `ims_ewei_scratch_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned DEFAULT '0',
  `weid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `content` varchar(200) DEFAULT '',
  `start_picurl` varchar(200) DEFAULT '',
  `isshow` tinyint(1) DEFAULT '0',
  `ticket_information` varchar(200) DEFAULT '',
  `starttime` int(10) DEFAULT '0',
  `endtime` int(10) DEFAULT '0',
  `repeat_lottery_reply` varchar(50) DEFAULT '',
  `end_theme` varchar(50) DEFAULT '',
  `end_instruction` varchar(200) DEFAULT '',
  `end_picurl` varchar(200) DEFAULT '',
  `c_type_one` varchar(20) DEFAULT '',
  `c_name_one` varchar(50) DEFAULT '',
  `c_num_one` int(11) DEFAULT '0',
  `c_draw_one` int(11) DEFAULT '0',
  `c_rate_one` double DEFAULT '0',
  `c_type_two` varchar(20) DEFAULT '',
  `c_name_two` varchar(50) DEFAULT '',
  `c_num_two` int(11) DEFAULT '0',
  `c_draw_two` int(11) DEFAULT '0',
  `c_rate_two` double DEFAULT '0',
  `c_type_three` varchar(20) DEFAULT '',
  `c_name_three` varchar(50) DEFAULT '',
  `c_num_three` int(11) DEFAULT '0',
  `c_draw_three` int(11) DEFAULT '0',
  `c_rate_three` double DEFAULT '0',
  `c_type_four` varchar(20) DEFAULT '',
  `c_name_four` varchar(50) DEFAULT '',
  `c_num_four` int(11) DEFAULT '0',
  `c_draw_four` int(11) DEFAULT '0',
  `c_rate_four` double DEFAULT '0',
  `c_type_five` varchar(20) DEFAULT '',
  `c_name_five` varchar(50) DEFAULT '',
  `c_num_five` int(11) DEFAULT '0',
  `c_draw_five` int(11) DEFAULT '0',
  `c_rate_five` double DEFAULT '0',
  `c_type_six` varchar(20) DEFAULT '',
  `c_name_six` varchar(50) DEFAULT '',
  `c_num_six` int(11) DEFAULT '0',
  `c_draw_six` int(10) DEFAULT '0',
  `c_rate_six` double DEFAULT '0',
  `total_num` int(11) DEFAULT '0' COMMENT '总获奖人数(自动加)',
  `probability` double DEFAULT '0',
  `award_times` int(11) DEFAULT '0',
  `number_times` int(11) DEFAULT '0',
  `most_num_times` int(11) DEFAULT '0',
  `sn_code` tinyint(4) DEFAULT '0',
  `sn_rename` varchar(20) DEFAULT '',
  `tel_rename` varchar(20) DEFAULT '',
  `copyright` varchar(20) DEFAULT '',
  `show_num` tinyint(2) DEFAULT '0',
  `viewnum` int(11) DEFAULT '0',
  `fansnum` int(11) DEFAULT '0',
  `createtime` int(10) DEFAULT '0',
  `share_title` varchar(200) DEFAULT '',
  `share_desc` varchar(300) DEFAULT '',
  `share_url` varchar(100) DEFAULT '',
  `share_txt` text NOT NULL,
  `follow` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_rid` (`rid`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql20);
}

if(!pdo_tableexists('ims_ewei_scratch_sysset')){
$sql21="
CREATE TABLE IF NOT EXISTS `ims_ewei_scratch_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `appid` varchar(255) DEFAULT '',
  `appsecret` varchar(255) DEFAULT '',
  `appid_share` varchar(255) DEFAULT '',
  `appsecret_share` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql21);
}

if(!pdo_tableexists('ims_ewei_shop_wxapp_page')){
$sql22="
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `data` mediumtext,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lasttime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_status` (`status`),
  KEY `idx_isdefault` (`isdefault`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
pdo_run($sql22);
}



if(!pdo_fieldexists('ewei_shop_exchange_group', 'repeat')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `repeat` TINYINT(1) NOT NULL DEFAULT '0';");
}

if(!pdo_fieldexists('ewei_shop_exchange_group', 'koulingstart')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `koulingstart` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exchange_group', 'koulingend')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `koulingend` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exchange_group', 'kouling')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `kouling` TINYINT(1) NOT NULL DEFAULT '0';");
}

if(!pdo_fieldexists('ewei_shop_exchange_group', 'chufa')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `chufa` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exchange_group', 'chufaend')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `chufaend` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_peerpay_payinfo', 'tid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_peerpay_payinfo')." add `tid` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_peerpay_payinfo', 'openid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_peerpay_payinfo')." add `openid` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_system_plugingrant_plugin', 'name')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_system_plugingrant_plugin')." add `name` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_system_plugingrant_plugin', 'plugintype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_system_plugingrant_plugin')." add `plugintype` TINYINT(3) NOT NULL DEFAULT '0';");
}

if(!pdo_fieldexists('ewei_shop_coupon', 'quickget')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." add `quickget` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_merch_user', 'maxgoods')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_merch_user')." add `maxgoods` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'isnewstore')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `isnewstore` TINYINT(3) NOT NULL;");
}


if(!pdo_fieldexists('ewei_shop_goods', 'islive')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `islive` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'liveprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `liveprice` decimal(10,2) NOT NULL DEFAULT '0';");
}

if(!pdo_fieldexists('ewei_shop_goods_option', 'islive')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods_option')." add `islive` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods_option', 'liveprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods_option')." add `liveprice` decimal(10,2) NOT NULL DEFAULT '0';");
}

if(!pdo_fieldexists('ewei_shop_member', 'membercardid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `membercardid` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'membercardcode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `membercardcode` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'membershipnumber')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `membershipnumber` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'membercardactive')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `membercardactive` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'liveid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `liveid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'opencard')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `opencard` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'cardid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `cardid` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'verifygoodsnum')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `verifygoodsnum` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'verifygoodsdays')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `verifygoodsdays` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'iscoupon')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `iscoupon` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_member_cart', 'isnewstore')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_cart')." add `isnewstore` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_plugin', 'name')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_plugin')." add `name` VARCHAR(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_plugin', 'category')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_plugin')." add `category` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_plugin', 'thumb')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_plugin')." add `thumb` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'username')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `username` VARCHAR(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'pwd')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `pwd` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'salt')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `salt` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'lastvisit')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `lastvisit` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'lastip')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `lastip` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'isfounder')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `isfounder` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'mobile')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `mobile` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'getmessage')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `getmessage` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'getnotice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `getnotice` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_saler', 'roleid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_saler')." add `roleid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'ordersn_trade')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `ordersn_trade` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'tradestatus')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `tradestatus` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'tradepaytype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `tradepaytype` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'tradepaytime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `tradepaytime` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('shop_order_goods', 'prohibitrefund')) {
	pdo_query("ALTER TABLE ".tablename('shop_order_goods')." add `prohibitrefund` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('shop_order_goods', 'canbuyagain')) {
	pdo_query("ALTER TABLE ".tablename('shop_order_goods')." add `canbuyagain` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_sms_set', 'aliyun')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_sms_set')." add `aliyun` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_sms_set', 'aliyun_appcode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_sms_set')." add `aliyun_appcode` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'banner')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `banner` TEXT NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'perms')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `perms` TEXT NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'diypage_list')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `diypage_list` TEXT NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'diypage_ispage')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `diypage_ispage` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_store', 'opensend')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `opensend` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_store', 'classify')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `classify` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_store', 'diypage')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `diypage` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'storegroupid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `storegroupid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'label')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `label` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'tag')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `tag` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'citycode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `citycode` VARCHAR(20) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'province')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `province` VARCHAR(30) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'city')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `city` VARCHAR(30) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'area')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `area` VARCHAR(30) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'provincecode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `provincecode` VARCHAR(30) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'areacode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `areacode` VARCHAR(30) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_coupon_data', 'shareident')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." add `shareident` VARCHAR(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_coupon_data', 'textkey')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon_data')." add `textkey` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_diyform_type', 'savedata')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_diyform_type')." add `savedata` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'verifygoodslimittype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `verifygoodslimittype` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'verifygoodslimitdate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `verifygoodslimitdate` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'minliveprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `minliveprice` decimal(10,2) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'maxliveprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `maxliveprice` decimal(10,2) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'dowpayment')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `dowpayment` decimal(10,2) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'tempid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `tempid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'isstoreprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `isstoreprice` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'beforehours')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `beforehours` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'nestable')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `nestable` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'tabs')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `tabs` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'invitation_id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `invitation_id` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'showlevels')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `showlevels` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'showgroups')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `showgroups` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'showcommission')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `showcommission` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'jurisdiction_url')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `jurisdiction_url` VARCHAR(1000) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'jurisdictionurl_show')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `jurisdictionurl_show` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_live', 'notice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `notice` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'notice_url')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `notice_url` VARCHAR(1000) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'followqrcode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `followqrcode` VARCHAR(1000) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_live', 'coupon_num')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_live')." add `coupon_num` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_printer_template', 'goodssn')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_printer_template')." add `goodssn` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_member_printer_template', 'productsn')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_printer_template')." add `productsn` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'dowpayment')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `dowpayment` decimal(10,2) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'betweenprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `betweenprice` decimal(10,2) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'isshare')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `isshare` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'storeid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `storeid` VARCHAR(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'trade_time')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `trade_time` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'optime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `optime` VARCHAR(30) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'tdate_time')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `tdate_time` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'dowpayment')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `dowpayment` decimal(10,2) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'peopleid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `peopleid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'cates')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `cates` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_verifygoods', 'limittype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_verifygoods')." add `limittype` TINYINT(1) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_verifygoods', 'limitdate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_verifygoods')." add `limitdate` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_cashier_user', 'notice_openids')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_cashier_user')." add `notice_openids` VARCHAR(500) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exchange_setting', 'no_qrimg')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_setting')." add `no_qrimg` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'newgoods')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `newgoods` TINYINT(3) DEFAULT 0 ;");
}

if(!pdo_fieldexists('ewei_shop_order', 'officcode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `officcode` VARCHAR(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'wxapp_prepay_id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `wxapp_prepay_id` VARCHAR(100) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_virtual_data', 'createtime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_virtual_data')." add `createtime` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_virtual_type', 'recycled')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_virtual_type')." add `recycled` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_message_mass_task', 'id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_message_mass_task')." add `id` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_message_mass_template', 'id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_message_mass_template')." add `id` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article', 'article_keyword2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article')." add `article_keyword2` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article', 'article_report')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article')." add `article_report` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article', 'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article')." add `uniacid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article', 'network_attachment')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article')." add `network_attachment` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article', 'article_rule_credittotal')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article')." add `article_rule_credittotal` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article', 'article_advance')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article')." add `article_advance` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article_category', 'displayorder')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article_category')." add `displayorder` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article_category', 'uniacid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article_category')." add `uniacid` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article_sys', 'article_source')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article_sys')." add `article_source` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_article_sys', 'article_temp')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_article_sys')." add `article_temp` INT(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_cashier_pay_log', 'payopenid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_cashier_pay_log')." add `payopenid` varchar(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_cashier_pay_log', 'paytype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_cashier_pay_log')." add `paytype` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_cashier_pay_log', 'nosalemoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_cashier_pay_log')." add `nosalemoney` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_category', 'level')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_category')." add `level` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_category', 'advimg')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_category')." add `advimg` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_apply', 'alipay1')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_apply')." add `alipay1` varchar(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_apply', 'alipay1')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_apply')." add `alipay1` varchar(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_apply', 'repurchase')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_apply')." add `repurchase` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_apply', 'sendmoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_apply')." add `sendmoney` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_level', 'ordermoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_level')." add `ordermoney` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_level', 'ordercount')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_level')." add `ordercount` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_level', 'downcount')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_level')." add `downcount` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_level', 'commissionmoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_level')." add `commissionmoney` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_commission_level', 'goodsids')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_commission_level')." add `goodsids` varchar(1000) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_coupon', 'pwdkey2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." add `pwdkey2` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_coupon', 'pwdsuc')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." add `pwdsuc` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_coupon', 'merchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_coupon')." add `merchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_creditshop_log', 'transid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_creditshop_log')." add `transid` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_creditshop_log', 'storeid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_creditshop_log')." add `storeid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_creditshop_log', 'address')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_creditshop_log')." add `address` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_creditshop_log', 'remarksaler')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_creditshop_log')." add `remarksaler` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_dispatch', 'id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_dispatch')." add `id` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exchange_group', 'repeat')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exchange_group')." add `repeat` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exhelper_sys', 'ip_cloud')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exhelper_sys')." add `ip_cloud` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exhelper_sys', 'port')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exhelper_sys')." add `port` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_exhelper_sys', 'port_cloud')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_exhelper_sys')." add `port_cloud` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'tcate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `tcate` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'type')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `type` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'isdiscount_title')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `isdiscount_title` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'isrecommand')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `isrecommand` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'commission')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `commission` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'score')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `score` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'noticetype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `noticetype` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'followurl')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `followurl` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'followtip')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `followtip` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'deduct')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `deduct` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'shorttitle')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `shorttitle` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'virtual')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `virtual` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'detail_logo')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `detail_logo` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'detail_totaltitle')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `detail_totaltitle` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'detail_btntext1')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `detail_btntext1` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'cates')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `cates` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'deduct2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `deduct2` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'edareas')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `edareas` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'edmoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `edmoney` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'diyformtype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `diyformtype` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'saleupdate37975')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `saleupdate37975` tinyint(3) NOT NULL;");
}



if(!pdo_fieldexists('ewei_shop_goods', 'merchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `merchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'catesinit3')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `catesinit3` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'catesinit3')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `catesinit3` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_goods', 'keywords')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_goods')." add `keywords` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'goodssn')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `goodssn` varchar(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'title')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `title` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'category')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `category` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'showstock')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `showstock` tinyint(2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'stock')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `stock` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'goodsnum')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `goodsnum` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'purchaselimit')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `purchaselimit` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'singleprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `singleprice` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'units')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `units` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'dispatchtype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `dispatchtype` tinyint(2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'freight')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `freight` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'isindex')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `isindex` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'deleted')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `deleted` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'followurl')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `followurl` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'share_title')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `share_title` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'deduct')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `deduct` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'thumb_url')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `thumb_url` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'rights')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `rights` tinyint(2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_goods', 'gid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_goods')." add `gid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'credit')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `credit` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'price')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `price` decimal(11,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'dispatchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `dispatchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'goodid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `goodid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'discount')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `discount` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'starttime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `starttime` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'canceltime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `canceltime` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'endtime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `endtime` int(45) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'finishtime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `finishtime` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'success')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `success` int(2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'deleted')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `deleted` int(2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_order', 'id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `id` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_set', 'followqrcode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `followqrcode` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_set', 'groupsurl')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `groupsurl` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_set', 'share_url')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `share_url` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_set', 'groups_description')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `groups_description` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_groups_set', 'creditdeduct')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_groups_order')." add `creditdeduct` tinyint(2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'agentnotupgrade')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `agentnotupgrade` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'inviter')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `inviter` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'agentselectgoods')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `agentselectgoods` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'username')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `username` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'fixagentid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `fixagentid` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diymemberdataid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diymemberdataid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diymemberdata')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diymemberdata` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diycommissionid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diycommissionid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diycommissiondataid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diycommissiondataid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diycommissiondata')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diycommissiondata` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'isblack')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `isblack` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diymemberfields')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diymemberfields` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'diycommissionfields')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `diycommissionfields` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member', 'commission_total')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member')." add `commission_total` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_cart', 'merchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_cart')." add `merchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_cart', 'selectedadd')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_cart')." add `selectedadd` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_cart', 'isnewstore')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_cart')." add `isnewstore` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_log', 'transid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_log')." add `transid` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_log', 'gives')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_log')." add `gives` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_log', 'isborrow')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_log')." add `isborrow` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_log', 'realmoney')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_log')." add `realmoney` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_member_log', 'remark')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_member_log')." add `remark` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'verifytime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `verifytime` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'verifycode')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `verifycode` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'verifystoreid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `verifystoreid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'closereason')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `closereason` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'printstate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `printstate` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'remarkclose')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `remarkclose` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'merchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `merchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'invoicename')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `invoicename` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'ismerch')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `ismerch` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'liveid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `liveid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'ordersn_trade')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `ordersn_trade` varchar(32) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order', 'tradepaytype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order')." add `tradepaytype` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_comment', 'id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_comment')." add `id` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'diyformdata')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `diyformdata` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'diyformdataid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `diyformdataid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'openid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `openid` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'diyformid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `diyformid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'rstate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `rstate` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'printstate')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `printstate` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_goods', 'merchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_goods')." add `merchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_refund', 'realprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_refund')." add `realprice` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_refund', 'refundtime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_refund')." add `refundtime` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_refund', 'orderprice')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_refund')." add `orderprice` decimal(10,2) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_order_refund', 'rexpress')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_order_refund')." add `rexpress` varchar(100) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_log', 'ip')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_log')." add `ip` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_log', 'createtime')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_log')." add `createtime` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_role', 'perms2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_role')." add `perms2` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_role', 'deleted')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_role')." add `deleted` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_user', 'perms2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_user')." add `perms2` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_user', 'deleted')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_user')." add `deleted` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_perm_user', 'openid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_perm_user')." add `openid` varchar(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'keyword2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `keyword2` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'times')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `times` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'resptype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `resptype` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'resptitle')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `resptitle` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'resptitle')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `resptitle` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'scantext')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `scantext` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'paytype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `paytype` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'subpaycontent')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `subpaycontent` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'templateid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `templateid` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'entrytext')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `entrytext` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'resptext11')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `resptext11` text NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'ismembergroup')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `ismembergroup` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster', 'membergroupid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster')." add `membergroupid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_postera', 'keyword2')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_postera')." add `keyword2` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_postera', 'isdefault')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_postera')." add `isdefault` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_postera', 'resptype')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_postera')." add `resptype` tinyint(3) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_postera', 'resptitle')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_postera')." add `resptitle` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_postera', 'testflag')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_postera')." add `testflag` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_postera', 'reward_totle')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_postera')." add `reward_totle` varchar(500) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster_qr', 'scenestr')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster_qr')." add `scenestr` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_poster_qr', 'posterid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_poster_qr')." add `posterid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_refund_address', 'openid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_refund_address')." add `openid` varchar(50) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_refund_address', 'title')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_refund_address')." add `title` varchar(20) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_refund_address', 'merchid')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_refund_address')." add `merchid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_sign_records', 'id')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_sign_records')." add `id` int(11) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'type')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `type` tinyint(1) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'realname')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `realname` varchar(255) NOT NULL;");
}

if(!pdo_fieldexists('ewei_shop_store', 'logo')) {
	pdo_query("ALTER TABLE ".tablename('ewei_shop_store')." add `logo` varchar(255) NOT NULL;");
}
