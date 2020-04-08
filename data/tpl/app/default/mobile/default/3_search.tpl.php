<?php defined('IN_IA') or exit('Access Denied');?><!-- 
 * 微课堂首页
 * ============================================================================
 * 版权所有 2015-2018 微课堂团队，并保留所有权利。
 * 网站地址: https://www.fylesson.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件，未购买授权用户无论是否用于商业行为都是侵权行为！
 * 允许已购买用户对程序代码进行修改并在授权域名下使用，但是不允许对程序代码以
 * 任何形式任何目的进行二次发售，作者将依法保留追究法律责任的权力和最终解释权。
 * ============================================================================
-->
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_headerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_headerv2', TEMPLATE_INCLUDEPATH));?>

<?php  if($op=='display') { ?>
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/search.css?v=<?php  echo $versions;?>" rel="stylesheet" />

<!-- 顶部搜索框 -->
<div class="fix_grid_96">
	<div class="fix_grid">
		<div class="search_grid">
			<div class="search flex0">
				<i class="icon_search flex_g0"></i>
				<input type="text" name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="<?php echo $index_page['searchBox'] ? $index_page['searchBox'] : '搜索您感兴趣的中藥';?>">
				<button class="search-btn">搜索</button>
			</div>
		</div>

		<div class="list_menu_grid flex0_1">
			<div class="list_menu flex-al1 flex9" onclick="showsort()">
				<span><?php  echo $sortname;?></span><i class="icon_down"></i>
			</div>
			<div class="list_menu flex-al1 flex9" onclick="showcategory()">
				<span><?php  echo $catname;?></span><i class="icon_down"></i>
			</div>
			<?php  if($lesson_attribute['attribute1']) { ?>
			<div class="list_menu flex-al1 flex9" onclick="showattribute1()">
				<span><?php  echo $attr1_name;?></span><i class="icon_down"></i>
			</div>
			<?php  } ?>
			<?php  if($lesson_attribute['attribute2']) { ?>
			<div class="list_menu flex-al1 flex9" onclick="showattribute2()">
				<span><?php  echo $attr2_name;?></span><i class="icon_down"></i>
			</div>
			<?php  } ?>
		</div>
	</div>
</div>
<!-- /顶部搜索框 -->

<!-- 筛选条件 -->
<div class="sort_list_grid sort_list hidden">
	<a href="<?php  echo $this->createMobileUrl('search')?>" <?php  if(!$_GPC['sort']) { ?>class="curr"<?php  } ?>>综合排序</a>
	<a href="<?php  echo $this->createMobileUrl('search', array('sort'=>'free'))?>&keyword=<?php  echo $keyword;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr1=<?php  echo $attr1;?>&attr2=<?php  echo $attr2;?>" <?php  if($_GPC['sort']=='free') { ?>class="curr"<?php  } ?>>免费课程</a>
	<a href="<?php  echo $this->createMobileUrl('search', array('sort'=>'price'))?>&keyword=<?php  echo $keyword;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr1=<?php  echo $attr1;?>&attr2=<?php  echo $attr2;?>" <?php  if($_GPC['sort']=='price') { ?>class="curr"<?php  } ?>>价格优先</a>
	<a href="<?php  echo $this->createMobileUrl('search', array('sort'=>'hot'))?>&keyword=<?php  echo $keyword;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr1=<?php  echo $attr1;?>&attr2=<?php  echo $attr2;?>" <?php  if($_GPC['sort']=='hot') { ?>class="curr"<?php  } ?>>人气优先</a>
	<a href="<?php  echo $this->createMobileUrl('search', array('sort'=>'score'))?>&keyword=<?php  echo $keyword;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr1=<?php  echo $attr1;?>&attr2=<?php  echo $attr2;?>" <?php  if($_GPC['sort']=='score') { ?>class="curr"<?php  } ?>>好评优先</a>
</div>
<!-- /筛选条件 -->

<!-- 课程分类 -->
<div class="nav hidden" data-active="cate">
	<div class="nav_panel nav_panel-cate">
		<!-- 顶级分类 -->
		<ul class="nav_menu nav_panel_cate_mt">
			<a href="javascript:;">
				<li class="nav_menu_item <?php  if(!$_GPC['pid']) { ?>nav_menu_item_selected<?php  } ?>"><img class="nav_menu_item-icon" src="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/images/ico-allcategory.png">推荐分类</li>
			</a>
			<?php  if(is_array($categorylist)) { foreach($categorylist as $key => $parent) { ?>
			<a href="javascript:;">
				<li class="nav_menu_item <?php  if($_GPC['pid']==$parent['id']) { ?>nav_menu_item_selected<?php  } ?>"><img class="nav_menu_item-icon" src="<?php  echo $_W['attachurl'];?><?php  echo $parent['ico'];?>"><?php  echo $parent['name'];?></li>
			</a>
			<?php  } } ?>
		</ul>

		<!-- 推荐二级分类 -->
		<ul class="nav_menu nav_panel-cate_st" <?php  if(!$_GPC['pid']) { ?>style="display:block;"<?php  } ?>">
			<a href="<?php  echo $this->createMobileUrl('search')?>&keyword=<?php  echo $keyword;?>&sort=<?php  echo $sort;?>&attr1=<?php  echo $attr1;?>&attr2=<?php  echo $attr2;?>">
				<li class="nav_menu_item <?php  if(!$_GPC['cat_id']) { ?>nav_menu_item_selected<?php  } ?>"><img class="nav_menu_item-icon" src="<?php  echo $all_category_ico;?>">全部</li>
			</a>
			<?php  if(is_array($hot_category)) { foreach($hot_category as $hot) { ?>
			<a href="<?php echo $hot['link'] ? $hot['link'] : $this->createMobileUrl('search', array('cat_id'=>$hot['id']))?>&keyword=<?php  echo $keyword;?>&sort=<?php  echo $sort;?>&attr1=<?php  echo $attr1;?>&attr2=<?php  echo $attr2;?>">
				<li class="nav_menu_item <?php  if(!$_GPC['pid'] && ($_GPC['cat_id']==$hot['id'])) { ?>nav_menu_item_selected<?php  } ?>"><img class="nav_menu_item-icon" src="<?php  echo $_W['attachurl'];?><?php  echo $hot['ico'];?>"><?php  echo $hot['name'];?></li>
			</a>
			<?php  } } ?>
		</ul>
		<!-- 二级分类 -->
		<?php  if(is_array($categorylist)) { foreach($categorylist as $category) { ?>
			<ul class="nav_menu nav_panel-cate_st" <?php  if($_GPC['pid']==$category['id']) { ?>style="display:block;"<?php  } ?>>
				<a href="<?php echo $category['link'] ? $category['link'] : $this->createMobileUrl('search', array('cat_id'=>$category['id'],'pid'=>$category['id'])).'&keyword='.$keyword.'&sort='.$sort.'&attr1='.$attr1.'&attr2='.$attr2;?>">
					<li class="nav_menu_item <?php  if(($_GPC['pid']==$_GPC['cat_id']) && ($_GPC['cat_id']==$category['id'])) { ?>nav_menu_item_selected<?php  } ?>"><img class="nav_menu_item-icon" src="<?php  echo $_W['attachurl'];?><?php  echo $category['ico'];?>"><?php  echo $category['name'];?></li>
				</a>
				<?php  if(is_array($category['child'])) { foreach($category['child'] as $child) { ?>
				<a href="<?php echo $child['link'] ? $child['link'] : $this->createMobileUrl('search', array('cat_id'=>$child['id'],'pid'=>$child['parentid'])).'&keyword='.$keyword.'&sort='.$sort.'&attr1='.$attr1.'&attr2='.$attr2;?>">
					<li class="nav_menu_item <?php  if($_GPC['cat_id']==$child['id']) { ?>nav_menu_item_selected<?php  } ?>"><img class="nav_menu_item-icon" src="<?php  echo $_W['attachurl'];?><?php  echo $child['ico'];?>"><?php  echo $child['name'];?></li>
				</a>
				<?php  } } ?>
			</ul>
		<?php  } } ?>
	</div>
</div>
<!-- /课程分类 -->

<!-- 课程属性 -->
<?php  if($lesson_attribute['attribute1']) { ?>
<div class="sort_list_grid attribute1 hidden">
	<a href="<?php  echo $this->createMobileUrl('search')?>&keyword=<?php  echo $keyword;?>&sort=<?php  echo $sort;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr2=<?php  echo $attr2;?>" <?php  if(!$_GPC['attr1']) { ?>class="curr"<?php  } ?>>不限</a>
	<?php  if(is_array($attribute1)) { foreach($attribute1 as $item) { ?>
	<a href="<?php  echo $this->createMobileUrl('search', array('attr1'=>$item['id']))?>&keyword=<?php  echo $keyword;?>&sort=<?php  echo $sort;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr2=<?php  echo $attr2;?>" <?php  if($_GPC['attr1']==$item['id']) { ?>class="curr"<?php  } ?>><?php  echo $item['name'];?></a>
	<?php  } } ?>
</div>
<?php  } ?>
<?php  if($lesson_attribute['attribute2']) { ?>
<div class="sort_list_grid attribute2 hidden">
	<a href="<?php  echo $this->createMobileUrl('search')?>&keyword=<?php  echo $keyword;?>&sort=<?php  echo $sort;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr1=<?php  echo $attr1;?>" <?php  if(!$_GPC['attr2']) { ?>class="curr"<?php  } ?>>不限</a>
	<?php  if(is_array($attribute2)) { foreach($attribute2 as $item) { ?>
	<a href="<?php  echo $this->createMobileUrl('search', array('attr2'=>$item['id']))?>&keyword=<?php  echo $keyword;?>&sort=<?php  echo $sort;?>&cat_id=<?php  echo $cat_id;?>&pid=<?php  echo $pid;?>&attr1=<?php  echo $attr1;?>" <?php  if($_GPC['attr2']==$item['id']) { ?>class="curr"<?php  } ?>><?php  echo $item['name'];?></a>
	<?php  } } ?>
</div>
<?php  } ?>
<!-- /课程属性 -->
<div class="mark hidden"></div>

<!-- 课程列表 -->
<div class="section">
	<?php  if($total) { ?>
		<div class="list_grid" id="lesson-list">
		</div>
		<div id="loading_div" class="loading_div" style="padding:15px 0 30px 0;">
			<a href="javascript:void(0);" id="btn_Page"><i class="fa fa-arrow-circle-down"></i> 加载更多</a>
		</div>
	<?php  } else { ?>
		<div class="my_empty">
			<div class="empty_bd  my_course_empty">
				<h3>没有找到任何课程~</h3>
				<p><a href="<?php  echo $this->createMobileUrl('index', array('t'=>1));?>">去首页看看...</a></p>
			</div>
		</div>
	<?php  } ?>
</div>
<!-- /课程列表 -->

<div id="loadingToast">
	<div class="weui-mask_transparent"></div>
	<div class="weui-toast">
		<i class="weui-loading weui-icon_toast"></i>
		<p class="weui-toast__content">加载数据中</p>
	</div>
</div>

<script type="text/javascript">
/* 搜索 */
$(".search-btn").click(function() {
	var keywords = $.trim($("input[name=keyword]").val());
    if (keywords == '') {
        searchUrl = "<?php  echo $this->createMobileUrl('search');?>";
    } else {
        searchUrl = searchUrl = "<?php  echo $this->createMobileUrl('search');?>&keyword=" + encodeURIComponent(keywords);
    }
    document.location.href = searchUrl;
    return false;
});

/* 综合排序 */
function showsort() {
	closeCondition();
	$(".sort_list").removeClass("hidden");
	$(".mark").removeClass("hidden");
}

/* 课程分类 */
function showcategory(){
	closeCondition();
	$(".nav").removeClass("hidden");
	$(".mark").removeClass("hidden");
}
$(".nav_panel_cate_mt").on("click", 'a', function() {
	var $currItem = $(this),
	index = $currItem.index();

	$(".nav_panel_cate_mt a li").removeClass('nav_menu_item_selected');	
	$currItem.addClass('nav_menu_item_selected').siblings().removeClass('nav_menu_item_selected');
	$(".nav_panel-cate_st").hide().eq(index).show();
});

/* 课程属性 */
function showattribute1() {
	closeCondition();
	$(".attribute1").removeClass("hidden");
	$(".mark").removeClass("hidden");
}

function showattribute2() {
	closeCondition();
	$(".attribute2").removeClass("hidden");
	$(".mark").removeClass("hidden");
}

/* 关闭所有选项 */
$(".mark, .sort_list_grid").click(function(){
	closeCondition();
})
function closeCondition() {
  $(".sort_list_grid").addClass("hidden");
  $(".nav").addClass("hidden");
  $(".attribute1").addClass("hidden");
  $(".attribute2").addClass("hidden");
  $(".mark").addClass("hidden");
}
</script>

<script type="text/javascript">
var uniacid = "<?php  echo $uniacid;?>";
//首页检索跳转过来的清掉缓存
var clear = "<?php  echo intval($_GPC['clear']);?>";
if(clear==1){
	localStorage.removeItem('lesson_back_'+uniacid);
}

var localStorage = window.localStorage;
var ajaxUrl   = "<?php  echo $_W['siteUrl'];?>";
var attachUrl = "<?php  echo $_W['attachurl'];?>";
var lessonUrl = "<?php  echo $this->createMobileUrl('lesson');?>";
var loadingToast = document.getElementById("loadingToast");
var get_status = true;
$(function () {
	var nowPage = 1; //设置当前页数，全局变量
    function getData(page) {
		if(get_status){
			nowPage++;
			$.get(ajaxUrl, {page: page}, function (data) {
				var jsonObj = JSON.parse(data);
				loadingToast.style.display = 'none';
				if (jsonObj.length > 0) {
					insertDiv(jsonObj);
				}else{
					get_status = false;
					document.getElementById("loading_div").innerHTML='<div class="loading_bd">没有了，已经到底了</div>';
				}
			});
		}
    } 
    //初始化加载数据
	var lesson_back = localStorage.getItem('lesson_back_'+uniacid);
	var lesson_list = localStorage.getItem('lesson_list_'+uniacid);

	if(lesson_back==1 && lesson_list){
		$("#lesson-list").append(lesson_list);
		$(".section").scrollTop(localStorage.getItem('section_top_'+uniacid));
		nowPage = localStorage.getItem('nowPage_'+uniacid);
		loadingToast.style.display = 'none';
		localStorage.removeItem('lesson_back_'+uniacid);
	}else{
		getData(1);
	}

    //生成数据html,append到div中  
    function insertDiv(result) {  
        var mainDiv =$("#lesson-list");
		var already_study = "<?php  echo $already_study;?>";
		var lesson_vip_status = <?php  echo $setting['lesson_vip_status'];?>;
        var chtml = '';  
        for (var j = 0; j < result.length; j++) {
			chtml += '<a href="' + lessonUrl + '&id=' + result[j].id + '" class="normal_grid flex0_1">';
			chtml += '	<div class="normal_grid_a flex_g0">';
			chtml += '		<div class="img-box flex_g0">';
			chtml += '			<div class="img"><img src="' + attachUrl + result[j].images + '"></div>';
			chtml += '			<div class="icon-live ' + result[j].icon_live_status + '"></div>';
			chtml += '			<div class="learned ' + result[j].learned_hide + '">' + result[j].buyTotal + already_study + '</div>';
			chtml += '			<i class="ico_common '+ result[j].ico_name +'"></i>';
			chtml += '		</div>';
			chtml += '	</div>';
			chtml += '	<div class="flex-al1 flex10">';
			chtml += '		<div>';
			chtml += '			<div class="grid_title2">' + result[j].bookname + '</div>';
			chtml += '			<div class="grid_info flex0">';
			if(lesson_vip_status!=1){
				if(result[j].price>0){
					chtml += '		<span class="price flex_g0 index_price_lesson ios-system">¥' + result[j].price + '</span>';
				}else{
					chtml += '		<span class="free flex_g0 index_free_lesson ios-system">免费课程</span>';
				}
					chtml += '		<span class="mar5 ios-system">|</span>';
			}
			if(result[j].soncount>0){
					chtml += '		<span class="index_section_number">' + result[j].soncount + '节</span>';
			}
			chtml += '			</div>';
			chtml += '		</div>';
			chtml += '		<div class="grid_bottom2 flex1">';
			chtml += '	<div class="text">';
			if(result[j].section_status==0){
				chtml += '已完结';
			}
			chtml += '	</div>';
			if(result[j].score>0){
					chtml += '	<span class="eva index_lesson_evaluation">' + result[j].score_rate + '%好评</span>';
			}
			chtml += '		</div>';
			chtml += '	</div>';
			chtml += '</a>';
        }
		mainDiv.append(chtml);
		
		//存储当前课程列表信息
		if($("#lesson-list").html()){
			localStorage.setItem('lesson_list_'+uniacid, $("#lesson-list").html());
			localStorage.setItem('nowPage_'+uniacid, nowPage);
		}
    }  
  
    //==============核心代码=============
	var msg_list_loading = false;
	$('.section').on('scroll', function(){
		if (!msg_list_loading){
			load_more_msg();
		}

		//记录滚动条位置
		localStorage.setItem('section_top_'+uniacid, $(".section").scrollTop());
	})
	function load_more_msg(){     
		var msg_list = $('.section');
		if (msg_list.height() + msg_list[0].scrollTop >= msg_list[0].scrollHeight) {
			msg_list_loading = true;
			$("#btn_Page").hide();
			getData(nowPage);
			msg_list_loading = false;
		}
		$("#btn_Page").show();
	}

    //继续加载按钮事件
    $("#btn_Page").click(function () {
    	loadingToast.style.display = 'block';
        getData(nowPage);
    });
});

var nav_panel_height = parseInt(document.body.clientHeight * 0.7);
var head = document.head || document.getElementsByTagName('head')[0];
var style = document.createElement('style');
style.innerHTML = '.nav_panel-cate{height:' + nav_panel_height + 'px !important;}';
head.appendChild(style);
</script>

<?php  } else if($op=='allcategory') { ?>
<link href="<?php echo MODULE_URL;?>template/mobile/<?php  echo $template;?>/style/cssv2/all-category.css?v=<?php  echo $versions;?>" rel="stylesheet" />

<div class="header-2 cbox">
	<a href="javascript:history.go(-1);" class="ico go-back"></a>
	<div class="flex title" style="max-width:80%;"><?php  echo $title;?></div>
</div>

<!-- 分类 START-->
<div class="fui-fullHigh-group max-width-640">
	<div class="category-inner menu">
		<nav class="category-rec category-switch on" onclick="switchTab('rec');">推荐分类</nav>
		<?php  if(is_array($categorylist)) { foreach($categorylist as $key => $item) { ?>
		<nav class="category-<?php  echo $key;?> category-switch" onclick="switchTab(<?php  echo $key;?>);"><?php  echo $item['name'];?></nav>
		<?php  } } ?>
	</div>
	<div class="category-inner container">
		<div class="all-category-son category-son-rec">
			<div class="category-right">
				<a href="<?php  echo $this->createMobileUrl('search');?>" class="category-item">
					<div class="icon radius">
						<img src="<?php  echo $all_category_ico;?>">
					</div>
					<div class="text">全部课程</div>
				</a>
				<?php  if(is_array($hot_category)) { foreach($hot_category as $hot) { ?>
				<a href="<?php echo $hot['link'] ? $hot['link'] : $this->createMobileUrl('search',array('cat_id'=>$hot['id']));?>" class="category-item">
					<div class="icon radius">
						<img src="<?php  echo $_W['attachurl'];?><?php  echo $hot['ico'];?>">
					</div>
					<div class="text"><?php  echo $hot['name'];?></div>
				</a>
				<?php  } } ?>
			</div>
		</div>

		<?php  if(is_array($categorylist)) { foreach($categorylist as $key => $parent) { ?>
		<div class="all-category-son category-son-<?php  echo $key;?>" style="display:none;">
			<div class="category-right">
				<a href="<?php echo $parent['link'] ? $parent['link'] : $this->createMobileUrl('search', array('cat_id'=>$parent['id'],'pid'=>$parent['id']));?>" class="category-item">
					<div class="icon radius">
						<img src="<?php  echo $_W['attachurl'];?><?php  echo $parent['ico'];?>">
					</div>
					<div class="text"><?php  echo $parent['name'];?></div>
				</a>

				<?php  if(is_array($parent['child'])) { foreach($parent['child'] as $son) { ?>
				<a href="<?php echo $son['link'] ? $son['link'] : $this->createMobileUrl('search', array('cat_id'=>$son['id'],'pid'=>$parent['id']));?>" class="category-item">
					<div class="icon radius">
						<img src="<?php  echo $_W['attachurl'];?><?php  echo $son['ico'];?>">
					</div>
					<div class="text"><?php  echo $son['name'];?></div>
				</a>
				<?php  } } ?>
			</div>
		</div>
		<?php  } } ?>
	</div>
</div>
<!-- 分类 END-->
<script type="text/javascript">
function switchTab(key){
	$(".category-switch").removeClass('on');
	$(".all-category-son").hide();
	
	$(".category-"+key).addClass('on');
	$(".category-son-"+key).show();
}
</script>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template($template.'/_footerv2', TEMPLATE_INCLUDEPATH)) : (include template($template.'/_footerv2', TEMPLATE_INCLUDEPATH));?>