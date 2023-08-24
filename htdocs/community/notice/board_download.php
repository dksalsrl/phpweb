<?php
    $real_name = $_GET["real_name"];
    $file_name = $_GET["file_name"];
    $file_type = $_GET["file_type"];
    $file_path = "./data/".$real_name;

    if(file_exists($file_path))
    {
        $fp = fopen($file_path, "rb");
        header("Content-type: application/x-msdownload");
        header("Content-type: application/octet-stream");
        header("Content-length: ".filesize($file_path));    
        header("Content-Disposition: attachment; filename=".$file_name);
        header("Content-Transfer-Encoding: binary");
        header("Content-Description: File Transfer");
        header("Cache-Control: cache, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
    }

    if(!fpassthru($fp))
        fclose($fp);

?>
