<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Repositories\AboutUsRepository;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $Users;

    public function __construct(AboutUsRepository $Info, CommentsRepository $comment )
    {
        $this->Info = $Info;
        $this->Comment=$comment;
    }
    public function Home(){
        try {
            $info=$this->Info->all();

            return response()->json(['status'=>'success','message'=>"hi",'info'=>$info,]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function comment(){
        $company_comment=$this->Comment->show();
         return response()->json(['status'=>'success','message'=>"hi",'comment'=>$company_comment]);
    }
}
