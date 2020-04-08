<?php defined('IN_IA') or exit('Access Denied');?><link href="<?php echo MODULE_URL;?>template/web/style/fycommon.css?v=<?php  echo $versions;?>" rel="stylesheet">

<div class="main">
	<div class="alert alert-info">
	    上传多张背景图，手机端可切换显示的海报样式。 v2.8.6及早期版本可使用同步海报功能把以前的海报同步过来。 <a href="<?php  echo $this->createWebUrl('poster', array('op'=>'synPoster'));?>" class="label label-success" onclick="return confirm('请勿重复同步海报，确定此次同步操作?');return false;"><i class="fa fa-exchange"></i> 同步海报</a><br/><br/>
		<a href="<?php  echo $this->createWebUrl('poster', array('op'=>'edit'));?>" class="btn btn-primary"><i class="fa fa-plus"></i> 添加海报</a>
	</div>
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
					<th style="width:80px;">编号</th>
                    <th style="width:35%;">海报名称</th>
                    <th style="width:35%;">海报背景图</th>
                    <th style="width:15%;">添加时间</th>
                    <th style="width:10%;text-align:right;">操作</th>
                </tr>
                </thead>
                <tbody style="font-size: 13px;">
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <tr>
					<td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['poster_name'];?></td>
                    <td><a href="<?php  echo $_W['attachurl'];?><?php  echo $item['poster_bg'];?>" target="_blank"><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['poster_bg'];?>" width="40"></a></td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['addtime'])?></td>
                    <td style="text-align:right;">
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('poster', array('op'=>'edit', 'id'=>$item['id']))?>" title="编辑海报"><i class="fa fa-pencil"></i></a>
						<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('poster', array('op'=>'delete', 'id'=>$item['id']))?>" title="删除海报" onclick="return confirm('确认删除？');return false;"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
            <?php  echo $pager;?>
        </div>
    </div>
</div>
