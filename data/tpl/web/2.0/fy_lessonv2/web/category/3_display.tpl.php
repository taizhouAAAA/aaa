<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.form-controls{display: inline-block; width:70px;}
.cblock{display:block !important;}
.cnone{display:none !important;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo MODULE_URL;?>template/web/style/category.css">
<div class="main">
	<div class="panel panel-info">
        <div class="panel-heading">优化分类</div>
        <div class="panel-body">
            <a href="<?php  echo $this->createWebUrl('category', array('op'=>'optimize'));?>" class="btn btn-primary" style="margin-right:10px;"><i class="fa fa-rocket"></i> 一键优化</a>
        </div>
    </div>
    <div class="category">
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body table-responsive">
					<div class="dd" id="div_nestable">
						<?php  if(is_array($category)) { foreach($category as $row) { ?>
						<ol class="dd-list" style="margin-bottom:15px;">
							<li class="dd-item">
								<button data-action="collapse" id="collapse<?php  echo $row['id'];?>" type="button" style="display:none;" onclick="collapse(<?php  echo $row['id'];?>);">Collapse</button>
								<?php  if(!empty($row['son'])) { ?>
								<button data-action="expand" id="expand<?php  echo $row['id'];?>"   type="button" style="display: block;" onclick="expand(<?php  echo $row['id'];?>);">Expand</button>
								<?php  } else { ?>
								<button data-action="collapse" type="button" style="display: block;">collapse</button>
								<?php  } ?>
								
								<div class="dd-handle" style="width:100%;background:#eff5e9;">
									<input type="text" class="form-control" name="category[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>" style="width: 70px;display:inline-block;">&nbsp;&nbsp;
									<img src="<?php  if(!empty($row['ico'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $row['ico'];?><?php  } else { ?><?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/nopic.png<?php  } ?>" width="30" height="30"> &nbsp;&nbsp;[ID: <?php  echo $row['id'];?>] <?php  echo $row['name'];?>
									<span class="pull-right">
										<?php  if($row['is_show']==1) { ?>
										<a href="<?php  echo $this->createWebUrl('category',array('op'=>'changeShow','type'=>'index','id'=>$row['id']));?>" class="btn btn-success btn-sm" style="padding:2px 10px;" title="点击隐藏分类">首页显示</a>
										<?php  } else { ?>
										<a href="<?php  echo $this->createWebUrl('category',array('op'=>'changeShow','type'=>'index','id'=>$row['id']));?>" class="btn btn-default btn-sm" style="padding:2px 10px;" title="点击显示分类">首页隐藏</a>
										<?php  } ?>
										&nbsp;&nbsp;
										<?php  if($row['search_show']==1) { ?>
										<a href="<?php  echo $this->createWebUrl('category',array('op'=>'changeShow','type'=>'search','id'=>$row['id']));?>" class="btn btn-success btn-sm" style="padding:2px 10px;" title="点击隐藏分类">隐藏分类</a>
										<?php  } else { ?>
										<a href="<?php  echo $this->createWebUrl('category',array('op'=>'changeShow','type'=>'search','id'=>$row['id']));?>" class="btn btn-default btn-sm" style="padding:2px 10px;" title="点击显示分类">显示分类</a>
										<?php  } ?>
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'parentid' => $row['id']))?>" title="添加"><i class="fa fa-plus"></i></a>
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $row['id']))?>" title="修改"><i class="fa fa-edit"></i></a>
										<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'delete', 'id' => $row['id']))?>" title="删除" onclick="return confirm('该操作不可恢复，确定删除？');return false;"><i class="fa fa-remove"></i></a>
									</span>
								</div>
								<?php  if(is_array($row['son'])) { foreach($row['son'] as $son) { ?>
								<ol class="dd-list cid<?php  echo $row['id'];?>" style="width:100%;display:none;">
									<li class="dd-item">
										<div class="dd-handle">
											<input type="text" class="form-control" name="son[<?php  echo $son['id'];?>]" value="<?php  echo $son['displayorder'];?>" style="width: 70px;display:inline-block;">&nbsp;&nbsp;
											<img src="<?php  if(!empty($son['ico'])) { ?><?php  echo $_W['attachurl'];?><?php  echo $son['ico'];?><?php  } else { ?><?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/nopic.png<?php  } ?>" width="30" height="30"> &nbsp;&nbsp;[ID: <?php  echo $son['id'];?>] <?php  echo $son['name'];?>
											<span class="pull-right">
												<?php  if($son['search_show']==1) { ?>
												<a href="<?php  echo $this->createWebUrl('category',array('op'=>'changeShow','type'=>'search','id'=>$son['id']));?>" class="btn btn-success btn-sm" style="padding:2px 10px;" title="点击隐藏分类">隐藏分类</a>
												<?php  } else { ?>
												<a href="<?php  echo $this->createWebUrl('category',array('op'=>'changeShow','type'=>'search','id'=>$son['id']));?>" class="btn btn-default btn-sm" style="padding:2px 10px;" title="点击显示分类">显示分类</a>
												<?php  } ?>
												<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $son['id']))?>" title="修改"><i class="fa fa-edit"></i></a>
												<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('category', array('op' => 'delete', 'id' => $son['id']))?>" title="删除" onclick="return confirm('该操作不可恢复，确定删除？');return false;"><i class="fa fa-remove"></i></a>
											</span>
										</div>
									</li>
								</ol>
								<?php  } } ?>
							</li>
						</ol>
						<?php  } } ?>
						<table class="table">
							 <tbody>
								 <tr>
									 <td>
										 <input name="submit" type="submit" class="btn btn-primary" value="批量排序">
										 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
									 </td>
								 </tr>
							 </tbody>
						</table>
					</div>
					<?php  echo $pager;?>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
function collapse(obj){
	$("#collapse"+obj).hide();
	$("#expand"+obj).show();
	$(".cid"+obj).hide();
}
function expand(obj){
	$("#expand"+obj).hide();
	$("#collapse"+obj).show();
	$(".cid"+obj).show();
}
</script>