<?php

/**
 * @author 
 * @copyright 2018
 */


class db{
    private $host,
            $user,
            $passwd,
            $dbase,
            $sql,
            $query,
            $answer,
            $table,
            $columns,
            $parameter,
            $where,

            $key, $val; // do forecha
            
    public $db;
    
/**
 * Nawiązuje połączenie z bazą danych, jeśli nie zostaną podane parametry
 * do połączanie zostaną użyte dane z pliku config.php Jeśli chcesz połączyć się 
 * na podstawie innych danych musisz podać parametry:
 * host, nazwa użytkownika bazy, hasło oraz nazwa bazy
 */
    public function __construct($HOST = null,$USER = null,$PASSWD = null,$DBASE = null){
        
        $this->host = $HOST == null ? DB_SRV : $HOST;
        $this->user = $USER == null ? DB_USER : $HOST;
        $this->passwd = $PASSWD == null ? DB_PWD : $PASSWD;
        $this->dbase = $DBASE == null ? DB_DB : $DBASE;
        
        try{
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbase};charset=utf8",$this->user,$this->passwd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, 
                                PDO::ERRMODE_EXCEPTION);
            //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
        }
        catch(PDOException $e){
            $this->showError($e);
            exit;
        }
        return $this->db;
    }
    

    private function showError($ERROR){
            echo "Coś nie tak z bazą danych, a dokładnie to: <i>".$ERROR->getMessage()."</i>";
    }     

/**
 * Zamyka połączenie z bazą danych.
 */
    public function __destruct(){
        $this->db = null;
    }

/**
 * Pobiera dane zgodnie z zapytaniem SQL i zwraca w formie tablicy. W przypadku braku danych 
 * w wyniku zapytania zwraca 0 
 */
    public function fetchAll($SQL){
        try{        
            $this->sql = $SQL;
            $this->query = $this->db->query($this->sql);
            $this->answer = $this->query->fetchAll();
            return $this->answer == null ? 0 : $this->answer; 
            $query->debugDumpParams();

        }
        catch(PDOException $e){
            echo "Coś nie tak z bazą danych, a dokładnie to: <i>".$e->getMessage()."</i>";
            exit;
        }
    }

/**
 * Pobiera dane zgodnie z zapytaniem SQL i zwraca w formie tablicy. W przypadku braku danych 
 * w wyniku zapytania zwraca 0 
 */
    public function fetchOne($SQL){
        try{        
            $this->sql = $SQL;
            $this->query = $this->db->query($this->sql);
            $this->answer = $this->query->fetch();
            return $this->answer == null ? 0 : $this->answer; 
            $this->query->debug();
        }
        catch(PDOException $e){
            echo "Coś nie tak z bazą danych, a dokładnie to: <i>".$e->getMessage()."</i>";
            exit;
        }
    }
    
/**
 *   
 */    


/**
 * Zapis do bazy danych  
 */    
    public function saveToDB($TABLE, $COLUMNS){

        $this->table = $TABLE;
        $this->columns = $COLUMNS;
        //var_dump($this->columns);
        
        $this->sql = "INSERT INTO `{$this->table}` (";
        
        foreach($this->columns as $this->key => $this->val){
                $this->sql .= "`{$this->val['colName']}`, ";
        }
        $this->sql = rtrim($this->sql, ", ");
        $this->sql .= ") VALUES (";
        
        foreach($this->columns as $this->key => $this->val){
                $this->sql .= ":{$this->val['colName']}, ";
        }         
        $this->sql = rtrim($this->sql, ", ");
        $this->sql .= ")";

        try{
            $query = $this->db->prepare($this->sql);
            foreach($this->columns as $this->key => $this->val){
                
            $this->val['colValue'] = $this->val['colValue'] == '' ? null : $this->val['colValue'];   
                if($this->val['colValue'] == ''){
                   $this->val['colValue'] = null; 
                } 
                $query->bindValue(":{$this->val['colName']}",$this->val['colValue'],$this->val['colParam']);
            }
            $query->execute();
            $query->debugDumpParams();
        }
        catch(PDOException $e){
            echo "Coś nie tak z bazą danych. A dokładnie to ".$e;
        }
    }        
    
/**
 * Usuwa wpis z bazy danych.
 * Pierwszy parametr = nazwa tabeli, drugi = nazwa kolumny której dotyczy warunek WHERE
 * trzec = warunek
**/    
    function delFromDB($TABLE, $COLUMNS, $PARAMETER){
        $this->table = $TABLE;
        $this->columns = $COLUMNS;
        $this->parameter = $PARAMETER;
        try{
            $query = $this->db->query("DELETE FROM `{$this->table}` WHERE `{$this->table}`.`{$this->columns}` = {$this->parameter}");
        }
        catch(PDOException $e){
            echo "Coś nie tak z bazą danych. A dokładnie to ".$e;
        }
    }
    
/**
 * Czyści taelę z danych, ustawia index AI na 1
 */    
    public function clearTable($TABLE){
        $this->table = $TABLE;
        try{
            $query = $this->db->query("TRUNCATE TABLE `{$this->table}`");
        }
        catch(PDOException $e){
            echo "Coś nie tak z bazą danych. A dokładnie to ".$e;
        }
 
    }    

/**
 * Aktualizcuje rekord bazy danych 
**/    
    public function editRecord($TABLE, $COLUMNS = Array(), $WHERE){
        $this->table = $TABLE;
        $this->columns = $COLUMNS;
        $this->where = $WHERE;
        $this->sql = "UPDATE `".$this->table."` SET ";
        foreach($this->columns as $this->key=>$this->val){
            $this->sql .= "`".$this->val['colName']."` = '".$this->val['colValue']."', ";
        }
        $this->sql = rtrim($this->sql,", ");
        $this->sql .= " WHERE ".$this->where;
        echo $this->sql."<br /><br />";


        try{
                $query = $this->db->query($this->sql);
                $query->debugDumpParams();
            }
            catch(PDOException $e){
                echo "Coś nie tak z bazą danych. A dokładnie to ".$e;
            }        
                
        
//        try{
//            $query = $this->db->prepare($this->sql);
//            
//            foreach($this->columns as $this->key => $this->val){
//                $this->val['colValue'] = $this->val['colValue'] == '' ? null : $this->val['colValue'];   
//                    if($this->val['colValue'] == ''){
//                       $this->val['colValue'] = null; 
//                    } 
//                    $query->bindValue(":{$this->val['colName']}",$this->val['colValue'],$this->val['colParam']);
//            }
//            $query->execute();
//            $query->debugDumpParams();
//        }
//        catch(PDOException $e){
//            echo "Coś nie tak z bazą danych. A dokładnie to ".$e;
//        }        
        

        echo $this->sql;
        
        
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}
?>