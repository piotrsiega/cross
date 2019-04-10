<?php
include_once("config.php");

/**
 * @author 
 * @copyright 2018
 */

$con = new db;
$news = $con->fetchOne("SELECT * FROM `news` WHERE `id` = 1");

echo "<pre><code>{$news['content']}</code></pre>";

var_dump($news);

?>