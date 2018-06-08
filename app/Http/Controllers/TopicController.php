<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class TopicController extends Controller
{
    //获取话题数量
    function api()
    {
        return Article::all()->count();
    }

    //发布文章
    function write()
    {

    }
}
