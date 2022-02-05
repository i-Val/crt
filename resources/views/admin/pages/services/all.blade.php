@extends('admin.layouts.app')

    @section('body')
        
    <!-- Begin Page Content -->
    <div class="container-fluid">
      @if ( session()->has('change_status') && session()->get('change_status') == true )
        <div class="alert alert-primary" role="alert">
            {{session()->get('change_status_msg')}}
        </div>
      @endif

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Table of Services</h1>
      <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add or remove services</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Added At</th>
                  <th>Options</th>
                </tr>
              </thead>

              <tbody>
                @foreach ( $services as $index => $service )
                <tr>
                  <td>{{++$index}}</td>
                  <td>{{$service->name}}</td>
                  <td>{{$service->details}}</td>
                  <td>{{date('D, M Y', strtotime($service->created_at))}}</td>
                  <td>
                      <a href="{{route('admin.service.edit', ['id' => $service->id])}}" class="btn btn-secondary btn-sm">Update</a>
                      <a href="{{route('admin.service.delete', ['id' => $service->id])}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
        @php
        /* 
        ---------------------------------------
        UNSETTING THE DELETE_STATUS SESSION
        ---------------------------------------
        */
        session()->forget(['change_status','change_status_msg']);
        
    @endphp
      </div>

    </div>
    <!-- /.container-fluid -->


    @endsection