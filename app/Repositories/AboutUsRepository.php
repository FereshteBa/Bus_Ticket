<?php

 namespace App\Repositories;

use App\Models\AboutUs;

class AboutUsRepository
{
    public function all()
    {
        return AboutUs::orderBy('id', 'desc')->get();
    }
}
