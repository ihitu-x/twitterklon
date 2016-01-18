<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength as StringLength;

class PostController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      $this->view->postovi = Postovi::find();
    /*  $currentPage = (int) $_GET["page"];

      // The data set to paginate
      $postovi      = Postovi::find();

      // Create a Model paginator, show 10 rows by page starting from $currentPage
      $paginator   = new PaginatorModel(
        array(
          "data"  => $postovi,
          "limit" => 5,
          "page"  => $currentPage
        )
      );

      // Get the paginated results
      $page = $paginator->getPaginate();
      $this->view->setVar("page", $page);*/
    }


    public function addAction()
    {
        if ( $this->request->isPost()) {
          $post = new Postovi();
          $post->email = $this->request->getPost('email');
          $post->tekst = $this->request->getPost('tekst');


          $validation = new Validation();

            $validation->add(
              'tekst',
                new PresenceOf(
                  array(
                      'message' => 'The tekst is required'
                    )
                  )
                );

            $validation->add(
                'email',
                new PresenceOf(
                    array(
                        'message' => 'The e-mail is required'
                    )
                )
            );

            $validation->add(
                'email',
                new Email(
                    array(
                        'message' => 'The e-mail is not valid'
                    )
                )
            );

            $validation->add('tekst', new StringLength(array(
                  'max' => 250,
                  'min' => 5,
                  'messageMaximum' => 'Previse znakova!',
                  'messageMinimum' => 'Premalo znakova!'
            )));


            $errors = [];
            $messages = $validation->validate($_POST);
            if (count($messages)) {
                foreach ($messages as $message) {
                    $errors[] = $message;
                }
                $this->view->errors = $errors;
            } else {
              $success = $post->save();
              /*unset($_POST);
              return $this->dispatcher->forward(array(
                'action' => 'index'
              ));*/
              $response = new \Phalcon\Http\Response();
              $this->response->redirect('post');
              $this->view->disable();

              return;
            }

        }
    }

    public function deleteAction($postId) {

      $post = Postovi::findFirstById($postId);
      $post->delete();

      $response = new \Phalcon\Http\Response();
      $this->response->redirect('post');
      $this->view->disable();

      return;

    }

}
