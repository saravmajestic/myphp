<?php
$compiledFilePath = $_REQUEST['dest'];
$srcFolder = $_REQUEST['src'];
$srcFolder = str_replace("\/","/", $srcFolder);
$compiledFilePath = str_replace("\/","/", $compiledFilePath);
header("content-type: application/json");

try{
	if(!file_exists($compiledFilePath)){
		mkdir($compiledFilePath, 0777, true);
	}else{
	}
	
	$filepath = str_replace($_REQUEST['filename'], '', $_REQUEST['filepath']);
	$filepath = str_replace($srcFolder.'/', '', $filepath);
	$filepath = $compiledFilePath.'/'.$filepath;
	$filepathArr = explode('/',$filepath);
	
	$newfilepath = "";
	foreach($filepathArr as $dir){
		if($dir != ""){
			$newfilepath .= $dir.'/';
			if(!file_exists($newfilepath) ){
				mkdir($newfilepath);
			}
		}
	}
	
	$filename = str_replace(".dust", ".js", $_REQUEST['filename']);
	$path = $filepath.$filename;
	file_put_contents($path, $_REQUEST['compiledcontent']);
	echo json_encode(array("isSuccess" => true, "filename" => $_REQUEST['filepath']));
}
catch(Exception $e){
	echo json_encode(array("isSuccess" => false, "filename" => $_REQUEST['filepath'], 'error' => $e->getMessage()));
}