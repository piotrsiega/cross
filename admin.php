<?php
//session_destroy();
session_start();
include_once("config.php");

$_SESSION['logged'] = 1;

if(isset($_SESSION['logged']))
{
    
$_GET['opt'] = isset($_GET['opt']) ? $_GET['opt'] : '';


$con = new db();
$adminPanel = new admin();
$categories = $con->fetchAll('SELECT * FROM category ORDER BY `order`');

switch($_GET['opt']){

#############################    
#                           #
#  Logowanie                #
#                           #
#############################     

    case "wyloguj":
        $users = new users;
        $users->logout();
        header('Location: '.$_SERVER['PHP_SELF']);
        break;
        
#############################    
#                           #
#  ZARZĄDZANIE KATEGORIAMI  #
#                           #
#############################     

    case "dodajkategorie":
        content::showAdminHeader();
        if(isset($_GET['id'])){
            //$adminPanel->maxOrder()
        }
        //var_dump($_GET);
        
        $con = new db;
        $catName = $con->fetchOne("SELECT `name` FROM `category` WHERE `id` = ".$_GET['id']);
        echo '        
            <div class="container">       
            <p class="h4 mb-5">Nowa pozycja w kategorii <span class="text-danger">'.$catName['name'].'</span>:</p>
            <form action="'.$_SERVER['PHP_SELF'].'?opt=zapiszkategorie" method="post">
            <div class="form-group row py-3">
            <label for="name" class="col-sm-2 col-form-label text-right text-right">Tytuł: </label>
             <div class="col-sm-10">
                <input class="form-control" id="name" type="text">
            </div>
        </div>';
                echo '<input type="hidden" name="parent" value=';
                echo (isset($_GET['id'])) ? $_GET['id'] : null;
                echo ">";
                echo '<input type="hidden" name="level" value=';
                echo (isset($_GET['level'])) ? $_GET['level'] : 0;
                echo ">";
                echo '
                <div class="row"
                <div class="col"sm-2">
                </div>
                <div class="col-sm-10 offset-sm-2">
                    <div class="btn-toolbar btn-group justify-content-between mb-5">
                    <button type="submit" class="btn btn-secondary">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Wyślij</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

            ';
        content::showFooter();
        break;
        
    case "edytujkategorie":
        content::showAdminHeader();
        echo '<p>Nowa kategoria:</p>
            <form action="'.$_SERVER['PHP_SELF'].'?opt=zapiszkategorie" method="post">
                Nazwa: <input name="name" type="text" value="'.$_GET['name'].'" /><br />
                <input type="hidden" name="id" value='.$_GET['id'] .'>
                <button>Wyślij</button>
            </form>';
//        $page = new page(null,null,"Panel administracyjny",null);
        content::showFooter();  
        break;  
       
    case "wdol":
        $adminPanel->moveDown($_GET['id'],$_GET['order'],$_GET['level']);
        header('Location: '.$_SERVER['PHP_SELF']."?opt=kategorie");
        break;

    case "wgore":
        $adminPanel->moveUp($_GET['id'],$_GET['order'],$_GET['level']);
        header('Location: '.$_SERVER['PHP_SELF']."?opt=kategorie");
        break;
    
    case "zapiszkategorie":
        var_dump($_POST);
        if(isset($_POST['id']))
        {
            $adminPanel->editCategory($_POST['id'],$_POST['name']);
        }
        else
        {
            $adminPanel->saveCategory($categories,$_POST['name'],$_POST['level'],$_POST['parent']);           
        }
        header('Location: '.$_SERVER['PHP_SELF']."?opt=kategorie");
        break;
    
    case "usunkategorie":
        $adminPanel->delCategory($_GET['id'],$_GET['parent']);
        header('Location: '.$_SERVER['PHP_SELF']."?opt=kategorie");
        break;
        
    case "kategorie":
        content::showAdminHeader();
        echo '<div class="container bg-white pb-4">
        <h3 class="p-4">Lista kategorii</h3>
        ';
        $adminPanel->showCategoryTree();
        echo '</div>';
        content::showFooter();        
        break;

#############################    
#                           #
#  ZARZĄDZANIE ARTYKUŁAMI   #
#                           #
#############################     


    case "dodajartykul":
        content::showAdminHeader();
        echo '
        <div class="container">
            <p class="h4 mb-5">Nowy artykuł w kategorii <span class="text-danger">'.$_GET['category'].': </span></p>
                
            <form action="'.$_SERVER['PHP_SELF'].'?opt=zapiszartykul" method="post">
            <input type="hidden" name="category_id" value='.$_GET['categoryID'],'">
            <div class="form-group row py-3">
                <label for="title" class="col-sm-2 col-form-label text-right text-right">Tytuł: </label>
                 <div class="col-sm-10">
                    <input class="form-control" name="title" type="text">
                </div>
            </div>

            <div class="form-group row pb-3">
                <label for="content" class="col-sm-2 col-form-label text-right text-right">Treść:</label>
                <div class="col-sm-10">
                    <textarea rows="10" cols="50" name="content"></textarea>
                </div>
            </div>
            <div class="form-group row pb-3">
            <label for="date" class="col-sm-2 col-form-label text-right">Data:</label>
            <div class="col-sm-10">
                <input class="form-control col-sm-3" id="date" type="date" value="'.date('Y-m-d').'">
            </div>
            </div>
            
            <div class="row"
                <div class="col"sm-2">
                </div>
                <div class="col-sm-10 offset-sm-2">
                    <div class="btn-toolbar btn-group justify-content-between mb-5">
                    <button type="submit" class="btn btn-secondary">Anuluj</button>
                    <button type="submit" class="btn btn-primary">Wyślij</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        ';
        content::showFooter();        
        break;

    case "edytujartykul":
        $article = $con->fetchOne("SELECT `id`,`title`,`content`,`date` FROM `articles` WHERE `category_id` = ".$_GET['id']);
        $category = $con->fetchOne("SELECT `name` FROM `category` WHERE `id` = ".$_GET['id']);
        content::showAdminHeader();
        echo '
        <div class="container">
        <p class="h4 mb-5">Edycja artykułu w kategorii <span class="text-danger">'.$category['name'].': </span></p>
            
        <form action="'.$_SERVER['PHP_SELF'].'?opt=zapiszartykul" method="post">';
       
        $adminPanel->availableCategory($_GET['id']);
        echo '
            <div class="form-group row py-3">
                <label for="title" class="col-sm-2 col-form-label text-right text-right">Tytuł: </label>
                 <div class="col-sm-10">
                    <input class="form-control" name="title" type="text" value="'.$article['title'].'">
                </div>
            </div>
            <div class="form-group row py-3">
                <label for="title" class="col-sm-2 col-form-label text-right text-right">Tytuł: </label>
                 <div class="col-sm-10">
                    <input class="form-control" name="title" type="text" value="'.$article['title'].'">
                </div>
            </div>

            <div class="form-group row pb-3">
                <label for="content" class="col-sm-2 col-form-label text-right text-right">Treść:</label>
                <div class="col-sm-10">
                    <textarea rows="10" cols="50" name="content">'.$article['content'].'</textarea>
                </div>
            </div>

           <div class="form-group row pb-3">
            <label for="date" class="col-sm-2 col-form-label text-right">Data:</label>
            <div class="col-sm-10">
                <input class="form-control col-sm-3" id="date" type="date" value="'.date('Y-m-d').'">
            </div>
            </div>
            <input type="hidden" name="id" value='.$_GET['id'].' />
            <div class="row"
            <div class="col"sm-2">
            </div>
            <div class="col-sm-10 offset-sm-2">
                <div class="btn-toolbar btn-group justify-content-between mb-5">
                <button type="submit" class="btn btn-secondary">Anuluj</button>
                <button type="submit" class="btn btn-primary">Wyślij</button>
                </div>
            </div>
        </div>
        </form>
        ';
        content::showFooter();        
        break;
    
    case "zapiszartykul":
        if(isset($_POST['id']))
        {
        //edycja
            $adminPanel->editArticle($_POST['id'],$_POST['title'],$_POST['content'],$_POST['date'],$_POST['category_id']); 
        }
        else
        {
        //zapis
            $adminPanel->saveArticle($_POST['title'],$_POST['content'],$_POST['date'],$_POST['category_id']);
        }        
        
        header('Location: '.$_SERVER['PHP_SELF']."?opt=artykuly");
        break;
        
    case "usunartykul":
        $adminPanel->delArticle($_GET['id']);
        header('Location: '.$_SERVER['PHP_SELF']."?opt=artykuly");
        break;
        
    case "artykuly":
        content::showAdminHeader();
        $adminPanel->showArticlesTree();
        content::showFooter();
        break;


#############################    
#                           #
#  ZARZĄDZANIE KALENDARZEM  #
#                           #
#############################     

    case "kalendarzimprez":
        content::showAdminHeader();
        $adminPanel->showPartyTable();
        content::showFooter();
    break;

    case "wyczysckalendarz":
        $adminPanel->clearPartyTable();
        break;
    
    case "dodajdokalendarza":
        content::showAdminHeader();
        echo '        
            <p>Nowy wpis:</p>
            <form action="'.$_SERVER['PHP_SELF'].'?opt=zapiszdokalendarza" method="post" enctype="multipart/form-data">
                Nazwa imprezy: <input name="name" type="text" placeholder="" /><br />
                Początek realizacji zadania: <input name="startdate" type="date" placeholder="" /><br />
                Koniec realizacji zadania: <input name="enddate" type="date" placeholder="" /><br />
                Miejsce realizacji zadania: <input name="place" type="text" placeholder="" /><br />
                Koordynator zadania: <input name="coord" type="text" placeholder="" /><br />
                Dyscyplina sportu: <input name="discipline" type="text" placeholder="" /><br />
                Rodzaj zadania: <select name="type">
                    <option value=1>Zawody sportowe</option>
                    <option value=2>Obozy sportowe</option>
                    <option value=3>Szkolenia sportowe</option>                                        
                </select><br />
                Dodaj plik z komunikatem: <input type="file" name="comm"><br />
                Dodaj plik z wynikami: <input type="file" name="result"><br />
                ';
                
                echo '<button>Wyślij</button>
            </form>';
            
        content::showFooter();
        break;    
    
    case "zapiszdokalendarza":
        $duration = date_diff(date_create($_POST['startdate']),date_create($_POST['enddate']));
        $adminPanel->saveParty($_POST['name'],$_POST['startdate'],$duration->days,$_POST['place'],$_POST['coord'],$_POST['discipline'],$_POST['type']);

//        if($_FILES['comm']['name'] == '' && $_FILES['result']['name'] == ''){
//        }
//        else
//        {
//            $files = new files;
//            if($_FILES['result']['name'] != ''){
//                
//                echo "Jest plik result";   
//                $files->saveCalendarFile($_FILES,'result');
//            }
//            if($_FILES['comm']['name'] != '')
//            {
//                echo "Jest plik comm";
//                $files->saveCalendarFile($_FILES,'comm');
//            }
//        }
//        header('Location: '.$_SERVER['PHP_SELF']."?opt=kalendarzimprez");
        break;

#############################    
#                           #
#  ZARZĄDZANIE NEWSAMI      #
#                           #
############################# 

    case "dodajnewsa":
        content::showAdminHeader();
        echo '
        <div class="container">
            <p class="h4 mb-5">Nowy wpis: </p>
            <form action="'.$_SERVER['PHP_SELF'].'?opt=zapisznewsa" method="post">
                <div class="form-group row py-3">
                    <label for="title" class="col-sm-2 col-form-label text-right">Tytuł: </label>
                    <div class="col-sm-10">
                        <input name="title" class="form-control" type="text" id="title" placeholder="">
                    </div>
                </div>

                <div class="form-group row pb-3">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Rodzaj wiadomości: </label>
                    <div class="col-sm-10">
                    <select class="form-control col-sm-2">name="icon">
                        <option value=k>Komunikat</option>
                        <option value=o>Obozy</option>
                        <option value=s>Szkolenie</option>
                        <option value=z>Zawody</option>
                    </select>
                    </div>
                </div>

                <div class="form-group row py-3">
                    <label for="content" class="col-sm-2 col-form-label text-right">Treść:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="10" name="content"></textarea>
                    </div>
                </div>
                <div class="form-group row pb-3">
                    <label for="date" class="col-sm-2 col-form-label text-right">Data:</label>
                    <div class="col-sm-10">
                    <input class="form-control col-sm-3" name="date" type="date" value="'.date('Y-m-d').'"/>
                    </div>
                </div>
                
                <div class="row"
                        <div class="col"sm-2">
                        </div>
                        <div class="col-sm-10 offset-sm-2">
                            <div class="btn-toolbar btn-group justify-content-between mb-5">
                            <button type="submit" class="btn btn-secondary">Wstecz</button>
                            <button type="submit" class="btn btn-primary">Wyślij</button>
                            </div>
                        </div>
                </div>
            </form>
            </div>
            ';    
        content::showFooter();
        break;

        case "edytujnewsa":
            content::showAdminHeader($_GET['id']);
            $con = new db;
            $news = $con->fetchOne("SELECT * FROM `news` WHERE `id` = ".$_GET['id']);
            echo '        
            <div class="container">
                <p class="h4 mb-5">Edycja wpisu:</p>
                <form action="'.$_SERVER['PHP_SELF'].'?opt=zapisznewsa" method="post">
                    <input hidden name="id" value="'.$news['id'].'">
                    <div class="form-group row py-3">
                    <label for="title" class="col-sm-2 col-form-label text-right">Tytuł: </label>
                    <div class="col-sm-10">
                    <input class="form-control" name="title" type="text" value="'.$news['title'].'">
                    </div>
                    </div>
                    <div class="form-group row pb-3">
                    <label for="icon" class="col-sm-2 col-form-label text-right">Rodzaj wiadomości: </label>
                    <div class="col-sm-10">
                    <select class="form-control col-sm-2" name="icon">';
                        echo ($news['icon'] == 'k') ? '<option value=k selected>Komunikat</option>' : '<option value=k>Komunikat</option>';
                        echo ($news['icon'] == 'o') ? '<option value=o selected>Obozy</option>' : '<option value=o>Obozy</option>';
                        echo ($news['icon'] == 's') ? '<option value=s selected>Szkolenia</option>' : '<option value=s>Szkolenia</option>';
                        echo ($news['icon'] == 'z') ? '<option value=z selected>Zawody</option>' : '<option value=z>Zawody</option>';
                    echo '</select>
                    </div>
                    </div>
                    <div class="form-group row py-3">
                    <label for="content" class="col-sm-2 col-form-label text-right">Treść:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="content">'.$news['content'].'</textarea>
                    </div>
                    </div>
                    <div class="form-group row pb-3">
                    <label for="date" class="col-sm-2 col-form-label text-right">Data:</label>
                    <div class="col-sm-10">
                        <input class="form-control col-sm-3" id="date" type="date" value="'.date('Y-m-d').'">
                    </div>
                    </div>
                    
                    <div class="row"
                        <div class="col"sm-2">
                        </div>
                        <div class="col-sm-10 offset-sm-2">
                            <div class="btn-toolbar btn-group justify-content-between mb-5">
                            <button type="submit" class="btn btn-secondary">Anuluj</button>
                            <button type="submit" class="btn btn-primary">Wyślij</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>';    
            content::showFooter();
            break;        
        case "zapisznewsa":
        var_dump($_POST);
            $news = new news;
            if(isset($_POST['id']))
            {
            //edycja
                $news->edit($_POST['id'],$_POST['title'],$_POST['content'],$_POST['date'],$_POST['icon']);
            }
            else
            {
            //zapis
                $news->save($_POST['title'],$_POST['content'],$_POST['date'],$_POST['icon']);
            }                 
            header('Location: '.$_SERVER['PHP_SELF']."?opt=pokaznewsy");
            break;
            
        case "usunnewsa":
            $adminPanel->delNews($_GET['id']);
            header('Location: '.$_SERVER['PHP_SELF']."?opt=pokaznewsy");
            break;

        case "pokaznewsy":
            content::showAdminHeader();
            $adminPanel->showNewsTable();
            content::showFooter();
            break;

        case "zapiszplik":
            $files = new files;
            $files->saveFile("files/calendar/",$_FILES);
        break;

#############################    
#                           #
#  ZARZĄDZANIE KLUBAMI      #
#                           #
#############################     

    case "kluby":
        content::showAdminHeader();
        $adminPanel->showClubsTable();
        content::showFooter();
    break;
    
    case "dodajklub":
        content::showAdminHeader();
        echo '        
            <p>Nowy wpis:</p>
            <form action="'.$_SERVER['PHP_SELF'].'?opt=zapiszklub" method="post" enctype="multipart/form-data">
                Nazwa klubu: <input name="name" type="text" placeholder="" /><br />
                Adres klubu: <input name="address" type="rexr" placeholder="" /><br />
                Email: <input name="email" type="text" placeholder="" /><br />
                Telefon: <input name="phone" type="text" placeholder="" /><br />
                <button>Wyślij</button>
            </form>';
            
        content::showFooter();
        break;    
    
    case "zapiszklub":
    var_dump($_POST);
        $adminPanel->saveClub($_POST['name'],$_POST['address'],$_POST['email'],$_POST['phone']);
//        header('Location: '.$_SERVER['PHP_SELF']."?opt=kluby");
        break;

    default:
        header('Location: '.$_SERVER['PHP_SELF']."?opt=pokaznewsy");
        break;  
    }
}
else
{
    //header('Location: login.php');                        
}
?>