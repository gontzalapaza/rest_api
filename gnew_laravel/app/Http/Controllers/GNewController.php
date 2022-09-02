<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;

class GNewController extends Controller
{
    public function index()
    {
        $newsapi = new NewsApi('8f715b3d8b8c41d7808528818f55e941');

        //$search = ($request->search)?$request->search:"Apple";
        $search = "Apple";
        $articles = $newsapi->getEverything($q=$search, $sources=null, $domains=null, $exclude_domains=null, $from="2022-09-01", $to=null, $language='es', $sort_by=null,  $page_size=10, $page=1);
        //$articles = $newsapi->getTopHeadlines($q="Apple", $sources=null, $country=null, $category="general", $page_size=10, $page=1);

        //return response()->json($articles);
        return $articles;
    }
}
