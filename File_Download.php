<?php 
class File_Download{

	public function downloadLink(){
		if(isset($_GET['file'])){
			$filename = $_SERVER['DOCUMENT_ROOT'].$_GET['file'];
		}else{
			$filename = false;
		}

		if(file_exists($filename)){
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header("Cache-Control: no-cache, must-revalidate");
			header("Expires: 0");
			header('Content-Disposition: attachment; filename="'.basename($filename).'"');
			header('Content-Length: ' . filesize($filename));
			header('Pragma: public');
			flush();//Clear system output buffer
			readfile($filename);//Read the size of the file
		}
	}

}
