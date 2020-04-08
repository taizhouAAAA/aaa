<?php defined('IN_IA') or exit('Access Denied');?><link rel="stylesheet" href="<?php echo MODULE_URL;?>template/web/style/Qiniu/main.css">
<link rel="stylesheet" href="<?php echo MODULE_URL;?>template/web/style/Qiniu/highlight.css">

<div class="main">
	<div class="alert alert-info">
	    音频请上传<span style="color:red;">mp3</span>格式文件，视频请上传<span style="color:red;">H.264编码的mp4</span>格式文件，否则部分ios系统手机将无法识别音视频格式。
	</div>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="demo" aria-labelledby="demo-tab">
			<div class="row" style="margin-top: 20px;">
				<input type="hidden" id="domain" value="<?php  echo $qiniu['url'];?>">
				<input type="hidden" id="uptoken_url" value="uptoken">
				<div class="col-md-12">
					<div id="container" style="position: relative;">
						<input type="file" id="pickfiles" class="btn btn-default" name="video">
					</div>
				</div>
				<div style="display:none" id="success" class="col-md-12">
					<div class="alert-success">
						队列全部文件处理完毕
					</div>
				</div>
				<div class="col-md-12 ">
					<table class="table table-striped table-hover text-left" style="margin-top:40px;display:none">
						<thead>
							<tr>
								<th class="col-md-4">文件名称</th>
								<th class="col-md-2">文件大小</th>
								<th class="col-md-6">上传详情</th>
							</tr>
						</thead>
						<tbody id="fsUploadProgress">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="code" aria-labelledby="code-tab">
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/moxie.js"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/plupload.full.min.js"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/zh_CN.js"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/ui.js?v=2"></script>
<?php  if($qiniu['qiniu_area']==1) { ?>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/qiniu_huadong.js"></script>
<?php  } else if($qiniu['qiniu_area']==2) { ?>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/qiniu_huabei.js"></script>
<?php  } else if($qiniu['qiniu_area']==3) { ?>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/qiniu_huanan.js"></script>
<?php  } else if($qiniu['qiniu_area']==4) { ?>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/qiniu_beimei.js"></script>
<?php  } ?>
<script type="text/javascript" src="<?php echo MODULE_URL;?>template/web/style/Qiniu/highlight.js"></script>
<script type="text/javascript">hljs.initHighlightingOnLoad();</script>
<script type="text/javascript">
$(function() {
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'pickfiles',
        container: 'container',
        drop_element: 'container',
        flash_swf_url: 'bower_components/plupload/js/Moxie.swf',
        dragdrop: true,
        chunk_size: '4mb',
		uptoken: "<?php  echo $token; ?>",
        multi_selection: !(mOxie.Env.OS.toLowerCase()==="ios"),
        filters : {
            max_file_size : "1024mb",
            prevent_duplicates: true,
            mime_types: [
                {title : "Audio files", extensions : "mp3"},
                {title : "Video files", extensions : "avi,mp4,wmv,rmvb,mov,mkv,flv"},
			]
        },
        domain: $('#domain').val(),
        get_new_uptoken: false,
        auto_start: true,
        log_level: 5,
        init: {
            'FilesAdded': function(up, files) {
                $('table').show();
                $('#success').hide();
                plupload.each(files, function(file) {
                    var progress = new FileProgress(file, 'fsUploadProgress');
                    progress.setStatus("等待...");
                    progress.bindUploadCancel(up);
                });
            },
            'BeforeUpload': function(up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                if (up.runtime === 'html5' && chunk_size) {
                    progress.setChunkProgess(chunk_size);
                }
            },
            'UploadProgress': function(up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                progress.setProgress(file.percent + "%", file.speed, chunk_size);
            },
            'UploadComplete': function() {
                $('#success').show();
            },
            'FileUploaded': function(up, file, info) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                progress.setComplete(up, info);
				
            },
			'Key': function(up, file) {
				var key = "admin/"+file.name;

				$.ajax({
					url:"<?php  echo $this->createWebUrl('video', array('op'=>'saveQiniuUrl')); ?>",
					data:{name:file.name, com_name:key, size:file.size},
					type:'post',
					dataType:'json',
					success:function(msg){
					}
				});

				return key;
			},
            'Error': function(up, err, errTip) {
                $('table').show();
                var progress = new FileProgress(err.file, 'fsUploadProgress');
                progress.setError();
                progress.setStatus(errTip);
            }
        }
    });

    uploader.bind('FileUploaded', function() {
    });
    $('#container').on(
        'dragenter',
        function(e) {
            e.preventDefault();
            $('#container').addClass('draging');
            e.stopPropagation();
        }
    ).on('drop', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragleave', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragover', function(e) {
        e.preventDefault();
        $('#container').addClass('draging');
        e.stopPropagation();
    });



    $('#show_code').on('click', function() {
        $('#myModal-code').modal();
        $('pre code').each(function(i, e) {
            hljs.highlightBlock(e);
        });
    });


    $('body').on('click', 'table button.btn', function() {
        $(this).parents('tr').next().toggle();
    });


    var getRotate = function(url) {
        if (!url) {
            return 0;
        }
        var arr = url.split('/');
        for (var i = 0, len = arr.length; i < len; i++) {
            if (arr[i] === 'rotate') {
                return parseInt(arr[i + 1], 10);
            }
        }
        return 0;
    };

    $('#myModal-img .modal-body-footer').find('a').on('click', function() {
        var img = $('#myModal-img').find('.modal-body img');
        var key = img.data('key');
        var oldUrl = img.attr('src');
        var originHeight = parseInt(img.data('h'), 10);
        var fopArr = [];
        var rotate = getRotate(oldUrl);
        if (!$(this).hasClass('no-disable-click')) {
            $(this).addClass('disabled').siblings().removeClass('disabled');
            if ($(this).data('imagemogr') !== 'no-rotate') {
                fopArr.push({
                    'fop': 'imageMogr2',
                    'auto-orient': true,
                    'strip': true,
                    'rotate': rotate,
                    'format': 'png'
                });
            }
        } else {
            $(this).siblings().removeClass('disabled');
            var imageMogr = $(this).data('imagemogr');
            if (imageMogr === 'left') {
                rotate = rotate - 90 < 0 ? rotate + 270 : rotate - 90;
            } else if (imageMogr === 'right') {
                rotate = rotate + 90 > 360 ? rotate - 270 : rotate + 90;
            }
            fopArr.push({
                'fop': 'imageMogr2',
                'auto-orient': true,
                'strip': true,
                'rotate': rotate,
                'format': 'png'
            });
        }

        $('#myModal-img .modal-body-footer').find('a.disabled').each(function() {

            var watermark = $(this).data('watermark');
            var imageView = $(this).data('imageview');
            var imageMogr = $(this).data('imagemogr');

            if (watermark) {
                fopArr.push({
                    fop: 'watermark',
                    mode: 1,
                    image: 'http://www.b1.qiniudn.com/images/logo-2.png',
                    dissolve: 100,
                    gravity: watermark,
                    dx: 100,
                    dy: 100
                });
            }

            if (imageView) {
                var height;
                switch (imageView) {
                    case 'large':
                        height = originHeight;
                        break;
                    case 'middle':
                        height = originHeight * 0.5;
                        break;
                    case 'small':
                        height = originHeight * 0.1;
                        break;
                    default:
                        height = originHeight;
                        break;
                }
                fopArr.push({
                    fop: 'imageView2',
                    mode: 3,
                    h: parseInt(height, 10),
                    q: 100,
                    format: 'png'
                });
            }

            if (imageMogr === 'no-rotate') {
                fopArr.push({
                    'fop': 'imageMogr2',
                    'auto-orient': true,
                    'strip': true,
                    'rotate': 0,
                    'format': 'png'
                });
            }
        });

        var newUrl = Qiniu.pipeline(fopArr, key);

        var newImg = new Image();
        img.attr('src', '<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/loading.gif');
        newImg.onload = function() {
            img.attr('src', newUrl);
            img.parent('a').attr('href', newUrl);
        };
        newImg.src = newUrl;
        return false;
    });

});
</script>