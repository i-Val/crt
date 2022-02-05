<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\fsm;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showDashboard()
    {

        /*
        --------------------------------
        TAKING STATISTICAL COUNTS
        --------------------------------
        */

        $blogs = Blog::all();
        $_blogs = count($blogs);  //gets the number of blogs posted

        $teams = Team::all();
        $_teams = count($teams);

        $services = Service::all();
        $_services = count($services);

          /*
        --------------------------------
        end of TAKING STATISTICAL COUNTS
        --------------------------------
        */

        return view('admin.index', compact('_blogs','_teams','_services'));
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:20',
            'password' => 'required'
        ]);

        /*
        ---------------------------------------------
        DEFAULT AUTHENTICATION PARAMETERS
        Username - admin
        Password - root
        ---------------------------------------------
        */
        if( $request->username == 'admin' && $request->password == 'root' )
        {
            $request->session()->put('loggin_status','Logged_in'); //creates a session value that tells the system user logged in successfully
            return redirect('/administrator');
        }
        else
        {
            $request->session()->put('loggin_status','Failed');
            return redirect('/admin/login');
        }
    }

    public function logout()
    {
        session()->forget('loggin_status');
        return redirect('/admin/login');  
    }

    public function showNewServicePage()
    {
        return view('admin.pages.services.new');
    }

    public function showServicesPage()
    {
        $services = Service::all();
        return view('admin.pages.services.all', compact('services'));
    }

    public function showNewTeamPage()
    {
        return view('admin.pages.teams.new');
    }
    
    public function showTeamsPage()
    {
        $teams = Team::all();
        return view('admin.pages.teams.all', compact('teams'));
    }

    public function addNewService(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'details' => 'required|max:100'
        ]);

        $service = Service::create([
            'name' => $request->name,
            'details' => $request->details
        ]);

        if( $service )
        {
            session()->put([
                'insert_status' => true,
                'insert_status_msg' => 'Service was added successfully'
            ]); //creates a session key 'insert_status' to hold the status of the mass assignment
            return redirect('/admin/services/add');
        }
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Service deleted successfully'
        ]);

        return redirect('/admin/services');
    }

    public function showUpdateServiceForm($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.pages.services.update.form', compact('service'));
    }

    public function addNewTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'bio' => 'required|max:200',
            'photo' => 'required'
        ]);

        //getting the uploaded pictures details
        $gimages = $request->file('photo');

        $gbasename = Str::random();
        $goriginal = $gbasename.'.'.$gimages->getClientOriginalExtension();
        $gimages->move(public_path('/upload'), $goriginal);
        $gimagepath = 'upload/'.$goriginal;


        $team = Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'bio' => $request->bio,
            'photo' => $gimagepath
        ]);

        if( $team )
        {
            session()->put([
                'insert_status' => true,
                'insert_status_msg' => 'A Team was added successfully'
            ]); //creates a session key 'insert_status' to hold the status of the mass assignment
            return redirect('/admin/teams/add');
        }
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Team deleted successfully'
        ]);

        return redirect('/admin/teams');
    }

    public function showTeamEditPage($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.pages.teams.update.form', compact('team'));
    }

    public function updateTeam(Request $request)
    {
        
        $id = $request->id; //collecting sent id

        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'bio' => 'required|max:200',
            'photo' => 'required'
        ]);

        //getting the uploaded pictures details
        $gimages = $request->file('photo');

        $gbasename = Str::random();
        $goriginal = $gbasename.'.'.$gimages->getClientOriginalExtension();
        $gimages->move(public_path('/upload'), $goriginal);
        $gimagepath = 'upload/'.$goriginal;

        $team =  Team::findOrFail($id);
        $team->update([
            'name' => $request->name,
            'role' => $request->role,
            'bio' => $request->bio,
            'photo' => $gimagepath
        ]);

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Team updated successfully'
        ]);
        return redirect('admin/teams');
        
    }

    public function showNewBlogPage()
    {
        $categories = Category::all(); //getting the tags from the category model
        return view('admin.pages.blogs.new', compact('categories'));
    }

    public function addNewBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'contents' => 'required|max:250|unique:blogs,contents',
            'photo' => 'required',
            'tags' => 'required'
        ]);

        //getting the uplaoded pictures details
        $gimages = $request->file('photo');

        // $gimages = date('d/m/Y', time()) . ' ' . $gimages; //adding a time stamp to the file name
        //storing the uplaoded image to Laravel Storage disk
        // $request->file('photo')->storeAs('/public/blog-images/', $photoName);

        $gbasename = Str::random();
                $goriginal = $gbasename.'.'.$gimages->getClientOriginalExtension();
                $gimages->move(public_path('/upload'), $goriginal);
                $gimagepath = 'upload/'.$goriginal;
                

        $blog = Blog::create([
            'title' => $request->title,
            'contents' => strip_tags($request->contents),
            'photo' =>$gimagepath,
            'tags' => $request->tags
        ]);

        if( $blog )
        {
            session()->put([
                'insert_status' => true,
                'insert_status_msg' => 'Blog posted successfully'
            ]); //creates a session key 'insert_status' to hold the status of the mass assignment
            return redirect('/admin/blog/add');
        }
    }


    public function showBlogsPage()
    {
        $blogs = Blog::all();
        return view('admin.pages.blogs.all', compact('blogs'));
    }


    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Blog was deleted successfully'
        ]);

        return redirect('/admin/blogs');
    }

    public function showEditBlogPage($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.blogs.update.form', compact('blog','categories'));
    }

    public function updateBlog(Request $request)
    {
        $id = $request->id; //collecting sent id

        $request->validate([
            'title' => 'required|max:30',
            'contents' => 'required|max:250',
            'photo' => 'required',
            'tags' => 'required'
        ]);

        //getting the uplaoded pictures details
        $gimages = $request->file('photo');

        $gbasename = Str::random();
        $goriginal = $gbasename.'.'.$gimages->getClientOriginalExtension();
        $gimages->move(public_path('/upload'), $goriginal);
        $gimagepath = 'upload/'.$goriginal;

        $service =  Blog::findOrFail($id);
        $service->update([
            'title' => $request->title,
            'contents' => strip_tags($request->contents),
            'photo' => $gimagepath,
            'tags' => $request->tags
        ]);

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Blog updated successfully'
        ]);
        return redirect('admin/blogs');
    }


    public function updateService(Request $request)
    {
        $id = $request->id; //collecting sent id

        $request->validate([
            'name' => 'required|max:15',
            'details' => 'required|max:100'
        ]);

        $service =  Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'details' => $request->details
        ]);

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Service updated successfully'
        ]);
        return redirect('admin/services');
    }

    public function showNewCategoryPage()
    {
        return view('admin.pages.categories.new');
    }

    public function addNewCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:70'
        ]);

        $category = new Category;
        $category->name = $request->name;

        $category->save();

        if( $category )
        {
            session()->put([
                'insert_status' => true,
                'insert_status_msg' => 'Category created successfully'
            ]); //creates a session key 'insert_status' to hold the status of the inserted data
            return redirect('/admin/category/add');
        }
    }

    public function showCategoryPage()
    {
        $categories = Category::all();
        return view('admin.pages.categories.all', compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Category deleted successfully'
        ]);

        return redirect('/admin/categories');
    }

    public function showCategoryEditPage($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.update.form', compact('category'));
    }

    public function updateCategory(Request $request)
    {
        $id = $request->id; //collecting sent id

        $request->validate([
            'name' => 'required|string|max:70'
        ]);

        $category =  Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);

        session()->put([
            'change_status' => true,
            'change_status_msg' => 'Category updated successfully'
        ]);
        return redirect('admin/categories');
    }
}
