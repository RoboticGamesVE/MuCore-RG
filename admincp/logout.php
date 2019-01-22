<?php
session_start();
unset($_SESSION["authenticated"]);
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="refresh" content="0; url=index.php">
</head>
<body class="theme-red">
</body>
</html>