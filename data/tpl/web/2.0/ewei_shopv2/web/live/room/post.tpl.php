<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
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
<div class="page-heading">
    <span class="pull-right">
        <a href="<?php  echo webUrl('live/room')?>" class="btn btn-default btn-sm">返回列表</a>
    </span>
    <h2><?php  if(empty($item)) { ?>添加<?php  } else { ?>编辑<?php  } ?>直播间</h2>
</div>
<form id="dataform" action="" method="post" class="form-horizontal form-validate">
    <input type='hidden' id='tab' name='tab' value="<?php  echo $_GPC['tab'];?>" />

    <ul class="nav nav-arrow-next nav-tabs" id="myTab">
        <li <?php  if($_GPC['tab']=='basic' || empty($_GPC['tab'])) { ?>class="active"<?php  } ?> ><a href="#tab_basic">直播间设置</a></li>
        <li <?php  if($_GPC['tab']=='introduce') { ?>class="active"<?php  } ?>><a href="#tab_introduce">直播间介绍</a></li>
        <!--<li <?php  if($_GPC['tab']=='discount') { ?>class="active"<?php  } ?>><a href="#tab_discount">优惠券/红包</a></li>-->
        <li <?php  if($_GPC['tab']=='share') { ?>class="active"<?php  } ?>><a href="#tab_share">分享设置</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane <?php  if($_GPC['tab']=='basic' || empty($_GPC['tab'])) { ?>active<?php  } ?>" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('live/room/basic', TEMPLATE_INCLUDEPATH)) : (include template('live/room/basic', TEMPLATE_INCLUDEPATH));?></div>
        <div class="tab-pane <?php  if($_GPC['tab']=='introduce') { ?>active<?php  } ?>" id="tab_introduce"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('live/room/introduce', TEMPLATE_INCLUDEPATH)) : (include template('live/room/introduce', TEMPLATE_INCLUDEPATH));?></div>
        <!--<div class="tab-pane <?php  if($_GPC['tab']=='discount') { ?>active<?php  } ?>" id="tab_discount"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('live/room/discount', TEMPLATE_INCLUDEPATH)) : (include template('live/room/discount', TEMPLATE_INCLUDEPATH));?></div>-->
        <div class="tab-pane <?php  if($_GPC['tab']=='share') { ?>active<?php  } ?>" id="tab_share"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('live/room/share', TEMPLATE_INCLUDEPATH)) : (include template('live/room/share', TEMPLATE_INCLUDEPATH));?></div>
    </div>

    <div class="form-group-title"></div>
    <div class="form-group"></div>
    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <?php if( ce('leve.room' ,$item) ) { ?>
            <input type="submit"  value="提交" class="btn btn-primary pull-right" />
            <?php  } ?>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(function () {
        $('#myTab a').off("click").on("click",function (e) {
            e.preventDefault();
            $('#myTab li').removeClass("active");
            $(this).parent("li").addClass("active");
            var href = $(this).attr('href');
            $(".tab-content .tab-pane").removeClass("active");
            $(""+href+"").addClass("active");
        });
        $("input[name='livetype']").off("click").on("click",function () {
            var livetype = $(this).val();
            $("select[name='liveidentity']").val('');
            $(".identity_livetype").hide();
            $(".identity_livetype"+livetype+"").show();
            if(livetype==0){
                $(".full_screen").hide();
                $(".salf_screen input[name='screen']").prop("checked","true");
            }else{
                $(".full_screen").show();
            };
            if(livetype==2){
                $(".live-url").hide();
                $(".live-video").show();
            }else{
                $(".live-url").show();
                $(".live-video").hide();
            }
        })
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>