<?php

 namespace App\Repositories;

use App\Models\User;

class CommentsRepository
 {
     public function show(){
         return User::where('role_id',4)->pluck( 'comment','name');
     }

 }
