<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="market" />
                <input type="hidden" name="op" value="couponLog" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">用户ID</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="uid" type="text" value="<?php  echo $_GPC['uid'];?>" />
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<option value="0" <?php  if(in_array($_GPC['status'],array('0'))) { ?> selected="selected" <?php  } ?>>未使用</option>
							<option value="1" <?php  if($_GPC['status'] == 1) { ?> selected="selected" <?php  } ?>>已使用</option>
                            <option value="-1" <?php  if($_GPC['status'] == -1) { ?> selected="selected" <?php  } ?>>已过期</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">来源</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="source" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($source)) { foreach($source as $key => $item) { ?>
							<option value="<?php  echo $key;?>" <?php  if($_GPC['source']=="$key") { ?> selected="selected" <?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">添加时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;&nbsp;
                    </div>
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
					<th style="width:8%;">用户ID</th>
                    <th style="width:16%;">昵称/手机号码</th>
					<th style="width:12%;">优惠券面值</th>
                    <th style="width:20%;">使用条件</th>
                    <th style="width:15%;">有效期</th>
					<th style="width:10%;">状态</th>
					<th style="width:15%;">添加时间</th>
                    <th style="text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['uid'];?></td>
					<td><?php  echo $item['nickname'];?><br/><?php  echo $item['mobile'];?></td>
					<td><?php  echo $item['amount'];?>元</td>
                    <td>满<?php  echo $item['conditions'];?>元<br/><?php  echo $item['category_name'];?> 可用</td>
                    <td><?php  echo date('Y-m-d H:i', $item['validity'])?></td>
					<td>
						<?php  if($item['status']==0) { ?>
							<span class="label label-success">未使用</span>
						<?php  } else if($item['status']==1) { ?>
							<span class="label label-danger">已使用</span>
						<?php  } else if($item['status']==-1) { ?>
							<span class="label label-default">已过期</span>
						<?php  } ?>
					</td>
                    <td><?php  echo date('Y-m-d H:i', $item['addtime'])?></td>
                    <td style="text-align:right;">
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('market', array('op' => 'couponDetail', 'id' => $item['id']))?>" title="查看"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>