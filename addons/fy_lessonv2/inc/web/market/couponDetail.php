<?php

$id = intval($_GPC['id']);
$member_coupon = pdo_fetch("SELECT a.*,b.nickname,b.mobile,b.realname FROM " .tablename($this->table_member_coupon). " a LEFT JOIN " .tablename($this->table_mc_members). " b ON a.uid=b.uid WHERE a.id=:id", array(':id'=>$id));

if(empty($member_coupon)){
	message("该优惠券记录不存在", "", "error");
}

$category = pdo_fetch("SELECT name FROM " .tablename($this->table_category). " WHERE id=:id", array(':id'=>$member_coupon['category_id']));
$category_name = $category['name'] ? $category['name']." 课程分类" : "全部课程分类";