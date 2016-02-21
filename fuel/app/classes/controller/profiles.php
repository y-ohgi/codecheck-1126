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

        if($id){
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


}
