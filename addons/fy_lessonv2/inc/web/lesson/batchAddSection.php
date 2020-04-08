<?php

$pid = intval($_GPC['pid']);
$lesson = pdo_get($this->table_lesson_parent, array('uniacid'=>$uniacid,'id'=>$pid));
if(empty($lesson)){
	message("该课程不存在或已被删除", "", "error", $this->createWebUrl("lesson", array('op'=>'viewsection','pid'=>$pid)), "error");
}

if($_FILES['sectionFile']['error'] != '0'){
	message("系统繁忙，上传文件失败，请稍后重试", $this->createWebUrl("lesson", array('op'=>'viewsection','pid'=>$pid)), "error");
}

$filename = $_FILES['sectionFile']['name'];
$tmp_file = $_FILES['sectionFile']['tmp_name'];

header("Content-type:text/html;charset=utf-8");

//文件后缀名
$suffix = strtolower(substr(strrchr($filename, '.'), 1));
if($suffix != "xls") {
	message("请上传后缀是xls的文件", $this->createWebUrl("lesson", array('op'=>'viewsection','pid'=>$pid)), "error");
}

//设置excel文件临时存储目录
$savePath = ATTACHMENT_ROOT.'excel/';
if (!file_exists($savePath)) {
	mkdir($savePath, 0777);
}
$savePath .= 'fy_lessonv2/';
if (!file_exists($savePath)) {
	mkdir($savePath, 0777);
}
$savePath .= $uniacid . '/';
if (!file_exists($savePath)) {
	mkdir($savePath, 0777);
}

/* 命名临时上传的文件 */
$newfile = $savePath . 'SECTION_' . random(24) . "." . $suffix;

/* 开始上传 */
if (!copy($tmp_file, $newfile)) {
	message("上传文件失败，请稍候重试", $this->createWebUrl("lesson", array('op'=>'viewsection','pid'=>$pid)), "error");
}

$phpexcel = new FyLessonv2PHPExcel();
$data = $phpexcel->inputExcel($newfile);
if (file_exists($newfile)) {
	unlink($newfile);
}

$i=0;
foreach($data as $v){
	if(empty($v[1])) continue; //章节标题为空，则跳过

	$newData = array(
		'uniacid'		=> $uniacid,
		'parentid'		=> $pid,
		'title_id'		=> $v[0],
		'title'			=> $v[1],
		'images'		=> $v[2],
		'sectiontype'	=> $v[3],
		'savetype'		=> $v[4],
		'is_live'		=> $v[5],
		'videourl'		=> $v[6],
		'videotime'		=> $v[7],
		'content'		=> $v[8],
		'displayorder'	=> $v[9],
		'is_free'		=> $v[10],
		'test_time'		=> $v[11],
		'status'		=> $v[12],
		'auto_show'		=> 0,
		'addtime'		=> time(),
	);
	$res = pdo_insert($this->table_lesson_son, $newData);
	if($res){
		$i++;
	}
}

message("成功导入{$i}个章节", $this->createWebUrl("lesson", array('op'=>'viewsection','pid'=>$pid)), "success");