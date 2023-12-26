<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class ProductController extends Controller {

    public function indexAction() {
        return $this->model->get();
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
        if ($this->model->delete($this->route['id'])) {
            View::redirect('/');
        }

        View::redirect('/');
    }

}
