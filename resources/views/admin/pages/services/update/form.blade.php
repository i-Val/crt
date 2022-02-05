@extends('admin.layouts.app')

    @section('body')
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Update Service</h1>

        <section>
            <div class="row">
                <div class="offset-md-3 col-md-4">
                    @if ( session()->has('insert_status') && session()->get('insert_status') == true )
                        <div class="alert alert-primary" role="alert">
                            {{session()->get('insert_status_msg')}}
                        </div>
                    @endif
                    <form action="{{route('admin.service.update')}}" class="mt-4" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Service Name" class="form-control" value="{{$service->name}}">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="details" id="" cols="61" rows="10" class="form-control" placeholder="Enter Service Details">{{$service->details}}</textarea>
                            @error('details')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="id" value="{{$service->id}}">
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-secondary btn-block">
                        </div>
                    </form>

                    @php
                        /* 
                        ---------------------------------------
                        UNSETTING THE INSERT_STATUS SESSION
                        ---------------------------------------
                        */
                        session()->forget(['insert_status','insert_status_msg']);
                        
                    @endphp
                </div>
            </div>
        </section>
        </div>
        <!-- /.container-fluid -->

    @endsection