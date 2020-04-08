<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
.col-lg-3{width:22%;}
.m-r-5{
	margin-top: 4px;
    display: inline-block;
}
.descript {
	height: 52px;
    white-space: normal !important;
    overflow: hidden !important;
    text-overflow: inherit !important;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    word-break: break-all;
    word-wrap: break-word;
}
</style>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="fy_lessonv2" />
                <input type="hidden" name="do" value="comment" />
                <input type="hidden" name="op" value="display" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width:100px;">订单编号</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="ordersn" type="text" value="<?php  echo $_GPC['ordersn'];?>">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">课程名称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="bookname" type="text" value="<?php  echo $_GPC['bookname'];?>">
                    </div>
                </div>
                <div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">用户昵称</label>
                    <div class="col-sm-2 col-lg-3">
                        <input class="form-control" name="nickname" id="" type="text" value="<?php  echo $_GPC['nickname'];?>">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">回复状态</label>
                    <div class="col-sm-2 col-lg-3">
                        <select name="reply" class="form-control">
							<option value="">请选择...</option>
							<option value="0" <?php  if(in_array($_GPC['reply'], array('0'))) { ?>selected<?php  } ?>>未回复</option>
							<option value="1" <?php  if($_GPC['reply']==1) { ?>selected<?php  } ?>>已回复</option>
						</select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">审核状态</label>
                    <div class="col-sm-2 col-lg-3">
                        <select name="status" class="form-control">
							<option value="">请选择...</option>
							<option value="0" <?php  if(in_array($_GPC['status'], array('0'))) { ?>selected<?php  } ?>>待审核</option>
							<option value="1" <?php  if($_GPC['status']==1) { ?>selected<?php  } ?>>已审核</option>
							<option value="-1" <?php  if($_GPC['status']==-1) { ?>selected<?php  } ?>>审核未通过</option>
						</select>
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 100px;">评价结果</label>
                    <div class="col-sm-2 col-lg-3">
                        <select name="grade" class="form-control">
							<option value="">请选择...</option>
							<option value="1" <?php  if($_GPC['grade']==1) { ?>selected<?php  } ?>>好评</option>
							<option value="2" <?php  if($_GPC['grade']==2) { ?>selected<?php  } ?>>中评</option>
							<option value="3" <?php  if($_GPC['grade']==3) { ?>selected<?php  } ?>>差评</option>
						</select>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label" style="width: 100px;">评价日期</label>
                    <div class="col-sm-8 col-lg-3 col-xs-12">
						<?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
                    </div>
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">总数：<?php  echo $total;?></div>
        <div class="table-responsive panel-body">
            <table class="table table-hover" style="margin-bottom:20px;">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:15%;">订单遍号</th>
                    <th style="width:20%;">课程名称</th>
                    <th style="width:12%;text-align:center;">评价/回复</th>
					<th style="width:23%;">评价内容</th>
                    <th style="width:9%;text-align:center;">状态</th>
                    <th style="width:9%;">评价日期</th>
                    <th style="width:9%;text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
                    <td><?php echo $item['ordersn']?$item['ordersn']:'免费课程';?></td>
                    <td><?php  echo $item['bookname'];?></td>
                    <td align="center">
						<?php  if($item['grade']==1) { ?><span class="label" style="background-color:#FB5B5B;">好评</span>
						<?php  } else if($item['grade']==2) { ?><span class="label" style="background-color:#D99810;">中评</span>
						<?php  } else if($item['grade']==3) { ?><span class="label" style="background-color:#555555;">差评</span><?php  } ?>
						
						<?php  if(!empty($item['reply'])) { ?>
						<span class="label label-success m-r-5" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php  echo $item['reply'];?>">已回复</span>
						<?php  } else { ?>
						<span class="label label-default m-r-5">未回复</span>
						<?php  } ?>
                    </td>
					<td class="descript" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php  echo $item['content'];?>"><?php  echo $item['content'];?></td>
                    <td align="center">
                    	<?php  if($item['status']==-1) { ?>
						<span class="label label-default">未通过</span>
						<?php  } else if($item['status']==0) { ?>
						<span class="label label-primary">待审核</span>
						<?php  } else if($item['status']==1) { ?>
						<span class="label label-success">已审核</span>
						<?php  } ?>
                    </td>
                    <td><?php  echo date('Y-m-d', $item['addtime'])?></td>
                    <td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('comment', array('op'=>'reply', 'id'=>$item['id'],'refurl'=>urlencode($_W['siteurl'])))?>" data-toggle="tooltip" data-placement="bottom" data-original-title="查看"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('comment',array('op'=>'delete', 'id'=>$item['id'],'refurl'=>urlencode($_W['siteurl'])))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" data-toggle="tooltip" data-placement="bottom" data-original-title="删除"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>