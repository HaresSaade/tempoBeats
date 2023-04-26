<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Index(){
        $view = view('Search');
        $section = array('content','search','title');
    $view->renderSections($section); // Renders only the 'content' section

    return $view;
    }
}
