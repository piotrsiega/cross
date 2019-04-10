<?php
session_start();
include_once("config.php");


//$con = new db();
$news = new news();
$page = new page(null,null,"Strona główna",null,null,null);

if(empty($_GET)){
    $_GET['pg']=1;
} 

//echo ctype_digit($_GET['opt']);

if(isset($_GET['opt'])){
    
    //if(ctype_digit($_GET['opt'])){

        switch($_GET['opt']){
            
        case 33:
        case 34:
        case 35:
            content::showPartyPage($_GET['opt']);
            break;
            
        case 7:
            content::ostowarzyszeniu(7);
            break;

        case 8:
            content::wladze(8);               
            break;
            
        case 9:
            content::dzalalnosc(9);
            break;
            
        case 10:
            content::statut(10);
            break;

        case 27:
            content::kontakt(27);
            break;
            
        case 'pokaznewsa':
            content::showNews($_GET['id']);
            break;
            
        default:
            echo '<script type="text/javascript">
                    window.location = "index.php"
                </script>';

        }
    //}    
    
}
elseif(isset($_GET['pg'])){
        $news = new news;
        $news->showNewsTable($_GET['pg']);
}
    



     







































?>