<?php
session_start();
echo "you have logged out";
session_destroy();
header("location:/codingforum");



?>