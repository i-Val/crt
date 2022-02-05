@extends('admin.layouts.app')

    @section('body')
        
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Table of Categories</h1>

        @if ( session()->has('change_status') && session()->get('change_status') == true )
            <div class="alert alert-primary" role="alert">
                {{session()->get('change_status_msg')}}
            </div>
        @endif

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add Categories for Blog Posts</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Added At</th>
                  <th>Option</th>
                </tr>
              </thead>
                     <tbody>
                @foreach ($categories as $index => $category)
                <tr>
                  <td>{{ ++$index }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ date('D, M Y', strtotime($category->created_at)) }}</td>
                  <td>
                      <a href="{{route('admin.category.edit', ['id' => $category->id])}}" class="btn btn-secondary btn-sm">Update</a>
                      <a href="{{route('admin.category.delete', ['id' => $category->id])}}" class="btn btn-danger btn-sm">Delete</a>
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