<?php

class Controller_Auth extends Controller_Template
{

	public function action_signin()
	{
		$data["subnav"] = array('signin'=> 'active' );
		$this->template->title = 'Auth &raquo; Signin';
		$this->template->content = View::forge('auth/signin', $data);
	}

	public function action_register($uuid = null)
	{
        if(Input::method() === "POST"){
            
            $user = Auth::create_user(Input::post('username'), Input::post('password'), Input::post('email'));
            if($user){
                $data["text"] = "ユーザー登録が完了しました";
                $this->template->title = 'Confirm';
                $this->template->content = View::forge('auth/confirm');
                return;
            }

            // TODO: 既存のユーザー名ですメッセージ
        }

        
        $taccept = 3600*24; // 1日
        $time = time();
        
        $mailauth = Model_Users_Mailauth::find('all',array('where'=> array(
            array('uuid' => $uuid),
        )));
        $mailauth = array_shift($mailauth);
        
        // $taccept秒経過しているか
        $updatedat = $mailauth['updated_at']?$mailauth['updated_at']: $time + $taccept;
        if( ($time - $mailauth['created_at']) > $taccept || ($time - $updatedat) > $taccept){
            $data["text"] = "無効なURLです";
            $this->template->title = 'confirm';
            $this->template->content = View::forge('auth/confirm');
            return;
        }
        
        $data['user'] = array(
            'email' => $mailauth['email'],
            'uuid' => $uuid,
        );
        
		$this->template->title = 'ユーザー登録';
		$this->template->content = View::forge('auth/register', $data);
        
	}

	public function action_signout()
	{
		$data["subnav"] = array('signout'=> 'active' );
		$this->template->title = 'Auth &raquo; Signout';
		$this->template->content = View::forge('auth/signout', $data);
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
            //$this->response_status = '409';
        }

        // 登録済みのメールアドレスかを知られてしまう脆弱性のため、既存のメールアドレスであっても同じテキストを返す
        $data['text'] = "メールを送信しました。2・3分ほどお待ち頂く場合があります";
        $this->template->title = 'Confirm';
        return $this->template->content = View::forge('auth/confirm', $data);
    }

}
