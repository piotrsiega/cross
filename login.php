<?php
session_start();
include_once("config.php");

#############################    
#                           #
#  Logowanie                #
#                           #
#############################     
        if(isset($_SESSION['logged'])){
            header('Location: admin.php');                        
        }
        else
        {
            if(isset($_POST['login'])){
                $users = new users;
                $logged = $users->authUser($_POST['login'],$_POST['password']);        
                if($logged != null){
                    $_SESSION['logged'] = ($logged);
                    header('Location: admin.php');
                }
                else                    
                {
                    header('Location: '.$_SERVER['PHP_SELF']);
                }
            }
            else
            {
            content::showAdminHeader();
            echo '
            <div class="container">
            <p class="h4 mb-5">Zaloguj się:</p>
            <form action="'.$_SERVER['PHP_SELF'].'" method="post">
                <div class="form-group row py-3">
                    <label for="login" class="col-sm-2 col-form-label">Użytkownik </label>
                    <div class="col-sm-3">
                        <input class="form-control" id="login" type="text">
                    </div>
                </div>
                <div class="form-group row py-3">
                    <label for="content" class="col-sm-2 col-form-label">Hasło:</label>
                    <div class="col-sm-3">
                        <input class="form-control" id="password" type="password">
                    </div>
                </div>
                <div class="row"
                    <div class="col"sm-2">
                    </div>
                    <div class="col-sm-2 offset-sm-2">
                        <div class="btn-toolbar btn-group justify-content-between mb-5">
                        <button type="submit" class="btn btn-primary">Zaloguj</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>';    
            content::showFooter();
            }
        }
?>
