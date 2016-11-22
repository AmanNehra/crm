<?php
if(isset($_REQUEST['download']))
 {
  $dir=$_REQUEST['download'];
 $path =$_SERVER['DOCUMENT_ROOT']."/demo/crm/upload/book_master/$dir";

if ($handle = opendir($path)) {
    while (false !== ($file = readdir($handle))) {
        if ('.' === $file) continue;
        if ('..' === $file) continue;
       $f=$file;
        // do something with the file
    }
    closedir($handle);
}
$file = $f;
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
}
?>