<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
				<input type="hidden" name="m" value="fy_lessonv2" />
				<input type="hidden" name="do" value="commission" />
				<input type="hidden" name="op" value="statis" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">会员信息</label>
					<div class="col-sm-2 col-lg-3">
						<input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="会员昵称/姓名">
					</div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">手机号码</label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<input class="form-control" name="mobile" type="text" value="<?php  echo $_GPC['mobile'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">排序依据</label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<select name="ranking" class="form-control">
							<option value="1" <?php  if($_GPC['ranking'] == 1) { ?> selected="selected" <?php  } ?>>累计佣金</option>
							<option value="2" <?php  if($_GPC['ranking'] == 2) { ?> selected="selected" <?php  } ?>>已申请佣金</option>
							<option value="3" <?php  if($_GPC['ranking'] == 3) { ?> selected="selected" <?php  } ?>>待申请佣金</option>
						</select>
					</div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">注册时间</label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<?php echo tpl_form_field_daterange('time', array('start'=>($starttime ? date('Y-m-d', $starttime) : false),'end'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
					</div>
					<div class="col-sm-3 col-lg-3">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;
						<button type="submit" name="export" value="1" class="btn btn-success">导出 Excel</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			总记录：<?php  echo $total;?>
			<span style="margin-left:50px;">已申请佣金：<?php  echo $pay_total;?></span>
			<span style="margin-left:50px;">待申请佣金：<?php  echo $nopay_total;?></span>
			<span style="margin-left:50px;">累计佣金：<?php  echo $pay_total+$nopay_total;?></span>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead class="navbar-inner">
					<tr>
						<th style='width:8%;'>会员ID</th>
						<th style='width:13%;'>会员昵称</th>
						<th style='width:13%;'>会员姓名</th>
						<th style='width:14%;'>手机号码</th>
						<th style='width:14%;'>已申请佣金</th>
						<th style='width:13%;'>待申请佣金</th>
						<th style='width:13%;'>累计佣金</th>
						<th style='width:12%;'>注册时间</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td><?php  echo $row['uid'];?></td>
						<td><?php  echo $row['nickname'];?></td>
						<td><?php  echo $row['realname'];?></td>
						<td><?php  echo $row['mobile'];?></td>
						<td><?php  echo $row['pay_commission'];?> 元</td>
						<td><?php  echo $row['nopay_commission'];?> 元</td>
						<td><?php  echo $row['total_commission'];?> 元</td>
						<td><?php  echo date('Y-m-d', $row['addtime']);?></td>
					</tr>
					<?php  } } ?>
				</tbody>
			</table>
			<?php  echo $pager;?>
		</div>
	</div>
</div>