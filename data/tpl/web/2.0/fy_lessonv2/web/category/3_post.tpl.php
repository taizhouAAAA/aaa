<?php defined('IN_IA') or exit('Access Denied');?><div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                分类信息
            </div>
            <div class="panel-body">
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">上级分类</label>
                    <?php  if($category) { ?>
					<div class="col-sm-9">
                        <select name="parentid" class="form-control">
							<option value="0" <?php  if(!$category['parentid']) { ?>selected<?php  } ?>>顶级分类</option>
							<?php  if(is_array($list)) { foreach($list as $item) { ?>
							<option value="<?php  echo $item['id'];?>" <?php  if($category['parentid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
						</select>
                    </div>
					<?php  } else { ?>
					<div class="col-sm-9">
                        <select name="parentid" class="form-control">
							<option value="0" <?php  if(!$_GPC['parentid']) { ?>selected<?php  } ?>>顶级分类</option>
							<?php  if(is_array($list)) { foreach($list as $item) { ?>
							<option value="<?php  echo $item['id'];?>" <?php  if($_GPC['parentid']==$item['id']) { ?>selected<?php  } ?>><?php  echo $item['name'];?></option>
							<?php  } } ?>
						</select>
                    </div>
					<?php  } ?>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="catename" class="form-control" value="<?php  echo $category['name'];?>" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类图标</label>
                    <div class="col-sm-9">
                        <?php  echo tpl_form_field_image('ico', $category['ico']);?>
						<span>建议尺寸200px * 200px</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义链接</label>
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">手机端</span>
							<input type="text" name="link" value="<?php  echo $category['link'];?>" class="form-control">
							<span class="input-group-addon">PC端</span>
							<input type="text" name="link_pc" value="<?php  echo $category['link_pc'];?>" class="form-control">
						</div>
						<span class="help-block">如需设置自定义链接，请输入http://或https://开头</span>
					</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页显示</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="is_show" value="1" <?php  if($category['is_show']==1) { ?>checked<?php  } ?> /> 显示</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="is_show" value="0" <?php  if($category['is_show']==0) { ?>checked<?php  } ?> /> 隐藏</label>
                        <span class="help-block">首页仅显示一级分类，该选项仅针对一级分类有效</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否推荐</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="is_hot" value="1" <?php  if($category['is_hot']==1) { ?>checked<?php  } ?> /> 推荐</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="is_hot" value="0" <?php  if($category['is_hot']==0) { ?>checked<?php  } ?> /> 不推荐</label>
                        <span class="help-block"><strong></strong>推荐的分类会显示在手机端全部分类页面的推荐分类里面。</span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类状态</label>
                    <div class="col-sm-9">
                        <label class="radio-inline"><input type="radio" name="search_show" value="1" <?php  if($category['search_show']==1) { ?>checked<?php  } ?> /> 显示</label>
                        &nbsp;
                        <label class="radio-inline"><input type="radio" name="search_show" value="0" <?php  if($category['search_show']==0) { ?>checked<?php  } ?> /> 隐藏</label>
                    </div>
                </div>
				<?php  if($category['id']) { ?>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类链接(手机端)</label>
                    <div class="col-sm-9">
                        <div style="padding-top:8px;font-size: 14px;"><a href="javascript:;" id="copy-btn"><?php  echo $_W['siteroot'];?>app/<?php  echo str_replace("./", "", $this->createMobileUrl('search', array('cat_id'=>$category['id'])));?></a></div>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类链接(PC端)</label>
                    <div class="col-sm-9">
                        <div style="padding-top:8px;font-size: 14px;">
							<a href="javascript:;" id="copy-pc-btn">
							<?php  if($category['parentid']) { ?>
								<?php  echo $setting_pc['site_root'];?><?php  echo $uniacid;?>/search.html?pid=<?php  echo $category['parentid'];?>&cid=<?php  echo $category['id'];?>
							<?php  } else { ?>
								<?php  echo $setting_pc['site_root'];?><?php  echo $uniacid;?>/search.html?pid=<?php  echo $category['id'];?>
							<?php  } ?>
							</a>
                    </div>
                </div>
				<?php  } ?>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="保存" class="btn btn-primary col-lg-1" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="id" value="<?php  echo $id;?>" />
        </div>
	</form>
</div>
<script type="text/javascript">
require(['jquery', 'util'], function($, util){
	$(function(){
		util.clip($("#copy-btn")[0], $("#copy-btn").text());
		util.clip($("#copy-pc-btn")[0], $("#copy-pc-btn").text());
	});
});
</script>