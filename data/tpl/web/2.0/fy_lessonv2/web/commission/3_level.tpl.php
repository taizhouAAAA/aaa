<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<div class="alert alert-info">
		1、分销等级从上往下依次为从低往高，默认等级在“分销设置”里设定，默认等级处于最低等级。<br/>
		2、课程或VIP会员服务指定单独的佣金比例后，优先按课程或VIP会员服务单独的佣金比例计算。
	</div>
	<form action="" method="post" onsubmit="return formcheck(this)">
		<div class="panel panel-default">
			<div class="panel-heading">
				分销商等级设置
			</div>
			<div class="panel-body">
				<table class="table">
					<thead>
						<tr>
							<th style="width:10%;">等级名称</th>
							<th style="width:10%;">一级比例</th>
							<th style="width:10%;">二级比例</th>
							<th style="width:10%;">三级比例</th>
							<th style="width:20%;">升级条件</th>
							<th style="width:15%;">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($list)) { foreach($list as $level) { ?>
						<tr>
							<td><?php  echo $level['levelname'];?></td>
							<td><?php  echo $level['commission1'];?>%</td>
							<td><?php  echo $level['commission2'];?>%</td>
							<td><?php  echo $level['commission3'];?>%</td>
							<td>
							<?php  if($level['updatemoney']>0) { ?>
								<?php  if($comsetting['upgrade_condition']==1) { ?>分销累计佣金
								<?php  } else if($comsetting['upgrade_condition']==2) { ?>购买订单总额
								<?php  } else if($comsetting['upgrade_condition']==3) { ?>购买订单
								<?php  } ?>
								满 <?php  echo $level['updatemoney'];?>
								<?php  if($comsetting['upgrade_condition']==1 || $comsetting['upgrade_condition']==2) { ?>元
								<?php  } else if($comsetting['upgrade_condition']==3) { ?>单
								<?php  } ?>
							<?php  } else { ?>
								不自动升级
							<?php  } ?>
							</td>
							<td>
								<a class="btn btn-default" href="<?php  echo $this->createWebUrl('commission', array('op'=>'editlevel', 'id'=>$level['id']));?>">编辑</a>
								<a class="btn btn-default" href="<?php  echo $this->createWebUrl('commission', array('op'=>'dellevel', 'id'=>$level['id']));?>" onclick="return confirm('确认删除此等级吗？');return false;">删除</a>
							</td>
						</tr>
						<?php  } } ?>
					</tbody>
				</table>
				<?php  echo $pager;?>
			 </div>
			 <div class="panel-footer">
				<a class="btn btn-default" href="<?php  echo $this->createWebUrl('commission', array('op'=>editlevel));?>"><i class="fa fa-plus"></i> 添加新等级</a>
			 </div>
		 </div>
	</form>
</div>