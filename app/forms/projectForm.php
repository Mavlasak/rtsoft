<?php
use Nette\Application\UI;
//use Tracy\Debugger;

class projectForm
{
    private $projectModel;

    public function __construct(projectModel $projectModel)
    {
        $this->projectModel = $projectModel;
    }

    public function create($id = null)
    {

        $project = $this->projectModel->getProject($id);
                
        $form = new UI\Form;        
        $form->addText('name', 'Název projektu:');  
        $form->addText('deadline','Datum odevzdání')->setType('date');
        $form->addSelect('type', 'Typ projektu', array('time limited' => 'time limited','continuous integration' => 'continuous integration'));
        $form->addCheckbox('web_project','Webový projekt');
        
        if ($project) {
            $form['name']->setDefaultValue($project->name);
            $form['deadline']->setDefaultValue($project->deadline->format('Y-m-d'));
            $form['type']->setDefaultValue($project->type);
            $form['web_project']->setDefaultValue($project->web_project);
            $form->addHidden('id')->setDefaultValue($project->id);
        }
        
        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = [$this, 'processForm'];

        return $form;
    }

    public function processForm($form)
    {
        $values = $form->getValues();
        if (isset($values->id)) $this->projectModel->updateProject($values);
        else $this->projectModel->addProject($values);
    }   
}