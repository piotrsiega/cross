<?php

/**
 * @author 
 * @copyright 2018
 */

class content{
    private $nobanner;

/**
 * Nagłówek strony (logo, menu, banner)
 */
public static function showHeader($NOBANNER = null){
    $nobanner = $NOBANNER;
    
echo <<<PL
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand  d-none d-sm-block" href="index.php" role+ "button" aria-label="Przejdź do strony głównej">
          <h1 class="text-hide" style="background-image: url('images/logotype-desktop.svg'); background-repeat: no-repeat; width: 247px; height: 36px;">Stowarzyszenie Kultury Fizycznej, Sportu i Turystyki Niewidomych i Słabowidzących CROSS</h1>
        </a>
        <a class="navbar-brand  d-block d-sm-none justi" aria-label="Przejdź do strony głównej" role="button" href="index.php">
          <h1 class="text-hide scale-logo" style="background-image: url('images/logo-cross.svg'); background-repeat: no-repeat; width: 180px; height: 90px;">Stowarzyszenie Kultury Fizycznej, Sportu i Turystyki Niewidomych i Słabowidzących CROSS</h1>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Menu rozwijane">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end  " id="navbarNav">
          <ul class="navbar-nav">
PL;

// Menu górne
self::showUpperMenu();

echo <<< PL
        </ul>
      </div>
    </nav>
  </header>
PL;

    echo ($nobanner == null) ? '<div class="mb-3" id="hero">' : '';
echo "</div>";
}

/**
 * Stopka strony
 */
public static function showFooter(){
echo <<<PL

    <!-- Footer -->

    <footer>
      <div class="partners row justify-content-center m-4  d-none d-lg-flex">
        <ul class="nav flex-nowrap">
          <li>
            <a href="http://www.ibca-info.org/" target="_blank">
              <img src="images/ibca_logo.png" height=50px alt="IBCA">
            </a>
          </li>
          <li>
            <a href="http://www.pfron.org.pl/" target="_blank">
              <img src="images/logo-PFRON.png" height=50px alt="IBCA">
            </a>
          </li>
          <li>
            <a href="https://www.msit.gov.pl/" target="_blank">
              <img src="images/msit_logo.png" height=50px alt="IBCA">
            </a>
          </li>
          <li>
            <a href="https://www.mpips.gov.pl/" target="_blank">
              <img src="images/logo-MRPiPS.png" height=50px alt="IBCA">
            </a>
          </li>
          <li>
            <a href="http://paralympic.org.pl/" target="_blank">
              <img src="images/pkpar_logo.png" height=50px alt="IBCA">
            </a>
          </li>
          <li>
            <a href="http://www.ibsasport.org/" target="_blank">
              <img src="images/logo-ibsa.jpg" height=50px alt="IBCA">
            </a>
          </li>
        </ul>
      </div>

      <div class="bg-dark">
        <div class="container">
          <div class="row bg-dark">
            <div class="col py-5 d-none d-sm-block col-sm-6 col-md-4 col-lg-3">
              <h3 class="text-light">O nas</h3>
              <ul class="list-group">
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php?opt=7" class="text-light">O stowarzyszeniu</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php?opt=9" class="text-light">Nasza działalność</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php?opt=8" class="text-light">Władze</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Partnerzy</a>
                </li>
              </ul>
            </div>

            <div class="col py-5 d-none d-sm-block col-sm-6 col-md-4 col-lg-3">
              <h3 class="text-light">Działalność</h3>
              <ul class="list-group">
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Projekty</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Dyscypliny</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Kalendarz imprez</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Miesięcznik "Cross"</a>
                </li>
              </ul>
            </div>

            <div class="col py-5 d-none d-sm-block col-sm-6 col-md-4 col-lg-3">
              <h3 class="text-light">Dokumenty</h3>
              <ul class="list-group">
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php?opt=10" class="text-light">Statut</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Zapytania ofertowe</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Informacje o dofinansowaniu</a>
                </li>
                <li class="list-group-item bg-dark p-1">
                  <a href="index.php" class="text-light">Regulaminy</a>
                </li>
              </ul>
            </div>



            <div class="col-sm-6 col-12 py-5 text-center text-sm-left text-md-center text-lg-left col-md-12 col-lg-3">
              <p class="text-light text-uppercase font-weight-bold">Stowarzyszenie Kultury Fizycznej,
                <br> Sportu i Turystyki Niewidomych
                <br>i Słabowidzących CROSS</p>
              <p class="text-light">ul. Konwiktorska 9
                <br> 00-216 Warszawa
              </p>
              <p class="text-light h3 font-weight-bold">
                <i class="fas fa-phone"></i> 22 412 18 80</p>
              <p class="text-light h4 font-weight-bold text-nowrap">
                <i class="fas fa-envelope"></i>
                <a href="mailto:biuro@cross.org.pl" class="text-light"> biuro@cross.org.pl</a>
              </p>
            </div>

            <div class="col-12 p-2">
              <p class="text-light text-small text-center text-nowrap">Copyright&copy Cross 2018</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>
PL;

echo '
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="JS/maps.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEF7TIVCnBNOUw0yuPa91k1eOfS_fDHNs&callback=myMap"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <script src="JS/tinymce/tinymce.min.js"></script>
        <script src="JS/tiny.js"></script>            
</body>
</html>';
}

/**
 * Wyświetla nagłówek panelu administracyjnego 
 */ 
    static function showAdminHeader(){
echo <<<PL
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		
		<title>Cross - Panel administracyjny</title>

    </head>
    <body class="bg-light">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand  d-none d-sm-block" href="index.php">
        <h1 class="text-hide" style="background-image: url('images/logotype-desktop.svg'); width: 340px; height: 49px;">Stowarzyszenie Kultury Fizycznej, Sportu i Turystyki Niewidomych i Słabowidzących CROSS</h1>
      </a>
      <a class="navbar-brand  d-block d-sm-none justi" href="index.php">
        <h1 class="text-hide" style="background-image: url('images/logo-cross.svg'); width: 200px; height: 100px;">Stowarzyszenie Kultury Fizycznej, Sportu i Turystyki Niewidomych i Słabowidzących CROSS</h1>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end  " id="navbarNav">
PL;
    if(isset($_SESSION['logged'])){      
        echo '<ul class="navbar-nav">
                    <li class="nav-item dropdown"> <!-- Poziom 1 -->
                        <a class="nav-link text-primary" href="admin.php?opt=kategorie" id="navbarDropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Kategorie</a></li>
                    <li class="nav-item dropdown"> <!-- Poziom 1 -->
                        <a class="nav-link text-primary" href="admin.php?opt=artykuly" id="navbarDropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Artykuły</a></li>
                    <li class="nav-item dropdown"> <!-- Poziom 1 -->
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">Wiadomości</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin.php?opt=pokaznewsy">Pokaż wiadomości</a>
                            <a class="dropdown-item" href="admin.php?opt=dodajnewsa">Dodaj wiadomość</a>
                        </div><span class="sr-only">(current)</span></li>
                    <li class="nav-item dropdown"> <!-- Poziom 1 -->
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">Kalendarz imprez</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin.php?opt=kalendarzimprez">Pokaż kalendarz</a>
                            <a class="dropdown-item" href="admin.php?opt=dodajdokalendarza">Dodaj imprezę</a>
                            <a class="dropdown-item" href="admin.php?opt=wyczysckalendarz">Wyczyść kalendarz</a>
                        </div><span class="sr-only">(current)</span></li>
                    <li class="nav-item dropdown"> <!-- Poziom 1 -->
                        <a class="nav-link text-primary" href="admin.php?opt=wyloguj" id="navbarDropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Wyloguj</a></li>
        </ul>';
}

echo <<<PL
      </div>
    </nav>
  </header><div><center><h2>Panel administracyjny</h2></center></div>
PL;
        
    }


/**
 * Wyświetla górne menu
 */
    static function showUpperMenu($PARENTID = null){

        $parent = $PARENTID;
        $con = new db;
                
        $category = $con->fetchAll("SELECT * FROM `category` WHERE `level` IN (0,1) ORDER BY `order`");                                
        
        $level0 = Array();
        $level1 = Array();
        
        foreach($category as $key => $value){
            if($value['level'] == 0){
                array_push($level0, $value);
            }
            else
            {
                array_push($level1, $value);
            }
        }

        foreach($level0 as $keyLvl0 => $valueLvl0){

        echo "<li class=\"nav-item dropdown\"> <!-- Poziom 1 -->
                    <a class=\"nav-link dropdown-toggle text-primary\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                      aria-expanded=\"false\">{$valueLvl0['name']}</a>";
                        
                    if(!empty($level1)){
                        echo '<div class="dropdown-menu '; 
                        if($valueLvl0['id'] == 5) echo "dropdown-menu-right"; 
                        echo'" aria-labelledby="navbarDropdown">';
                        foreach($level1 as $keyLvl1=>$valueLvl1){
                            if($valueLvl1['parent'] == $valueLvl0['id']){
                                echo "<a class=\"dropdown-item\" href=\"index.php?opt={$valueLvl1['id']}\">{$valueLvl1['name']}</a>";
                            }                    
                        }
                    echo '
                      </div>';
                    }  
                    echo '<span class="sr-only">(current)</span>
                    </a>
                 </li>';
        
                }
}

    static function showAsideMenu($ID){
        $categoryArray = Array();
        $con = new db;
        $h3 = $con->fetchOne("SELECT `name`,`level`,`haschild`,`parent` FROM `category` WHERE `id` = $ID");
        
        if($h3['haschild'] == 1){
            $category = $con->fetchAll("SELECT `id`,`name` FROM `category` WHERE `parent` = $ID");
        }
        else
        {
            $category = $con->fetchAll("SELECT * FROM `category` WHERE `level` = 
                                        (SELECT `level` FROM category WHERE id={$ID}) AND `parent` = 
                                        (SELECT `parent` FROM category WHERE id={$ID})"); 
        }
        echo '
        <aside class="col-lg-3 my-lg-2 my-0 text-center text-lg-left px-0 px-lg-2">
            <div class="py-2 bg-white">
              <h3 class="#">'.$h3['name'].'</h3>
              <!-- <div class="col-3 p-5"> -->
              <ul class="list-group">';
              foreach($category as $key=>$value){
                array_push($categoryArray,$value['id']);
                echo "<li class=\"list-group-item p-1\">
                  <a href=\"index.php?opt={$value['id']}\" class=\"text-primary\">{$value['name']}</a>
                </li>";
              }
        echo '
              </ul>
            </div>
            <!-- </div> -->
        </aside>';
        return $categoryArray;
    } 



    static function showAsideCalendarMenu($ID){
        $categoryArray = Array();
        $con = new db;
        $category = $con->fetchAll("SELECT `id`,`name` FROM `category` WHERE `parent` = (
                        SELECT `parent` FROM `category` WHERE `id` = $ID) AND `level` = (SELECT `level` FROM `category` WHERE `id` = $ID)");
        echo '
        <aside class="col-lg-3 my-lg-2 my-0 text-center text-lg-left px-0 px-lg-2">
            <div class="py-2 bg-white">
              <h3 class="#">Kalendarz imprez</h3>
              <!-- <div class="col-3 p-5"> -->
              <ul class="list-group">';
              foreach($category as $key=>$value){
                array_push($categoryArray,$value['id']);
                echo "<li class=\"list-group-item p-1\">
                  <a href=\"index.php?opt={$value['id']}\" class=\"text-primary\">{$value['name']}</a>
                </li>";
              }
        echo '
              </ul>
            </div>
            <!-- </div> -->
        </aside>';
        return $categoryArray;
    } 

/**
 * Wyświetla stronę pobraną z bazy danych
 */
    public static function showPage($ID){
//        $content()
        echo '<div class="row">';

        self::showAsideMenu($ID);
        
        $con = new db;
        $hasChild = $con->fetchOne("SELECT `haschild` FROM `category` WHERE `id` = {$ID}");

        if($hasChild['haschild'] == 1){
            $temp = $con->fetchOne("SELECT `id` FROM `category` WHERE `parent` = {$ID} LIMIT 1");
            $ID = $temp['id'];
        };


        $article = $con->fetchOne("SELECT `title`,`content` FROM `articles` WHERE `category_id` = {$ID}");        

        echo '<main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
            <div class="bg-white px-2 pb-2">
                <h3 class="p-2 text-center">'.$article['title'].'</h3>';
                
            echo $article['content'];
            echo '</div>';


            
            echo '</div>
        </main>
        </div>';

    
    }

/**
 * Wyświetla stronę kalendarza imprez
 */
    public static function showPartyPage($ID){
echo '
    <div class="row">';

    $category = self::showAsideCalendarMenu($ID);

    switch($_GET['opt']){
        case 33:
        $type = 1;
        break;
        
        case 34:
        $type = 2;
        break;
        
        case 35:
        $type = 3;
        break;
    }
    
    $tool = new tools;
    $con = new db;
    $partyTable = $con->fetchAll("SELECT * FROM `partytable` WHERE `type` = ".$type);
//    var_dump($partyTable);
    

    //$partyTable = $con->fetchAll()

        echo '
          <main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
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
                    </tr>
                  </thead>
                  <tbody>';
                  foreach($partyTable as $key=>$value){
                    $date = $tool->partyTime($value['startdate'],$value['duration']);
                    if($value['commfile'] != null) $commFile = $con->fetchOne("SELECT `name`,`extension` FROM `files` WHERE `id` = ".$value['commfile']);
                    if($value['resultfile'] != null) $resultFile = $con->fetchOne("SELECT `name`,`extension` FROM `files` WHERE `id` = ".$value['resultfile']);
//                    if($value['commfile'] != null) var_dump($commFile);

                    echo '
                    <tr>
                      <td class="align-middle" scope="row">1</td>
                  <td class="align-middle">'.$value['name'].'</td>
                  <td class="align-middle">'.$date.'</td>
                  <td class="align-middle">'.$value['place'].'</td>
                  <td class="align-middle">'.$value['coord'].'</td>
                  <td class="align-middle">'.$value['discipline'].'</td>
                  <td class="align-middle">';
                        if($value['commfile'] != null) echo "<a href=\"files/calendar/{$value['commfile']}.{$commFile['extension']}\" download=\"{$commFile['name']}.{$commFile['extension']}\">Pobierz komunikat</a>";
                  echo '</td>
                  <td class="align-middle">';
                        if($value['resultfile'] != null) echo "<a href=\"files/calendar/{$value['resultfile']}.{$resultFile['extension']}\" download=\"{$resultFile['name']}.{$resultFile['extension']}\">Pobierz komunikat</a>";
                  echo '</td>
                  </tr>';
                  }
                  echo '
                  </tbody>
                </table>
              </div>
              <p class="p-2">Stowarzyszenie „Cross” informuje, że wyżej wymienione imprezy sportowe są dofinansowywane ze środków Funduszu Rozwoju
                Kultury Fizycznej w ramach umów zawartych z Ministerstwem Sportu i Turystyki na 2017 rok oraz przez Państwowy
                Fundusz Rehabilitacji Osób Niepełnosprawnych w ramach realizacji projektu "Wspólny start 2017".</p>
            </div>
          </main>
        </div>
';
}
  
    public static function showNews($ID){
        
        $con = new db;
        $tool = new tools;
        $news = $con->fetchOne("SELECT `title`,`content`,`date`,`icon` FROM `news` WHERE `id` = {$ID}");

        switch($news['icon']){
            case "z":
                $icon = "zawody";
                break;
            case "o":
                $icon = "obozy";
                break;
            case "s":
                $icon = "szkolenia";
                break;
            case "k":
                $icon = "komunikaty";
                break;
            }

        echo '<!-- <div class="container"> -->
        <div class="row justify-content-center">
            <main class="col m-4 p-2 bg-white d-flex flex-column" style="max-width: 960px;">
                <div class="hcontent p-3">
                    <img src="images/'.$icon.'.svg" alt="'.$icon.'" class="icon mx-auto my-3 d-block">
                    <h3 class="mb-0 pt-3">'.$news['title'].'</h3>
                    <h6 class="font-weight-light">Ostatnia modyfikacja: '.$tool->datePL($news['date']).'</h6>
                </div>
                <div class="bcontent p-3">';
                    echo $news['content'];
                echo '</div>
            </main>
        <!-- </div> -->
    </div>

';
    }

    public static function kontakt($ID){
        echo '<div class="row">';
        self::showAsideMenu($ID);        
            echo '<main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
                <div class="bg-white px-2">
                    <h3 class="py-2 text-center">Kontakt</h3>
                    <div class="row d-lg-flex justify-content-around">
                        <div class="col-md-6 col-12 p-3">
                            <p class="text-uppercase font-weight-bold">Stowarzyszenie Kultury Fizycznej,
                                <br> Sportu i Turystyki Niewidomych
                                <br>i Słabowidzących CROSS</p>
                            <p class="#">ul. Konwiktorska 9
                                <br> 00-216 Warszawa
                            </p>
                            <p class="font-weight-bold">
                                <i class="fas fa-phone" aria-label="Telefon"></i> 22 412 18 80</p>
                            <p class="font-weight-bold text-nowrap">
                                <i class="fas fa-envelope" aria-label="e-mail"></i>
                                <a href="mailto:biuro@cross.org.pl" class="#"> biuro@cross.org.pl</a>
                            </p>
                            <p>Biuro organizacji (pokój 37, I piętro) jest czynne od poniedziałku do piątku w godzinach: 8-16.</p>


                            <p>
                                <span class="font-weight-bold">KRS: </span>0000247136</span>
                            </p>
                            <p>
                                <span class="font-weight-bold">NIP: </span>525-12-90-682</span>
                            </p>
                            <p>
                                <span class="font-weight-bold">Numer konta bankowego BZ WBK S.A.</span>
                                <br> 1090 2590 0000 0001 3341 4035</span>
                            </p>
                        </div>
                        
                        <div id="googleMap" class="col-md-6 col-12 p-3 d-none d-md-block" style="width:100%;height:400px;"></div>
                       
                        <div class="col-md-6 col-12 p-3">
                            <p class="h5">Dyrektor biura:</p>
                            <p>Przemysław Warszewski
                                <br>
                                <a href="mailto:przemek@cross.org.pl"> przemek@cross.org.pl</a>
                            </p>
                            <p class="h5">Pracownicy biura:</p>
                            <p>Bożena Bielska
                                <br> Telefon: 660 999 305
                                <br>
                                <a href="mailto:bozena@cross.org.pl"> bozena@cross.org.pl</a>
                            </p>
                            <p>Artur Prusek
                                <br> Telefon: 660 997 159
                                <br>
                                <a href="mailto:artur@cross.org.pl"> artur@cross.org.pl</a>
                            </p>
                            <p>Sylwia Sobczak
                                <br> Telefon: 660 997 166
                                <br>
                                <a href="mailto:sylwia@cross.org.pl"> sylwia@cross.org.pl</a>
                            </p>
                            <p>Anna Możdżonek
                                <br> Telefon: 22 412 18 80
                                <br>
                                <a href="mailto:ania@cross.org.pl"> ania@cross.org.pl</a>
                            </p>
                            <p class="h5">Księgowość (poniedziałek, czwartek, piątek):</p>
                            <p>Arkadiusz Bobrowski
                                <br> Telefon: 660 993 266
                                <br>
                                <a href="mailto:ksiegowosc@cross.org.pl"> ksiegowosc@cross.org.pl</a>
                            </p>
                        </div>
                        <div class="col-md-6 col-12 p-3 d-none d-md-block">
                            <p class="h5">Formularz kontaktowy:</p>
                                <form>
                                    <div class="foru-group">
                                        <div class="form-group">
                                            <label for="name">Imię i nazwisko</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Imię i nazwisko" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Pole wymagane</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="e-mail">E-mail</label>
                                            <input type="email" class="form-control" name="e-mail" id="e-mail" placeholder="Wprowadź e-mail" aria-describedby="emailHelpId" placeholder="">
                                            <small id="emailHelpId" class="form-text text-muted">Pole wymagane</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Treść</label>
                                            <textarea class="form-control" name="content" id="content" rows="10" placeholder="Wpisz treść..."></textarea>
                                        </div>
                                            <button type="submit" class="btn btn-primary">Wyślij</button>
                                    </div>
                                </form>
                            </div>
    
                    </div>
            </main>
            </div>        
        ';
    }
    
    public static function ostowarzyszeniu($ID){
        echo '<div class="row">';
        self::showAsideMenu($ID);
        echo '<main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
                <div class="bg-white px-2 pb-2">
                    <h3 class="py-2 text-center">O stowarzyszeniu.</h3>
                    <p>Stowarzyszenie Kultury Fizycznej Sportu i Turystyki Niewidomych i Słabowidzących CROSS powstało w 1991 roku.</p>

                    <p>Od maja 2005 roku Stowarzyszenie posiada status organizacji pożytku publicznego.</p>

                    <p>Prezesem organizacji jest Pani Józefa Spychała.</p>

                    <p>Głównym celem statutowym Stowarzyszenia jest propagowanie i rozwijanie kultury fizycznej oraz sportu wśród niewidomych i słabowidzących, zarówno wśród dorosłych, jak i dzieci oraz młodzieży.</p>

                    <p>Stowarzyszenie ma zasięg ogólnopolski i zrzesza obecnie ponad 4000 członków w 42 jednostkach terenowych zlokalizowanych na terenie całej Polski. Kluby mieszczą się we wszystkich większych miastach Polski i prowadzą swą działalność na terenie całego kraju. W każdej jednostce terenowej Stowarzyszenia działają sekcje sportowe, w których odbywają się zajęcia i treningi, podczas których pod okiem instruktorów i trenerów zawodnicy podnoszą swoje kwalifikacje, by najlepsi z nich mogli następnie reprezentować klub na zawodach ogólnopolskich i międzynarodowych. Stowarzyszenie rozwija i promuje nastepujace dyscypliny: szachy, warcaby, brydż, kręgle, bowling, biegi, showdown, piłka nożna, wioslarstwo, kajakrastwo, taniec. W większości yscyplin, organizowane są rozgrywki eliminacyjne, półfinały, do finałów Mistrzostw Polski włącznie. Ponad to, Stowarzyszenie CROSS rganizuje różnego rodzaju szkolenia, które mają na celu aktywizację zawodową, integrację społeczną i zawdodową nosprawnych.</p>

                </div>
            </main>
        </div>
';
    }
    
    public static function wladze($ID){
        echo '<div class="row">';
        self::showAsideMenu($ID);
        echo '
            <main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
                <div class="bg-white px-2 pb-2">
                    <h3 class="p-2 text-center">Władze stowarzyszenia.</h3>
                    <p>Władze Stowarzyszenia dbają o rozwój i wspierają sekcje sportowe działające w poszczególnych jednostkach terytorialnych (klubach).</p>

                    <p class="h5">Władzami naczelnymi Stowarzyszenia są:</p>
                    <ul>
                        <li>Krajowy Sejmik Stowarzyszenia</li>
                        <li>Rada Krajowa</li>
                        <li>Komisja Rewizyjna Stowarzyszenia</li>
                        <li>Sąd Koleżeński Stowarzyszenia</li>
                    </ul>

                    <p>Władze Stowarzyszenia pochodzą z wyboru.<br>
                    Ostatni Zjazd Sprawozdawczo - Wyborczy odbył się 21.11.2015 roku w Wągrowcu.<br>
                    Kadencja władz naczelnych trwa 4 lata.</p>

                    <p class="h5">W skład Rady Krajowej Stowarzyszenia Cross wchodzą:</p>
                    <ul>
                        <li>Józefa Spychała- Prezes</li>
                        <li>Mirosław Mirynowski- Wiceprezes</li>
                        <li>Joanna Staliś - Wiceprezes</li>
                        <li>Jerzy Hanus - Sekretarz Generalny</li>
                        <li>Adam Dzitkowski - Członek Prezydium</li>
                        <li>Wacław Morgiewicz - Członek Prezydium</li>
                        <li>Józef Plichta - Członek Prezydium</li>
                        <li>Krzysztof Badowski- Członek Rady Krajowej</li>
                        <li>Kazimierz Curyło - Członek Rady Krajowej</li>
                        <li>Michał Czarski- Członek Rady Krajowej</li>
                        <li>Andrzej Gasiul - Członek Rady Krajowej</li>
                        <li>Anna Grabowicz - Członek Rady Krajowej</li>
                        <li>Piotr Łożyński - Członek Rady Krajowej</li>
                        <li>Janina Maksymowicz - Członek Rady Krajowej</li>
                        <li>Antoni Szczuciński - Członek Rady Krajowej</li>
                    </ul>

                    <p class="h5">Do Komisji Rewizyjnej Stowarzyszenia Cross wybrani zostali:</p>
                    <ul>
                        <li>Jolanta Maźniak - Przewodnicząca</li>
                        <li>Zofia Sarnacka - Wiceprzewodnicząca</li>
                        <li>Sławomir Gruszkowski - Sekretarz</li>
                        <li>Józefa Juźko - Członek</li>
                        <li>Lidia Piechowicz - Członek</li>
                        <li>Alicja Pogorzelska - Członek</li>
                        <li>Grażyna Woźniak - Członek</li>
                    </ul>

                    <p class="h5">Do Sądu Koleżeńskiego wybrani zostali:</p>
                    <ul>
                        <li>Irena Curyło - Przewodnicząca </li>
                        <li>Stanisław Piasek - Wiceprzewodniczący</li>
                        <li>Grzegorz Nowak - Sekretarz </li>
                        <li>Janusz Polakowski - Członek</li>
                        <li>Tadeusz Kolbusz - Członek</li>
                        <li>Renata Tomaszewska - Członek</li>
                        <li>Krystyna Krajewska - Członek</li>
                        <li>Zbigniew Olbryś - Członek</li>
                        <li>Stanisław Raczek - Członek</li>
                    </ul>
                </div>
            </main>
        </div>
';
    }
    
    public static function dzalalnosc($ID){
        echo '<div class="row">';
        self::showAsideMenu($ID);        
            echo '<main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
                <div class="bg-white px-2 pb-2">
                    <h3 class="p-2 text-center">Nasza działalność.</h3>
                    <p>Najważniejszymi Partnerami w finansowaniu działalności Stowarzyszenia są następujące instytucje:</p>

                    <ul>
                        <li>Ministerstwo Sportu i Turystyki</li>
                        <li>Państwowy Fundusz Rehabilitacji Osób Niepełnosprawnych</li>
                    </ul>


                    <p class="h5">DZIALALNOŚĆ W ZAKRESIE SPORTU</p>
                    <p>W Stowarzyszeniu działa aktywnie kilkanaście sekcji sportowych, m.in.: </p>
                    <ul>
                        <li>Jszachowa</li>
                        <li>brydżowa</li>
                        <li>warcabowa</li>
                        <li>biegowa</li>
                        <li>kajakarska</li>
                        <li>żeglarska</li>
                        <li>wioślarska</li>
                        <li>kręglarska</li>
                        <li>bowlingowa</li>
                        <li>pływacka</li>
                        <li>tańca sportowego</li>
                        <li>showdown</li>
                    </ul>

                    <p>W każdej z dyscyplin opracowane są regulaminy udziału i sposobu przeprowadzania zajęć i rozgrywek (w
                        oparciu oogólnopolskie), a nad całością prac sekcji czuwają komisje sportowe. Taka struktura gwarantuje
                        prawidłową, zgodną z przepisami i zekiwaniami członków działalność Stowarzyszenia.</p>

                    <p>Zgrupowania - mają one na celu zdobywanie i doskonalenie umiejętności w danej dyscyplinie sportowej i
                        kształcenie kadry. Szkolenia są podporządkowane komisjom sportowym oraz przepisom obowiązującym w
                        danej dyscyplinie. Do przeprowadzenia szkoleń zatrudniani są trenerzy, instruktorzy sportowi, turystyczni
                        i tyflopedagodzy.</p>

                    <p>Imprezy - to cykl rozgrywek, w których udział biorą członkowie Stowarzyszenia. Celem tego typu zawodów
                        jest sprawdzenie zdobytych umiejętności, szansa współzawodnictwa sportowego, możliwość podnoszenia
                        kwalifikacji. Osoby z dysfunkcją wzroku tak samo jak osoby pełnosprawne chcą uczestniczyć w różnego
                        rodzaju zawodach sportowych. Stworzenie szeroko dostępnych możliwości uczestniczenia w zawodach sportowych
                        jest warunkiem powodzenia przeprowadzanych szkoleń, przynosząc efekty rehabilitacyjne, społeczne,
                        sportowe.
                    </p>

                    <p>Obozy – letnie i zimowe obozy sportowe, których adresatem są zarówno dzieci i młodzież z dysfunkcją wzroku
                        jak i dorośli członkowie klubów Stowarzyszenia. Akcje te mają charakter ogólnopolski. Celem tego
                        bloku jest edukacja z zakresu aktywnego i zdrowego spędzania czasu, rozwoju kultury fizycznej, organizacji
                        imprez turystycznych, jak również pomoc w wyborze "sposobu na życie". Obozy dają młodzieży możliwość
                        poznania własnego środowiska, a także uczą zasad współżycia w grupie.</p>

                    <p>Kluby – w skład struktury organizacyjnej Stowarzyszenia wchodzą kluby - jednostki terytorialne zlokalizowane
                        na terenie całej Polski, zrzeszające łącznie ponad 4.000 członków. Każdy z klubów prowadzi zajęcia
                        szkoleniowe w sekcjach sportowych w wybranych dyscyplinach. W klubach przeprowadzane są też turnieje
                        i rozgrywki a ich zwycięzcy kwalifikowani są do dalszych już ogólnopolskich zawodów.</p>

                    <p>W ramach dofinansowania otrzymanego z Państwowego Funduszu Rehabilitacji Osób Niepełnosprawnych, Stowarzyszenie
                        realizuje nastepujace projekty:</p>
                </div>
            </main>
        </div>';
    }
    
    public static function statut($ID){
        echo '<div class="row">';
        self::showAsideMenu($ID);        
            echo '<main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
                <div class="bg-white px-2 pb-2">
           <main class="col-lg-9 my-lg-2 my-0 p-0 col-12 px-lg-2">
                <div class="bg-white px-2 pb-2">
                    <h3 class="py-2 text-center">STATUT STOWARZYSZENIA KULTURY FIZYCZNEJ, SPORTU I TURYSTYKI NIEWIDOMYCH I SŁABOWIDZĄCYCH „CROSS”.</h3>
                    <p class="font-weight-bold text-center pt-5">Rozdział I Postanowienia ogólne</p>

                    <p class="text-center">Art. 1</p>

                    <ol>
                        <li>STOWARZYSZENIE KULTURY FIZYCZNEJ, SPORTU I TURYSTYKI NIEWIDOMYCH I SŁABOWIDZĄCYCH „CROSS”, zwane
                            dalej „Stowarzyszeniem”, jest dobrowolnym, samorządnym trwałym zrzeszeniem posiadającym osobowość
                            prawną które działa w oparciu o ustawę z dnia 7 kwietnia - Prawo stowarzyszeniach (tekst jedn.:
                            Dz. U. z 2001 r. Nr 79, poz. 855, z późn zm ) ustawę z dnia 25 czerwca 2010 r. o sporcie (Dz.
                            U. Nr 127, poz. 857, z późn. zm.), ustawę z dnia 24 kwietnia 2003 r. o działalności pożytku publicznego
                            i o wolontariacie (tekst jedn.: Dz. U. z 2010 r Nr 234, poz. 1536, z późn. zm.) oraz niniejszy
                            Statut.
                        </li>
                        <li>Stowarzyszenie może używać skróconej nazwy STOWARZYSZENIE „CROSS".</li>
                        <li>Nazwa Stowarzyszenia jest prawnie zastrzeżona.</li>
                    </ol>

                    <p class="text-center">Art. 2</p>

                    <ol>
                        <li>Terenem działania stowarzyszenia jest obszar Rzeczypospolitej Polskiej, a siedzibą jego władz naczelnych
                            m.st. Warszawa.</li>
                        <li>Dla właściwego realizowania swych celów Stowarzyszenie może prowadzić działalność poza granicami
                            Rzeczypospolitej Polskiej. </li>
                    </ol>

                    <p class="text-center">Art. 3</p>

                    <p>Stowarzyszenie posiada osobowość prawną.</p>

                    <p class="text-center">Art. 4</p>

                    <p>Stowarzyszenie posiada sztandar i odznakę organizacyjną oraz używa pieczęci zgodnie z obowiązującymi
                        w tym zakresie przepisami.</p>

                    <p class="text-center">Art. 5</p>
                    <p>Stowarzyszenie może być członkiem krajowych i międzynarodowych organizacji o podobnym profilu działania.</p>

                    <p class="text-center">Art. 6</p>
                    <ol>
                        <li>Jednostkami organizacyjnymi Stowarzyszenia są kluby.</li>
                        <li>Kluby posiadają osobowość prawną jako terenowe jednostki organizacyjne Stowarzyszenia.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rozdział II Cele, działania i sposoby ich realizacji</p>

                    <p class="text-center">Art. 7</p>
                    <p>Celem Stowarzyszenia jest rozwijanie i organizacja powszechnej kultury fizycznej, sportu, rehabilitacji,
                        turystyki i czynnego wypoczynku w środowisku inwalidów wzroku.</p>
                    <p>Ponadto celem Stowarzyszenia jest:</p>
                    <ol>
                        <li>integracja społeczna i zawodowa niepełnosprawnych;</li>
                        <li>promocja wzrostu zatrudnienia niepełnosprawnych;</li>
                        <li>aktywizacja zawodowa niepełnosprawnych;</li>
                        <li>przeciwdziałanie bezrobociu i wykluczeniu społecznemu niepełnosprawnych;</li>
                        <li>promocja zdolności adaptacyjnych i przedsiębiorczości niepełnosprawnych;</li>
                        <li>doskonalenie kadr w środowisku niepełnosprawnych;</li>
                        <li>wzmacnianie potencjału instytucjonalnego w środowisku niepełnosprawnych;</li>
                        <li>wdrażanie nowych technik komputerowych i elektronicznych ukierunkowanych na niepełnosprawnych;</li>
                        <li>budowa otwartego, opartego na wiedzy społeczeństwa poprzez zapewnienie warunków do rozwoju zasobów
                            ludzkich w drodze kształcenia, szkolenia i pracy w środowisku niepełnosprawnych;</li>
                        <li>upowszechnianie dostępu do Internetu i zapewnienie łatwiejszego dostępu do informacji w środowisku
                            niepełnosprawnych;
                        </li>
                        <li>rozwój dostępu do infrastruktury komunikacji elektronicznej w środowisku niepełnosprawnych;</li>
                        <li>wspieranie działalności społecznej na rzecz integracji społecznej w celu ograniczenia dyskryminacji
                            osób niepełnosprawnych;</li>
                        <li>poprawa poziomu przygotowania zawodowego i możliwości zatrudnienia osób niepełnosprawnych.</li>
                    </ol>

                    <p class="text-center">Art. 8</p>

                    <p>Stowarzyszenie realizuje swoje cele w szczególności poprzez:</p>
                    <ol>
                        <li>umożliwianie zainteresowanym zrzeszania się w jednostkach organizacyjnych Stowarzyszenia i korzystania
                            w pierwszej kolejności ze wszystkich form jego działalności;</li>
                        <li>objęcie swoją działalnością najszerszych rzesz osób niepełnosprawnych z tytułu wad wzroku, w tym
                            również młodzieży do lat 16;</li>
                        <li>upowszechnianie kultury fizycznej, turystyki i sportu w środowisku niewidomych i słabowidzących;</li>
                        <li>organizowanie imprez w zakresie kultury fizycznej, sportu, rehabilitacji i czynnego wypoczynku;</li>
                        <li>organizowanie imprez sportowych dla środowiska, opieka nad sportowcami, powoływanie kadry sportowej
                            środowiska niewidomych i słabowidzących;</li>
                        <li>organizowanie różnych form turystyki krajowej i zagranicznej;</li>
                        <li>kształcenie i doskonalenie społecznych i zawodowych kadr oraz nadawanie odpowiednich uprawnień kwalifikacyjnych
                            zgodnie z obowiązującymi przepisami;</li>
                        <li>nawiązywanie i utrzymywanie krajowych i międzynarodowych kontaktów sportowych;</li>
                        <li>ustanawianie i nadawanie odznak osobom niewidomym i słabowidzącym w zakresie sportu i turystyki;</li>
                        <li>rejestrowanie i zatwierdzanie najlepszych wyników sportowych uzyskiwanych przez niewidomych i słabowidzących;</li>
                        <li>inicjowanie, prowadzenie a także popieranie prac, w tym także naukowych, wynikających z celów Stowarzyszenia;</li>
                        <li>prowadzenie działalności wydawniczej wynikającej z celów Stowarzyszenia;</li>
                        <li>współdziałanie z organizacjami i instytucjami państwowymi, w tym z Polskim Związkiem Niewidomych
                            oraz pracodawcami osób niewidomych i słabowidzących;</li>
                        <li>utrzymywanie kontaktów i współpraca z organizacjami zagranicznymi i międzynarodowymi, w szczególności
                            z tymi, których cele zbliżone są do celów Stowarzyszenia;</li>
                        <li>budowanie i prowadzenie obiektów, urządzeń sportowych i turystycznych;</li>
                        <li>prowadzenie działalności gospodarczej w różnych formach organizacyjnych, umożliwiających zdobycie
                            środków na realizację celów i zadań Stowarzyszenia;</li>
                        <li>organizowanie programów doradztwa zawodowego;</li>
                        <li>organizowanie kursów i szkoleń podnoszenia kwalifikacji;</li>
                        <li>organizowanie spotkań i konferencji;</li>
                        <li>tworzenie ośrodków doradztwa;</li>
                        <li>pomoc i pośrednictwo w poszukiwaniu pracy;</li>
                        <li>prowadzenie kampanii informacyjnych.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rozdział III Członkowie, ich prawa i obowiązki</p>
                    <p class="text-center">Art. 9</p>
                    <p>Członkowie Stowarzyszenia dzielą się na:</p>
                    <ol>
                        <li>zwyczajnych</li>
                        <li>nadzwyczajnych</li>
                        <li>honorowych</li>
                        <li>wspierających</li>
                    </ol>

                    <p class="text-center">Art. 10</p>
                    <ol>
                        <li>Członkowie zwyczajni i nadzwyczajni zrzeszeni są w klubach.</li>
                        <li>Członkowie zwyczajni i nadzwyczajni zrzeszeni są w klubach.</li>
                        <ol class="sublist">
                            <li>obywatel polski - w stosunku do którego określono niepełnosprawność z tytułu utraty wzroku w
                                stopniu znacznym lub umiarkowanym, który złoży pisemną deklarację członkowską i zostanie
                                przyjęty przez zarząd lub radę klubu; małoletni obywatel polski do lat 16-tu, którego wady
                                wzroku kwalifikują do określenia niepełnosprawności w stopniu znacznym lub umiarkowanym,
                                który za zgodą przedstawicieli ustawowych złoży pisemną deklarację członkowską i zostanie
                                przyjęty przez zarząd lub radę klubu;</li>
                            <li>cudzoziemiec mieszkający na terytorium Rzeczpospolitej Polskiej, który spełnia warunki przewidziane
                                dla obywateli polskich.</li>
                        </ol>
                        <li>Członkiem nadzwyczajnym Stowarzyszenia może być obywatel polski mający pełną zdolność do czynności
                            prawnych, niepozbawiony praw publicznych, pracujący w środowisku osób niewidomych i słabowidzących
                            i przyczyniający się do rozwoju kultury fizycznej, sportu i turystyki w tym środowisku, który
                            złoży pisemną deklarację członkowską i zostanie przyjęty przez zarząd lub radę klubu.</li>
                        <li>Na decyzję o odmowie przyjęcia służy odwołanie do sejmiku lub walnego zebrania klubu złożone w terminie
                            14 dni od doręczenia za pośrednictwem organu, który podjął decyzję. Odwołanie powinno być rozpatrzone
                            nie później niż w ciągu 6 miesięcy od daty jego złożenia. Decyzja w tej sprawie podjęta przez
                            sejmik lub walne zebranie klubu jest ostateczna.</li>
                    </ol>
                    <p class="text-center">Art. 11</p>
                    <p>Członkiem honorowym może być osoba fizyczna szczególnie zasłużona dla rozwoju kultury fizycznej, sportu
                        i turystyki w środowisku osób niewidomych i słabowidzących, której godność taką nada Krajowy Sejmik
                        Stowarzyszenia.
                    </p>

                    <p class="text-center">Art. 12</p>
                    <ol>
                        <li>Członkiem wspierającym może być osoba fizyczna lub prawna, która popiera działalność Stowarzyszenia
                            i zadeklaruje opłacenie składki członkowskiej w wysokości ustalonej przez Radę Krajową.</li>
                        <li>Członka wspierającego przyjmuje Rada Krajowa, rada lub zarząd klubu.</li>
                    </ol>
                    <p class="text-center">Art. 13</p>
                    <ol>
                        <li>Członek zwyczajny Stowarzyszenia mający pełną zdolność do czynności prawnych oraz członek nadzwyczajny
                            mają prawo:</li>
                        <ol class="sublist">
                            <li>wybierać i być wybieranym do władz Stowarzyszenia;</li>
                            <li>korzystać z pomocy i urządzeń Stowarzyszenia na zasadach określonych przez Radę Krajową;</li>
                            <li>zgłaszać wnioski dotyczące działalności Stowarzyszenia;</li>
                            <li>nosić odznakę Stowarzyszenia</li>
                        </ol>
                        <li>Małoletni członek zwyczajny Stowarzyszenia, w wieku od 16 do 18 lat, mający ograniczoną zdolność
                            do czynności prawnych ma prawo:</li>
                        <ol class="sublist">
                            <li>wybierać i być wybieranym do władz Stowarzyszenia, z tym, że w składzie poszczególnych wybieralnych
                                władz Stowarzyszenia większość muszą stanowić osoby o pełnej zdolności do czynności prawnych;</li>
                            <li>korzystać z pomocy i urządzeń Stowarzyszenia na zasadach określonych przez Radę Krajową-</li>
                            <li>zgłaszać wnioski dotyczące działalności Stowarzyszenia;</li>
                            <li>nosić odznakę Stowarzyszenia.</li>
                        </ol>
                        <li>Małoletni członek zwyczajny Stowarzyszenia, w wieku poniżej 16 lat ma prawo:</li>
                        <ol class="sublist">
                            <li>wybierać i być wybieranym do władz klubu, jeśli jednostka ta zrzesza wyłącznie małoletnich;</li>
                            <li>korzystać z pomocy i urządzeń Stowarzyszenia na zasadach określonych przez Radę Krajową</li>
                            <li>zgłaszać wnioski dotyczące działalności Stowarzyszenia;</li>
                            <li>nosić odznakę Stowarzyszenia.</li>
                        </ol>
                    </ol>

                    <p class="text-center">Art. 14</p>
                    <p>Członek honorowy Stowarzyszenia ma prawo:</p>
                    <ol>
                        <li>zgłaszać wnioski dotyczące działalności Stowarzyszenia,</li>
                        <li>nosić odznakę Stowarzyszenia,</li>
                        <li>brać udział w Krajowym Sejmiku Stowarzyszenia,</li>
                        <li>korzystać z pomocy i urządzeń Stowarzyszenia na zasadach określonych przez Radę Krajową.</li>
                    </ol>

                    <p class="text-center">Art. 15</p>
                    <p>Członek wspierający ma prawo:</p>
                    <ol>
                        <li>zgłaszać wnioski dotyczące działalności Stowarzyszenia;</li>
                        <li>brać udział - osobiście lub przez przedstawiciela - z głosem doradczym w działalności jednostek organizacyjnych
                            Stowarzyszenia, których jest członkiem.</li>
                    </ol>

                    <p class="text-center">Art. 16</p>
                    <p>Członek zwyczajny i nadzwyczajny Stowarzyszenia jest obowiązany:</p>
                    <ol>
                        <li>brać czynny udział w działalności Stowarzyszenia</li>
                        <li>przestrzegać postanowień Statutu, regulaminów i uchwał władz Stowarzyszenia</li>
                        <li>opłacać regularnie składkę członkowską</li>
                        <li>przestrzegać zasad współżycia społecznego</li>
                    </ol>

                    <p class="text-center">Art. 17</p>
                    <ol>
                        <li>Przynależność do Stowarzyszenia ustaje w przypadku:</li>
                        <ol class="sublist">
                            <li>dobrowolnego wystąpienia członka</li>
                            <li>skreślenia z listy członków wskutek zalegania w opłacaniu składek członkowskich za okres dłuższy
                                niż 12 miesięcy</li>
                            <li>wykluczenia prawomocnym orzeczeniem Sądu Koleżeńskiego z powodu rażącego nieprzestrzegania postanowień
                                Statutu, regulaminów i uchwał władz</li>
                            <li>śmierci członka</li>
                        </ol>
                        <li>Przez „rażące nieprzestrzeganie” rozumie się nieprzestrzeganie aktów i uchwał władz Stowarzyszenia
                            pomimo wcześniejszego otrzymania upomnienia przez właściwy organ.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rozdział IV Władze naczelne Stowarzyszenia</p>
                    <p class="text-center">Art. 18</p>
                    <p>Władzami naczelnymi Stowarzyszenia są:</p>
                    <ol>
                        <li>Krajowy Sejmik Stowarzyszenia</li>
                        <li>Rada Krajowa</li>
                        <li>Komisja Rewizyjna Stowarzyszenia</li>
                        <li>Sąd Koleżeński Stowarzyszenia</li>
                    </ol>

                    <p class="text-center">Art. 19</p>
                    <ol>
                        <li>Władze Stowarzyszenia pochodzą z wyboru.</li>
                        <li>Kadencja władz Stowarzyszenia, w tym delegatów, trwa 4 lata.</li>
                        <li>Delegaci na Krajowy Sejmik Stowarzyszenia zachowują mandaty na czas trwania kadencji.</li>
                        <li>Wybory do władz naczelnych odbywają się w sposób tajny i są ważne, jeżeli bierze w nich udział więcej
                            niż połowa uprawnionych do głosowania.</li>
                        <li>Zasady wyboru władz naczelnych i ich liczbę uchwala Krajowy Sejmik Stowarzyszenia.</li>
                        <li>Zasady wyboru delegatów na Krajowy Sejmik Stowarzyszenia uchwala Rada Krajowa.</li>
                        <li>Łączenie funkcji we władzach naczelnych Stowarzyszenia wymienionych w art. 18. ust. 2-4 jest niedozwolone.</li>
                    </ol>

                    <p class="text-center">Art. 20</p>
                    <p>W przypadku zmniejszenia się w czasie trwania kadencji liczby członków władz naczelnych na ich miejsce
                        wchodzą zastępcy członków wybrani w ilości nie większej niż 1/3 składu danego organu władzy przez
                        Krajowy Sejmik Stowarzyszenia, w kolejności określonej liczbą uzyskanych głosów.</p>

                    <p class="text-center">Art. 21</p>
                    <p>Uchwały władz zapadają zwykłą większością głosów przy obecności co najmniej połowy ogólnej liczby uprawnionych
                        do głosowania, jeżeli Statut nie stanowi inaczej.</p>

                    <p class="text-center">Art. 21 a</p>
                    <ol>
                        <li>Członek Rady Krajowej i Komisji Rewizyjnej Stowarzyszenia oraz likwidator Stowarzyszenia odpowiada
                            wobec Stowarzyszenia za szkodę wyrządzoną działaniem lub zaniechaniem sprzecznym z prawem lub
                            postanowieniami Statutu, chyba że nie ponosi winy.</li>
                        <li>Członek Rady Krajowej i Komisji Rewizyjnej Stowarzyszenia oraz likwidator Stowarzyszenia powinien
                            przy wykonywaniu obowiązków dołożyć staranności wynikającej z zawodowego charakteru swojej działalności.</li>
                        <li>Członek Rady Krajowej i Komisji Rewizyjnej Stowarzyszenia oraz likwidator Stowarzyszenia, wykonujący
                            swoje obowiązki społecznie, jest obowiązany dokładać przy tym należytej staranności.</li>
                        <li>Jeżeli szkodę, o której mowa w ust. 1, wyrządziło kilka osób wspólnie, osoby te ponoszą odpowiedzialność
                            solidarną.
                        </li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Krajowy Sejmik Stowarzyszenia</p>
                    <p class="text-center">Art. 22</p>
                    <ol>
                        <li>Krajowy Sejmik Stowarzyszenia jest najwyższą władzą Stowarzyszenia i może być zwyczajny lub nadzwyczajny.</li>
                        <li>Zwyczajny Krajowy Sejmik Stowarzyszenia odbywa się raz na 4 lata i zwoływany jest przez Radę Krajową.</li>
                        <li>Nadzwyczajny Krajowy Sejmik Stowarzyszenia zwoływany jest:</li>
                        <ol class="sublist">
                            <li>z inicjatywy Rady Krajowej,</li>
                            <li>na żądanie Komisji Rewizyjnej Stowarzyszenia,</li>
                            <li>na pisemny wniosek co najmniej 1/3 ogólnej liczby zarządów lub rad klubów lub 1/3 delegatów.</li>
                        </ol>
                        <li>Nadzwyczajny Krajowy Sejmik Stowarzyszenia zwołuje Rada Krajowa w terminie trzech miesięcy od daty
                            złożenia żądania lub wniosku.</li>
                        <li>O terminie, miejscu i porządku obrad Krajowego Sejmiku Stowarzyszenia Rada Krajowa zawiadamia delegatów
                            co najmniej na 21 dni przed terminem Sejmiku. </li>
                        <li>Krajowy Sejmik Stowarzyszenia obraduje przy obecności więcej niż połowy delegatów na podstawie każdorazowo
                            uchwalonego przez siebie regulaminu obrad, którego projekt przedstawia Rada Krajowa.</li>
                    </ol>

                    <p class="text-center">Art. 23</p>
                    <p>Do kompetencji Krajowego Sejmiku Stowarzyszenia należy:</p>
                    <ol>
                        <li>uchwalanie programu działania Stowarzyszenia</li>
                        <li>uchwalanie Statutu i jego zmian</li>
                        <li>rozpatrywanie i zatwierdzanie sprawozdań Rady Krajowej, Komisji Rewizyjnej Stowarzyszenia i Sądu
                            Koleżeńskiego Stowarzyszenia</li>
                        <li>udzielanie absolutorium Radzie Krajowej</li>
                        <li>wybór członków Rady Krajowej, Komisji Rewizyjnej Stowarzyszenia oraz Sądu Koleżeńskiego Stowarzyszenia</li>
                        <li>nadawanie na wniosek Rady Krajowej godności członka honorowego</li>
                        <li>rozpatrywanie wniosków zgłoszonych przez delegatów, władze naczelne oraz sejmiki klubów</li>
                        <li>podejmowanie uchwał o rozwiązaniu Stowarzyszenia i przeznaczeniu jego majątku</li>
                        <li>podejmowanie uchwał w innych sprawach wymagających decyzji Krajowego Sejmiku Stowarzyszenia.</li>
                    </ol>

                    <p class="text-center">Art 24</p>
                    <p>W Krajowym Sejmiku Stowarzyszenia udział biorą:</p>
                    <ol>
                        <li>z głosem decydującym - delegaci wybrani według zasad ustalonych przez Radę Krajową;</li>
                        <li>z głosem doradczym - niebędący delegatami: członkowie władz naczelnych, członkowie honorowi, członkowie
                            wspierający oraz zaproszeni goście.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rada Krajowa</p>
                    <p class="text-center">Art. 25</p>

                    <ol>
                        <li>Rada Krajowa jest najwyższą władzą Stowarzyszenia w okresie między Sejmikami.</li>
                        <li>W skład Rady Krajowej wchodzi od 15 do 21 osób.</li>
                        <li>Do kompetencji Rady Krajowej należy w szczególności:</li>
                        <ol class="sublist">
                            <li>kierowanie całokształtem prac Stowarzyszenia</li>
                            <li>uchwalanie rocznych planów finansowych oraz planów pracy oraz zatwierdzanie budżetu i bilansu
                                Stowarzyszenia
                            </li>
                            <li>zajmowanie stanowiska wobec społecznie ważnych problemów</li>
                            <li>wybór ze swego grona w głosowaniu tajnym 7-osobowego Prezydium Stowarzyszenia, w tym prezesa,
                                dwóch wiceprezesów, sekretarza generalnego oraz trzech członków Prezydium</li>
                            <li>uchwalanie regulaminu Rady Krajowej i Prezydium oraz ramowych regulaminów klubów</li>
                            <li>podejmowanie uchwał w sprawie zbywania majątku nieruchomego Stowarzyszenia</li>
                            <li>powoływanie komisji oraz zatwierdzanie ich regulaminów</li>
                            <li>uchwalanie ordynacji wyborczych dla wszystkich rodzajów władz Stowarzyszenia</li>
                            <li>powoływanie innych jednostek organizacyjnych oraz jednostek gospodarczych, dla których Rada Krajowa
                                jest organem założycielskim</li>
                            <li>podejmowanie uchwał o przystąpieniu Stowarzyszenia do innych organizacji</li>
                            <li>ustanawianie odznaczeń i tytułów honorowych w Stowarzyszeniu</li>
                            <li>zawieszanie uchwał i zarządzeń władz jednostek organizacyjnych, jeśli są one sprzeczne z przepisami
                                prawa, postanowieniami Statutu, uchwałami Rady Krajowej albo interesem społecznym</li>
                            <li>wykonywaniem innych funkcji określonych w Statucie oraz przekazanych przez Krajowy Sejmik</li>
                        </ol>
                        <li>Członkowie Rady Krajowej nie mogą być skazani prawomocnym wyrokiem za przestępstwo umyślne ścigane
                            z oskarżenia publicznego lub przestępstwo skarbowe.</li>
                    </ol>

                    <p class="text-center">Art. 26</p>
                    <ol>
                        <li>Prezydium Rady Krajowej kieruje działalnością Stowarzyszenia w okresie między posiedzeniami Rady
                            Krajowej, podejmując decyzje we wszystkich sprawach dotyczących Stowarzyszenia z wyjątkiem:</li>
                        <ol class="sublist">
                            <li>zwoływania Krajowego Sejmiku Stowarzyszenia,</li>
                            <li>uchwalania kierunków działalności Stowarzyszenia,</li>
                            <li>uchwalania budżetu i przyjmowania sprawozdań z jego wykonania.</li>
                        </ol>
                        <li>Prezydium Rady Krajowej w szczególności:</li>
                        <ol class="sublist">
                            <li>kieruje bieżącą działalnością i reprezentuje Stowarzyszenie na zewnątrz</li>
                            <li>koordynuje i nadzoruje prace jednostek organizacyjnych i gospodarczych Stowarzyszenia, nadaje
                                kierunek ich pracy oraz ocenia ich działalność</li>
                            <li>wykonuje uchwały Krajowego Sejmiku Stowarzyszenia i Rady Krajowej oraz zapewnia ich wykonanie
                                przez jednostki organizacyjne Stowarzyszenia</li>
                            <li>opracowuje corocznie projekt budżetu Stowarzyszenia oraz sprawozdanie z jego wykonania i przedkłada
                                je do zatwierdzenia Radzie Krajowej</li>
                            <li>podejmuje uchwały w sprawach majątkowych z wyjątkiem spraw ujętych w art. 25 ust. 3 pkt 6</li>
                            <li>podejmuje decyzje w sprawie zatrudnienia dyrektora aparatu pracowniczego na szczeblu centralnym</li>
                            <li>uchwala instrukcje organizacyjne i finansowo-gospodarcze</li>
                            <li>wykonuje inne funkcje określone w Statucie, regulaminie Rady Krajowej oraz przekazane przez Krajowy
                                Sejmik Stowarzyszenia i Radę Krajową.</li>
                        </ol>
                    </ol>

                    <p class="text-center">Art. 27</p>
                    <p>Posiedzenia Rady Krajowej odbywają się nie rzadziej niż 3 razy w roku, a posiedzenia Prezydium Rady Krajowej
                        odbywają się w miarę potrzeby, nie rzadziej niż 8 razy w roku.</p>


                    <p class="font-weight-bold text-center pt-5">Komisja Rewizyjna Stowarzyszenia</p>
                    <p class="text-center">Art. 28</p>
                    <ol>
                        <li>Komisja Rewizyjna Stowarzyszenia składa się z 5-9 członków wybranych przez Krajowy Sejmik Stowarzyszenia.</li>
                        <li>Komisja Rewizyjna Stowarzyszenia wybiera ze swego grona przewodniczącego, wiceprzewodniczącego i
                            sekretarza.</li>
                    </ol>

                    <p class="text-center">Art. 29</p>
                    <ol>
                        <li>Do zakresu działania Komisji Rewizyjnej Stowarzyszenia należy kontrolowanie i ocena całości działalności
                            Stowarzyszenia, a w szczególności:</li>
                        <ol class="cublist">
                            <li>kontrolowanie co najmniej raz w roku działalności statutowej, finansowej władz Stowarzyszenia
                                i jego majątku oraz przedstawianie wniosków i zaleceń pokontrolnych</li>
                            <li>składanie sprawozdań na Krajowym Sejmiku Stowarzyszenia i występowanie z wnioskami o udzielenie
                                absolutorium Radzie Krajowej</li>
                            <li>występowanie z wnioskami do Rady Krajowej o zawieszenie w czynnościach rad jednostek organizacyjnych
                                lub poszczególnych członków</li>
                            <li>czuwanie nad należytym funkcjonowaniem komisji rewizyjnych jednostek organizacyjnych</li>
                            <li>uchwalanie regulaminów pracy Komisji Rewizyjnej Stowarzyszenia oraz ramowych regulaminów komisji
                                rewizyjnych klubów.</li>
                        </ol>
                        <li>Rada Krajowa i jej Prezydium są zobowiązane do zapoznania się na swoich posiedzeniach z wystąpieniami
                            Komisji Rewizyjnej Stowarzyszenia i ustosunkowania się do nich na piśmie w możliwie krótkim czasie.</li>
                    </ol>

                    <p class="text-center">Art. 30</p>
                    <ol>
                        <li>Przewodniczący Komisji Rewizyjnej Stowarzyszenia lub upoważnieni przez niego członkowie mają prawo
                            do brania udziału w posiedzeniach władz Stowarzyszenia z głosem doradczym.</li>
                        <li>Członkowie Komisji Rewizyjnej Stowarzyszenia, jako organu kontroli wewnętrznej:</li>
                        <ol class="sublist">
                            <li>nie mogą być członkami Prezydium Rady Krajowej ani Rady Krajowej,</li>
                            <li>nie mogą pozostawać z członkami Prezydium Rady Krajowej i Rady Krajowej w związku małżeńskim,
                                we wspólnym pożyciu, w stosunku pokrewieństwa, powinowactwa lub podległości służbowej,</li>
                            <li>nie mogą być skazani prawomocnym wyrokiem za przestępstwo umyślne ścigane z oskarżenia publicznego
                                lub przestępstwo skarbowe,</li>
                            <li>mogą otrzymywać z tytułu pełnienia swojej funkcji zwrot uzasadnionych kosztów.</li>
                        </ol>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Sąd Koleżeński Stowarzyszenia</p>
                    <p class="text-center">Art. 31</p>

                    <ol>
                        <li>Sąd Koleżeński Stowarzyszenia składa się z 9-11 członków wybranych przez Krajowy Sejmik Stowarzyszenia.</li>
                        <li>Sąd Koleżeński Stowarzyszenia wybiera ze swego grona przewodniczącego, wiceprzewodniczącego i sekretarza.</li>
                        <li>Przewodniczący Sądu Koleżeńskiego Stowarzyszenia lub upoważniony przez niego członek ma prawo uczestniczenia
                            w posiedzeniach władz Stowarzyszenia z głosem doradczym.</li>
                    </ol>

                    <p class="text-center">Art. 32</p>
                    <p>Sąd Koleżeński Stowarzyszenia działa jako sąd honorowy członków Stowarzyszenia oraz jako sąd polubowny
                        w sprawach majątkowych jednostek statutowych i ich wyodrębnionych jednostek gospodarczych.</p>

                    <p class="text-center">Art. 33</p>
                    <p>Do zakresu działania Sądu Koleżeńskiego Stowarzyszenia należy:</p>
                    <ol>
                        <li>interpretacja Statutu;</li>
                        <li>rozstrzyganie zgodności uchwał władz Stowarzyszenia ze Statutem Stowarzyszenia;</li>
                        <li>nadzór nad działalnością sądów koleżeńskich klubów;</li>
                        <li>uchwalanie regulaminów Sądu Koleżeńskiego Stowarzyszenia i ramowych regulaminów sądów koleżeńskich
                            klubów;</li>
                        <li>rozpatrywanie odwołań od orzeczeń sądów koleżeńskich klubów;</li>
                        <li>rozpatrywanie spraw wynikających z przynależności do Stowarzyszenia członków władz naczelnych i władz
                            klubów wynikłych na tle ich działalności</li>
                        <li>rozpatrywanie spraw majątkowych.</li>
                    </ol>

                    <p class="text-center">Art.34</p>
                    <ol>
                        <li>Sąd Koleżeński Stowarzyszenia rozpatruje sprawy w pierwszej instancji w 3-osobowych zespołach orzekających,
                            a w drugiej instancji w zespołach 5-cio osobowych.</li>
                        <li>W drugiej instancji nie mogą brać udziału w sprawie członkowie Sądu, którzy uczestniczyli w wydaniu
                            orzeczenia w pierwszej instancji.</li>
                        <li>Od orzeczeń Sądu Koleżeńskiego Stowarzyszenia wydanych w pierwszej instancji stronom przysługuje
                            odwołanie do Sądu Koleżeńskiego Stowarzyszenia jako sądu drugiej instancji w terminie miesiąca
                            od dnia doręczenia orzeczenia na piśmie.</li>
                        <li>Orzeczenie Sądu Koleżeńskiego Stowarzyszenia wydane w drugiej instancji jest ostateczne.</li>
                    </ol>

                    <p class="text-center">Art. 35</p>
                    <p>Sąd Koleżeński Stowarzyszenia może wymierzyć następujące kary:</p>
                    <ol>
                        <li>upomnienie</li>
                        <li>naganę</li>
                        <li>pozbawienie wyróżnień honorowych Stowarzyszenia oraz wnioskowanie o pozbawienie uprawnień kadry zawodniczej,</li>
                        <li>zawieszenie w prawach członkowskich na okres od 6-ciu miesięcy do 2-ch lat,</li>
                        <li>wydalenie ze Stowarzyszenia.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rozdział V Kluby Stowarzyszenia</p>
                    <p class="text-center">Art. 36</p>
                    <p>Kluby realizują na swym terenie cele Stowarzyszenia przy pomocy środków określonych w rozdziale II niniejszego
                        Statutu, a w swej działalności opierają się przede wszystkim na pracy społecznej członków.</p>

                    <p class="text-center">Art. 37</p>
                    <ol>
                        <li>Kluby Stowarzyszenia powstają za zgodą Prezydium Rady Krajowej Stowarzyszenia.</li>
                        <li>Uchwała o powołaniu klubu może być podjęta wyłącznie przez zebranie założycielskie klubu.</li>
                        <li>Kluby Stowarzyszenia mogą powstać, jeżeli akces przynależności do klubu złożyło przynajmniej 15 osób.</li>
                    </ol>

                    <p class="text-center">Art. 38</p>
                    <p>Władzami klubu Stowarzyszenia są:</p>
                    <ol>
                        <li>sejmik lub walne zebranie klubu,</li>
                        <li>rada lub zarząd klubu,</li>
                        <li>komisja rewizyjna klubu,</li>
                        <li>sąd koleżeński klubu.</li>
                    </ol>

                    <p class="text-center">Art. 39</p>
                    <ol>
                        <li>Kadencja władz klubu trwa 4 lata i może być skrócona do 2 lat uchwałą sejmiku lub walnego zebrania
                            klubu.</li>
                        <li>Postanowienia art. 19 ust. 3, 4, 5, 7 oraz art. 20 i 21 stosuje się odpowiednio.</li>
                    </ol>

                    <p class="text-center">Art. 40</p>
                    <p>Sejmik lub walne zebranie klubu Stowarzyszenia jest najwyższą władzą klubu. Zjazdy są zwyczajne lub nadzwyczajne.</p>

                    <p class="text-center">Art. 41</p>
                    <p>Do kompetencji sejmiku lub walnego zebrania klubu należy:</p>
                    <ol>
                        <li>ocena działalności klubu i jego władz oraz ustalanie zamierzeń na okres kadencji;</li>
                        <li>rozpatrywanie i zatwierdzanie sprawozdań rady klubu, komisji rewizyjnej klubu i sądu koleżeńskiego
                            klubu;</li>
                        <li>udzielanie absolutorium ustępującej radzie lub zarządowi klubu na wniosek komisji rewizyjnej klubu,
                            ewentualnie odmowa udzielenia absolutorium całej radzie (zarządowi) lub poszczególnym jej członkom.
                            Nieuzyskanie absolutorium wyłącza od kandydowania do władz najbliższej kadencji;</li>
                        <li>wybór członków rady lub zarządu klubu, komisji rewizyjnej klubu i sądu koleżeńskiego klubu oraz delegatów
                            na Krajowy Sejmik;</li>
                        <li>rozpatrywanie wniosków członków Stowarzyszenia;</li>
                        <li>podejmowanie uchwał dotyczących wniosków na Krajowy Sejmik Stowarzyszenia;</li>
                        <li>sejmik lub walne zebranie klubu może odstąpić od wyboru sądu koleżeńskiego klubu. Jego kompetencje
                            przejmuje wówczas Sąd Koleżeński Stowarzyszenia.</li>
                    </ol>

                    <p class="text-center">Art. 42</p>
                    <p>W sejmiku lub walnym zebraniu klubu uczestniczą:</p>
                    <ol>
                        <li>z głosem decydującym wszyscy członkowie klubu,</li>
                        <li>z głosem doradczym - przedstawiciele władz naczelnych Stowarzyszenia, przedstawiciele członków wspierających
                            klubu, członkowie honorowi klubu oraz goście zaproszeni przez radę klubu lub zarząd klubu.</li>
                    </ol>

                    <p class="text-center">Art. 43</p>
                    <ol>
                        <li>Termin, miejsce i porządek obrad sejmiku lub walnego zebrania klubu ustala rada lub zarząd klubu
                            w uchwale określając również zasady uczestnictwa. O terminie i porządku dziennym sejmiku lub
                            walnego zebrania rada lub zarząd klubu zawiadamia członków i delegatów przynajmniej na 14 dni
                            przed terminem sejmiku. Do zawiadomienia rada lub zarząd klubu winna dołączyć sprawozdanie lub
                            zawiadomić kiedy i gdzie będzie ono wyłożone.</li>
                        <li>Regulamin obrad sejmiku lub walnego zebrania klubu zatwierdza sejmik klubu lub zarząd klubu.</li>
                    </ol>

                    <p class="text-center">Art. 44</p>
                    <ol>
                        <li>Nadzwyczajny sejmik lub nadzwyczajne walne zebranie klubu zwołuje rada lub zarząd klubu przed upływem
                            kadencji z własnej inicjatywy, na wniosek komisji rewizyjnej klubu lub pisemny wniosek 1/3 członków
                            klubu oraz na żądanie Rady Krajowej Stowarzyszenia.</li>
                        <li>Nadzwyczajny sejmik lub nadzwyczajne walne zebranie klubu powinny być zwołane przez radę lub zarząd
                            klubu w terminie dwóch miesięcy od daty złożenia wniosku i obradować nad sprawami, dla których
                            zostały zwołane.</li>
                    </ol>

                    <p class="text-center">Art. 45</p>
                    <p>Rada lub zarząd kieruje działalnością klubu pomiędzy sejmikami lub walnymi zebraniami klubu i ponosi
                        odpowiedzialność za swą pracę przed sejmikiem lub walnym zebraniem klubu oraz władzami naczelnymi
                        Stowarzyszenia.</p>

                    <p class="text-center">Art. 46</p>
                    <ol>
                        <li>Rada lub zarząd klubu składa się z 3-9 członków wybranych przez sejmik lub walne zebranie klubu.
                            Ponadto w skład rady lub zarządu może wchodzić kierownik klubu, jeżeli nie został wybrany bezpośrednio
                            przez sejmik lub walne zebranie klubu.</li>
                        <li>Posiedzenia rady lub zarządu klubu odbywają się w miarę potrzeby, nie mniej niż 6 razy w roku.</li>
                        <li>W posiedzeniach rady lub zarządu klubu mogą brać udział z głosem doradczym przewodniczący sekcji
                            i zespołów powołanych przez radę lub zarząd klubu.</li>
                    </ol>

                    <p class="text-center">Art. 47</p>
                    <p>Rada lub zarząd klubu wybiera ze swego grona prezesa, wiceprezesa, sekretarza i skarbnika. Pracami rady
                        lub zarządu kieruje prezes lub jego zastępca.</p>

                    <p class="text-center">Art. 48</p>
                    <p>Rada lub zarząd klubu tworzy w miarę potrzeb sekcje i zespoły w zakresie poszczególnych dyscyplin sportu,
                        kultury fizycznej i turystyki stosownie do istniejących potrzeb i zainteresowań.</p>

                    <p class="text-center">Art. 49</p>
                    <p>Rada lub zarząd klubu oraz sekcje i zespoły działają na podstawie regulaminów zatwierdzonych przez radę
                        lub zarząd klubu na podstawie ramowych regulaminów zatwierdzonych przez Radę Krajową Stowarzyszenia.</p>

                    <p class="text-center">Art. 50</p>
                    <p>Do zakresu działania rady lub zarządu klubu należy w szczególności:</p>
                    <ol>
                        <li>wykonywanie uchwał sejmiku lub walnego zebrania klubu oraz władz naczelnych,</li>
                        <li>reprezentowanie Stowarzyszenia na terenie swego działania,</li>
                        <li>podejmowanie prac niezbędnych do realizacji celów Stowarzyszenia,</li>
                        <li>zarządzanie majątkiem klubu i dysponowanie jego funduszami,</li>
                        <li>prowadzenie jednostek gospodarczych i reprezentowanie klubu w jednostkach gospodarczych prawa handlowego,</li>
                        <li>kształcenie kadr programowych Stowarzyszenia zgodnie z uchwałami Rady Krajowej Stowarzyszenia,</li>
                        <li>zatwierdzanie kierownika klubu,</li>
                        <li>składanie sprawozdań z działalności Radzie Krajowej oraz sejmikowi lub walnemu zebraniu klubu,</li>
                        <li>kierownik klubu wchodzi w skład rady lub zarządu klubu na podstawie uchwały rady lub zarządu klubu.</li>
                    </ol>

                    <p class="text-center">Art. 51</p>
                    <ol>
                        <li>Komisja rewizyjna klubu jest społecznym organem kontroli działalności klubu i wszystkich Jego ogniw.</li>
                        <li>Komisja rewizyjna klubu składa się z 3-5 członków wybranych przez sejmik lub walne zebranie klubu.
                            Komisja rewizyjna konstytuuje się na najbliższym posiedzeniu wybierając spośród siebie przewodniczącego,
                            wiceprzewodniczącego i sekretarza.</li>
                        <li>Postanowienia art. 29 i 30 stosuje się odpowiednio.</li>
                    </ol>

                    <p class="text-center">Art. 52</p>
                    <ol>
                        <li>Sąd koleżeński klubu składa się z 3-5 członków wybranych przez sejmik lub walne zebranie klubu.</li>
                        <li>Postanowienia art. 31 ust. 2-3 stosuje się odpowiednio.</li>
                    </ol>

                    <p class="text-center">Art. 53</p>
                    <ol>
                        <li>Sąd koleżeński klubu wybrany jest do orzekania i nakładania kar organizacyjnych w stosunku do członków,
                            niebędących członkami władz naczelnych Stowarzyszenia, w sprawach o:</li>
                        <ol class="sublist">
                            <li>naruszenie Statutu i podstawowych uchwał władz Stowarzyszenia,</li>
                            <li>nieetyczne postępowania w działalności członkowskiej,</li>
                            <li>naganne zachowanie się sportowca i turysty,</li>
                            <li>narażenie dobrego imienia Stowarzyszenia. </li>
                        </ol>
                        <li>Spory między członkami lub jednostkami organizacyjnymi klubu na tle ich działalności organizacyjnej
                            albo między jednostkami organizacyjnymi klubu i radą (zarządem) klubu na tle działalności gospodarczej
                            rozstrzyga sąd koleżeński klubu.</li>
                    </ol>

                    <p class="text-center">Art. 54</p>
                    <p>Sąd koleżeński klubu może orzekać następujące kary organizacyjne:</p>
                    <ol>
                        <li>upomnienia</li>
                        <li>nagany</li>
                        <li>zawieszenie w prawach członkowskich na okres od 3 miesięcy do 2 lat</li>
                        <li>wykluczenie z powodu rażącego nieprzestrzegania postanowień Statutu, regulaminów i uchwał władz</li>
                        <li>pozbawienie wyróżnień honorowych nadanych przez klub.</li>
                    </ol>

                    <p class="text-center">Art. 55</p>
                    <p>Od orzeczenia sądu koleżeńskiego klubu przysługuje prawo odwołania do Sądu Koleżeńskiego Stowarzyszenia
                        w terminie miesiąca od daty doręczenia orzeczenia na piśmie.</p>

                    <p class="text-center">Art. 56</p>
                    <p>Sąd Koleżeński Klubu działa na podstawie uchwalonego przez siebie regulaminu opracowanego na podstawie
                        ramowego regulaminu uchwalonego przez Sąd Koleżeński Stowarzyszenia.</p>

                    <p class="text-center">Art. 57</p>
                    <p>Klub podlega kontroli władz naczelnych Stowarzyszenia.</p>

                    <p class="text-center">Art. 58</p>
                    <p>Rada lub zarząd klubu może być zawieszona przez Radę Krajową Stowarzyszenia w przypadkach:</p>
                    <ol>
                        <li>naruszenia obowiązków wynikających ze statutu Stowarzyszenia,</li>
                        <li>działania na szkodę Stowarzyszenia,</li>
                        <li>zaniechania działalności,</li>
                        <li>naruszenia podstawowych zasad prawidłowej gospodarki majątkiem własnym lub powierzonym.</li>
                    </ol>

                    <p class="text-center">Art. 59</p>
                    <ol>
                        <li>Decyzja Rady Krajowej Stowarzyszenia w sprawie zawieszenia rady lub zarządu klubu może być podjęta
                            tylko po wysłuchaniu wyjaśnień rady lub zarządu klubu i komisji rewizyjnej klubu, chyba że nie
                            zgłosiły się one na posiedzenie w określonym terminie. </li>
                        <li>W przypadku zawieszenia rady lub zarządu klubu, Rada Krajowa powołuje Tymczasową radę klubu lub Tymczasowy
                            zarząd klubu, których zadaniem jest usunięcie przyczyn powodujących zawieszenie. </li>
                        <li>W terminie do dwóch miesięcy od daty powołania Tymczasowa rada klubu lub Tymczasowy zarząd klubu
                            zwołują nadzwyczajny sejmik lub nadzwyczajne zebranie klubu, które dokonują wyboru nowej rady
                            lub zarządu klubu albo też podejmują decyzję o rozwiązaniu klubu.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rozdział VI Majątek Stowarzyszenia</p>
                    <p class="text-center">Art. 60</p>
                    <p>Majątek Stowarzyszenia stanowią nieruchomości, ruchomości, prawa, oraz fundusze, to jest aktywa w gotówce
                        i zgromadzone na kontach bankowych.</p>

                    <p class="text-center">Art. 61</p>
                    <ol>
                        <li>Na fundusze Stowarzyszenia składają się:</li>
                        <ol class="sublist">
                            <li>wpisowe i składki członkowskie</li>
                            <li>dochody z majątku ruchomego i nieruchomego</li>
                            <li>dotacje, zapisy i darowizny</li>
                            <li>wpływy z działalności statutowej</li>
                            <li>dochody z działalności gospodarczej.</li>
                        </ol>
                        <li>Dochodami i majątkiem Stowarzyszenia zarządza Rada Krajowa, a dochodami klubów ich rady lub zarządy.</li>
                        <li>Stowarzyszenie nie może udzielać pożyczek lub zabezpieczania zobowiązań własnym majątkiem w stosunku
                            do swoich członków, członków organów lub pracowników oraz osób, z którymi członkowie, członkowie
                            organów oraz pracownicy Stowarzyszenia pozostają w związku małżeńskim, we wspólnym pożyciu albo
                            w stosunku pokrewieństwa lub powinowactwa w linii prostej, pokrewieństwa lub powinowactwa w linii
                            bocznej do drugiego stopnia albo są związani z tytułu przysposobienia, opieki lub kurateli, zwanych
                            dalej „osobami bliskimi".</li>
                        <li>Stowarzyszenie nie może przekazywać własnego majątku na rzecz swoich członków, członków organów lub
                            pracowników oraz ich osób bliskich, na zasadach innych niż w stosunku do osób trzecich, w szczególności,
                            jeżeli przekazanie to następuje bezpłatnie lub na preferencyjnych warunkach.</li>
                        <li>Zabrania się wykorzystywania majątku Stowarzyszenia na rzecz członków, członków organów lub pracowników
                            oraz ich osób bliskich na zasadach innych niż w stosunku do osób trzecich, chyba że to wykorzystanie
                            bezpośrednio wynika z celu statutowego Stowarzyszenia.</li>
                        <li>Zabrania się zakupu towarów lub usług od podmiotów, w których uczestniczą członkowie Stowarzyszenia,
                            członkowie organów Stowarzyszenia lub pracownicy oraz ich osób bliskich, na zasadach innych niż
                            w stosunku do osób trzecich lub po cenach wyższych niż rynkowe.</li>
                        <li>Stowarzyszenie prowadzi odrębnie działalność pożytku publicznego jako działalność nieodpłatną lub
                            jako działalność odpłatną.</li>
                        <li>Określenie nieodpłatnej i odpłatnej działalności pożytku publicznego należy do Rady Krajowej.</li>
                        <li>Stowarzyszenie może prowadzić działalność gospodarczą wyłącznie jako działalność dodatkową w stosunku
                            do działalności pożytku publicznego. W przypadku podejmowania działalności gospodarczej przez
                            Stowarzyszenie Rada Krajowa, podejmując odpowiednią uchwałę, określi przedmiot działalności według
                            Polskiej Klasyfikacji Działalności.</li>
                        <li>Stowarzyszenie przeznacza nadwyżkę przychodów nad kosztami na działalność pożytku publicznego.</li>
                        <li>Stowarzyszenie prowadzi gospodarkę finansową oraz rachunkowość zgodnie z obowiązującymi przepisami.</li>
                    </ol>

                    <p class="text-center">Art. 62</p>
                    <p>Rada Krajowa może przekazać w zarząd swoim jednostkom organizacyjnym majątek. W przypadku likwidacji
                        jednostki majątek wcześniej jej przekazany przejmuje Rada Krajowa</p>

                    <p class="text-center">Art. 63</p>
                    <p>Dla ważności oświadczeń w zakresie praw i obowiązków Stowarzyszenia oraz dla udzielania pełnomocnictw,
                        wymagane jest współdziałanie i podpisy 2 osób upoważnionych przez Radę Krajową.</p>

                    <p class="text-center">Art. 64</p>
                    <ol>
                        <li>W odniesieniu do klubów Stowarzyszenia art. 60, 61 i 63 stosuje się odpowiednio.</li>
                        <li>Klub może nabywać i zbywać majątek nieruchomy za zgodą Prezydium Rady Krajowej.</li>
                        <li>Klub może prowadzić działalność gospodarczą.</li>
                    </ol>

                    <p class="font-weight-bold text-center pt-5">Rozdział VIII Postanowienia końcowe </p>
                    <p class="text-center">Art. 65</p>
                    <p>Zmiany Statutu uchwala Krajowy Sejmik Stowarzyszenia większością 2/3 głosów przy obecności więcej niż
                        połowy uprawnionych do głosowania.</p>

                    <p class="text-center">Art. 66</p>
                    <p>Uchwałę w sprawie rozwiązania Stowarzyszenia i przeznaczenia jego majątku podejmuje Krajowy Sejmik Stowarzyszenia
                        większością 2/3 przy obecności co najmniej 2/3 uprawnionych do głosowania.</p>

                    <p class="text-center">Art. 67</p>
                    <p>W przypadku rozwiązania klubu o przeznaczeniu jego majątku decyduje Rada Krajowa.</p>

                    <p class="text-center">Art. 68</p>
                    <p>W sprawach nieuregulowanych niniejszym Statutem stosuje się odpowiednio przepisy ustawy - Prawo o stowarzyszeniach,
                        ustawy o działalności pożytku publicznego i o wolontariacie oraz ustawy o sporcie.</p>
                </div>
            </main>

                </div>
            </main>
        </div>';
    }
    
    public static function kluby(){
        
    }
















}
?>