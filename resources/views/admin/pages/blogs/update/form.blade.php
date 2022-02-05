@extends('admin.layouts.app')

    @section('body')
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Update Blog</h1>

        <section>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    @if ( session()->has('insert_status') && session()->get('insert_status') == true )
                        <div class="alert alert-primary" role="alert">
                            {{session()->get('insert_status_msg')}}
                        </div>
                    @endif
                    <form action="{{route('admin.blog.update')}}" method="post" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Blog Title" class="form-control" value="{{$blog->title}}">
                            @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="contents" id="" cols="30" rows="10">{{$blog->contents}}</textarea> {{--   CKEDITOR TEXT EDITOR  --}}
                            {{--  <textarea name="content" id="" cols="61" rows="15" class="form-control" placeholder="Enter Blog Contents"></textarea>  --}}
                            @error('content')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="file" name="photo"  class="form-control">
                                    @error('photo')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="tags" class="custom-select">
                                        <option selected>Pick a Tag</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach   
                                    </select>
                                    @error('tags')
                                        <div class="text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$blog->id}}">
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


     
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('contents')
    </script>
    @endsection
