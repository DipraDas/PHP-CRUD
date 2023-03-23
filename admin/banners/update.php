<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dipCrud/config.php');
use Seip\Banners;
$_banners = new Banners();
$banners = $_banners->update();
?>
