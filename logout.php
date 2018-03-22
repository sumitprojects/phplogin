<?php
/**
 * Created by PhpStorm.
 * User: sumit
 * Date: 2/27/2018
 * Time: 11:16 PM
 */
session_start();
session_unset();
session_destroy();
header('location:index.php');
