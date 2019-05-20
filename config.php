<?php
/**
 * @author 
 * @copyright 2016
 */

/**
 * Definicja stylów często używanych stylów CSS, zostaną one automatycznie dodane nagłówka
 * każdej strony.
 */
define('CSS', array(
        '<link rel="stylesheet" href="css/custom.css">',
        '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">',
        '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">'
		)
	);
	
/**
 * Definicja często używanych skryptów JS, zostaną automatycznie dodane do nagłówka każdej
 * strony
*/ 
define('JS', array());	

/**
 * Ustawienia bazy danych.
 */	
define ('DB_SRV', 'localhost');
define ('DB_USER', 'cross');
define ('DB_PWD', '12345');
define ('DB_DB', 'cross');

/**
 * Automatyczne ustawienie BASE
 */
$AbsoluteURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$dirCat = dirname($_SERVER['PHP_SELF']);
$AbsoluteURL .= $_SERVER['HTTP_HOST'];
$AbsoluteURL .= $dirCat != '\\' ? $dirCat : "";
$slash = substr($AbsoluteURL, -1);
define ('SRV_ADDR', $slash != '/' ? $AbsoluteURL.'/' : $AbsoluteURL);

/**
 * Ustawienie ścieżek 
 */
set_include_path(get_include_path() . PATH_SEPARATOR . "class");
set_include_path(get_include_path() . PATH_SEPARATOR . "content");
set_include_path(get_include_path() . PATH_SEPARATOR . "admin");



/**
 * Magiczna metoda wczytująca z automatu klasy
 */
function __autoload($className) {
    include_once($className.".class.php");
}

?>
