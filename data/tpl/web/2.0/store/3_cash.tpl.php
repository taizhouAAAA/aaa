<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php  if($_GPC['do'] == 'cashsetting') { ?>
<div id="cashsetting">
    <div class="we7-page-title">分销设置</div>
    <table class="table we7-table table-form">
        <col width="140px">
        <col>
        <col width="120px">
        <tr>
            <th colspan="3">分销设置</th>
        </tr>
        <tr>
            <td class="table-label">佣金设置</td>
            <td>
                <?php  if($settings['cash_status'] == 1) { ?>
                已开启（佣金比例：<?php  echo intval($settings['cash_ratio']);?>%）
                <?php  } else { ?>
                已关闭
                <?php  } ?>
            </td>
            <td class="text-right">
                <a href="#showEdit" data-toggle="modal" data-target="#showEdit" class="color-default">修改</a>
            </td>
        </tr>
    </table>
    <div class="modal fade store-status-show" id="showEdit" role="dialog">
        <div class="we7-modal-dialog modal-dialog we7-form">
            <div class="modal-content">
                <form action="" class="form we7-form" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <div class="modal-title">佣金设置</div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="control-label col-sm-2">
                                是否开启
                            </div>
                            <div class="col-sm-8 form-control-static">
                                <input type="radio" name="status" value="1" id="status-1" <?php  if($settings['cash_status'] == 1) { ?>checked="checked"<?php  } ?>>
                                <label class="radio-inline" for="status-1">是</label>
                                <input type="radio" name="status"value="0" id="status-0" <?php  if(empty($settings['cash_status'])) { ?>checked="checked"<?php  } ?>>
                                <label class="radio-inline" for="status-0">否</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label col-sm-2">
                                佣金比例
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="number" name="ratio"  value="<?php  echo $settings['cash_ratio'];?>" class="form-control" min="0" max="100" step="1">
                                    <span class="input-group-addon"> %</span>
                                </div>
                                <span class="help-block">副站长佣金的订单占比(请写入0-100的整数)</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
                        <input type="submit" class="btn btn-primary" name="submit" value="提交">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  } else { ?>
<div>
    <?php  if($operate == 'cash_orders') { ?>
    <div id="cash_orders">
        <div class="we7-page-title">分销订单</div>
        <ul class="we7-page-tab">
            <li class="active"><a href="#">全部订单</a></li>
        </ul>
        <form action="" class="form-inline we7-margin-bottom" method="get">
            <input type="hidden" name="c" value="site">
            <input type="hidden" name="a" value="entry">
            <input type="hidden" name="do" value="cash">
            <input type="hidden" name="m" value="store">
            <input type="hidden" name="operate" value="cash_orders">
            <input type="hidden" name="direct" value="1">
            <div class="input-group form-group" style="width: 400px;">
                <input type="text" name="number" value="<?php  echo $_GPC['number'];?>" class="form-control" placeholder="请输入订单号">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <table class="table we7-table vertical-middle">
            <tr>
                <th width="50px"></th>
                <th>商品名称</th>
                <th>购买人</th>
                <th>订单状态</th>
                <th>商品金额</th>
                <th>获得佣金</th>
                <th>提现状态</th>
                <th>操作</th>
            </tr>
            <?php  if(!empty($cash_orders)) { ?>
            <?php  if(is_array($cash_orders)) { foreach($cash_orders as $order) { ?>
            <tr>
                <th colspan="7" class="color-gray bg-light-gray">
                    <span class="we7-margin-right">创建时间：<?php  echo date('Y-m-d H:i:s', $order['create_time'])?></span>
                    <span class="we7-margin-right" >分销单号：<?php  echo $order['number'];?></span>
                </th>
                <th class="text-right bg-light-gray"></th>
            </tr>
            <tr>
                <td>
                    <?php  if($order['goods']['type']== 1 || $order['goods']['type']== 4) { ?>
                        <img src="<?php  echo $order['goods']['logo'];?>" alt="" class="icon" width="60" height="60" style="margin-right: 80px"/>
                    <?php  } else if($order['goods']['type']== 2 || $order['goods']['type']== 3 || $order['goods']['type']== 5) { ?>
                        <div class="icon icon-api"><span class="wi wi-appjurisdiction"></span></div>
                    <?php  } else if($order['goods']['type']== 9 || $order['goods']['type']== 10) { ?>
                        <div class="icon icon-api"><span class="wi wi-userjurisdiction"></span></div>
                    <?php  } else if($order['goods']['type']== 6 || $order['goods']['type']== 7 || $order['goods']['type']== 8) { ?>
                        <div class="icon icon-api"><span class="wi wi-api"></span></div>
                    <?php  } ?>
                </td>
                <td><?php  echo $order['goods']['title'];?></td>
                <td><?php  echo $order['order']['buyer'];?></td>
                <td class="color-green">交易成功</td>
                <td><?php  echo $order['order_amount'];?></td>
                <td><?php  echo $order['cash_amount'];?></td>
                <td>
                    <?php  if($order['status'] == 1) { ?>待提现
                    <?php  } else if($order['status'] == 2) { ?>已申请
                    <?php  } else if($order['status'] == 3) { ?><span class="color-red">已拒绝</span>
                    <?php  } else if($order['status'] == 4) { ?><span class="color-green">已审核</span>
                    <?php  } ?>
                </td>
                <td><a href="<?php  echo $this->createWebUrl('cash', array('id' => $order['id'] , 'm' => 'store', 'operate' => 'order_detail', 'direct' => 1))?>" class="color-default">订单详情</a></td>
            </tr>
            <tr style="border: 0"><td colspan="7"></td></tr>
            <?php  } } ?>
            <?php  } else { ?>
            <tr><td colspan="8" class="text-center">暂无数据</td></tr>
            <?php  } ?>
        </table>
        <div class="pull-right">
            <?php  echo $pager;?>
        </div>
    </div>
    <?php  } else if($operate == 'mycash') { ?>
    <div id="mycash">
        <div class="we7-page-title">我的佣金</div>
        <ul class="we7-page-tab">
            <li class="active"><a href="#">我的佣金</a></li>
            <li><a href="<?php  echo $this->createWebUrl('cash', array('m' => 'store', 'operate' => 'cash_logs', 'direct' => 1))?>">提现记录</a></li>
        </ul>
        <div class="we7-margin-bottom">
            <button onclick="applyCash()" class="btn btn-primary pull-right">申请提现</button>
            可提现金额(元)
            <h2 class="color-default"><?php  echo $can_cash_amount;?></h2>
        </div>
        <script>
            function applyCash() {
                util.confirm(function () {
                    location.href = "<?php  echo $this->createWebUrl('cash', array('m' => 'store', 'operate' => 'apply_cash', 'direct' => 1))?>";
                }, function () {
                    return false;
                }, '确认申请');
            }
        </script>
        <table class="table we7-table vertical-middle">
            <tr>
                <th width="50px"></th>
                <th>商品名称</th>
                <th>订单号</th>
                <th>下单时间</th>
                <th>购买人</th>
                <th>商品金额</th>
                <th>获得佣金</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            <?php  if(is_array($cash_orders)) { foreach($cash_orders as $order) { ?>
            <tr>
                <td>
                    <?php  if($order['goods']['type']== 1 || $order['goods']['type']== 4) { ?>
                    <img src="<?php  echo $order['goods']['logo'];?>" class="icon" width="60" height="60" style="margin-right: 80px"/>
                    <?php  } else if($order['goods']['type']== 2 || $order['goods']['type']== 3 || $order['goods']['type']== 5) { ?>
                    <div class="icon icon-api"><span class="wi wi-appjurisdiction"></span></div>
                    <?php  } else if($order['goods']['type']== 9 || $order['goods']['type']== 10) { ?>
                    <div class="icon icon-api"><span class="wi wi-userjurisdiction"></span></div>
                    <?php  } else if($order['goods']['type']== 6 || $order['goods']['type']== 7 || $order['goods']['type']== 8) { ?>
                    <div class="icon icon-api"><span class="wi wi-api"></span></div>
                    <?php  } ?>
                </td>
                <td><?php  echo $order['goods']['title'];?></td>
                <td><?php  echo $order['order']['orderid'];?></td>
                <td><?php  echo date('Y-m-d H:i:s', $order['order']['createtime'])?></td>
                <td><?php  echo $order['order']['buyer'];?></td>
                <td><?php  echo $order['order_amount'];?></td>
                <td><?php  echo $order['cash_amount'];?></td>
                <td>
                    <?php  if($order['status'] == 1) { ?>待提现
                    <?php  } else if($order['status'] == 2) { ?>已申请
                    <?php  } else if($order['status'] == 3) { ?><span class="color-red">已拒绝</span>
                    <?php  } else if($order['status'] == 4) { ?><span class="color-green">已审核</span>
                    <?php  } ?>
                </td>
                <td><a href="<?php  echo $this->createWebUrl('cash', array('id' => $order['id'] , 'm' => 'store', 'operate' => 'order_detail', 'direct' => 1))?>" class="color-default">订单详情</a></td>
            </tr>
            <?php  } } ?>
            <?php  if(!$cash_orders) { ?>
            <tr><td colspan="8" class="text-center">暂无数据</td></tr>
            <?php  } ?>
        </table>
        <div class="pull-right">
            <?php  echo $pager;?>
        </div>
    </div>
    <?php  } else if($operate == 'order_detail') { ?>
    <div id="order_detail">
        <ol class="breadcrumb we7-breadcrumb">
            <a href="javascript:history.back()"><i class="wi wi-back-circle"></i> </a>
            <li><a href="javascript:history.back()">订单列表 </a></li>
            <li>订单详情</li>
        </ol>
        <table class="table we7-table">
            <tr><th colspan="2">订单详情</th></tr>
            <tr><td width="120px">订单号:</td><td><?php  echo $cash_order['order']['orderid'];?></td></tr>
            <tr><td>下单时间 :</td><td><?php  echo date('Y-m-d H:i:s', $cash_order['order']['createtime'])?></td></tr>
            <tr><td>商品名称 :</td><td><?php  echo $cash_order['goods']['title'];?></td></tr>
            <tr><td>购买人 :</td><td><?php  echo $cash_order['order']['buyer'];?></td></tr>
            <tr><td>商品金额 :</td><td><?php  echo $cash_order['order']['amount'];?></td></tr>
            <tr><td>获得佣金 :</td><td><b><?php  echo sprintf('%.2f', $this->store_setting['cash_ratio'] * $cash_order['order']['amount'] / 100)?></b></td></tr>
        </table>
    </div>
    <?php  } else if($operate == 'cash_logs') { ?>
    <div id="cash_logs">
        <div class="we7-page-title">我的佣金</div>
        <ul class="we7-page-tab">
            <li><a href="<?php  echo $this->createWebUrl('cash', array('m' => 'store', 'operate' => 'mycash', 'direct' => 1))?>">我的佣金</a></li>
            <li class="active"><a href="#">提现记录</a></li>
        </ul>
        <table class="table we7-table vertical-middle">
            <tr>
                <th>提现单号</th>
                <th>申请时间</th>
                <th>提现金额</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            <?php  if(is_array($cash_logs)) { foreach($cash_logs as $log) { ?>
            <tr>
                <td><?php  echo $log['number'];?></td>
                <td><?php  echo date('Y-m-d H:i:s', $log['create_time'])?></td>
                <td><?php  echo $log['amount'];?></td>
                <td>
                    <?php  if($log['status'] == 1) { ?>待审核
                    <?php  } else if($log['status'] == 2) { ?><span class="color-green">审核通过</span>
                    <?php  } else if($log['status'] == 3) { ?><span class="color-red">审核拒绝</span>
                    <?php  } ?>
                </td>
                <td><a href="<?php  echo $this->createWebUrl('cash', array('id' => $log['id'] , 'm' => 'store', 'operate' => 'log_detail', 'direct' => 1))?>" class="color-default">详情</a></td>
            </tr>
            <?php  } } ?>
            <?php  if(!$cash_logs) { ?>
            <tr><td colspan="5" class="text-center">暂无数据</td></tr>
            <?php  } ?>
        </table>
        <div class="pull-right">
            <?php  echo $pager;?>
        </div>
    </div>
    <?php  } else if($operate == 'log_detail') { ?>
    <div id="log_detail">
        <ol class="breadcrumb we7-breadcrumb">
            <a href="javascript:history.back()"><i class="wi wi-back-circle"></i> </a>
            <li><a href="javascript:history.back()">提现列表 </a></li>
            <li>详情</li>
        </ol>
        <table class="table we7-table">
            <tr>
                <th>申请人：<?php  echo $founder['username'];?></th>
                <th>提现金额：<?php  echo $log['amount'];?></th>
                <th>申请时间：<?php  echo date('Y-m-d H:i:s', $log['create_time'])?></th>
                <th>提现单号：<?php  echo $log['number'];?></th>
                <th class="we7-padding">
                    审核状态：
                    <?php  if($log['status'] == 1) { ?>待审核
                    <?php  } else if($log['status'] == 2) { ?><span class="color-green">已审核</span>
                    <?php  } else if($log['status'] == 3) { ?><span class="color-red">已拒绝</span><?php  } ?>
                </th>
            </tr>
        </table>
        <table class="table we7-table vertical-middle">
            <tr>
                <th width="50px"></th>
                <th>商品名称</th>
                <th>订单号</th>
                <th>下单时间</th>
                <th>购买人</th>
                <th>商品金额</th>
                <th>获得佣金</th>
                <!--<th>操作</th>-->
            </tr>
            <?php  if(is_array($cash_orders)) { foreach($cash_orders as $order) { ?>
            <tr>
                <td>
                    <?php  if($order['goods']['type']== 1 || $order['goods']['type']== 4) { ?>
                    <img src="<?php  echo $order['goods']['logo'];?>" class="icon" width="60" height="60" style="margin-right: 80px"/>
                    <?php  } else if($order['goods']['type']== 2 || $order['goods']['type']== 3 || $order['goods']['type']== 5) { ?>
                    <div class="icon icon-api"><span class="wi wi-appjurisdiction"></span></div>
                    <?php  } else if($order['goods']['type']== 9 || $order['goods']['type']== 10) { ?>
                    <div class="icon icon-api"><span class="wi wi-userjurisdiction"></span></div>
                    <?php  } else if($order['goods']['type']== 6 || $order['goods']['type']== 7 || $order['goods']['type']== 8) { ?>
                    <div class="icon icon-api"><span class="wi wi-api"></span></div>
                    <?php  } ?>
                </td>
                <td><?php  echo $order['goods']['title'];?></td>
                <td><?php  echo $order['order']['orderid'];?></td>
                <td><?php  echo date('Y-m-d H:i:s', $order['order']['createtime'])?></td>
                <td><?php  echo $order['order']['buyer'];?></td>
                <td><?php  echo $order['order_amount'];?></td>
                <td><?php  echo $order['cash_amount'];?></td>
                <!--<td><a href="<?php  echo $this->createWebUrl('cash', array('id' => $order['id'] , 'm' => 'store', 'operate' => 'order_detail', 'direct' => 1))?>" class="color-default">订单详情</a></td>-->
            </tr>
            <?php  } } ?>
            <?php  if(!$cash_orders) { ?>
            <tr><td colspan="8" class="text-center">暂无数据</td></tr>
            <?php  } ?>
        </table>
        <div class="pull-right">
            <?php  echo $pager;?>
        </div>
    </div>
    <?php  } else if($operate == 'consume_order') { ?>
    <div id="consume_order">
        <div class="we7-page-title">提现审核</div>
        <ul class="we7-page-tab">
            <li class="active"><a href="#">提现订单</a></li>
        </ul>
        <div class="keyword-list-head clearfix we7-margin-bottom">
            <form action="" method="get">
                <input type="hidden" name="c" value="site">
                <input type="hidden" name="a" value="entry">
                <input type="hidden" name="do" value="cash">
                <input type="hidden" name="m" value="store">
                <input type="hidden" name="operate" value="consume_order">
                <input type="hidden" name="direct" value="1">
                <label for="" class="col-sm-1 control-label" style="width: 60px;">审核状态</label>
                <div class="col-sm-2" style="width: 140px;">
                    <select name="status" class="form-control">
                        <option value="0" <?php  if($_GPC['status'] == 0) { ?>selected="selected"<?php  } ?>>不限</option>
                        <option value="1" <?php  if($_GPC['status'] == 1) { ?>selected="selected"<?php  } ?>>待审核</option>
                        <option value="2" <?php  if($_GPC['status'] == 2) { ?>selected="selected"<?php  } ?>>已审核</option>
                        <option value="3" <?php  if($_GPC['status'] == 3) { ?>selected="selected"<?php  } ?>>已拒绝</option>
                    </select>
                </div>
                <div class="input-group pull-left col-sm-4">
                    <input type="text" name="number" id="" value="<?php  echo $_GPC['number'];?>" class="form-control"  placeholder="提现单号" />
                    <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-search"></i></button></span>
                </div>
            </form>
        </div>
        <form action="" method="post" id="consume-form">
            <table class="table we7-table vertical-middle ">
                <tr>
                    <th width="60px"></th>
                    <th>提现单号</th>
                    <th>申请时间</th>
                    <th>申请人</th>
                    <th>提现金额</th>
                    <th>操作</th>
                </tr>
                <?php  if($cash_logs) { ?>
                <?php  if(is_array($cash_logs)) { foreach($cash_logs as $log) { ?>
                <tr>
                    <td>
                        <div class="we7-form">
                            <input id="option[<?php  echo $log['id'];?>]" type="checkbox" name='ids[]' value="<?php  echo $log['id'];?>" <?php  if($log['status'] == 1) { ?>class="checkitem"<?php  } else { ?>disabled<?php  } ?>/>
                            <label for="option[<?php  echo $log['id'];?>]"> </label>
                        </div>
                    </td>
                    <td><?php  echo $log['number'];?></td>
                    <td><?php  echo date('Y-m-d H:i:s', $log['create_time'])?></td>
                    <td><?php  echo $log['username'];?></td>
                    <td><?php  echo $log['amount'];?></td>
                    <td>
                        <?php  if($log['status'] == 1) { ?>
                        <a href="javascript:consumeOrder(<?php  echo $log['id'];?>, 2);" class="color-default">审核</a>
                        <a href="javascript:consumeOrder(<?php  echo $log['id'];?>, 3);" class="color-default">拒绝</a>
                        <?php  } else if($log['status'] == 2) { ?><span class="color-green">已审核</span>
                        <?php  } else if($log['status'] == 3) { ?><span class="color-red">已拒绝</span>
                        <?php  } ?>
                        <a href="<?php  echo $this->createWebUrl('cash', array('id' => $log['id'] , 'm' => 'store', 'operate' => 'log_detail', 'direct' => 1))?>" class="color-default">详情</a>
                    </td>
                </tr>
                <?php  } } ?>
                <?php  } else { ?>
                <tr><td colspan="7" class="text-center">暂无数据</td></tr>
                <?php  } ?>
            </table>
            <div>
                <div class="we7-form">
                    <input id='checkall' type="checkbox" onclick="$('.checkitem').prop('checked', $('#checkall').prop('checked') ==  true ? 'checked' : '')"/>
                    <label for="checkall">全选 </label>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                    <input type="hidden" name="check_result" value=""/>
                    <span onclick="confirmConsume(2)" class="btn btn-primary we7-margin-left-sm we7-padding-horizontal">审核</span>
                    <span onclick="confirmConsume(3)" class="btn btn-default we7-margin-left-sm we7-padding-horizontal">拒绝</span>
                </div>
            </div>
            <div class="pull-right">
                <?php  echo $pager;?>
            </div>
        </form>
        <script>
            function consumeOrder(id, type) {
                util.confirm(function () {
                    $.post("", {'ids' : [id], 'token': "<?php  echo $_W['token'];?>", 'check_result': type}, function(data) {
                        location.reload();
                    });
                }, function () {
                    return false;
                }, '确认' + (type == 2 ? '审核' : '拒绝') + '?');
            }
            function confirmConsume(type) {
                util.confirm(function () {
                    $('input[name=check_result]').val(type);
                    $('#consume-form').submit();
                }, function () {
                    return false;
                }, '确认' + (type == 2 ? '审核' : '拒绝') + '?');
            }
        </script>
    </div>
    <?php  } ?>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>