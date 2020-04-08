<?php

$pindex = max(1, intval($_GPC['page']));
$psize = 10;


$list = pdo_getall($this->table_poster, array('uniacid'=>$uniacid));

$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->table_poster) . " WHERE uniacid=:uniacid", array(':uniacid'=>$uniacid));
$pager = pagination($total, $pindex, $psize);

