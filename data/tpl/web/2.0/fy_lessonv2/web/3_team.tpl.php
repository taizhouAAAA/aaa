<?php defined('IN_IA') or exit('Access Denied');?><!--
 * 团队信息
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/commission/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/commission/_header', TEMPLATE_INCLUDEPATH));?>

<?php  if($op=='display') { ?>
	<style type="text/css">
	.self{margin:4px 0;}
	</style>
	<div class="panel panel-default">
		<div class='panel-body'>
		<div style='height:100px;width:110px;float:left;'>
			 <img src='<?php  echo $member['avatar'];?>' style='width:100px;height:100px;border:1px solid #ccc;padding:1px' />
		</div>
		<div style='float:left;height:100px;overflow: hidden'>
			<p class="self">会员昵称：<?php  echo $member['nickname'];?></p>
			<p class="self">会员姓名：<?php  echo $member['realname'];?></p>
			<p class="self">手机号码：<?php  echo $member['mobile'];?></p>
			<p class="self">我的团队：<span style='color:red'><?php  echo $total;?></span> 人</p>
		</div>
	</div>
	 
	<div class="panel panel-default">
		<div class="panel-heading">我的团队</div>
		<div class="panel-body">
			<table class="table table-hover" style="overflow:visible;">
				<thead class="navbar-inner">
					<tr>
						<th style='width:8%;'>会员ID</th>
						<th style='width:12%;'>粉丝</th>
						<th style='width:12%;'>真实名字<br/>手机号码</th>
						<th style='width:12%;'>已结佣金<br/>累计佣金</th>
						<th style='width:12%;'>订单金额<br/>订单笔数</th>
						<th style='width:12%;'>分销状态</th>
						<th style='width:10%;'>Ta的团队</th>
						<th style='width:12%;'>加入时间</th>
						<th style='width:10%'>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($teamlist)) { foreach($teamlist as $row) { ?>
					<tr>
						<td><?php  echo $row['uid'];?></td>
						<td>
							<?php  if(!empty($row['avatar'])) { ?>
							<img src="<?php  echo $row['avatar'];?>" style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
							<?php  } ?>
							<?php  if(empty($row['nickname'])) { ?>未设置<?php  } else { ?><?php  echo $row['nickname'];?><?php  } ?>

						</td>
						<td><?php  echo $row['realname'];?> <br/><?php  echo $row['mobile'];?></td>
						<td><?php  echo $row['pay_commission'];?> 元<br/><?php  echo $row['pay_commission']+$row['nopay_commission'];?> 元</td>
						<td><?php  echo $row['payment_amount'];?> 元<br/><?php  echo $row['payment_order'];?> 单</td>
						<td><?php  if($row['status']==1) { ?><span class="label label-success">正常</span><?php  } else { ?><span class="label label-default">冻结</span><?php  } ?></td>
						<td><?php  echo $row['recnum'];?></td>
						<td><?php  echo date('Y-m-d H:i',$row['addtime']);?></td>
						<td style="overflow:visible;">
							<div class="btn-group btn-group-sm">
								<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="javascript:;">操作 <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-left" role="menu" style='z-index: 99999'>
									<li><a href="<?php  echo $this->createWebUrl('agent', array('op'=>'detail', 'uid'=>$row['uid']));?>" title="编辑"><i class="fa fa-pencil"></i> 编辑</a></li>
									<li><a href="<?php  echo $this->createWebUrl('team', array('uid'=>$row['uid']));?>" title="查看下级成员"><i class="fa fa-list"></i> 查看下级成员</a></li>
								</ul>
							</div>
						</td>
					</tr>
					<?php  } } ?>
				</tbody>
			</table>
			<?php  echo $pager;?>
		</div>
	</div>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>