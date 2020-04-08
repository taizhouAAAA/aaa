<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="lesson" />
                <input type="hidden" name="op" value="display" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">课程名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="bookname" id="" type="text" value="<?php  echo $_GPC['bookname'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">讲师名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="teacher" id="" type="text" value="<?php  echo $_GPC['teacher'];?>">
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">课程分类</label>
                    <div class="col-sm-3">
                        <select name="pid" class="form-control" id="category_parent" onchange="renderCategory(this.value)">
                            <option value="">请选择一级分类</option>
							<?php  if(is_array($category)) { foreach($category as $cat) { ?>
							   <option value="<?php  echo $cat['id'];?>"><?php  echo $cat['name'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
					<div class="col-sm-3">
                        <select name="cid" class="form-control" id="category_child">
                            <option value="">请选择二级分类</option>
                        </select>
                    </div>
                </div>
				<?php  if(($lesson_attribute['attribute1'] && $attribute1) || ($lesson_attribute['attribute2'] && $attribute2)) { ?>
				<div class="form-group">
					<?php  if($lesson_attribute['attribute1'] && $attribute1) { ?>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;"><?php  echo $lesson_attribute['attribute1'];?></label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="attribute1" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($attribute1)) { foreach($attribute1 as $item) { ?>
							<option value="<?php  echo $item['id'];?>" <?php  if($_GPC['attribute1']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
					<?php  } ?>
					<?php  if($lesson_attribute['attribute2'] && $attribute2) { ?>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;"><?php  echo $lesson_attribute['attribute2'];?></label>
					<div class="col-sm-8 col-lg-3 col-xs-12">
						<select name="attribute2" class="form-control">
							<option value="">不限</option>
							<?php  if(is_array($attribute2)) { foreach($attribute2 as $key => $item) { ?>
							<option value="<?php  echo $item['id'];?>" <?php  if($_GPC['attribute2']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
						</select>
					</div>
					<?php  } ?>
				</div>
				<?php  } ?>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">课程状态</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="status" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($lessonStatusList)) { foreach($lessonStatusList as $key => $item) { ?>
							<option value="<?php  echo $key;?>" <?php  if($_GPC['status']=="$key") { ?>selected<?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
							<option value="999" <?php  if($_GPC['status']==999) { ?>selected<?php  } ?>>库存紧张</option>
                        </select>
                    </div>
					<div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;
						<a href="./index.php?c=site&a=entry&op=postlesson&do=lesson&m=fy_lessonv2" class="btn btn-success"><i class="fa fa-plus"></i> 录播课</a>&nbsp;&nbsp;
						<a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'postlesson'));?>" class="btn btn-success"><i class="fa fa-plus"></i> 直播课</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<form class="form-horizontal form" action="" method="post">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-hover">
					<thead class="navbar-inner">
						<tr>
							<th style="width:8%;text-align:center;">排序</th>
							<th style="width:25%;">课程名称</th>
							<th style="width:8%;text-align:center;">课程分类</th>
							<th style="width:8%;text-align:center;">价格</th>
							<th style="width:8%;text-align:center;">销量/库存</th>
							<th style="width:8%;text-align:center;">总访问量</th>
							<th style="width:12%;text-align:center;">vip/讲师服务访问量</th>
							<th style="width:8%;text-align:center;">课程状态</th>
							<th style="text-align:center;">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($list)) { foreach($list as $parent) { ?>
						<tr>
							<td style="text-align:center;"><input type="text" class="form-control" name="lessonorder[<?php  echo $parent['id'];?>]" value="<?php  echo $parent['displayorder'];?>" style="width: 70px;display:inline-block;"></td>
							<td style="word-break:break-all;">[ID:<?php  echo $parent['id'];?>] <?php  echo $parent['bookname'];?></td>
							<td style="text-align:center;"><?php  echo $parent['category']['name'];?></td>
							<td style="text-align:center;"><?php  echo $parent['price'];?></td>
							<td style="text-align:center;"><?php  echo $parent['buynum'];?>/<?php  echo $parent['stock'];?></td>
							<td style="text-align:center;"><?php  echo $parent['visit_number'];?></td>
							<td style="text-align:center;"><?php  echo $parent['vip_number'];?>/<?php  echo $parent['teacher_number'];?></td>
							<td style="text-align:center;">
								<span class="label <?php  if($parent['status']==-1 || $parent['status']==0 || $parent['status']==3) { ?>label-default<?php  } else if($parent['status']==1) { ?>label-success<?php  } else if($parent['status']==2 ) { ?>label-danger<?php  } ?>"><?php  echo $lessonStatusList[$parent['status']];?></span>
								<br/>
								<?php  if($parent['section_status']==1) { ?>
									<span class="label label-success" style="margin-top:5px; display:inline-block;">更新中</span>
								<?php  } else if($parent['section_status']==0) { ?>
									<span class="label label-default" style="margin-top:5px; display:inline-block;">已完结</span>
								<?php  } ?>
							</td>
							<td style="text-align:center;">
								<div class="btn-group btn-group-sm">
									<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="javascript:;">功能列表 <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-menu-left" role="menu" style="z-index:99999">
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'postlesson', 'id'=>$parent['id'],'refurl'=>urlencode($_W['siteurl'])));?>"><i class="fa fa-edit"></i> 编辑课程</a></li>
										<li><a href="./index.php?c=site&a=entry&op=document&pid=<?php  echo $parent['id'];?>&do=lesson&m=fy_lessonv2" target="_blank"><i class="fa fa-file-word-o"></i> 课件资料</a></li>
										<li><a href="./index.php?c=site&a=entry&op=qrcode&lessonid=<?php  echo $parent['id'];?>&do=lesson&m=fy_lessonv2" target="_blank"><i class="fa fa-download"></i> 下载二维码</a></li>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'transform', 'id'=>$parent['id']));?>" onclick="return confirm('转为录播课后，您需要上传视频并发布章节，确认操作？');return false;"><i class="fa fa-exchange"></i> 转为录播课</a></li>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'destroyGroup','id'=>$parent['id'],'refurl'=>urlencode($_W['siteurl'])));?>"><i class="fa fa-recycle"></i> 重置聊天室</a></li>
										<li><a href="./index.php?c=site&a=entry&op=informStudent&lessonid=<?php  echo $parent['id'];?>&do=lesson&m=fy_lessonv2" target="_blank"><i class="fa fa-volume-up"></i> &nbsp;开课提醒</a></li>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'delete','pid'=>$parent['id']));?>" onclick="return confirm('确认删除此课程吗？');return false;"><i class="fa fa-remove"></i> &nbsp;删除课程</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php  } } ?>
					</tbody>
				</table>
			 </div>
		 </div>
		 <?php  echo $pager;?>
	</form>
</div>

<script type="text/javascript">
	var category = <?php  echo json_encode($category);?>;
	var pid = <?php echo $_GPC['pid']?$_GPC['pid']:0?>;
	var html = '<option value="0">请选择一级分类</option>';
	$(function(){
		$("#category_parent").find("option[value='"+pid+"']").attr("selected",true);
		document.getElementById("category_parent").onchange();
	});

	function renderCategory(id){
		var chtml = '<option value="0">请选择二级分类</option>';
		var cid = <?php echo $_GPC['cid']?$_GPC['cid']:0?>;
		for(var i in category){
			if(category[i].id==id){
				var child = category[i].child;
				for(var j in child){
					if(child[j].id==cid){
						chtml += '<option value="' + child[j].id+'" selected>' + child[j].name + '</option>';
					}else{
						chtml += '<option value="' + child[j].id+'">' + child[j].name + '</option>';
					}
				}
				$("#category_child").html(chtml);
			}
		}
	}
</script>