<?php

class Controller_Test extends Controller_Rest
{

    public function get_del(){
        $query = DB::query("DELETE FROM `projects");
        $query->excute();
        exit();
    }
    
    public function get_sendmail($toadrr = 'to@exmaple.com'){
        if(!Input::get('email')){
            return;
        }
        
        $sendgrid = new SendGrid(getenv('SENDGRID_USERNAME'), getenv('SENDGRID_PASSWORD'));
        $email = new SendGrid\Email();
        $email->addTo(Input::get('email'))->
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

    public function get_createimage(){
        Util::create_profileimage();
        return;
    }
}