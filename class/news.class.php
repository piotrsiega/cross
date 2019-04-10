<?php

/**
 * @author 
 * @copyright 2018
 */

class news{
    private $title,
            $content,
            $date,
            $icon,
            $newsNumber,
            $con,
            $news,
            $offset,
            $pageNr,
            $newsArray,
            $pageNumbers,
            $cleanText,
            $key,
            $tool, 
            $value;




/**
 * Wyświetla karty z newsami z podziałem 12 newsów na stronę
**/ 

    public function showNewsTable($PAGENR){
        $this->pageNr = $PAGENR;
        
        $this->con = new db();
        $this->news = new news();
        $this->tool = new tools;
        $this->newsNumber = $this->con->fetchOne("SELECT COUNT(*) FROM news");

        if($this->pageNr == 1){
            $this->offset = 0;
        }
        else
        {
            $this->offset = ($this->pageNr-1)*12;
        }

        $this->newsArray = $this->con->fetchAll("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 12 OFFSET {$this->offset}");
        
        $this->newsNumber = $this->newsNumber[0];
        $this->pageNumbers = $this->newsNumber/12;
        $this->pageNumbers = ($this->newsArray % 12 == 0) ? intval($this->pageNumbers) : intval($this->pageNumbers)+1;
        
        echo "<div class=\"row justify-content-around\">";
            foreach($this->newsArray as $this->key => $this->value){
                $this->cleanText = strip_tags($this->value['content']);
                switch($this->value['icon']){
                    case "z":
                        $this->icon = "zawody";
                        break;
                    case "o":
                        $this->icon = "obozy";
                        break;
                    case "s":
                        $this->icon = "szkolenia";
                        break;
                    case "k":
                        $this->icon = "komunikaty";
                        break;
                        
                }
  
                echo "<div class=\"card col col-xl-3 col-lg-4 col-sm-6 col-12 pt-5\">
                  <img class=\"icon card-img-top p-2\" src=\"images/{$this->icon}.svg\" width=50px alt=\"Zawody\">
                  <div class=\"card-body\">
                    <h3 class=\"card-title\">
                      <a href=\"".$_SERVER['PHP_SELF']."?opt=pokaznewsa&id={$this->value['id']}\">{$this->value['title']}</a>
                    </h3>
                    <p class=\"card-text\">
                      <small class=\"text-muted\">".$this->tool->datePL($this->value['date'])."</small>
                    </p>
                    <p class=\"card-text\">".substr($this->cleanText, 0, 120)."...</p>
                    <a href=\"".$_SERVER['PHP_SELF']."?opt=pokaznewsa&id={$this->value['id']}\" class=\"card-link\">Czytaj więcej</a>
        
                  </div>
                </div>";
 
//                echo "<div class=\"card m-1 col col-lg-3 col-sm-4 col-12\">
//                        <img class=\"card-img-top p-4\" src=\"images/{$this->icon}.svg\" width=50px alt=\"{$this->icon}\">
//                        <div class=\"card-body\">
//                            <h3 class=\"card-title\">{$this->value['title']}</h3>
//                            <p class=\"card-text\">
//                                <small class=\"text-muted\">".tools::datePL($this->value['date'])."</small>
//                            </p>
//                            <p class=\"card-text\">".substr($this->cleanText, 0, 120)."...</p>
//                            <a href=\"#\" class=\"card-link\">Card link</a>
//                        </div></div>";
            }
        echo '</div>
          <div class="row justify-content-center">
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-lg">
                ';
        if($this->pageNr <= 1){
                  echo "<li class=\"page-item disabled\">\n<a class=\"page-link\" href=\"\" aria-label=\"Previous\">";    
        }
        else      
        {
                  echo '<li class=\"page-item\"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pg='.($this->pageNr-1).'" aria-label="Previous">';    
        }
        echo '
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
        ';
        
        for($i = 1; $i <= $this->pageNumbers; $i++){
        echo ($i == $this->pageNr) ? "<li class=\"page-item disabled\">" : "<li class=\"page-item\">";
        
        echo "        
                  <a class=\"page-link\" href=\"".$_SERVER['PHP_SELF']."?pg={$i}\">{$i}</a>
                </li>
        ";
        }
        
        if($this->pageNr >= $this->pageNumbers){
            echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"\" aria-label=\"Next\">";
        }
        else
        {
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$_SERVER['PHP_SELF']}?pg=".($this->pageNr+1)."\" aria-label=\"Next\">";
        }
                  
        echo '
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        ';
    }

/**
 * Zapisuje newsa do bazy danych 
**/
    function save($TITLE, $CONTENT, $DATE, $ICON){
        $this->title = $TITLE;
        $this->content = $CONTENT;
        $this->date = $DATE;
        $this->icon = $ICON;
 
        $this->con = new db();
        $this->con->saveToDB("news",         
            array(
                array('colName' => "title",
                        'colValue' => $this->title,
                        'colParam' => PDO::PARAM_STR),
                array('colName' => "content",
                        'colValue' => $this->content,
                        'colParam' => PDO::PARAM_STR),
                array('colName' => "date",
                        'colValue' => $this->date,
                        'colParam' => PDO::PARAM_INT),
                array('colName' => "icon",
                        'colValue' => $this->icon,
                        'colParam' => PDO::PARAM_STR)
                ));
    }     


/**
 * Uaktualnia rekord news w bazie
 */
    public function edit($ID,$TITLE,$CONTENT,$DATE,$ICON){
        $this->id = $ID;
        $this->title = $TITLE;
        $this->content = $CONTENT;
        $this->date = $DATE;
        $this->icon = $ICON;

        $this->con = new db;
                
        $this->con->editRecord('news',
                            array(
                                array('colName' => "title",
                                        'colValue' => $this->title),
                                array('colName' => "content",
                                        'colValue' => $this->content),
                                array('colName' => "date",
                                        'colValue' => $this->date),                                            
                                array('colName' => "icon",
                                        'colValue' => $this->icon)),                                            
                            "id = {$this->id}");        
    }                

                                

/**
 * Wświetla konkretnego newsa
 */


















}
?>