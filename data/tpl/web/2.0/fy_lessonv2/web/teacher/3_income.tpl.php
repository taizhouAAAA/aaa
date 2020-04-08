<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.form-controls{display: inline-block; width:70px;}
.cblock{display:block !important;}
.cnone{display:none !important;}
</style>
<div class="main">
	<div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site">
                <input type="hidden" name="a" value="entry">
                <input type="hidden" name="m" value="fy_lessonv2">
                <input type="hidden" name="do" value="teacher">
                <input type="hidden" name="op" value="income">
                <div class="form-group">
				    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">讲师名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="teacher" value="<?php  echo $_GPC['teacher'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">课程名称</label>
					<div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="lesson" value="<?php  echo $_GPC['lesson'];?>">
                    </div>
                </div>
				<div class="form-group">
				    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">订单编号</label>
					<div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="ordersn" value="<?php  echo $_GPC['ordersn'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">收入类型 </label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<select name="ordertype" class="form-control">
							<option value="">不限</option>
							<option value="2" <?php  if($_GPC['ordertype']==2) { ?>selected<?php  } ?>>课程出售</option>
							<option value="3" <?php  if($_GPC['ordertype']==3) { ?>selected<?php  } ?>>讲师服务</option>
						</select>
					</div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">添加时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php echo tpl_form_field_daterange('time', array('start'=>($starttime ? date('Y-m-d', $starttime) : false),'end'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;
					<button type="submit" name="export" value="1" class="btn btn-success">导出 Excel</button>
                </div>
            </form>
        </div>
    </div>
	<div class="panel panel-default">
		<div class="panel-heading">总数：<?php  echo $total;?></div>
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:8%;">ID</th>
                    <th style="width:10%;">讲师名称</th>
					<th style="width:14%;">订单编号</th>
                    <th style="width:22%;">课程名称</th>
					<th style="width:10%;">课程售价</th>
                    <th style="width:10%;">讲师分成</th>
					<th style="width:10%;">讲师收入</th>
					<th style="width:13%;">添加时间</th>
                </tr>
                </thead>
                <tbody>
					<?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr>
						<td><?php  echo $item['id'];?></td>
						<td><?php  echo $item['teacher'];?></td>
						<td><?php  echo $item['ordersn'];?></td>
						<td><?php  echo $item['bookname'];?></td>
						<td><?php  echo $item['orderprice'];?> 元</td>
						<td><?php  echo $item['teacher_income'];?>%</td>
						<td><?php  echo $item['income_amount'];?> 元</td>
						<td><?php  echo date('Y-m-d H:i',$item['addtime']);?></td>
					</tr>
					<?php  } } ?>
				</tbody>
            </table>
		</div>
	</div>
	<?php  echo $pager;?>
</div>