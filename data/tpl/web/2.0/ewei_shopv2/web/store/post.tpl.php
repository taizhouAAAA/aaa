<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<script type="text/javascript" src="../addons/ewei_shopv2/static/js/dist/area/cascade.js"></script>
<style>
    .checkbox-inline{
        display: block;
    }    .btns a i{
             display: inline-block;
             width: 100%;
             height: 20px;
             background: #f95959;
         }
    .btn-color {
        width: 25px;
        height: 25px;
        border: 1px solid #fff;
        margin: 2px;
        padding: 0;
    }

</style>
<div class="page-heading">
	<span class='pull-right'>
		<?php if(cv('store.add')) { ?>
        <a class="btn btn-primary btn-sm" href="<?php  echo webUrl('store/add')?>">添加新门店</a>
		<?php  } ?>
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('store')?>">返回列表</a>
        <!--<a class='btn btn-warning btn-sm' data-toggle='popover' href="javascript:;" data-placement='bottom' data-html='true'-->
           <!--data-content="如模板详情为: <br/><br/> {{first.DATA}}<br/>-->
                                    <!--订单金额：{{keyword1.DATA}}<br/>-->
                                    <!--商品详情：{{keyword2.DATA}}<br/>-->
                                    <!--收货信息：{{keyword3.DATA}}<br/>-->
                                    <!--{{remark.DATA}}<br/><br/>-->

                                    <!--<b>头部标题</b>：{{keyword1.DATA}}<br/>-->
                                    <!--<b>键名</b>：keyword1/keyword2 <br/><b>键值</b>： 您要设置的模板项的值<br/>-->
                                    <!--<b>尾部描述</b>：{{remark.DATA}}<br/>-->
                                    <!--">-->
                    <!--<i class='fa fa-question-circle'></i> 简易帮助-->
                <!--</a>-->
	</span>
    <h2><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>门店
        <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['storename'];?>】<?php  } ?></small>
    </h2>
</div>

<form <?php if( ce('store' ,$item) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>"/>

<div class="tabs-container">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#tab_basic">基本设置</a></li>
        <?php  if(p('newstore')) { ?>
        <li><a href="#tab_style">样式设置</a></li>
        <li><a href="#tab_power">权限设置</a></li>
        <?php  } ?>
        <li><a href="#tab_print">打印设置</a></li>
    </ul>
    <div class="tab-content ">
        <div class="tab-pane  active" id="tab_basic">

            <div class="form-group">
                <label class="col-sm-2 control-label must">门店名称</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <input type="text" name="storename" class="form-control" value="<?php  echo $item['storename'];?>"
                           data-rule-required="true"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $item['storename'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">门店LOGO</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <?php  echo tpl_form_field_image('logo',$item['logo'])?>
                    <?php  } else { ?>
                    <?php  if(!empty($item['logo'])) { ?>
                    <a href='<?php  echo tomedia($item[' logo'])?>' target='_blank'>
                    <img src="<?php  echo tomedia($item['logo'])?>" style='width:100px;border:1px solid #ccc;padding:1px'/>
                    </a>
                    <?php  } ?>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">省市区 </label>
                <div class="col-sm-9 col-xs-12">
                    <p>
                        <select id="sel-provance" name="province" onChange="selectCity();" class="select form-control select-group" style="width:123px;display:inline;">
                            <option value="" selected="true">省/直辖市</option>
                        </select>
                        <select id="sel-city" name="city" onChange="selectcounty(0)" class="select form-control select-group" style="width:135px;display:inline;">
                            <option value="" selected="true">请选择</option>
                        </select>
                        <select id="sel-area" name="area" onChange="selectstreet(0)" class="select form-control select-group" style="width:130px;display:inline;">
                            <option value="" selected="true">请选择</option>
                        </select>

                        <?php  if(!empty($new_area) && !empty($address_street)) { ?>
                        <select id="sel-street" name="street" class="select form-control select-group" style="width:220px;display:none;margin-top: 10px;">
                            <option value="" selected="true">请选择</option>
                        </select>
                        <?php  } ?>
                    </p>

                    <input type="hidden" name="chose_province_code" id="chose_province_code" value="<?php  echo $item['provincecode'];?>" />
                    <input type="hidden" name="chose_city_code" id="chose_city_code" value="<?php  echo $item['citycode'];?>" />
                    <input type="hidden" name="chose_area_code" id="chose_area_code" value="<?php  echo $item['areacode'];?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">门店位置</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <?php  echo tpl_form_field_position('map',array('lng'=>$item['lng'],'lat'=>$item['lat']))?>
                    <?php  } else { ?>
                    <div class='form-control-static'>lng=<?php  echo $item['lng'];?>,lat=<?php  echo $item['lat'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label must">门店地址</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <input type="text" name="address" id="address_label" class="form-control" value="<?php  echo $item['address'];?>" data-rule-required="true"  />
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $item['address'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label must">门店电话</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <input type="text" name="tel" class="form-control" value="<?php  echo $item['tel'];?>" data-rule-required="true"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $item['tel'];?></div>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">营业时间</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <input type="text" name="saletime" class="form-control" value="<?php  echo $item['saletime'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $item['saletime'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">门店简介</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <textarea name="desc" class="form-control richtext" cols="70"><?php  echo $item['desc'];?></textarea>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $item['desc'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">门店支持</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('store' ,$item) ) { ?>
                    <label class='radio-inline'>
                        <input type='radio' name='type' value='1' <?php  if($item['type']==1) { ?>checked<?php  } ?> /> 支持自提
                    </label>

                    <label class='radio-inline'>
                        <input type='radio' name='type' value='2' <?php  if($item['type']==2) { ?>checked<?php  } ?> /> 支持核销
                    </label>

                    <label class='radio-inline'>
                        <input type='radio' name='type' value='3' <?php  if($item['type']==3) { ?>checked<?php  } ?> /> 支持自提+核销
                    </label>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  if($item['type']==1) { ?>支持自提<?php  } else if($item['type']==2) { ?>支持核销<?php  } else if($item['type']==3) { ?>支持自提+核销<?php  } ?>
                    </div>
                    <?php  } ?>
                    <div class="help-block">该门店是否支持商城订单自提或线下核销</div>
                </div>

            </div>

            <div class="form-group">
            <label class="col-sm-2 control-label">联系人信息</label>
            <div class="col-sm-10 col-xs-12">
                <?php if( ce('store' ,$item) ) { ?>
                <label class="radio-inline" style="float: left;padding-left:0px;">姓名</label>
                <div class="col-sm-9 col-xs-12" style="width: 120px; float: left; margin: 0px 20px 0px -5px;">
                    <input type="text" value="<?php  echo $item['realname'];?>" class="form-control" name="realname"
                           style="width:120px;padding:5px;">
                </div>
                <label class="radio-inline" style="float: left;">电话</label>
                <div class="col-sm-9 col-xs-12" style="width: 120px; float: left; margin: 0px 20px 0px -5px;">
                    <input type="text" value="<?php  echo $item['mobile'];?>" class="form-control" name="mobile"
                           style="width:120px;padding:5px;">
                </div>
                <?php  } else { ?>
                <div class='form-control-static'>姓名:<?php  echo $item['realname'];?> 电话:<?php  echo $item['mobile'];?></div>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('store' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='status' value=1' <?php  if($item['status']==1) { ?>checked<?php  } ?> /> 启用
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='status' value=0' <?php  if($item['status']==0) { ?>checked<?php  } ?> /> 禁用
                </label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if($item['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></div>
                <?php  } ?>
            </div>
        </div>
    </div>


    <div class="tab-pane  " id="tab_style">
        <?php  if(p('newstore')) { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">门店标签</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('store' ,$item) ) { ?>

                <div class='label-items'>
                    <?php  if(is_array($label)) { foreach($label as $ite) { ?>
                        <?php  if($ite!='') { ?>
                            <div class="input-group recharge-item" style="width:300px;margin-top:5px">
                                <span class="input-group-addon">内容</span>
                                <input type="text" class="form-control" name='lab[]' maxlength="20"  style="width:200px;" value="<?php  echo $ite;?>" />
                                <div class='input-group-btn'>
                                    <button class='btn btn-danger' type='button' onclick="removeLabelItem(this)"><i class='fa fa-remove'></i></button>
                                </div>
                            </div>
                        <?php  } ?>
                    <?php  } } ?>
                </div>


                <div style="margin-top:5px">
                    <button type='button' class="btn btn-default" onclick='addLabelItem()' style="margin-bottom:5px"><i class='fa fa-plus'></i> 增加标签项</button>
                </div>
                <span class="help-block">显示在店铺详情和列表页的标识文字, 最多添加8个,每个标签长度不能超过20个字符</span>

                <?php  } else { ?>
                <div class='label-items'>
                    <?php  if(is_array($label)) { foreach($label as $ite) { ?>
                        <?php  if($ite!='') { ?>
                            <div class="input-group recharge-item" style="width:300px;margin-top:5px">
                                <span class="input-group-addon">内容</span>
                                <div class='form-control-static'></div>
                            </div>
                        <?php  } ?>
                    <?php  } } ?>
                </div>
                <?php  } ?>
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">门店角标</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('store' ,$item) ) { ?>

                <div class='tag-items'>
                    <?php  if(is_array($tag)) { foreach($tag as $ite) { ?>
                        <?php  if($ite!='') { ?>
                            <div class="input-group recharge-item" style="width:300px;margin-top:5px">
                                <span class="input-group-addon">内容</span>
                                <input type="text" class="form-control" name='tag[]' maxlength="20"  style="width:200px;" value="<?php  echo $ite;?>" />
                                <div class='input-group-btn'>
                                    <button class='btn btn-danger' type='button' onclick="removeTagItem(this)"><i class='fa fa-remove'></i></button>
                                </div>
                            </div>
                        <?php  } ?>
                    <?php  } } ?>
                </div>


                <div style="margin-top:5px">
                    <button type='button' class="btn btn-default" onclick='addTagItem()' style="margin-bottom:5px"><i class='fa fa-plus'></i> 增加角标项</button>
                </div>
                <span class="help-block">显示在店铺详情和列表页的标识文字, 最多添加3个,每个角标长度不能超过3个字符</span>

                <?php  } else { ?>
                <div class='label-items'>
                    <?php  if(is_array($tag)) { foreach($tag as $ite) { ?>
                        <?php  if($ite!='') { ?>
                            <div class="input-group recharge-item" style="width:300px;margin-top:5px">
                                <span class="input-group-addon">内容</span>
                                <div class='form-control-static'></div>
                            </div>
                        <?php  } ?>
                    <?php  } } ?>
                </div>
                <?php  } ?>
            </div>
        </div>
    </div>


    <div class="tab-pane" id="tab_power">
        <?php  if(p('newstore')) { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">门店分类</label>
            <div class="col-sm-9 col-xs-12">
                <select name="classify" id="" class="form-control">
                    <?php  if(is_array($category)) { foreach($category as $k => $v) { ?>
                    <option value="<?php  echo $v['id'];?>"><?php  echo $v['name'];?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>
        <?php  } ?>

        <div class="form-group">
            <label class="col-sm-2 control-label">权限管理</label>
            <div class="col-sm-9 col-xs-12">
                <div class="col-sm-10">
                    <label class="checkbox-inline" >
                        <input type="checkbox" name="perms[]" value="storeinfo" <?php  if(in_array('storeinfo',$perms)) { ?> checked<?php  } ?>>  门店基本信息编辑</label>
                    <label class="checkbox-inline"  >
                        <input type="checkbox" name="perms[]" value="saler" <?php  if(in_array('saler',$perms)) { ?> checked<?php  } ?>>  店员管理</label>
                    <!--     <label class="checkbox-inline">
                             <input type="checkbox" name="perms[]" value="sale" <?php  if(in_array('sale',$perms)) { ?> checked<?php  } ?>>  营销管理</label>-->
                    <label class="checkbox-inline">
                        <input type="checkbox" name="perms[]" value="stock"  <?php  if(in_array('stock',$perms)) { ?> checked<?php  } ?>>  商品库存管理</label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="perms[]" value="delete" <?php  if(in_array('delete',$perms)) { ?> checked<?php  } ?> >  商品上架下架</label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="perms[]" value="norder" <?php  if(in_array('norder',$perms)) { ?> checked<?php  } ?>>  预约商品管理</label>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label class="col-sm-2 control-label">门店发货</label>
            <div class="col-sm-9 col-xs-12">
                <?php if( ce('store' ,$item) ) { ?>
                <label class='radio-inline'>
                    <input type='radio' name='opensend' value=1' <?php  if($item['opensend']==1) { ?>checked<?php  } ?> /> 允许
                </label>
                <label class='radio-inline'>
                    <input type='radio' name='opensend' value=0' <?php  if($item['opensend']==0) { ?>checked<?php  } ?> /> 禁止
                </label>
                <?php  } else { ?>
                <div class='form-control-static'><?php  if($item['opensend']==1) { ?>允许<?php  } else { ?>禁止<?php  } ?></div>
                <?php  } ?>
                <div class="help-block">在连锁门店中创建的订单是否允许门店自行发货</div>
            </div>
        </div>
        <?php  } ?>
    </div>

    <div class="tab-pane  " id="tab_print">
        <?php  if($printer) { ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">选择订单打印机</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('sysset.printer.set')) { ?>
                <?php  echo tpl_selector('order_printer',array(
                         'preview'=>true,
                'readonly'=>true,
                'nokeywords'=>true,
                'multi'=>1,
                'value'=>$item['title'],
                'url'=>webUrl('sysset/printer/printer_query'),
                'items'=>$order_printer_array,
                'buttontext'=>'选择订单打印机',
                'placeholder'=>'请选择订单打印机')
                )?>
                <?php  } else { ?>
                <div class="input-group multi-img-details container ui-sortable">
                    <?php  if(is_array($order_printer_array)) { foreach($order_printer_array as $it) { ?>
                    <div data-name="goodsid" data-id="<?php  echo $it['id'];?>" class="multi-item">
                        <img src="<?php  echo tomedia($it['thumb'])?>" class="img-responsive img-thumbnail">
                        <div class="img-nickname"><?php  echo $it['title'];?></div>
                    </div>
                    <?php  } } ?>
                </div>

                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">选择订单打印模板</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('sysset.printer.set')) { ?>
                <select class='form-control' name='order_template'>
                    <option>选择您需要的订单打印模板</option>
                    <?php  if(is_array($order_template)) { foreach($order_template as $value) { ?>
                    <option value="<?php  echo $value['id'];?>" <?php  if($value['id']==$item['order_template']) { ?>selected<?php  } ?>><?php  echo $value['title'];?></option>
                    <?php  } } ?>
                </select>
                <?php  } else { ?>
                <div class='form-control-static'>
                    <?php  if(empty($item['order_template'])) { ?>选择您需要的订单打印模板<?php  } else { ?><?php  echo $item['order_template'];?><?php  } ?>
                </div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">订单打印方式</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('sysset.notice.edit')) { ?>
                <label class="checkbox-inline">
                    <input type="checkbox" value="1" name='ordertype[]' <?php  if(in_array('1',$ordertype)) { ?>checked<?php  } ?> /> 下单打印
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="2" name='ordertype[]' <?php  if(in_array('2',$ordertype)) { ?>checked<?php  } ?> /> 付款打印
                </label>
                <label class="checkbox-inline">
                    <input type="checkbox" value="3" name='ordertype[]' <?php  if(in_array('3',$ordertype)) { ?>checked<?php  } ?> /> 确认收货打印
                </label>
                <div class="help-block">通知商家方式</div>
                <?php  } else { ?>
                <input type="hidden" name="data[ordertype]" value="<?php  echo $data['ordertype'];?>"/>
                <div class='form-control-static'><?php  if(in_array('1',$ordertype)) { ?>下单打印;<?php  } ?>
                    <?php  if(in_array('2',$ordertype)) { ?>付款打印;<?php  } ?><?php  if(in_array('3',$ordertype)) { ?>确认收货打印;<?php  } ?>
                </div>
                <?php  } ?>
            </div>
        </div>
        <?php  } ?>
    </div>
</div>

<div class="form-group"></div>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <?php if( ce('store' ,$item) ) { ?>
        <input type="submit" value="提交" class="btn btn-primary"/>
        <?php  } ?>
        <!-- <input type="button" name="back" onclick='history.back()' <?php if(cv('store.add|store.edit')) { ?>style='margin-left:10px;'<?php  } ?> value="返回列表" class="btn btn-default" />-->
    </div>
</div>
</form>

<script language='javascript'>
    $(function () {
        $(':radio[name=type]').click(function () {
            type = $("input[name='type']:checked").val();

            if (type == '1' || type == '3') {
                $('#pick_info').show();
            } else {
                $('#pick_info').hide();
            }
        })
    })

    require(['bootstrap'], function () {
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    });

    //添加标签
    function addLabelItem(){
        if($('.label-items').children('.input-group').length<8)
        {
            var html= '<div class="input-group recharge-item"  style="width:300px;margin-top:5px">';
            html+='<span class="input-group-addon">内容</span>';
            html+='<input type="text" class="form-control"  style="width:200px;" maxlength="20" name="lab[]"  />';
            html+='<div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="removeLabelItem(this)"><i class="fa fa-remove"></i></button></div></div>';

            $('.label-items').append(html);
        }else{
            tip.msgbox.err("标签最多八个!");
        }
    }

    //添加角标
    function addTagItem(){
        if($('.tag-items').children('.recharge-item').length<3)
        {
            var html= '<div class="input-group recharge-item"  style="width:300px;margin-top:5px">';
            html+='<span class="input-group-addon">内容</span>';
            html+='<input type="text" class="form-control"  style="width:200px;" maxlength="3" name="tag[]"  />';
            html+='<div class="input-group-btn"><button class="btn btn-danger" type="button" onclick="removeTagItem(this)"><i class="fa fa-remove"></i></button></div></div>';

            $('.tag-items').append(html);
        }else{
            tip.msgbox.err("角标最多三个!");
        }
    }

    //删除标签
    function removeLabelItem(obj){
        $(obj).closest('.recharge-item').remove();
    }
    //删除角标
    function removeTagItem(obj){
        $(obj).closest('.recharge-item').remove();
    }

    cascdeInit("<?php  echo $new_area?>","<?php  echo $address_street?>","<?php echo isset($item['province'])?$item['province']:''?>","<?php echo isset($item['city'])?$item['city']:''?>","<?php echo isset($item['area'])?$item['area']:''?>","''");
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--4000097827-->