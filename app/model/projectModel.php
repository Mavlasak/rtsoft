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
   
    public function getProjects(){
       return $this->database->table('project')->fetchAll(); 
    }
    
    public function getProject($id){
       return $this->database->table('project')->where('id',$id)->fetch(); 
    }
    
    public function deleteProject($id){
       return $this->database->table('project')->where('id',$id)->delete(); 
    }
    
    public function updateProject($values){
       return $this->database->table('project')->where('id',$values->id)->update($values); 
    }
}