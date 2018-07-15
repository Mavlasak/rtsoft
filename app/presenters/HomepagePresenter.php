<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var \projectForm @inject */
    public $projectForm;

    protected function createComponentProjectForm()
    {
        $form = $this->projectForm->create();
        $form->onSuccess[] = function (UI\Form $form) {
            $this->redirect('this');
        };

        return $form;
    }   
    
}
