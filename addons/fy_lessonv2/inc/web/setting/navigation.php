<?php

$nav_list = $typeStatus->navigationType();

$navigation = pdo_fetchall("SELECT * FROM " .tablename($this->table_navigation). " WHERE uniacid=:uniacid AND is_pc=:is_pc ORDER BY is_pc ASC, displayorder ASC, nav_id ASC", array(':uniacid'=>$uniacid, ':is_pc'=>0));


