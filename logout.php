<?php
session_start();
require_once ("classes/DatabaseManager.php");
require_once ("classes/Administrator.php");
$db = new DatabaseManager();
$admin = new Administrator($db->getConnection());
$admin->validateCustomer();
$admin->logout();
$db->close();
?>