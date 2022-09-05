<?php
session_destroy();
mysqli_close($con);
header ('Location: index.php');
?>