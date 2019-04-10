<?php
/**
 * 
 */

class users{
    private $con,
            $login,
            $password,
            $userArr;


    public function authUser($LOGIN, $PASSWD){
        $this->login = $LOGIN;
        $this->password = $PASSWD;
        $this->con = new db;
        $this->userArr = $this->con->fetchOne('SELECT * FROM `users` WHERE `login` = "'.$this->login.'"');
        if ($this->userArr != 0)
            {
                if(password_verify($this->password,$this->userArr['password'])){
                    return $this->userArr['login'];
                } else {
                    return null;
                    exit;
                }
    
        } else {
            return null;
        };          
    }

    public function logout(){
        unset($_SESSION['logged']);
    }

}







/*
    include_once("db.php");
    $userQuery = $db->prepare('SELECT `login`,`password`,`su` FROM `users` WHERE `login` = :login');
    $userQuery->bindValue(':login', $_POST['login'],PDO::PARAM_STR);
    $userQuery->execute();
    
    if ($userQuery->rowCount() == 1)
    {
        $user = $userQuery->fetch();
        if(password_verify($_POST['password'],$user['password'])){
            $_SESSION['login'] = $user['login'];
            $_SESSION['su'] = $user['su'] == 1 ? 1 : '';
            header('Location: admin.php');
            
        } else {
            $_SESSION['loginError'] = 1;
            header('Location: login.php');
            exit;
        }

    } else {
        $_SESSION['loginError'] = 1;
        header('Location: login.php');
    };  
    exit;
}    */


