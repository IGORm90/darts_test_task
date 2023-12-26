<?php

namespace Controllers;

use Core\Controller;
use Controllers\ProductController;
use Controllers\SetController;

class PageController extends Controller
{

   public function mainAction()
   {
      $product = new ProductController([
         'controller' => 'product',
         'action' => 'get',
      ]);
      $products = $product->indexAction();

      $set = new SetController([
         'controller' => 'set',
         'action' => 'get',
      ]);
      $sets = $set->indexAction();

      $data = [
         'products' => $products,
         'sets' => $sets
      ];

      $this->view->render('Главная', $data);
   }

   public function newProductAction()
   {
      $this->view->render('Создать товар');
   }

   public function newSetAction()
   {
      $product = new ProductController([
         'controller' => 'product',
         'action' => 'get',
      ]);
      $products = $product->indexAction();

      $set = new SetController([
         'controller' => 'set',
         'action' => 'get',
      ]);
      $sets = $set->indexAction();

      $data = [
         'products' => $products,
         'sets' => $sets
      ];

      $this->view->render('Создать набор', $data);
   }

   public function setAction()
   {
      $set = new SetController([
         'controller' => 'set',
         'action' => 'single',
      ]);
      $setData = $set->singleAction($this->route['id']);

      $this->view->render('Набор', ['setData' => $setData]);
   }
}
