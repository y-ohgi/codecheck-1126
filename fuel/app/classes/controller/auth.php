<?php

class Controller_Auth extends Controller_Template
{

	public function action_signin()
	{
		$data["subnav"] = array('signin'=> 'active' );
		$this->template->title = 'Auth &raquo; Signin';
		$this->template->content = View::forge('auth/signin', $data);
	}

	public function action_signup($uuid = null)
	{
		$data["subnav"] = array('signup'=> 'active' );
		$this->template->title = 'Auth &raquo; Signup';
		$this->template->content = View::forge('auth/signup', $data);
	}

	public function action_signout()
	{
		$data["subnav"] = array('signout'=> 'active' );
		$this->template->title = 'Auth &raquo; Signout';
		$this->template->content = View::forge('auth/signout', $data);
	}

	public function action_register()
	{
       $data["subnav"] = array('register'=> 'active' );
		$this->template->title = 'Auth &raquo; Register';
		$this->template->content = View::forge('auth/register', $data);
	}

	public function action_mailregister()
	{
		$data["subnav"] = array('mailregister'=> 'active' );
		$this->template->title = 'Auth &raquo; Mailregister';
		$this->template->content = View::forge('auth/mailregister', $data);
	}

    public function post_confirm(){
        $result = DB::select('*')->from('users')->where('email', Input::post('email'))->execute()[0];
        
        if($result === NULL){
            $uuid = Str::random('alnum', 50);
            
            $mailauth = Model_Users_Mailauth::forge(array(
                'email' => Input::post('email'),
                'uuid' => $uuid
            ));
            $mailauth->save();
        
            $sendgrid = new SendGrid(getenv('SENDGRID_USERNAME'), getenv('SENDGRID_PASSWORD'));
            $email = new SendGrid\Email();
            $email->addTo(Input::post('email'))->
                setFrom(getenv('SENDGRID_USERNAME'))->
                setSubject('sprintポートフォリオアプリメール認証')->
                setText('http://peaceful-lowlands-28991.herokuapp.com/auth/register/'.$uuid);
            
            try {
                $sendgrid->send($email);

            } catch(\SendGrid\Exception $e) {
                /* echo $e->getCode(); */
                /* foreach($e->getErrors() as $er) { */
                /*     echo $er; */
                /* } */
                $this->response_status = '500';
            }
        }else{
            var_dump($result);
            exit();
        }

        $data['text'] = "メールを送信しました。確認してください";
        $this->template->title = 'Confirm';
        return $this->template->content = View::forge('auth/confirm', $data);
    }

}
