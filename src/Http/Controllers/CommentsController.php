<?php
namespace Vis\Comments;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\View;
use Vis\Comments\Facades\Comments;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;

class CommentsController extends Controller
{
    public function doAddComment()
    {

        parse_str(Input::get('data'), $data);

        if (isset($data['id_page'])) {

            $data['commentpage_type']= Crypt::decrypt($data['commentable']);
            $data['commentpage_id'] = $data['id_page'];

            if (Sentinel::check()) {
                $data['user_id'] = Sentinel::getUser()->id;
            }

            if (Config::get("comments.config.cache_tag")) {
                Cache::tags(Config::get("comments.config.cache_tag"))->flush();
            }

            Comment::create($data);

            return $this->listCommetns($data['commentpage_type'], $data['id_page']);
        }
    }

    public function listCommetns($model, $idPage){

        $comments = Comments::getComments($model, $idPage);

        return View::make('comments::list_comments', compact("comments"));
    }
}
