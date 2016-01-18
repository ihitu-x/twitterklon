<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Postovi extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $tekst;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    'message' => 'the email is not valid'
                )
            )
        );



        if ($this->validationHasFailed() == true) {
            return $validationHasFailed != true;
        }

        return true;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'postovi';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Postovi[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Postovi
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
