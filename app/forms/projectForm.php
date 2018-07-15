<?php
use Nette\Application\UI;

class projectForm
{
    private $projectModel;

    public function __construct(projectModel $projectModel)
    {
        $this->projectModel = $projectModel;
    }

    public function create()
    {
        $form = new UI\Form;
        $form->addText('name', 'Název projektu:');
        $form->addText('deadline','Datum odevzdání')->setType('date');
        $form->addSelect('type', 'Typ projektu', array('time limited' => 'time limited','continuous integration' => 'continuous integration'));
        $form->addCheckbox('web_project','Webový projekt');
        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = [$this, 'processForm'];

        return $form;
    }

    public function processForm($form)
    {
        $this->projectModel->addProject($form->getValues());
    }   
}