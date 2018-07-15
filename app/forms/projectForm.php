<?php
use Nette\Application\UI;

class projectForm
{
    private $database;

    public function __construct(Nette\Database\Connection $database)
    {
        $this->database = $database;
    }

    public function create()
    {
        $form = new UI\Form;
        $form->addText('name', 'Název projektu:');
        $form->addText('deadline','Datum odevzdání')->setType('date');
        $form->addSelect('type', 'Typ projektu', array('time limited','continuous integration'));
        $form->addCheckbox('web_project','Webový projekt');
        $form->addSubmit('send', 'Odeslat');
        $form->onSuccess[] = [$this, 'processForm'];

        return $form;
    }

    public function processForm($form)
    {

    }
}