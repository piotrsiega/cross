<?php

/**
 * @author 
 * @copyright 2017
 * 
 * 
 * 
 * 
 */

class page{
    
    private $article,
            $con,
            $favicon,
            $heredoc,
            $id,
            $nobanner,
            $options,
            $parent,
            $scripts,
            $styles,
            $title,
            $url;
    
    public function __construct($SCRIPTS,$STYLES,$TITLE,$FAVICON,$OPTIONS = null,$NOBANNER = null){
        $this->nobanner = $NOBANNER;
        $this->scripts = $SCRIPTS;
        $this->styles = $STYLES;
        $this->title = $TITLE;
        $this->favicon = $FAVICON;
        $this->options = $OPTIONS;
        $this->nobanner = $NOBANNER;
        
echo "<!DOCTYPE html>
<html>\n";
    echo "\n\t<head>";
    $this->setFavicon($this->favicon);
    echo "\n\t\t<meta charset=\"UTF-8\">
    \t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">\n";
    $this->setStyles($this->styles);
    $this->setScripts($this->scripts);
    $this->addToHead($this->options);
    $this->setTitle($this->title);
    echo "
    </head>
    <body class=\"bg-light\">\n\n";
    content::showHeader($this->nobanner);
    }
    
    public function __destruct(){
    content::showFooter();                
    }
    
/**
 * Ustawia tytuł dokumentu podany w parametrze,
 * Jeśli parametr jest pusty funkcja fstawi pusty tytuł.  
 */    
    private function setTitle($TITLE){
        $this->title = $TITLE;
        
        echo "\n\t\t<title>";
        if($TITLE !== null){
            echo "Cross - ".$this->title;                        
        }
        else
        {
            echo "Cross";
        }
        echo "</title>";
        
    }
    
    private function setFavicon($FAVICON){
        $this->favicon = $FAVICON;
        
        if($FAVICON !== null)
        {
            echo '<link rel="shortcut icon" href="img/icons/'.$this->favicon.'" type="image/x-icon" />';        
        }

    }


/**
 * Dodaje CSSy do nagłówka strony. 
 * Jeśli odwołujesz się do CSS po URL podaj cały adres wraz z http://
 * Jeśli odwołujesz się do pliku lokalnego podaj tylko nazwę pliku
 * a plik umieść w katalogu css
 */
    private function setStyles($STYLES = Array()){
        $this->styles = $STYLES;

        foreach(CSS as $key){
            echo "\t\t{$key}\n";
        }
        
        if($this->styles !== null){
            foreach($this->styles as $key => $value){
                echo "\t\t{$value}>\n";
            }
            
        }   
        
    }  

/**
 * Dodaje skrypty JS do nagłówka strony. 
 * Jeśli odwołujesz się do skryptu po URL podaj cały adres wraz z http://
 * Jeśli odwołujesz się do pliku lokalnego podaj tylko nazwę pliku
 * a plik umieść w katalogu JS
 */
    private function setScripts($SCRIPTS = Array()){
        $this->scripts = $SCRIPTS;
        if($this->scripts != null){
            foreach($this->scripts as $key => $value){
                echo "\t\t<script type=\"text/javascript\" src=\"";
                if(substr($value, 0, 4 ) !== 'http'){
                    echo SRV_ADDR."JS/";
                }
                echo "{$value}\"></script>";
            }
        }        
        
    }   
    
/**
 * DOdaje dodakowe wpisy do sekcji <head></head> 
 * 
 */
    public function addToHead($OPTIONS){
        $this->options = $OPTIONS;
        echo "\n\t\t".$this->options;
    }


/**
 * Wyświetla heredoc-e z pliku content.php
 */
    private function showHeredoc($HEREDOC){
        $this->heredoc = $HEREDOC;
        
        include_once((dirname($_SERVER['PHP_SELF']))."/content.php");
        echo $this->heredoc;
               
    }



/**
 * Generuje zawartość strony na podstawie pola url z bazy 
 */
    public function showContent($ID){
        $this->id = $ID;

        $this->con = new db;
        $this->article = $this->con->fetchOne("SELECT * FROM `articles` WHERE `category_id` = ".$this->id);

        
        //var_dump($article);
        echo "<h3>{$this->article['title']}</h3>";
        echo "{$this->article['date']}";
        echo $this->article['content'];
        
        
    } 


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}    
?>