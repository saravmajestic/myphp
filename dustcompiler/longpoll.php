<script>
<?php
function empty_dir($dir) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),
                                              RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($iterator as $path) {
    	if(!is_dir($path)){
    		$arr = explode('\\', $path);
    		$filepath = str_replace("\\","/",$path->__toString());
	      	echo "parent.doCompile(".json_encode(array("filename" => $arr[count($arr) - 1], "filepath" => $filepath, "contents" => file_get_contents($path))).");";;
    	}
    }
}

function clearCompiledDir($dir){
	if(file_exists($dir)){
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),
		RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($iterator as $path) {
			if ($path->isDir()) {
				rmdir($path->__toString());
			} else {
				unlink($path->__toString());
			}
		}
	}
}
// echo $_REQUEST['dest'].' '.$_REQUEST['folder'];
// clearCompiledDir($_REQUEST['dest']);
empty_dir($_REQUEST['folder']);
?>
</script>