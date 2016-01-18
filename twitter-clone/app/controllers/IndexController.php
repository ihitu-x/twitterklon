<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
      $response = new \Phalcon\Http\Response();
      $this->response->redirect('post');
      $this->view->disable();

      return;
    }

}
