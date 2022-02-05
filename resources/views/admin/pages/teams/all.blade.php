@extends('admin.layouts.app')

    @section('body')
        
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Team Members</h1>
      {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables.</p> --}}

        @if ( session()->has('change_status') && session()->get('change_status') == true )
          <div class="alert alert-primary" role="alert">
              {{session()->get('change_status_msg')}}
          </div>
        @endif

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add, Edit and Remove Team Members</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Bio</th>
                  <th>Photo</th>
                  <th>Added At</th>
                  <th>Option</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($teams as $index => $team)
                <tr>
                  <td>{{ ++$index }}</td>
                  <td>{{ $team->name }}</td>
                  <td>{{ $team->role }}</td>
                  <td>{{ $team->bio }}</td>
                  <td><img src="{{asset($team->photo)}}" alt="Team Photo" class="img img-fluid" style="width: 50px; height: 50px"></td>
                  <td>{{ date('D, M Y', strtotime($team->created_at)) }}</td>
                  <td>
                      <a href="{{route('admin.teams.edit', ['id' => $team->id])}}" class="btn btn-secondary btn-sm">Update</a>
                      <a href="{{route('admin.teams.delete', ['id' => $team->id])}}" class="btn btn-danger btn-sm">Delete</a>
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