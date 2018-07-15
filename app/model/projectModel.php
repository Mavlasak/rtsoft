<?php

class projectModel
{
    private $database;

    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
    
    public function addProject($values){
        $this->database->table('project')->insert($values); 
    }
   
    public function getProject(){
       return $this->database->table('project')->fetchAll(); 
    }
    
}