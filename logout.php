<?php
include 'Config/config.php';
session_destroy();
header("location: index.php");