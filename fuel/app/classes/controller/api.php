<?php

class Controller_Api extends Controller_Rest
{
    protected $format = "json";
    
    public function before(){
        parent::before();
    }

    /**
     * ポートフォリオ閲覧API
     *
     * $idが渡されていた場合特定のポートフォリオを返す
     * @param int $id Projectテーブルのidにあたる
     * @TODO: ページネーション
     */
    public function get_projects($id = null){
        if($id > 0){
            $project = Model_Project::find($id);

            if($project){
                return array($project);
            }else{
                
                $this->response->status = 404;
                return ;
            }
        }
        
        $projects = Model_Project::find('all');
        
        return $projects;
    }


    /**
     * ポートフォリオ投稿API
     *
     * @TODO: 画像投稿
     */
    public function post_projects(){

        $val = Model_Project::validate('create');

        if ($val->run()){
            $project = Model_Project::forge(array(
                "title" => Input::post('title'),
                "description" => Input::post('description'),
                'url' => Input::post('url')
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
            return;
        }else{
            $this->response->status = 404;
            return;
        }
    }
}
