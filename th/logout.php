<?php
include_once '../th-configs/th-config.php';
session_start();
session_unset();
session_destroy();
header('location: ' . AUTH_LOGIN);