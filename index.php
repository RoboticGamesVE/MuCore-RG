<?php
//$filename = dirname(__FILE__) . "/install/.htaccess";
//$filename = str_replace(" ", "", $filename);
$filename = 'install/.htaccess';
if (file_exists($filename)) {
        unlink("index.lock");
        rename("index.php", "index.lock"); 
        rename("index.bmn", "index.php"); 
        echo('<meta http-equiv="refresh" content="1">');
        echo("<script>location.reload();</script>");
    } else {
        echo "<center><b>Please complete the installation process!</b></center>";
        echo('<meta http-equiv="Location" content="install">');
        echo("<script>location.href = 'install';</script>");
 }
?> 
