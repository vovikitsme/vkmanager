<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\Http\Requests;

class BlogController extends Controller
{
    public function getIndex() {
        $publications = Publication::paginate(10);

        return view('blog.index')->withPublications($publications);
    }



    public function getSingle($slug) {
        // fetch from the DB based on slug
        $publication = Publication::where('slug', '=', $slug)->first();
        // return the view and pass in the post object
        return view('blog.single')->withPublication($publication);
    }
}
