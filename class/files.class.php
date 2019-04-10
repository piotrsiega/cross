<?php

/**
 * @author 
 * @copyright 2018
 */

class files{
    
    private $con,
            $destDir,
            $errorArray,
            $extension,
            $filesArray,
            $fileId,
            $i,
            $inputName;
    
/**
 * Zapisuje pliki z pola input o nazwie "files"
 */    
    public function saveFile($DESTINATION_DIR,$FILES_ARRAY,$INPUTNAME){
        $this->destDir = $DESTINATION_DIR;
        $this->filesArray = $FILES_ARRAY;
        $this->inputName = $INPUTNAME;

        $this->con = new db;

        for($this->i=0; $this->i < count($this->filesArray[$this->inputName]['name']); $this->i++){
            $this->con->saveToDB("files",         
                array(
                    array('colName' => "name",
                            'colValue' => $this->filesArray[$this->inputName]['name'][$this->i],
                            'colParam' => PDO::PARAM_STR),
                    array('colName' => "directory",
                            'colValue' => $this->destDir,
                            'colParam' => PDO::PARAM_STR),
                    )); 
        $this->extension = explode('.',$this->filesArray[$this->inputName]['name'][$this->i]);
        $this->extension = end($this->extension);

            var_dump($this->fileId);               
                    
            $this->fileId = $this->con->fetchOne("SELECT `id` FROM `files` WHERE `name` = '".$this->filesArray[$this->inputName]['name'][$this->i]."'");
            if(move_uploaded_file($this->filesArray[$this->inputName]['tmp_name'][$this->i],$this->destDir.$this->fileId['id'].'.'.$this->extension))
                {
                echo "Plik <strong>".$this->filesArray[$this->inputName]['name'][$this->i]."</strong> został przesłany poprawnie.<br />";
                }
        }
    }
    
    public function saveCalendarFile($FILES_ARRAY,$INPUTNAME){
        $this->filesArray = $FILES_ARRAY;
        $this->inputName = $INPUTNAME;
        $this->filesArray = $this->filesArray[$this->inputName];
  
        $this->con = new db;
        $this->con->saveToDB("files",         
            array(
                array('colName' => "name",
                    'colValue' => $this->filesArray['name'],
                    'colParam' => PDO::PARAM_STR),
                array('colName' => "directory",
                    'colValue' => 'files/calendar/',
                    'colParam' => PDO::PARAM_STR),
                )); 
        $this->extension = explode('.',$this->filesArray['name']);
        $this->extension = end($this->extension);
                    
        $this->fileId = $this->con->fetchOne("SELECT `id` FROM `files` WHERE `name` = '".$this->filesArray['name']."'");
            if(move_uploaded_file($this->filesArray['tmp_name'],"files/calendar/".$this->fileId['id'].'.'.$this->extension))
                {
                echo "Plik <strong>".$this->filesArray['name']."</strong> został przesłany poprawnie.<br />";
                }
        
        
    }   
    
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>