<?php
require_once '../../config_test.php';
require_once 'database.php';
require_once 'portfolio.php';

$userid = $_SESSION['uid'];

$dbcon = Database::getDb();
$dividend = new Portfolio();
$portfolio = $dividend->getPortfolio($dbcon, $userid);



