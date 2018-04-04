<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/articles', function (Request $request) {
    $articles = [
        [
            "title" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
            "year"  => 2018,
            "tags"  => ["Lorem", "Ipsum"]
        ],
        [
            "title" => "Vivamus id massa ac ex rutrum vestibulum.",
            "year"  => 2018,
            "tags"  => ["Lorem", "Massa"]
        ],
        [
            "title" => "Nam purus justo, porttitor vel urna id, blandit aliquam orci.",
            "year"  => 2017,
            "tags"  => ["Ipsum", "Massa"]
        ],
    ];

    // if not query parameters, return all
    if(count($request->query()) == 0) {
        return view('articles.index')->with('articles', $articles);
    }

    $year = $request->query('year');
    $tag = $request->query('tag');

    $articlesAfterFilters = [];

    function checkYear($article, $year) {
        return ($article['year'] == $year);
    }

    function checkTag($article, $tag) {
        foreach($article['tags'] as $t) {
            if(strtolower($t) == strtolower($tag)) {
                return true;
            }
        }

        return false;
    }

    foreach ($articles as $article) {
        if (!is_null($year) && !is_null($tag)) {
            if(checkYear($article, $year) && checkTag($article, $tag)) {
                array_push($articlesAfterFilters, $article);
            }
        }
        else if (!is_null($tag) && checkTag($article, $tag) ) {
            array_push($articlesAfterFilters, $article);
        }
        else if (!is_null($year) && checkYear($article, $year) ) {
            array_push($articlesAfterFilters, $article);
        }
    }

    return view('articles.index')->with('articles', $articlesAfterFilters);
});


