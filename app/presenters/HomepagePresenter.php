<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI;
use projectModel;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var \projectForm @inject */
    public $projectForm;
    
    public $projectModel;
    
    public function __construct(projectModel $projectModel)
    {
        $this->projectModel = $projectModel;
    }

    protected function createComponentProjectForm()
    {
        $form = $this->projectForm->create();
        $form->onSuccess[] = function (UI\Form $form) {
            $this->redirect('this');
        };

        return $form;
    }   
    
    public function renderOverview()
    {
        $projects = $this->projectModel->getProject();
        $this->template->projects = $projects;        
    }
    
}
