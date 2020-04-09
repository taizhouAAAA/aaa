<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .form-horizontal .form-group {
        margin-right: -50px;
    }

    .col-sm-9 {
        padding-right: 0;
    }

    .tm .btn {
        margin-bottom: 5px;
    }

    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        padding: 0;
        margin: 0;
        border: 0;
        text-overflow: clip;
    }
</style>

<div class="page-heading"> 
	
	<span class='pull-right'>
		<a class="btn btn-default  btn-sm" href="<?php  echo webUrl('sysset/payment')?>">返回列表</a>
	</span>
    <h2><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>支付信息
        <small><?php  if(!empty($item['id'])) { ?>修改【<?php  echo $item['title'];?>】<?php  } ?></small>
    </h2>
</div>

<div class="row">
    <div class="col-sm-12">
        <form <?php if( ce('sysset.payment' ,$list) ) { ?>action="" method="post"<?php  } ?> class="form-horizontal form-validate" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label must">支付名称</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('sysset.payment' ,$data) ) { ?>
                    <input type="text" name="title" class="form-control" value="<?php  echo $data['title'];?>" placeholder="方便选择与记忆的支付名称" data-rule-required='true'/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['title'];?></div>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label must">支付类型</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('sysset.payment' ,$data) ) { ?>
                    <select class="form-control tpl-category-parent" name="type" id="type">
                        <?php  if(is_array($payment)) { foreach($payment as $key => $val) { ?>
                        <option value="<?php  echo $key;?>" <?php  if($data['type']==$key) { ?>selected="true"<?php  } ?>><?php  echo $val;?></option>
                        <?php  } } ?>
                    </select>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $payment[$data['type']];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group hidden merch">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label must">服务商公众号(AppId)</label>
                <div class="col-sm-9">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="text" name="appid" class="form-control" value="<?php  echo $data['appid'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['appid'];?></div>
                    <?php  } ?>
                </div>
            </div>
    
            <div class="form-group hidden merch">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label must">服务商支付商户号(Mch_Id)</label>
                <div class="col-sm-9">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="text" name="mch_id" class="form-control" value="<?php  echo $data['mch_id'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['mch_id'];?></div>
                    <?php  } ?>
                </div>
            </div>
    
            <div class="form-group hidden wechat">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label must">公众号(AppId)</label>
                <div class="col-sm-9">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="text" name="sub_appid" class="form-control" value="<?php  echo $data['sub_appid'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['sub_appid_sub'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group hidden" id="sub_appsecret">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">应用密钥(AppSecret)</label>
                <div class="col-sm-9">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="text" name="sub_appsecret" class="form-control" value="<?php  echo $data['sub_appsecret'];?>"/>
                    <div class="help-block">只有借用支付公众号绑定了系统或者支付目录和授权站点都是本站的设定,才需要填写此项</div>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['sub_appsecret'];?></div>
                    <?php  } ?>
                </div>
            </div>
    
            <div class="form-group" >
                <label class="col-xs-12 col-sm-3 col-md-2 control-label must">支付商户号(Mch_Id)</label>
                <div class="col-sm-9">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="text" name="sub_mch_id" class="form-control" value="<?php  echo $data['sub_mch_id'];?>"/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['sub_mch_id'];?></div>
                    <?php  } ?>
                </div>
            </div>
    
            <div class="form-group" >
                <label class="col-xs-12 col-sm-3 col-md-2 control-label must">支付密钥(APIKEY)</label>
                <div class="col-sm-9">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="text" name="apikey" class="form-control" value="<?php  echo $data['apikey'];?>"/>
                    <div class="help-block">服务商的 APIKEY,并不是子商户的APIKEY</div>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $data['apikey_sub'];?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group hidden" id="is_raw">
                <label class="col-sm-2 control-label">是否原生支付</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <label class='radio radio-inline'>
                        <input type='radio' value='0' name='is_raw' <?php  if($data['is_raw']==0) { ?>checked<?php  } ?> /> 否
                    </label>
                    <label class='radio radio-inline'>
                        <input type='radio' value='1' name='is_raw'  <?php  if($data['is_raw']=='1') { ?>checked<?php  } ?> /> 是
                    </label>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  if($data['set_realname']==1) { ?>隐藏<?php  } else { ?>显示<?php  } ?></div>
                    <?php  } ?>
                </div>
            </div>

            <div class="form-group hidden cert">
                <label class="col-sm-2 control-label">CERT证书文件</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="file" name="cert_file" class="form-control" />
                    <span class="help-block">
                                        <?php  if(!empty($data['cert_file'])) { ?>
                                        <span class='label label-success'>已上传</span>
                                        <?php  } else { ?>
                                        <span class='label label-danger'>未上传</span>
                                        <?php  } ?>
                                        下载证书 cert.zip 中的 apiclient_cert.pem 文件</span>
                    <?php  } else { ?>
                    <?php  if(!empty($data['cert_file'])) { ?>
                    <span class='label label-success'>已上传</span>
                    <?php  } else { ?>
                    <span class='label label-danger'>未上传</span>
                    <?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group hidden cert">
                <label class="col-sm-2 control-label">KEY密钥文件</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="file" name="key_file" class="form-control" />
                    <span class="help-block">
                                       <?php  if(!empty($data['key_file'])) { ?>
                                        <span class='label label-success'>已上传</span>
                                        <?php  } else { ?>
                                        <span class='label label-danger'>未上传</span>
                                        <?php  } ?>
                                        下载证书 cert.zip 中的 apiclient_key.pem 文件
                                    </span>
                    <?php  } else { ?>
                    <?php  if(!empty($data['key_file'])) { ?>
                    <span class='label label-success'>已上传</span>
                    <?php  } else { ?>
                    <span class='label label-danger'>未上传</span>
                    <?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group hidden cert">
                <label class="col-sm-2 control-label">ROOT文件</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('sysset.payment.edit')) { ?>
                    <input type="file" name="root_file" class="form-control" />
                    <span class="help-block">
                                      <?php  if(!empty($data['root_file'])) { ?>
                                        <span class='label label-success'>已上传</span>
                                        <?php  } else { ?>
                                        <span class='label label-danger'>未上传</span>
                                        <?php  } ?>
                                        下载证书 cert.zip 中的 rootca.pem 文件
                                    </span>
                    <?php  } else { ?>
                    <?php  if(!empty($data['root_file'])) { ?>
                    <span class='label label-success'>已上传</span>
                    <?php  } else { ?>
                    <span class='label label-danger'>未上传</span>
                    <?php  } ?>
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-9 col-xs-12">
                    <?php if( ce('sysset.payment' ,$list) ) { ?>
                    <input type="submit" value="提交" class="btn btn-primary"/>
                    <?php  } ?>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    $(function () {
        var type = $("#type");
        type.change(function (e) {
            var $this = $(this);
            var cert = $(".cert");
            var merch = $(".merch");
            var wechat = $(".wechat");
            var is_raw = $("#is_raw");
            var sub_appsecret = $("#sub_appsecret");
            cert.addClass('hidden');
            merch.addClass('hidden');
            wechat.addClass('hidden');
            is_raw.addClass('hidden');
            sub_appsecret.addClass('hidden');
            switch ($this.val())
            {
                case '0':
                    cert.removeClass('hidden');
                    wechat.removeClass('hidden');
                    break;
                case '1':
                    merch.removeClass('hidden');
                    cert.removeClass('hidden');
                    wechat.removeClass('hidden');
                    break;
                case '2':
                    cert.removeClass('hidden');
                    wechat.removeClass('hidden');
                    sub_appsecret.removeClass('hidden');
                    break;
                case '3':
                    merch.removeClass('hidden');
                    cert.removeClass('hidden');
                    wechat.removeClass('hidden');
                    sub_appsecret.removeClass('hidden');
                    break;
                case '4':
                    is_raw.removeClass('hidden');
                    break;

            }
        });
        type.trigger('change');
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--OTEzNzAyMDIzNTAzMjQyOTE0-->