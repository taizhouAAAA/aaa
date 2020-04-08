<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/fycommon.css" rel="stylesheet">
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="article" />
                <input type="hidden" name="op" value="display" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">标题/作者</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="keyword" type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">文章分类</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="cate_id" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($category_list)) { foreach($category_list as $item) { ?>
							<option value="<?php  echo $item['id'];?>" <?php  if($_GPC['cate_id'] == $item['id']) { ?> selected="selected"<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">文章属性</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="attribute" class="form-control">
                            <option value="">不限</option>
							<option value="commend" <?php  if($_GPC['attribute'] == 'commend') { ?> selected="selected"<?php  } ?>>首页推荐</option>
							<option value="is_vip" <?php  if($_GPC['attribute'] == 'is_vip') { ?>selected="selected"<?php  } ?>>仅VIP可见</option>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">文章状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="isshow" class="form-control">
                            <option value="">不限</option>
							<option value="1" <?php  if($_GPC['isshow'] == 1) { ?> selected="selected"<?php  } ?>>上架</option>
							<option value="0" <?php  if($_GPC['isshow'] == '0') { ?>selected="selected"<?php  } ?>>下架</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">发布时间</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
						<?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
					
                    <div class="col-sm-3 col-lg-3" style="width: 18%;">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;&nbsp;
						<a href="<?php  echo $this->createWebUrl('article', array('op'=>'post'));?>" class="btn btn-success"><i class="fa fa-plus"></i> 添加文章</a>
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
						<th style="width:100px;">ID</th>
						<th style="width:30%;">标题</th>
						<th style="width:10%;">分类</th>
						<th style="width:8%;">属性</th>
						<th style="width:8%;">状态</th>
						<th style="width:8%;">排序</th>
						<th style="width:8%;">阅读量</th>
						<th style="width:15%;">发布时间</th>
						<th style="text-align:right;">操作</th>
					</tr>
                </thead>
                <tbody>
					<?php  if(is_array($list)) { foreach($list as $item) { ?>
					<tr>
						<td><?php  echo $item['id'];?></td>
						<td><?php  echo $item['title'];?></td>
						<td><?php  echo $catename_list[$item['cate_id']];?></td>
						<td>
							<?php  if($item['commend']) { ?>
								<span class="label label-success">首页推荐</span>
							<?php  } ?>
							<?php  if($item['is_vip']) { ?>
								<span class="label label-warning" style="display:inline-block; margin-top:5px;">仅VIP可见</span>
							<?php  } ?>
						</td>
						<td>
							<?php  if($item['isshow']==1) { ?>
							<span class="label label-success">上架</span>
							<?php  } else { ?>
							<span class="label label-default">下架</span>
							<?php  } ?>
						</td>
						<td><?php  echo $item['displayorder'];?></td>
						<td><?php  echo $item['view'];?></td>
						<td><?php  echo date('Y-m-d H:i', $item['addtime']);?></td>
						<td style="text-align:right;">
							<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('article', array('op'=>'post','aid'=>$item['id'],'refurl'=>urlencode($_W['siteurl'])))?>" data-toggle="tooltip" data-placement="bottom" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
							<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('article', array('op'=>'delete','aid'=>$item['id'],'refurl'=>urlencode($_W['siteurl'])))?>" data-toggle="tooltip" data-placement="bottom" data-original-title="删除" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="fa fa-times"></i></a>
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