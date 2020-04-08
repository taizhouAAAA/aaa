<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    <?php  if(empty($item['livetype'])) { ?>
    .identity_livetype0{display: block;}
    .identity_livetype1{display: none;}
    .identity_livetype2{display: none;}
    .full_screen{display: none;}
    <?php  } ?>
    <?php  if($item['livetype']==1) { ?>
    .identity_livetype0{display: none;}
    .identity_livetype1{display: block;}
    .identity_livetype2{display: none;}
    <?php  } ?>
    <?php  if($item['livetype']==2) { ?>
    .identity_livetype0{display: none;}
    .identity_livetype1{display: none;}
    .identity_livetype2{display: block;}
    <?php  } ?>
</style>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <input type='number' class='form-control' name='displayorder' value="<?php  echo $item['displayorder'];?>"/>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['displayorder'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label must">直播间名称</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <input type='text' class='form-control' id="goodsname" name='title' value="<?php  echo $item['title'];?>" id="title" data-rule-required='true' data-msg-required='请设置标题'/>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['title'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label must">直播间分类</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <select class='form-control' name='category' data-rule-required='true' data-msg-required='请选择分类'>
                    <option value=''>请选择商品分类</option>
                    <?php  if(is_array($category)) { foreach($category as $cate) { ?>
                    <option value='<?php  echo $cate['id'];?>' <?php  if($item['category']==$cate['id']) { ?>selected<?php  } ?>><?php  echo $cate['name'];?></option>
                    <?php  } } ?>
                </select>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $item['displayorder'];?></div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">直播平台类型</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <label class="radio-inline"><input type="radio" name='livetype' value="0" <?php  if(empty($item['livetype'])) { ?>checked<?php  } ?> /> 智能摄像头</label>
                <label class="radio-inline"><input type="radio" name='livetype' value="1" <?php  if($item['livetype']==1) { ?>checked<?php  } ?> /> 第三方直播平台</label>
                <label class="radio-inline"><input type="radio" name='livetype' value="2" <?php  if($item['livetype']==2) { ?>checked<?php  } ?> /> 行业解决方案</label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['livetype'])) { ?>智能摄像头<?php  } else if($item['livetype']==1) { ?>第三方直播平台<?php  } else if($item['livetype']==2) { ?>行业解决方案<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">直播显示方式</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <label class="radio-inline salf_screen"><input type="radio" name="screen" value="0" <?php  if(empty($item['screen']) ||  empty($item['livetype'])) { ?>checked<?php  } ?> /> 半屏</label>
                <label class="radio-inline full_screen"><input type="radio" name="screen" value="1" <?php  if($item['screen']==1) { ?>checked<?php  } ?> /> 全屏</label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['screen'])) { ?>半屏<?php  } else if($item['screen']==1) { ?>全屏<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label must">直播平台</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <select class='form-control' name='liveidentity' data-rule-required='true' data-msg-required='请直播平台'>
                    <option value=''>请选择直播平台</option>
                    <?php  if(is_array($liveidentity)) { foreach($liveidentity as $row) { ?>
                    <option value="<?php  echo $row['identity'];?>" class="identity_livetype identity_livetype<?php  echo $row['type'];?>" <?php  if($item['liveidentity']==$row['identity']) { ?>selected<?php  } ?>><?php  echo $row['name'];?></option>
                    <?php  } } ?>
                </select>
                <?php  } else { ?>
                <div class='form-control-static'>
                    <?php  if(is_array($liveidentity)) { foreach($liveidentity as $row) { ?>
                        <?php  if($item['liveidentity']==$row['identity']) { ?><?php  echo $row['name'];?><?php  } ?>
                    <?php  } } ?>
                </div>
                <?php  } ?>
            </div>
        </div>

<div class="form-group live-url" <?php  if($item['livetype']==2) { ?>style="display: none;"<?php  } ?>>
    <label class="col-sm-2 control-label must">直播地址</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('leve.room' ,$item) ) { ?>
        <div class="input-group">
            <input type='url' class='form-control' name='url' readonly="true" value="<?php  echo $item['url'];?>" />
            <a data-toggle="ajaxModal" href="<?php  echo webUrl('live/get')?>" class="input-group-addon">视频抓取</a>
        </div>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['url'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group live-video" <?php  if($item['livetype']!=2) { ?>style="display: none;"<?php  } ?>>
    <label class="col-sm-2 control-label must">视频流</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('leve.room' ,$item) ) { ?>
            <input type='url' class='form-control' name='video' value="<?php  echo $item['video'];?>" />
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $item['video'];?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">封面类型</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('leve.room' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name='covertype' value="0" <?php  if(empty($item['covertype'])) { ?>checked<?php  } ?> /> 自动抓取直播封面</label>
        <label class="radio-inline"><input type="radio" name='covertype' value="1" <?php  if($item['covertype']==1) { ?>checked<?php  } ?> /> 自定义封面</label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['covertype'])) { ?>自动抓取直播封面<?php  } else if($item['covertype']==1) { ?>自定义封面<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group coverthumb" <?php  if($item['covertype']==1) { ?>style="display: none"<?php  } ?>>
    <label class="col-sm-2 control-label">直播间封面</label>
    <div class="col-sm-9 col-xs-12 thumb-container gimgs">
        <?php if( ce('leve.room' ,$item) ) { ?>
        <?php  echo tpl_form_field_image('thumb',$item['thumb'])?>
        <span class='help-block text-info'>直播开始前将显示您上传的直播间封面，直播开始后，系统将自动抓取直播平台的图片并替换直播间已上传的封面</span>
        <?php  } else { ?>
        <?php  if(!empty($item['thumb'])) { ?>
        <a href='<?php  echo tomedia($item['thumb'])?>' target='_blank'>
        <img src="<?php  echo tomedia($item['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px'/>
        </a>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
<div class="form-group cover" style="<?php  if(empty($item['covertype'])) { ?>display: none<?php  } ?>">
    <label class="col-sm-2 control-label">自定义封面</label>
    <div class="col-sm-9 col-xs-12 thumb-container gimgs">
        <?php if( ce('leve.room' ,$item) ) { ?>
        <?php  echo tpl_form_field_image('cover',$item['cover'])?>
        <span class='help-block text-info'>您上传的图片将作为直播封面显示，您可手动上传修改直播间封面</span>
        <?php  } else { ?>
        <?php  if(!empty($item['cover'])) { ?>
        <a href='<?php  echo tomedia($item['cover'])?>' target='_blank'>
        <img src="<?php  echo tomedia($item['cover'])?>" style='width:100px;border:1px solid #ccc;padding:1px'/>
        </a>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
        <div class="form-group">
            <label class="col-sm-2 control-label">直播商品</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <div>
                    <?php  echo tpl_selector_new('goodsid',array('preview'=>true,
                    'readonly'=>true,
                    'multi'=>1,
                    'type'=>'live',
                    'value'=>$goods['title'],
                    'url'=>webUrl('live/room/query'),
                    'optionurl'=>'live.room.hasoption',
                    'items'=>$goods,
                    'nokeywords'=>1,
                    'autosearch'=>1,
                    'buttontext'=>'直播商品',
                    'placeholder'=>'请选择商品')
                    )
                    ?>
                </div>
                <span class='help-block'>提示：直播商品可在直播中显示，且观看直播的用户可在直播中自由购买已添加的商品。</span>
                <?php  } else { ?>
                <?php  if(!empty($goods)) { ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th style='width:80px;'>商品名称</th>
                        <th style='width:220px;'></th>
                        <th>直播金额</th>
                    </tr>
                    </thead>
                    <tbody id="param-items" class="ui-sortable">
                    <?php  if(is_array($goods)) { foreach($goods as $row) { ?>
                    <tr class="multi-product-item" data-id="<?php  echo $row['goodsid'];?>">
                        <input type="hidden" class="form-control img-textname" readonly="" value="<?php  echo $row['title'];?>">
                        <input type="hidden" value="<?php  echo $row['goodsid'];?>" name="goodsid[]">
                        <td style="width:80px;">
                            <img src="<?php  echo tomedia($row['thumb'])?>" style="width:70px;border:1px solid #ccc;padding:1px">
                        </td>
                        <td style="width:220px;"><?php  echo $row['title'];?></td>
                        <td><a class="btn btn-default btn-sm" data-toggle="ajaxModal"
                               href="<?php  echo webUrl('live/room/hasoption',array('goodsid'=>$row['goodsid'],'id'=>$row['id']))?>" id="optiontitle<?php  echo $row['goodsid'];?>">&yen;<?php  echo $goods['liveprice'];?></a>
                            <input type="hidden" id="livegoods<?php  echo $row['goodsid'];?>" value="" name="livegoods[<?php  echo $row['goodsid'];?>]">
                            <input type="hidden" value="<?php  echo $row['liveprice'];?>" name="liveprice<?php  echo $goods['goodsid'];?>">
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
                <?php  } else { ?>
                暂无商品
                <?php  } ?>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group presell_info">
            <label class="col-sm-2 control-label">直播时间</label>
            <div class="col-sm-6 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <div class="input-group">
                    <span class="input-group-addon">
                        开播时间
                    </span>
                    <?php echo tpl_form_field_date('livetime', !empty($item['livetime']) ? date('Y-m-d H:i',$item['livetime']) : date('Y-m-d H:i'),true)?>
                </div>
                <span class='help-block'>直播时间，只用于前台显示，具体直播时间以操作台【开始直播】为准</span>
                <?php  } else { ?>
                <div class='form-control-static'>
                    <?php  if($item['ispresell']==1) { ?> <?php  echo date('Y-m-d H:i',$item['preselltimestart'])?> - <?php  echo date('Y-m-d H:i',$item['preselltimeend'])?> <?php  } ?>
                </div>
                <?php  } ?>
            </div>
        </div>
<div class="form-group">
    <label class="col-sm-2 control-label">推荐</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('leve.room' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name='recommend' value="1" <?php  if($item['recommend']==1) { ?>checked<?php  } ?> /> 是</label>
        <label class="radio-inline"><input type="radio" name='recommend' value="0" <?php  if(empty($item['recommend'])) { ?>checked<?php  } ?> /> 否</label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['recommend'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">热门</label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('leve.room' ,$item) ) { ?>
        <label class="radio-inline"><input type="radio" name='hot' value="1" <?php  if($item['hot']==1) { ?>checked<?php  } ?> /> 是</label>
        <label class="radio-inline"><input type="radio" name='hot' value="0" <?php  if(empty($item['hot'])) { ?>checked<?php  } ?> /> 否</label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(empty($item['hot'])) { ?>否<?php  } else { ?>是<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('leve.room' ,$item) ) { ?>
                <label class="radio-inline"><input type="radio" name='status' value="1" <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 显示</label>
                <label class="radio-inline"><input type="radio" name='status' value="0" <?php  if(empty($item['status'])) { ?>checked<?php  } ?> /> 关闭</label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if(empty($item['status'])) { ?>关闭<?php  } else { ?>开启<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>



<script type="text/javascript">
    $(function () {
        /*$("input[name='livetype']").off("click").on("click",function () {
            var livetype = $(this).val();
            $("select[name='liveidentity']").val('');
            $(".identity_livetype").hide();
            $(".identity_livetype"+livetype+"").show();
            if(livetype==0){
                $(".full_screen").hide();
                $(".salf_screen input[name='screen']").prop("checked","true");
            }else{
                $(".full_screen").show();
            }
            /!*if(livetype==2){
                $(".live-url").hide();
                $(".live-video").show();
            }else{
                $(".live-url").show();
                $(".live-video").hide();
            }*!/
        });*/
        $("input[name=covertype]").off("click").on("click",function () {
           var value = parseInt($(this).val());
           if(value==1){
               $(".coverthumb").hide();
               $(".cover").show();
           }else{
               $(".coverthumb").show();
               $(".cover").hide();
           }
        });
    })
</script>