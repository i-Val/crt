<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function about()
    {
        $services = Service::all();
        return view('Pages.about', compact('services')); //returns the about page
    }

    public function team()
    {
        $teams = Team::all();  //Getting and sending necessary data from the models to the front page
        return view('Pages.team', compact('teams')); //returns the teams page
    }

    public function blogs()
    {
        $sideBarBlogs = Blog::all()->take(5);
        $categories = Category::all();
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);  //Getting and sending necessary data from the models to the front page
        return view('Pages.blogs', compact('blogs', 'categories', 'sideBarBlogs')); //returns the blogs page
    }

    public function contact()
    {
        return view('Pages.contact'); //returns the contact page
    }

    public function showSingleBlog($id)
    {
        $sideBarBlogs = Blog::all()->take(5);
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        return view('Pages.single-blog', compact('blog','categories', 'sideBarBlogs'));
    }

    public function showBlogByTitle($title)
    {
        $blog = Blog::where('title', $title)->get();
        return view('Pages.single-blog', compact('blog'));
    }
}
