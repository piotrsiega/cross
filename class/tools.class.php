<?php

/**
 * @author 
 * @copyright 2017
 */

class tools{
    
    private $date,
            $duration,
            $dateEnd,
            $dateStart,
            $months;

    
    public static function vard($VAR){
        echo "<pre>".var_dump($VAR)."</pre>";
    }

            
/**
 * Wyświetla spolszczoną długę wersję daty, np. 23 stycznia 2016 r. ;)
 */            
    
    public function datePL($DATE){
        
        $this->date = $DATE;
        
        $this->date = explode("-",$this->date);
        $this->months = Array(
                        1 => 'stycznia', 
                        2 => 'lutego',
                        3 => 'marca',
                        4 => 'kwietnia',
                        5 => 'maja',
                        6 => 'czerwca',
                        7 => 'lipca',
                        8 => 'sierpnia',
                        9 => 'września',
                        10 => 'października',
                        11 => 'listopada',
                        12 => 'grudnia');
            
        return (int)$this->date[2]." ".$this->months[(int)$this->date[1]]." ".$this->date[0];        
    }
    
/**
 * Na podstawie daty początkowej i długości trwania wydarzenia z kalendarza imprez
 * tworzy datę w formacie 10.02-10.03.2018
 */    
    public function partyTime($DATESTART,$DURATION){
        $this->dateStart = $DATESTART;
        $this->duration = $DURATION;

        $this->dateStart = (explode("-",$this->dateStart));
        $this->dateEnd = explode("-", date('Y-m-d',mktime(0, 0, 0, $this->dateStart[1], $this->dateStart[2]+$this->duration-1, $this->dateStart[0])));
        
        $this->date = "{$this->dateStart[2]}";
        $this->date .= ($this->dateStart[1] == $this->dateEnd[1]) ? "" : ".{$this->dateStart[1]}";
        $this->date .= "-{$this->dateEnd[2]}.{$this->dateEnd[1]}.{$this->dateEnd[0]}";

        return $this->date;
    }        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>






