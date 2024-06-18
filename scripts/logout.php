<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php
session_start();
session_unset();
session_destroy();
header('location:../index.php')

    ?>