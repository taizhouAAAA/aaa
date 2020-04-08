<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="viporder" />
                <input type="hidden" name="op" value="vipMember" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">用户信息</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>" placeholder="会员昵称/姓名/uid/手机号码">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">会员等级</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="level_id" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($vipLevelList)) { foreach($vipLevelList as $key => $item) { ?>
							<option value="<?php  echo $key;?>" <?php  if($_GPC['level_id'] == $key) { ?> selected="selected" <?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">等级状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<option value="1" <?php  if($_GPC['status'] == 1) { ?> selected="selected" <?php  } ?>>生效中</option>
							<option value="-1" <?php  if($_GPC['status'] == -1) { ?> selected="selected" <?php  } ?>>已过期</option>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">距有效期剩</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="overdue" class="form-control">
                            <option value="">不限</option>
							<option value="7" <?php  if($_GPC['overdue'] == 7) { ?> selected="selected" <?php  } ?>>7天内</option>
							<option value="15" <?php  if($_GPC['overdue'] == 15) { ?> selected="selected" <?php  } ?>>15天内</option>
							<option value="30" <?php  if($_GPC['overdue'] == 30) { ?> selected="selected" <?php  } ?>>30天内</option>
                        </select>
                    </div>
                    <div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" name="export" value="1" class="btn btn-success">导出Excel</button>
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
                    <th style="width:8%;">会员ID</th>
                    <th style="width:12%;">昵称</th>
					<th style="width:10%;">姓名</th>
                    <th style="width:12%;">手机号码</th>
					<th style="width:14%;">等级名称</th>
					<th style="width:8%;">折扣</th>
                    <th style="width:20%;">有效期</th>
                    <th style="width:8%;">状态</th>
                    <th style="width:10%;text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody style="font-size: 13px;">
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php  echo $item['uid'];?></td>
                    <td><?php  echo $item['nickname'];?></td>
                    <td><?php  echo $item['realname'];?></td>
                    <td><?php  echo $item['mobile'];?></td>
					<td><?php  echo $vipLevelList[$item['level_id']];?></td>
					<td>
						<?php  if($item['discount']>0) { ?>
							<?php  echo $item['discount'];?>%
						<?php  } else { ?>
							无折扣
						<?php  } ?>
					</td>
					<td><?php  echo date('Y-m-d H:i', $item['validity'])?></td>
                    <td>
                        <?php  if($item['validity'] >= time()) { ?>
							<span class="label label-success">生效中</span>
						<?php  } else { ?>
							<span class="label label-danger">已过期</span>
						<?php  } ?>
                    </td>
                    
                    <td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('agent', array('op' => 'detail', 'uid' => $item['uid']))?>" title="编辑" target="_blank"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>