@extends('admin.layouts.app')

    @section('body')
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Update Category</h1>

        <section>
            <div class="alert alert-secondary" role="alert">
                <strong>NOTE:</strong> These categories act like tags for blogs.
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-4">
                    @if ( session()->has('insert_status') && session()->get('insert_status') == true )
                        <div class="alert alert-primary" role="alert">
                            {{session()->get('insert_status_msg')}}
                        </div>
                    @endif
                    <form action="{{route('admin.category.update')}}" method="post" class="mt-4">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Category Name" class="form-control" value="{{$category->name}}">
                            @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="alert alert-secondary" role="alert">
                            <strong>NOTE</strong> A category name is a tag for a blog. It will be made available when picking a tag to a blog!!
                        </div>
                    
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