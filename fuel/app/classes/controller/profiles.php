<?php

class Controller_Profiles extends Controller_Template
{


    /**
     * ポートフォリオ一覧を返す
     *
     * profiles/:id のリクエストもここを参照している
     * :id に値が渡されていた場合は 特定のポートフォリオを返す
     */
	public function action_index()
	{
        $id = $this->param('id');

        if($id && $id !== "create"){
            $res = Request::forge('api/projects/'. $id)->execute()->response();
            $body = json_decode($res->body, true);

            if($body){
                $data["prof"] = $body[0];
                $this->template->title = 'ポートフォリオ一覧';
                $this->template->content = View::forge('profiles/profile', $data);
            }
            
            return;
        }
        
        $res = Request::forge('api/projects')->execute()->response();
        $res = json_decode($res->body, true);
		$data["profiles"] =  $res;
		$this->template->title = 'ポートフォリオ一覧';
		$this->template->content = View::forge('profiles/index', $data);
	}

    /**
     * ポートフォリオの作成
     *
     */
    public function action_create(){

        
        if(Input::method() === "POST"){
            list(, $userid) = Auth::get_user_id();
            
            $config = array(
                'path' => DOCROOT.DS.'upload',
                'randomize' => true,
                'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
            );

            Upload::process($config);

            if (Upload::is_valid()){
                Upload::save();

                $file = Upload::get_files();
                
                $file = 'upload/'.$file[0]['saved_as'];
            
            }else{
                $file = Util::create_profileimage();
            }
        
        
            $val = Model_Project::validate('create');

            if ($val->run()){
                $project = Model_Project::forge(array(
                    "userid" => $userid,
                    "title" => Input::post('title'),
                    "description" => Input::post('description'),
                    'url' => Input::post('url'),
                    'imagepath' => $file
                ));

                //var_dump($project);
                //xit(111);
                if($project->save()){
                    Response::redirect('profiles/'. $project->id);
                }
                //return array($project->id);
            }else{
                //$this->response->status = 400;
                Session::set_flash('error', $val->show_errors());
                
                $this->template->title = 'ポートフォリオ作成';
                $this->template->content = View::forge('profiles/create');
                return;
            }
        }
        
        $data[] = [];
        $this->template->title = 'ポートフォリオ作成';
        $this->template->content = View::forge('profiles/create', $data);
    }

    public function get_gacha(){
        return View::forge('profiles/gacha');
    }
    

}
