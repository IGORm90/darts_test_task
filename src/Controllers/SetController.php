<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class SetController extends Controller {

    public function indexAction() {

    }

    public function createAction() {
        if (!empty($_POST)) {
			if ($this->model->add($_POST)) {
				View::redirect('/');
            }

            View::redirect('/');
        }
        
        View::redirect('/');
    }

    public function deleteAction() {
        
    }

}
