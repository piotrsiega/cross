<?php

/**
 * @author 
 * @copyright 2018
 */

class admin{
    private $address,
            $array,
            $category,
            $categoryId,
            $categoryArray = Array(),
            $clubsArray,
            $con,
            $content,
            $coord,
            $date,
            $discipline,
            $duration,
            $email,
            $id,
            $isChild,
            $isParent,
            $key,
            $level,
            $maxOrder,
            $name,
            $nocss,
            $order,
            $orderArray,
            $parent,
            $partyArray,
            $place,
            $phone,
            $query,
            $selected,
            $startdate,
            $table,
            $title,
            $temp,
            $tool,
            $type,
            $value,
            $url;
            
                        
    //public $level = 0;
    
/**
 * Sprawdza czy element tablicy kategorii ma rodzica 
 */    
    private function hasParent($ID,$ARRAY){
        $this->id = $ID;
        $this->array = $ARRAY;
        
        foreach($this->array as $k => $v){
            if($this->id == $v['parent']){
                $this->isParent = 1;
                break;
            }
        }
    
    	return (isset($this->isParent) && $this->isParent == 1) ? 1 : 0;
    }

/**
 * Sprawdza czy element tablicy ma dziecko
 */
    function hasChild($ID,$ARRAY){
        $this->id = $ID;
        $this->array= $ARRAY;

        $this->isParent = 0;
        for($i = 0; $i < count($this->array); $i++){
            if($this->array[$i]['parent'] == $this->id){
                $this->isParent = 1;
                break;
            }
        }
        return (isset($this->isParent) && $this->isParent==1) ? 1 : 0;
        } 
    
/**
 * Tworzy rekurencyjnie drzewiastą strukturę menu na podstawie tabeli z bazy i przedstawia ją za pomocą listy nienumerowanej. 
 */    
// function createCategoryTree($array, $parent = null){
//    
//    
//    if(empty($array))
//    {
//        echo "Nie znaleziono żadnych kategorii. By to zmienić <a href=\"{$_SERVER['PHP_SELF']}?opt=dodajkategorie\">dodaj kategorię</a>";
//    }
//    else
//    {
//        echo "<ul class=\"tree\">\n";
//        //$this->level++;
//        foreach($array as $key => $value)
//        {
//            if($value['parent'] == $parent){ 
//                echo "<li class=\"tree\">
//                    <a class=\"fa\">{$value['name']}</a>";
//                if(intval($value['level']) < 3){                     
//                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=dodajkategorie&id={$value['id']}&level={$value['level']}\">&nbsp&nbsp<i class=\"fa fa-plus\" title=\"Dodaj\" alt=\"Dodaj\"></i></a>";
//                }                    
//                if(!$this->hasChild($value['id'],$array)){    
//                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=usunkategorie&id={$value['id']}\">&nbsp<i class=\"fa fa-trash-o\" title=\"Usuń\" alt=\"Usuń\"></i></a>";
//                    }    
//                if($value['parent'] == 0){               
//                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=edytujkategorie\">&nbsp<i class=\"fa fa-edit\" title=\"Edytuj\" alt=\"Edytuj\"></i></a>";
//                }
//                if($this->hasChild($value['id'],$array)){    
//                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=edytujkategorie&id={$value['id']}\">&nbsp<i class=\"fa fa-navicon\" title=\"Edytuj pddkategorie\" alt=\"Edytuj podkategorie\"></i></a>";
//                }
//                echo "</li>\n";
//                
//                if($this->hasParent($value['order'],$array) == 1){
//                    $this->createCategoryTree($array,$value['id']);
//                }
//            }            
//        }
//        echo "</ul>\n";
//    }  
//    }   

/**
 * Zwraca maksymalną wartość kolumny order dla podanego rodzica
 */
    function maxOrder($PARENT = null){
        $this->parent = $PARENT;
        $this->con = new db;
        $this->query = ($this->parent == null) ? 
            $this->con->db->query("SELECT MAX(`order`) FROM `category` WHERE `parent` IS NULL") : 
            $this->con->db->query("SELECT MAX(`order`) FROM `category` WHERE `parent` = {$this->parent}");
        $this->maxOrder = $this->query->fetchAll();
        
        //var_dump($this->maxOrder);

        return ($this->maxOrder[0][0] == null) ? 0 : $this->maxOrder[0][0];                       
    }
        
/**
 * Zwraca minimalną wartość kolumny order dla podanego rodzica
 */
//    function minOrder($LEVEL){
////        $this->parent = $PARRENT;
////        $this->array = $ARRAY;
//        $this->level = $LEVEL;
//        $this->con = new db;
//        $this->query = $this->con->db->query("SELECT * FROM `category` WHERE `level` = 0");
//        $cat = $query->fetchAll();
//        
//        var_dump($cat);//
////        $this->parent = ($PARRENT == null) ? 0 : $this->parent;
////        unset($this->orderArray);
////        foreach($this->array as $this->key=>$this->value){
////            if($this->value['parent'] == $this->parent){
////                $this->orderArray[$this->value['id']] = $this->value['order'];
////                }                       
////        }
////        return is_array($this->orderArray) ? min($this->orderArray) : $this->orderArray;
//    }    

/**
 * Uaktualnia rekord kategorii w bazie
 */
    public function editCategory($ID,$NAME){
        $this->id = $ID;
        $this->name = $NAME;
        $this->con = new db;
                
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "name",
                                            'colValue' => $this->name)),
                                "id = {$this->id}");
    }

/**
 * Zapisuje nową kategorię do bazy danych
 */
    function saveCategory($ARRAY, $NAME, $LEVEL, $PARENT = null){
        $this->array = $ARRAY;
        $this->name = $NAME;
        $this->level = intval($LEVEL);
        $this->parent = $PARENT;

        $this->url = strtolower(
            str_replace(" ", "", 
                str_replace("'", "", 
                    iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $this->name)
                )
            )
        );
       
        $this->order = $this->maxOrder($this->parent) + 1;
        $this->con = new db();

//        var_dump($this->order);
//        var_dump($this->level);


        if($this->parent == 0){
            $this->con->saveToDB("category",         
                array(
                    array('colName' => "name",
                            'colValue' => $this->name,
                            'colParam' => PDO::PARAM_STR),
                    array('colName' => "url",
                            'colValue' => $this->url,
                            'colParam' => PDO::PARAM_STR),
                    array('colName' => "order",
                            'colValue' => $this->order,
                            'colParam' => PDO::PARAM_INT),
                    array('colName' => "level",
                            'colValue' => $this->level,
                            'colParam' => PDO::PARAM_INT)
                    ));            
        }        
        else
        {
            $this->con->saveToDB("category",         
                array(
                    array('colName' => "name",
                            'colValue' => $this->name,
                            'colParam' => PDO::PARAM_STR),
                    array('colName' => "url",
                            'colValue' => $this->url,
                            'colParam' => PDO::PARAM_STR),
                    array('colName' => "order",
                            'colValue' => $this->order,
                            'colParam' => PDO::PARAM_INT),
                    array('colName' => "parent",
                            'colValue' => $this->parent, 
                            'colParam' => PDO::PARAM_STR),
                    array('colName' => "level",
                            'colValue' => $this->level,
                            'colParam' => PDO::PARAM_INT)                            
                    ));
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "haschild",
                                    'colValue' => 1)),
                                "id = {$this->parent}");

        }
    }    
    
/**
 * Usuwa categorię 
 */
    function delCategory($ID,$PARENTID){
        //$this->table = $TABLE;
        $this->parent = $PARENTID;
        $this->id = $ID;
        
        $this->con = new db;
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "haschild",
                                    'colValue' => 0)),
                                "id = {$this->parent}");
                                    
        $this->con->delFromDB('category', 'id', $this->id);                                
    }

/**
 * Przesuwa categorię w dół 
 */
    public function moveDown($ID,$ORDER,$LEVEL){
        $this->id = $ID;
        $this->order = $ORDER;
        $this->level = $LEVEL;
        
        $this->con = new db;
        $this->query = $this->con->db->query("SELECT `id`,`order` FROM 
                            (SELECT * FROM `category` AS c WHERE `level` = {$this->level} ORDER BY 'order')
                        AS a
                        WHERE `order` IN (".$this->order.",".($this->order+1).")");
        $this->orderArray = $this->query->fetchAll();
        

        // Uwalniamy pierwszą pozycję, wysyłamy wartość do tempa
        $this->temp = $this->orderArray[0]['order'];

        // Uwalniamy drugą pozycję przypisując jej wartość do jedynki
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "order",
                                    'colValue' => $this->orderArray[1]['order'])),
                                "id = {$this->orderArray[0]['id']}");
        // Przypisujemy tempa do dwójki
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "order",
                                    'colValue' => $this->temp)),
                                "id = {$this->orderArray[1]['id']}");
                                
}        

/**
 * Przesuwa categorię w górę 
 */
    public function moveUp($ID,$ORDER,$LEVEL){
        $this->id = $ID;
        $this->order = $ORDER;
        $this->level = $LEVEL;
        
        $this->con = new db;
        $this->query = $this->con->db->query("SELECT `id`,`order` FROM 
                            (SELECT * FROM `category` AS c WHERE `level` = {$this->level} ORDER BY 'order')
                        AS a
                        WHERE `order` IN (".$this->order.",".($this->order-1).")");
        $this->orderArray = $this->query->fetchAll();
        

        // Uwalniamy pierwszą pozycję, wysyłamy wartość do tempa
        $this->temp = $this->orderArray[0]['order'];

        // Uwalniamy drugą pozycję przypisując jej wartość do jedynki
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "order",
                                    'colValue' => $this->orderArray[1]['order'])),
                                "id = {$this->orderArray[0]['id']}");
        // Przypisujemy tempa do dwójki
        $this->con->editRecord('category',
                                array(
                                    array('colName' => "order",
                                    'colValue' => $this->temp)),
                                "id = {$this->orderArray[1]['id']}");

        

//        $con->editRecord("category",         
//                array(
//                    array('colName' => "order",
//                          'colValue' => 6)
//                    ), "id = 21");  
//                    

        //$this->orderArray = 

        //$this->order
    }

/**
 * Wyświetla pojedynczą kategorię?
 */

    public function showCategory($PARENTID = null){
        $this->parent = $PARENTID;
        $this->con = new db;
                
        if($this->parent == null){
            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` IS NULL ORDER BY `order`");                                
            echo "<figure>\n\t<caption>Kategorie główne:</caption><ol>";
        }         
        else
        {
            $this->category = $con->fetchAll("SELECT * FROM `category` WHERE `parent` = {$this->parent} ORDER BY `order`");                    
            echo "<figure>\n\t<caption>Podkategorie poziom {$this->category[0]['level']}:</caption><ol>";
        }
        
        foreach($this->category as $this->key => $this->value){
            echo "<li>{$this->value['name']} --- {$this->value['order']}";
            if($this->value['order'] > 1){
                echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=wgore&id={$this->value['id']}&order={$this->value['order']}&level={$this->value['level']}\">
                        <i class=\"fa fa-arrow-up\" title=\"Przesuń w górę\" alt=\"Przesuń w górę\"></i></a>";
            }
            if($this->value['order'] < $this->maxOrder($this->parent)){
                echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=wdol&id={$this->value['id']}&order={$this->value['order']}&level={$this->value['level']}\">
                        <i class=\"fa fa-arrow-down\" title=\"Przesuń w dół\" alt=\"Przesuń w dół\"></i></a>";
            }
            if($this->hasChild($this->value['id'], $this->category)){
                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=edytujkategorie&id={$this->value['id']}\">
                            <i class=\"fa fa-navicon\" title=\"Edytuj podkategorie\" alt=\"Edytuj podkategorie\"></i></a>";
            }
            else
            {
                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=# &id={$this->value['id']}\">
                            <i class=\"fa fa-trash\" title=\"Usuń podkategorie\" alt=\"Usuń podkategorie\"></i></a>";                
            }
            if($this->value['level'] < 4){
                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=dodajkategorie&id=&level=".($this->value['level']+1)."&id={$this->value['id']}\">
                            <i class=\"fa fa-plus\" title=\"Edytuj podkategorie\" alt=\"Edytuj podkategorie\"></i></a>";
            }
            echo "</li>";
        }
        echo "</ol></figure>";
        echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=dodajkategorie&id={$this->parent}&level={$this->value['level']}\">Dodaj podkategorię</a>";
        
    }

/**
 * Wyświetla drzewo kategorii
 */         

    public function showCategoryTree($PARENTID = null){
        $this->parent = $PARENTID;
//        var_dump($this->parent);
//        echo $this->maxOrder($this->parent);
//                echo "&nbsp&nbsp<a href=\"{$_SERVER['PHP_SELF']}?opt=wdol&id={$this->value['id']}&order={$this->value['order']}&level={$this->value['level']}\">
//                        <i class=\"fa fa-arrow-down\" title=\"Przesuń w dół\" alt=\"Przesuń w dół\"></i></a>";
//        
//        if($this->value['order'] <= $this->maxOrder($this->parent)){
//            echo "Prawda";
//        }
        
        $this->con = new db;
                
        if($this->parent == null){
            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` IS NULL ORDER BY `order`");                                
            //echo "<figure>\n\t<caption>Kategorie główne:</caption><ol>";
        }         
        else
        {
            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` = {$this->parent} ORDER BY `order`");                    
            //echo "<figure>\n\t<caption>Podkategorie poziom {$this->category[0]['level']}:</caption><ol>";
        }
        
        echo "<ol>";
        foreach($this->category as $this->key => $this->value){
            echo "<li>{$this->value['name']}";
            if($this->value['order'] > 1){
                echo "&nbsp&nbsp<a href=\"{$_SERVER['PHP_SELF']}?opt=wgore&id={$this->value['id']}&order={$this->value['order']}&level={$this->value['level']}\">
                        <i class=\"fa fa-arrow-up\" title=\"Przesuń w górę\" alt=\"Przesuń w górę\"></i></a>";
            }
            if($this->value['order'] < $this->maxOrder($this->parent)){
                echo "&nbsp&nbsp<a href=\"{$_SERVER['PHP_SELF']}?opt=wdol&id={$this->value['id']}&order={$this->value['order']}&level={$this->value['level']}\">
                        <i class=\"fa fa-arrow-down\" title=\"Przesuń w dół\" alt=\"Przesuń w dół\"></i></a>";
            }
            if($this->value['haschild'] != 1 && $this->value['hasarticle'] == 0){
                    echo "&nbsp<a href=\"{$_SERVER['PHP_SELF']}?opt=usunkategorie&id={$this->value['id']}&parent={$this->value['parent']}\">
                            <i class=\"fa fa-trash\" title=\"Usuń podkategorie\" alt=\"Usuń podkategorie\"></i></a>";                
//                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=edytujkategorie&id={$this->value['id']}\">
//                            <i class=\"fa fa-navicon\" title=\"Edytuj podkategorie\" alt=\"Edytuj podkategorie\"></i></a>";
            }
//            else
//            {
//            }
            if($this->value['level'] < 3 && $this->value['hasarticle'] == 0){
                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=dodajkategorie&id=&level=".($this->value['level']+1)."&id={$this->value['id']}\">
                            <i class=\"fa fa-plus\" title=\"Edytuj podkategorie\" alt=\"Edytuj podkategorie\"></i></a>";
            }
            echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=edytujkategorie&id={$this->value['id']}&name={$this->value['name']}\">
                    <i class=\"fa fa-edit\" title=\"Edytuj podkategorie\" alt=\"Edytuj podkategorie\"></i></a>";
            // Wywołanie funkcji 
            if($this->value['haschild'] == 1){
                $this->showCategoryTree($this->value['id']);
            }
            echo "</li>";
        }
        echo "</ol>";        
    }
        
/**
 * Wyświetla drzewo artykułów
 */        
    public function showArticlesTree($PARENTID = null){
        $this->parent = $PARENTID;
        $this->con = new db;
        if($this->parent == null){
            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` IS NULL ORDER BY `order`");                                
        }         
        else
        {
            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` = {$this->parent} ORDER BY `order`");                    
        }
        
        echo "<ol>";
        foreach($this->category as $this->key => $this->value){
            echo "<li>{$this->value['name']}";
        if($this->value['haschild'] != 1 && $this->value['hasarticle'] == 0 && $this->value['level'] > 0){
            if($this->value['level'] < 4){
                    echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=dodajartykul&id={$this->value['id']}&category={$this->value['name']}&categoryID={$this->value['id']}\">
                            <i class=\"fa fa-plus\" title=\"Dodaj artykuł\" alt=\"Dodaj artykuł\"></i></a>";
            }
        }
        if($this->value['hasarticle'] == 1){
            echo "<a href=\"{$_SERVER['PHP_SELF']}?opt=edytujartykul&id={$this->value['id']}\">
                    <i class=\"fa fa-edit\" title=\"Edytuj podkategorie\" alt=\"Edytuj artykuł\"></i></a>";
            if($this->value['haschild'] != 1){
                    echo "&nbsp<a href=\"{$_SERVER['PHP_SELF']}?opt=usunartykul&id={$this->value['id']}\">
                            <i class=\"fa fa-trash\" title=\"Usuń artykuł\" alt=\"Usuń artykuł\"></i></a>";                
            }

        }
            // Wywołanie funkcji 
            if($this->value['haschild'] == 1){
                $this->showArticlesTree($this->value['id']);
            }
            echo "</li>";
        }
        echo "</ol>";        
    }
    
/**
 * Pokazuje dostępne do zapisu artykułu kategorie
 */
    public function availableCategory($SELECTED){
        $this->selected = $SELECTED;
        
        $this->con = new db;
        $this->categoryArray = $this->con->fetchAll("SELECT (SELECT `name` FROM `category` AS p WHERE p.id = c.parent) AS `parentname`,`id`,`name` FROM `category` AS c WHERE `haschild` = 0 AND `hasarticle` = 0 AND `parent` IS NOT NULL");
        $this->category = $this->con->fetchOne("SELECT `name` FROM `category` WHERE `id` = ".$this->selected);
        /**
         * Select z kategoriami
         */
        echo '
        <div class="form-group row pb-3">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Kategoria: </label>
                    <div class="col-sm-10">
                    <select class="form-control col-sm-4" name="category_id">
						<option value="" selected>Aktualna: '.$this->category['name'].'</option>
						<option disabled>Dostępne kategorie:</option>
					';
					foreach($this->categoryArray as $this->key => $this->value){
						echo "<option value=\"{$this->value['id']}\">{$this->value['parentname']} --> {$this->value['name']}</option>";
						}  
						echo "</select>				                    
					</select>
                </div>
            </div>";
    }    
          
//    public function createCategoryArray($PARENTID = null){
//        $this->parent = $PARENTID;
//        $this->con = new db;
//                        
//        if($this->parent == null){
//            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` IS NULL ORDER BY `order`");                                
//            //echo "<figure>\n\t<caption>Kategorie główne:</caption><ol>";
//        }         
//        else
//        {
//            $this->category = $this->con->fetchAll("SELECT * FROM `category` WHERE `parent` = {$this->parent} ORDER BY `order`");                    
//            //echo "<figure>\n\t<caption>Podkategorie poziom {$this->category[0]['level']}:</caption><ol>";
//        }
//        
//        foreach($this->category as $this->key => $this->value){
//            array_push($this->categoryArray, $this->value);
//            // Wywołanie funkcji 
//            if($this->value['haschild'] == 1){
//                $this->createCategoryArray($this->value['id']);
//            }
//        }
//    return $this->categoryArray;
//    }    
//    
/**
 * Zapisuje nowy artykuł do bazy danych
 */
    function saveArticle($TITLE, $CONTENT, $DATE, $CATEGORYID){
        $this->title = $TITLE;
        $this->content = $CONTENT;
        $this->date = $DATE;
        $this->categoryId = $CATEGORYID;

        $this->con = new db();

        $this->con->saveToDB("articles",         
            array(
                array('colName' => "title",
                    'colValue' => $this->title,
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "content",
                    'colValue' => $this->content,
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "date",
                    'colValue' => $this->date,
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "category_id",
                    'colValue' => $this->categoryId,
                    'colParam' => PDO::PARAM_INT),                                                            
                    ));            

        $this->con->editRecord('category',
                                array(
                                    array('colName' => "hasarticle",
                                    'colValue' => 1)),
                                "id = {$this->categoryId}");

    }    
    
/**
 * Uaktualnia rekord artykułu w bazie
 */
    public function editArticle($ID,$TITLE,$CONTENT,$DATE,$CATEGORY=null){
        $this->id = $ID;
        $this->title = $TITLE;
        $this->content = $CONTENT;
        $this->date = $DATE;
        $this->category = $CATEGORY;

        $this->con = new db;
                
        if($this->category == null){
            $this->con->editRecord('articles',
                                array(
                                    array('colName' => "title",
                                            'colValue' => $this->title),
                                    array('colName' => "content",
                                            'colValue' => $this->content),
                                    array('colName' => "date",
                                            'colValue' => $this->date)),                                            
                                "category_id = {$this->id}");
        }
        else
        {
            $this->con->editRecord('category',
                                array(
                                    array('colName' => "hasarticle",
                                            'colValue' => 0)),                                                                                        
                                "id = {$this->id}");            

            $this->con->editRecord('category',
                                array(
                                    array('colName' => "hasarticle",
                                            'colValue' => 1)),                                                                                        
                                "id = {$this->category}");            
            $this->con->editRecord('articles',
                                array(
                                    array('colName' => "title",
                                            'colValue' => $this->title),
                                    array('colName' => "content",
                                            'colValue' => $this->content),
                                    array('colName' => "date",
                                            'colValue' => $this->date),
                                    array('colName' => "category_id",
                                            'colValue' => $this->category)),                                                                                        
                                "category_id = {$this->id}");            
        }                
                                
    }
        
/**
 * Usuwa artykuł 
 */
    function delArticle($ID){
        $this->id = $ID;
        $this->con = new db;

        $this->con->editRecord('category',
                                array(
                                    array('colName' => "hasarticle",
                                    'colValue' => 0)),
                                "id = {$this->id}");
                                    
        $this->con->delFromDB('articles', 'category_id', $this->id);                                
    }    
    
/**
 * Wyświetla tabelę z kalendarzem imprez
 */    
    function showPartyTable($TYPE=null){
        $this->type = $TYPE; //($TYPE == null) ? 1 : $TYPE;
        $this->con = new db;
        if($this->type != null){
            $this->partyArray = $this->con->fetchAll("SELECT * FROM `partytable` WHERE `type` = ".$this->type);
        } else {
            $this->partyArray = $this->con->fetchAll("SELECT * FROM `partytable`");
        }
        $this->tool = new tools;



    echo '
        <main class="col-lg-12 my-lg-2 my-0 p-0 col-12 px-lg-2">
        <div class="bg-white">
          <h3 class="py-2 text-center">Kalendarz zawodów sportowych Stowarzyszenia CROSS na 2018 rok.
          </h3>
          <div class="table p-2 table-sm table-responsive">
            <table class="table table-inverse table-hover text-center">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle">LP</th>
                  <th class="align-middle">NAZWA IMPREZY</th>
                  <th class="align-middle">TERMIN REALIZACJI ZADANIA</th>
                  <th class="align-middle">MIEJSCE REALIZACJI ZADANIA</th>
                  <th class="align-middle">KOORDYNATOR ZADANIA</th>
                  <th class="align-middle">DYSCYPLINA SPORTU</th>
                  <th class="align-middle">KOMUNIKAT ZADANIA</th>
                  <th class="align-middle">WYNIKI</th>
                  <th class="align-middle">USUŃ</th>
                </tr>
              </thead>
              <tbody>';
              foreach($this->partyArray as $this->key=>$this->value){
                $this->date = $this->tool->partyTime($this->value['startdate'],$this->value['duration']);
                echo '<tr>
                  <td class="align-middle" scope="row">1</td>
                  <td class="align-middle">'.$this->value['name'].'</td>
                  <td class="align-middle">'.$this->date.'</td>
                  <td class="align-middle">'.$this->value['place'].'</td>
                  <td class="align-middle">'.$this->value['coord'].'</td>
                  <td class="align-middle">'.$this->value['discipline'].'</td>
                  <td class="align-middle">
                    <a href="#">Pobierz komunikat</a>
                  </td>
                  <td class="align-middle">
                    <a href="#">Pobierz wyniki</a>
                  </td>
                  <td>
                  </td>
                </tr>';
                }
              echo '
              </tbody>
            </table>
          </div>
        </div>
      </main>    
      ';    
    }
    
/**
 * Zapisuje do bazy wpis z pozycją kalendrza imprez
 */    
    function saveParty($NAME,$STARTDATE,$DURATION,$PLACE,$COORD,$DISCIPLINE,$TYPE=null){
        $this->name = $NAME;
        $this->startdate = $STARTDATE;
        $this->duration = $DURATION;
        $this->place = $PLACE;
        $this->coord = $COORD;
        $this->discipline = $DISCIPLINE;
        $this->type = $TYPE;

        var_dump($this->type);

        $this->con = new db();
        if($this->type == null){
            $this->con->saveToDB("partytable",         
                array(
                    array('colName' => "name",
                        'colValue' => $this->name,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "startdate",
                        'colValue' => $this->startdate,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "duration",
                        'colValue' => $this->duration,
                        'colParam' => PDO::PARAM_INT),
                    array('colName' => "place",
                        'colValue' => $this->place,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "coord",
                        'colValue' => $this->coord,
                        'colParam' => PDO::PARAM_STR),                                                            
                    array('colName' => "discipline",
                        'colValue' => $this->discipline,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "download",
                        'colValue' => '',
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "results",
                        'colValue' => '',
                        'colParam' => PDO::PARAM_STR)                                                                                                                       
                        ));
                }
                else
                {
            $this->con->saveToDB("partytable",         
                array(
                    array('colName' => "name",
                        'colValue' => $this->name,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "startdate",
                        'colValue' => $this->startdate,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "duration",
                        'colValue' => $this->duration,
                        'colParam' => PDO::PARAM_INT),
                    array('colName' => "place",
                        'colValue' => $this->place,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "coord",
                        'colValue' => $this->coord,
                        'colParam' => PDO::PARAM_STR),                                                            
                    array('colName' => "discipline",
                        'colValue' => $this->discipline,
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "download",
                        'colValue' => '',
                        'colParam' => PDO::PARAM_STR),
                    array('colName' => "results",
                        'colValue' => '',
                        'colParam' => PDO::PARAM_STR),                                                                                                                       
                    array('colName' => "type",
                        'colValue' => $this->type,
                        'colParam' => PDO::PARAM_INT)                                                                                                                       
                        ));

                }
    }    

/**
 * Czyści tablicę z kalendarzem
 */    
    public function clearPartyTable(){
        $this->con = new db;
        $this->con->clearTable("partytable");
    }    
    
/**
 * Wyświetla tabelę z newsami
 */    
    function showNewsTable(){
        $this->con = new db;
        $this->partyArray = $this->con->fetchAll("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 100");
        $this->tool = new tools;

    echo '
        <main class="col-lg-12 my-lg-2 my-0 p-0 col-12 px-lg-2">
        <div class="bg-white">
          <h3 class="py-2 text-center">Lista opublikowanych wiadomości.
          </h3>
          <div class="table p-2 table-sm table-responsive">
            <table class="table table-inverse table-hover text-center">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle">NAGŁÓWEK</th>
                  <th class="align-middle">TREŚĆ (100 znaków)</th>
                  <th class="align-middle">DATA</th>
                  <th class="align-middle">RODZAJ OGŁOSZENIA</th>
                  <th class="align-middle">EDYTUJ</th>
                  <th class="align-middle">USUŃ</th>
                </tr>
              </thead>
              <tbody>';
              foreach($this->partyArray as $this->key=>$this->value){
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
                $this->date = $this->tool->datePL($this->value['date']);
                echo '<tr>
                  <td class="align-middle">'.$this->value['title'].'</td>
                  <td class="align-middle">'.substr(strip_tags($this->value['content']),0,120).'</td>
                  <td class="align-middle">'.$this->date.'</td>
                  <td class="align-middle"><img class="small card-img-top p-2" src="images/'.$this->icon.'.svg" width=10px></img></td>
                  <td class="align-middle"><a href="'.$_SERVER['PHP_SELF'].'?opt=edytujnewsa&id='.$this->value['id'].'"><i class="fa fa-edit fa-2x" title="Edytuj newsa" alt="Edytuj newsa"></i></a></td>
                  <td class="align-middle"><a href="'.$_SERVER['PHP_SELF'].'?opt=usunnewsa&id='.$this->value['id'].'"><i class="fa fa-trash fa-2x" title="Usuń newsa" alt="Usuń newsa"></i></a></td>
                </tr>';
                }
              echo '
              </tbody>
            </table>
          </div>
        </div>
      </main>    
      ';    
    }

    function delNews($ID){
        $this->id = $ID;
        $this->con = new db;
        $this->con->delFromDB('news', 'id', $this->id);                                
    }    
    
/**
 * Wyświetla tabelę z klubami
 */

    function showClubsTable(){
//        $this->type = ($TYPE == null) ? 1 : $TYPE;
        $this->con = new db;
        $this->clubsArray = $this->con->fetchAll("SELECT * FROM `clubs`");

    echo '
        <main class="col-lg-12 my-lg-2 my-0 p-0 col-12 px-lg-2">
        <div class="bg-white">
          <h3 class="py-2 text-center">Kalendarz zawodów sportowych Stowarzyszenia CROSS na 2018 rok.
          </h3>
          <div class="table p-2 table-sm table-responsive">
            <table class="table table-inverse table-hover text-center">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle">LP</th>
                  <th class="align-middle">NAZWA</th>
                  <th class="align-middle">ADRES</th>
                  <th class="align-middle">EMAIL</th>
                  <th class="align-middle">TELEFON</th>
                </tr>
              </thead>
              <tbody>';
              foreach($this->clubsArray as $this->key=>$this->value){
                echo '<tr>
                  <td class="align-middle" scope="row">1</td>
                  <td class="align-middle">'.$this->value['name'].'</td>
                  <td class="align-middle">'.$this->value['address'].'</td>
                  <td class="align-middle">'.$this->value['email'].'</td>
                  <td class="align-middle">'.$this->value['phone'].'</td>
                </tr>';
                }
              echo '
              </tbody>
            </table>
          </div>
        </div>
      </main>    
      ';    
    }

/**
 * Zapisuje do bazy wpis z informacjami o klubach
 */    
    function saveClub($NAME,$ADDRESS,$EMAIL,$PHONE){
        $this->name = $NAME;
        $this->address = $ADDRESS;
        $this->email = $EMAIL;
        $this->phone = $PHONE;
        
        $this->con = new db;
        
        $this->con->saveToDB("clubs",         
            array(
                array('colName' => "name",
                    'colValue' => $this->name,
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "address",
                    'colValue' => $this->address,
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "email",
                    'colValue' => $this->email,
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "phone",
                    'colValue' => $this->phone,
                    'colParam' => PDO::PARAM_STR),
                ));
    }        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>