<?php

class Controller_Api extends Controller_Rest
{
    protected $format = "json";
    
    public function before(){
        parent::before();

        if(Input::method() === "POST" || Input::method() === "DELETE"){
            if(!Auth::check()){
                Response::redirect('auth/signin');
            }
        }
    }

    /**
     * ポートフォリオ閲覧API
     *
     * $idが渡されていた場合特定のポートフォリオを返す
     * @param int $id Projectテーブルのidにあたる
     */
    public function get_projects($id = null){
        $options = [];
        $limit = 50;
        if($id > 0){
            $project = Model_Project::find($id);

            if($project){
                return array($project);
            }else{
                
                $this->response->status = 404;
                return "";
            }
        }else if(Input::get('pages')){
            // ページネーション機能
            Input::get('limit')?$limit = Input::get('limit'):$limit;
            
            $options['offset'] = Input::get('pages') * $limit;
        }
        
        $projects = Model_Project::find('all', $options);
        
        return $projects;
    }


    /**
     * ポートフォリオ投稿API
     *
     * @TODO: 画像投稿
     */
    public function post_projects(){
        list(, $userid) = Auth::get_user_id();

        
        $val = Model_Project::validate('create');

        if ($val->run()){
            $project = Model_Project::forge(array(
                "userid" => $userid,
                "title" => Input::post('title'),
                "description" => Input::post('description'),
                'url' => Input::post('url'),
                'imagepath' => 'images/gachaball_red.jpg'
            ));
            $project->save();
        }else{
            $this->response->status = 400;
            Session::set_flash($val->show_errors());
            //return array( strip_tags($val->show_errors()) );
            return array($val->show_errors());
        }
        
        return array($project->id);
    }

    /**
     * ポートフォリオ削除API
     *
     */
    public function delete_projects($id = null){
        $project = Model_Project::find($id);
        if($project){
            $project->delete();
            return "";
        }else{
            $this->response->status = 404;
            return "";
        }
    }

    /**
     * ガチャ用API
     */
    public function get_gacha(){
        $projects = Model_Project::find('all');
        $project = $projects[array_rand($projects)];
        
        return array($project);
    }
}
