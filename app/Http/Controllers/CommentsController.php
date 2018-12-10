<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function store(){

        $connectedUser = auth::id();
        $current_time = Carbon::now()->toDateTimeString();

        if(!empty($_POST['comment_content'])){
            $comment = new Comments();
            $comment->created_at = $current_time;
            $comment->edited_at = $current_time;
            $comment->content = $_POST['comment_content'];
            $comment->author_id = $connectedUser;
            $comment->task_id = $_POST['task_id'];
            $comment->active = 1;
            $comment->save();
        }
        return redirect('tasks/' . $_POST['task_id'] );
    }

    public function edit(){
//
//        $connectedUser = auth::id();
//
//        if(!empty($_POST['comment_content'])){
//            $comment = new Comments();
//            $comment->created_at = date('Y-m-d');
//            $comment->edited_at = date('Y-m-d');
//            $comment->content = $_POST['comment_content'];
//            $comment->author_id = $connectedUser;
//            $comment->task_id = $_POST['task_id'];
//            $comment->active = 1;
//            $comment->save();
//        }
        return redirect('tasks/' . $_POST['task_id'] );
    }
}
