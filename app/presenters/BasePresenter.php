<?php

namespace App\Presenters;

use Nette,
	App\Model,
	IPub;


/**
 * Base presenter for all application presenters.
 */
class BasePresenter extends Nette\Application\UI\Presenter
{
	use IPub\MobileDetect\TMobileDetect;
	
	protected function startup()
    {
        parent::startup();
		
		if (!$this->session->isStarted()) {
			$this->session->start();
		}
    }
	
	protected function createTemplate($class = NULL)
    {
        // Init template
        $template = parent::createTemplate($class);

        // Add mobile detect and its helper to template
        $template->_mobileDetect    = $this->mobileDetect;
        $template->_deviceView      = $this->deviceView;

        return $template;
    }
}
