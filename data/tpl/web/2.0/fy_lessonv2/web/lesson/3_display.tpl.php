<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/fycommon.css" rel="stylesheet">
<div class="mloading-bar" style="margin-top: -31px; margin-left: -140px;"><img src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/download.gif"><span class="mloading-text">正在复制课程，请勿刷新或关闭浏览器...</span></div>
<div id="overlay"></div>

<div class="main">
	<div class="alert alert-info">
	    v3.3.7版本增加课程规格单独库存，如果您的课程各个规格库存总和于总库存不一致，请点击 <a href="<?php  echo $this->createWebUrl('lesson',array('op'=>'checkstock'));?>" class="label label-success">校准库存</a>
	</div>
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
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">课程类型</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="lesson_type" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($lessonTypeList)) { foreach($lessonTypeList as $key => $item) { ?>
							<option value="<?php  echo $key;?>" <?php  if($_GPC['lesson_type']=="$key") { ?>selected<?php  } ?>><?php  echo $item;?></option>
							<?php  } } ?>
                        </select>
                    </div>
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
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">课程板块 </label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="recid" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($rec_list)) { foreach($rec_list as $rec) { ?>
							   <option value="<?php  echo $rec['id'];?>" <?php  if($_GPC['recid']==$rec['id']) { ?>selected<?php  } ?>><?php  echo $rec['rec_name'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">VIP等级 </label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
                        <select name="vip_id" class="form-control">
                            <option value="">不限</option>
							<?php  if(is_array($vip_list)) { foreach($vip_list as $vip) { ?>
							   <option value="<?php  echo $vip['id'];?>" <?php  if($_GPC['vip_id']==$vip['id']) { ?>selected<?php  } ?>><?php  echo $vip['level_name'];?></option>
							<?php  } } ?>
                        </select>
                    </div>
					<div class="col-sm-3 col-lg-3">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>&nbsp;&nbsp;
						<a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'postlesson'));?>" class="btn btn-success"><i class="fa fa-plus"></i> 录播课程</a>
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
							<th style="width:60px;">全选</th>
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
							<td><input type="checkbox" name="ids[]" value="<?php  echo $parent['id'];?>" ></td>
							<td style="text-align:center;"><input type="text" class="form-control" name="lessonorder[<?php  echo $parent['id'];?>]" value="<?php  echo $parent['displayorder'];?>" style="width: 70px;display:inline-block;"></td>
							<td style="word-break:break-all;">[ID:<?php  echo $parent['id'];?>] <?php  if($parent['lesson_type']==3) { ?><img src="<?php echo MODULE_URL;?>template/mobile/default/images/icon-live.png" height="18"><?php  } ?><?php  echo $parent['bookname'];?></td>
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
										<?php  if($parent['lesson_type']!=3) { ?>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'postlesson', 'id'=>$parent['id'],'refurl'=>urlencode($_W['siteurl'])));?>"><i class="fa fa-edit"></i> 编辑课程</a></li>
										<?php  } else { ?>
										<li><a href="./index.php?c=site&a=entry&op=postlesson&id=<?php  echo $parent['id'];?>&do=lesson&m=fy_lessonv2_plugin_live&refurl=<?php  echo urlencode($_W['siteurl']);?>"><i class="fa fa-edit"></i> 编辑课程</a></li>
										<?php  } ?>

										<?php  if($parent['lesson_type']!=3) { ?>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'viewsection','pid'=>$parent['id']));?>"><i class="fa fa-plus"></i> &nbsp;章节管理</a></li>
										<?php  } ?>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'document','pid'=>$parent['id']));?>"><i class="fa fa-file-word-o"></i> 课件资料</a></li>
										<?php  if($parent['lesson_type']!=3) { ?>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'sectionTitle','pid'=>$parent['id']));?>"><i class="fa fa-list-ol"></i> 课程目录</a></li>
										<?php  } ?>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'qrcode','lessonid'=>$parent['id']));?>"><i class="fa fa-download"></i> 下载二维码</a></li>
										<?php  if($parent['lesson_type']!=3) { ?>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'copylesson','lessonid'=>$parent['id']));?>" onclick="showOverlay()"><i class="fa fa-copy"></i> 复制课程</a></li>
										<?php  } ?>
										
										<?php  if($parent['lesson_type']==3) { ?>
										<li><a href="./index.php?c=site&a=entry&op=transform&id=<?php  echo $parent['id'];?>&do=lesson&m=fy_lessonv2_plugin_live" onclick="return confirm('转为录播课后，您需要上传视频并发布章节，确认操作？');return false;"><i class="fa fa-exchange"></i> 转为录播课</a></li>
										<li><a href="./index.php?c=site&a=entry&op=destroyGroup&id=<?php  echo $parent['id'];?>&do=lesson&m=fy_lessonv2_plugin_live&refurl=<?php  echo urlencode($_W['siteurl']);?>"><i class="fa fa-recycle"></i> 重置聊天室</a></li>
										<?php  } ?>

										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'informStudent','lessonid'=>$parent['id']));?>"><i class="fa fa-volume-up"></i> &nbsp;开课提醒</a></li>
										<li><a href="<?php  echo $this->createWebUrl('lesson', array('op'=>'delete','pid'=>$parent['id']));?>" onclick="return confirm('确认删除此课程吗？');return false;"><i class="fa fa-remove"></i> &nbsp;删除课程</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php  } } ?>
					</tbody>
				</table>
				<table class="table">
					<tbody>
						<tr>
							<td>
								<input type="checkbox" id="selAll" style="margin-right:10px;">
								<a href="javascript:;" id="online" data-type="online" class="btn btn-success" style="margin-right:13px;">上架</a>
								<a href="javascript:;" id="offline" data-type="offline" class="btn btn-danger" style="margin-right:13px;">下架</a>
								<a href="javascript:;" id="setVIP" class="btn btn-info" style="margin-right:13px;">设置免费学习等级</a>
								<input name="submit" type="submit" class="btn btn-primary" value="批量排序">
								<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
								<input type="hidden" name="pid" value="<?php  echo $pid;?>">
							</td>
						</tr>
					</tbody>
				</table>
			 </div>
		 </div>
		 <?php  echo $pager;?>
	</form>

	<div class="modal fade in" id="vipStudy" tabindex="-1">
		<form id="form-refund" action="" class="form-horizontal form" method="post">
			<div class="we7-modal-dialog modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<div class="modal-title">批量设置VIP免费学习等级</div>
					</div>
					<div class="modal-body">
						<div class="we7-form">
							<div class="form-group">
								<label class="control-label col-sm-2" style="padding-top:0;">免费学习等级</label>
								<div class="form-controls col-sm-10">
									<?php  if(is_array($level_list)) { foreach($level_list as $item) { ?>
										<label><input type="checkbox" name="vipview[]" value="<?php  echo $item['id'];?>" style="display:inline-block;"><?php  echo $item['level_name'];?></label>&nbsp;&nbsp;
									<?php  } } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="submit-setvip">确定</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					</div>
				</div>
			</div>
		</form>
	</div>
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

	function showOverlay(){
		/* 显示遮罩层 */
		$("#overlay").height("100%");
		$("#overlay").width("100%");
		$("#overlay").fadeTo(200, 0.2);
		$(".mloading-bar").show();
	}

	var ids = document.getElementsByName("ids[]");
	var selectAll = false;
	$("#selAll").click(function(){
		selectAll = !selectAll;
		for(var i=0; i<ids.length; i++){
			ids[i].checked = selectAll;
		}
	});

	function checkStatus(){
		var checkids = "";
		for(var i=0; i<ids.length; i++){
			if(ids[i].checked){
				checkids += (checkids === '' ? ids[i].value : ',' + ids[i].value);
			}
		}
		if(checkids===''){
			alert('未选中任何课程');
			return false;
		}else{
			return checkids;
		}
	}

	var lessonids = '';
	$("#online,#offline").click(function(){
		lessonids = checkStatus();
		var request_type = $(this).data('type');
		if(request_type=='online'){
			var confirm_msg = '确认批量上架?';
		}else if(request_type=='offline'){
			var confirm_msg = '确认批量下架?';
		}

		if(lessonids && confirm(confirm_msg)){
			$.ajax({
				type: "POST",
				url: "<?php  echo $this->createWebUrl('lesson',array('op'=>'batchSetting'));?>",
				data: {lessonids:lessonids, type:request_type},
				dataType:"json",
				success: function(res){
					if(res.code===0){
						alert(res.msg);
						location.reload();
					}else{
						alert('网络繁忙，操作失败');
					}
				},
				error: function(error){
					alert('网络请求超时，请稍后重试!');
				}
			});
		}
	});

	$("#setVIP").click(function(){
		lessonids = checkStatus();
		if(lessonids){
			$('#vipStudy').modal();
		}
	});
	$("#submit-setvip").click(function(){
		var vipview = document.getElementsByName("vipview[]");
		var vips = "";
		for(var i=0; i<vipview.length; i++){
			if(vipview[i].checked){
				vips += (vips === '' ? vipview[i].value : ',' + vipview[i].value);
			}
		}
		
		if(vips===''){
			alert('未选中任何VIP等级');
			return false;
		}else{
			$.ajax({
				type: "POST",
				url: "<?php  echo $this->createWebUrl('lesson',array('op'=>'batchSetting','type'=>'setVIP'));?>",
				data: {lessonids:lessonids,vips:vips},
				dataType:"json",
				success: function(res){
					if(res.code===0){
						alert(res.msg);
						location.reload();
					}else{
						alert(res.msg);
						return false;
					}
				},
				error: function(error){
					alert('网络请求超时，请稍后重试!');
				}
			});
		}
			
	});
</script>