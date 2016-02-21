<?php

class Controller_Test extends Controller_Rest
{

    public function get_sendmail($toadrr = 'to@exmaple.com'){
        $sendgrid = new SendGrid(getenv('SENDGRID_USERNAME'), getenv('SENDGRID_PASSWORD'));
        $email = new SendGrid\Email();
        $email->addTo($toadrr)->
            setFrom(getenv('SENDGRID_USERNAME'))->
            setSubject('件名')->
            setText('こんにちは！');

        try {
            var_dump($sendgrid->send($email));
            
            echo "Success!!";
            return;
        } catch(\SendGrid\Exception $e) {
            echo $e->getCode();
            foreach($e->getErrors() as $er) {
                echo $er;
            }
            return;
        }
    }
}