<?php

namespace MyClass\Model;

abstract class Model
{
    protected $bdd;
    
    protected function executeRequest($sql, $params = null)
    { 
        if ($params === null)
        {
            $result = $this->getBDD()->query($sql);  
        }
        else
        {
            $result = $this->getBDD()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private function getBDD()
    {
        
        if ($this->bdd === null)   
        {
            $this->bdd = new \PDO('mysql:host=localhost;dbname=lexik; charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        } 
        return $this->bdd;
    }
}