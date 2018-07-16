<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI;
use projectModel;
use Tracy\Debugger;

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
        $form = $this->projectForm->create($this->getParameter('id'));
        $form->onSuccess[] = function (UI\Form $form) {
            $this->redirect('this');
        };

        return $form;
    }   
    
    public function renderOverview()
    {
        $projects = $this->projectModel->getProjects();
        $this->template->projects = $projects;        
    }
 
    public function handleDeleteProject($id)
    {
        $this->projectModel->deleteProject($id);        
    }
    
     public function renderEdit($id)
    {
        $this->template->id = $id; 
    }
    
}
