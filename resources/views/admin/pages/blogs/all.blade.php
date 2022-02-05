@extends('admin.layouts.app')

    @section('body')
        
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">All Posted Blogs</h1>

      @if ( session()->has('change_status') && session()->get('change_status') == true )
          <div class="alert alert-primary" role="alert">
              {{session()->get('change_status_msg')}}
          </div>
      @endif

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add, Edit or Delete Blogs</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Post Image</th>
                  <th>Tags</th>
                  <th>Added At</th>
                  <th>Options</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Post Image</th>
                    <th>Tags</th>
                    <th>Added At</th>
                    <th>Options</th>
                </tr>
              </tfoot> -->
              <tbody>
                @foreach ( $blogs as $index => $blog )
                <tr>
                  <td>{{++$index}}</td>
                  <td>{{$blog->title}}</td>
                  <td>{{$blog->contents}}</td>
                  <td><img src="{{asset($blog->photo)}}" alt="Team Photo" class="img img-fluid" style="width: 50px; height: 50px"></td>
                  <td>{{$blog->tags}}</td>
                  <td>{{date('D, M Y', strtotime($blog->created_at))}}</td>
                  <td>
                      <a href="{{route('admin.blog.edit', ['id' => $blog->id])}}" class="btn btn-secondary btn-sm">Update</a>
                      <a href="{{route('admin.blog.delete', ['id' => $blog->id])}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
        @php
        /* 
        ---------------------------------------
        UNSETTING THE CHANGE_STATUS SESSION
        ---------------------------------------
        */
        session()->forget(['change_status','change_status_msg']);
      
        @endphp
    </div>
    <!-- /.container-fluid -->


    @endsection