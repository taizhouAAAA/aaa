<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
				<input type="hidden" name="m" value="fy_lessonv2" />
				<input type="hidden" name="do" value="commission" />
				<input type="hidden" name="op" value="commissionlog" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">会员昵称</label>
					<div class="col-sm-2 col-lg-3">
						<input class="form-control" name="nickname" type="text" value="<?php  echo $_GPC['nickname'];?>">
					</div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程名称</label>
					<div class="col-sm-2 col-lg-3">
						<input class="form-control" name="bookname" type="text" value="<?php  echo $_GPC['bookname'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">分销等级</label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<select name="grade" class="form-control">
							<option value="">不限</option>
							<option value="1" <?php  if($_GPC['grade'] == 1) { ?> selected="selected" <?php  } ?>>一级分销</option>
							<option value="2" <?php  if($_GPC['grade'] == 2) { ?> selected="selected" <?php  } ?>>二级分销</option>
							<option value="3" <?php  if($_GPC['grade'] == 3) { ?> selected="selected" <?php  } ?>>三级分销</option>
							<option value="-1" <?php  if($_GPC['grade'] == -1) { ?> selected="selected" <?php  } ?>>管理员操作</option>
						</select>
					</div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">备注</label>
					<div class="col-sm-2 col-lg-3">
						<input class="form-control" name="remark" id="" type="text" value="<?php  echo $_GPC['remark'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">分销时间</label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
					</div>
					<div class="col-sm-3 col-lg-3" style="width: 22%;">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						<button type="submit" name="export" value="1" class="btn btn-success">导出 Excel</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			总数：<?php  echo $total;?>
			<span style="margin-left:50px;">佣金总和：<?php  echo $change_total_num;?></span>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead class="navbar-inner">
					<tr>
						<th style='width:8%;'>ID</th>
						<th style='width:10%;'>会员信息</th>
						<th style='width:23%;'>分销课程</th>
						<th style='width:10%;'>分销等级</th>
						<th style='width:10%;'>分销佣金</th>
						<th style='width:24%;'>备注</th>
						<th style='width:15%;'>分销时间</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td><?php  echo $row['id'];?></td>
						<td><?php  echo $row['nickname'];?></td>
						<td><?php  echo $row['bookname'];?></td>
						<td><?php  if($row['grade']==1) { ?><span class="label label-success">一级分销</span><?php  } else if($row['grade']==2) { ?><span class="label label-primary">二级分销</span><?php  } else if($row['grade']==3) { ?><span class="label label-warning">三级分销</span><?php  } else if($row['grade']==-1) { ?><span class="label label-info">管理员操作</span><?php  } ?></td>
						<td><?php  echo $row['change_num'];?> 元</td>
						<td>
							<?php  echo $row['remark'];?>
							<?php  if($row['buyer_uid']) { ?>
							，用户信息:[uid:<?php  echo $row['buyer_uid'];?>]<?php  echo $row['buyer_name'];?>
							<?php  } ?>
						</td>
						<td><?php  echo date('Y-m-d H:i',$row['addtime']);?></td>
					</tr>
					<?php  } } ?>
				</tbody>
			</table>
			<?php  echo $pager;?>
		</div>
	</div>
</div>