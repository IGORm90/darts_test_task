<?php

namespace Controllers;

use Core\Controller;
use Controllers\ProductController;

class PageController extends Controller
{

   public function mainAction()
   {
      $product = new ProductController([
         'controller' => 'product',
         'action' => 'get',
      ]);
      $products = $product->indexAction();

      $data = [
         'products' => $products
      ];

      $this->view->render('Главная', $data);
   }

   public function newProductAction()
   {
      $this->view->render('Создать товар');
   }

   public function newSetAction()
   {
      $this->view->render('Создать набор');
   }
}
