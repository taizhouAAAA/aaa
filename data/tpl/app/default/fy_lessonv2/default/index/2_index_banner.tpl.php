<?php defined('IN_IA') or exit('Access Denied');?><?php  if(!empty($banner)) { ?>
<div class="swiper-container">
	<div class="swiper-wrapper">
		<!--图片一-->
		<?php  if(is_array($banner)) { foreach($banner as $item) { ?>
		<div class="swiper-slide">
			<a href="<?php  echo $item['link'];?>">
				<img class="swiper-lazy" src="<?php  echo $_W['attachurl'];?><?php  echo $item['picture'];?>">
			</a>
		</div>
		<?php  } } ?>
		<!--图片一end-->
	</div>
	<div class="swiper-pagination"></div>
</div>
<?php  } ?>