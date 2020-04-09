<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-heading"> <h2>会员分组管理</h2> </div>

<form action="./index.php" method="get" class="form-horizontal form-search" role="form">
    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r"  value="member.group" />

    <div class="page-toolbar row m-b-sm m-t-sm">
        <div class="col-sm-4">

            <div class="input-group-btn">
                <button class="btn btn-default btn-sm"  type="button" data-toggle='refresh'><i class='fa fa-refresh'></i></button>

                <?php if(cv('member.group.delete')) { ?>	
                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('member/group/delete')?>"><i class='fa fa-trash'></i> 删除</button>
                <?php  } ?>

                <?php if(cv('member.group.add')) { ?>
                <a class='btn btn-primary btn-sm' data-toggle="ajaxModal" href="<?php  echo webUrl('member/group/add')?>"><i class='fa fa-plus'></i> 添加会员分组</a>
                <?php  } ?>
            </div> 
        </div>	


        <div class="col-sm-6 pull-right">

            <div class="input-group">				 
                <input type="text" class="input-sm form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词"> <span class="input-group-btn">

                    <button class="btn btn-sm btn-primary" type="submit"> 搜索</button> </span>
            </div>

        </div>
    </div>
</form>

<form action="" method="post" onsubmit="return formcheck(this)">


    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th style="width:25px;"><input type='checkbox' /></th>
                <th>分组名称</th>
                <th>会员数</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr <?php  if($row['id']=='default') { ?>style='background:#eee;<?php  if(!empty($_GPC['keyword'])) { ?>display:none;<?php  } ?>'<?php  } ?>>
                <td>
                	<?php  if($row['id']!='default') { ?>
                    	<input type='checkbox' value="<?php  echo $row['id'];?>"/>
                    <?php  } ?>
                </td>

                <td><?php  echo $row['groupname'];?></td>
                <td><?php  echo $row['membercount'];?></td>
                <td>
                	<?php if(cv('member.list')) { ?>
                    	<a class='btn btn-default  btn-sm' href="<?php  echo webUrl('member/list', array('groupid' => $row['id']))?>"><i class='fa fa-users'></i> 分组会员</a>
                    <?php  } ?>
                    <?php  if($row['id']!='default') { ?>
	                    <?php if(cv('member.group.edit')) { ?>
	                    	<a data-toggle="ajaxModal" href="<?php  echo webUrl('member/group/edit', array('id' => $row['id']))?>" class="btn btn-default btn-sm" ><i class='fa fa-edit'></i> 修改</a>
	                    <?php  } ?>
	
	                    <?php if(cv('member.group.delete')) { ?>
	                    	<a data-toggle='ajaxRemove' href="<?php  echo webUrl('member/group/delete', array('id' => $row['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除此会员分组吗?'><i class="fa fa-trash"></i> 删除</a>
	                    <?php  } ?>
                    <?php  } ?>


            </tr>
            <?php  } } ?>

        </tbody>
    </table>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>



<!--4000097827-->