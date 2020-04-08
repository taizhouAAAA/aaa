<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<div class="alert alert-info">
	    每个课程仅可以关联到一个限时折扣活动，已过期的活动请自行删除活动。
	</div>
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="market" />
                <input type="hidden" name="op" value="discount" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">活动名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="活动名称">
                    </div>
					<div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						&nbsp;&nbsp;&nbsp;
						<a href="<?php  echo $this->createWebUrl('market', array('op' => 'addDiscount'))?>" class="btn btn-success"><i class="fa fa-plus"></i> 添加活动</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <form action="" method="post" class="form-horizontal form" >
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
					<th style="width:8%;">编号</th>
                    <th style="width:20%;">活动名称</th>
                    <th style="width:20%;">起止时间</th>
					<th style="width:10%;">状态</th>
					<th style="width:10%;">排序</th>
					<th style="width:15%;">创建时间</th>
                    <th style="text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['discount_id'];?></td>
					<td><?php  echo $item['title'];?></td>
                    <td><?php  echo date('Y-m-d H:i', $item['starttime']);?> ~ <?php  echo date('Y-m-d H:i', $item['endtime']);?></td>
					<td>
						<?php  if($item['endtime'] < time()) { ?>
							<span class="label label-danger">已过期</span>
						<?php  } else if($item['starttime'] > time()) { ?>
							<span class="label label-default">未开始</span>
						<?php  } else if($item['starttime'] < time() && $item['endtime'] > time()) { ?>
							<span class="label label-success">进行中</span>
						<?php  } ?>
					</td>
					<td><?php  echo $item['displayorder'];?></td>
                    <td><?php  echo date('Y-m-d H:i', $item['addtime'])?></td>
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('market', array('op' => 'discountLesson', 'discount_id' => $item['discount_id']))?>" title="管理活动"><i class="fa fa-plus"></i></a>
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('market', array('op' => 'addDiscount', 'discount_id' => $item['discount_id']))?>" title="编辑"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('market', array('op' => 'delDiscount', 'discount_id' => $item['discount_id']))?>" title="删除" onclick="return confirm('该操作不可恢复，确认删除?');return false;"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
    </form>
</div>