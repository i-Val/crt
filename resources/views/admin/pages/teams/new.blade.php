@extends('admin.layouts.app')

    @section('body')
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add New Team</h1>

        <section>
            <div class="row">
                <div class="offset-md-3 col-md-4">
                    @if ( session()->has('insert_status') && session()->get('insert_status') == true )
                        <div class="alert alert-primary" role="alert">
                            {{session()->get('insert_status_msg')}}
                        </div>
                    @endif
                    <form action="{{route('admin.teams.add')}}" method="post" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Team Name" class="form-control">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                           <input type="text" name="role" class="form-control" placeholder="Role">
                           @error('role')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="bio" id="" cols="30" rows="6" class="form-control" placeholder="Enter Bio"></textarea>
                            @error('bio')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo">Team Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                            @error('photo')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                         </div>
                        <div class="form-group">
                            <input type="submit" value="submit" class="btn btn-secondary btn-block">
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