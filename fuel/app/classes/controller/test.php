<?php

class Controller_Test extends Controller_Rest
{

    public function get_sendmail($toadrr = 'to@exmaple.com'){
        $sendgrid = new SendGrid(getenv('SENDGRID_USERNAME'), getenv('SENDGRID_PASSWORD'));
        $email = new SendGrid\Email();
        $email->addTo($toadrr)->
            setFrom('from@example.com')->
            setSubject('件名')->
            setText('こんにちは！');

        $sendgrid->send($email);
    }
}