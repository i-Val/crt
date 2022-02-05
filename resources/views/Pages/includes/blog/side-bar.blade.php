<div class="sidebar">

    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
      <form action="">
        <input type="text">
        <button type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
      <div class="sidebar-item categories">
      <ul>
      <li>
          <!-- <a href="#">category_name<span>(1)</span></a></li> -->
          @foreach ($categories as $category)
            <li><a href="#">{{$category->name}}</a></li>
          @endforeach
           
      </ul>
    </div><!-- End sidebar categories--> 

    <h3 class="sidebar-title">Other Posts</h3>
    <div class="sidebar-item recent-posts">

      @foreach ($sideBarBlogs as $sideBarBlog)
      <div class="post-item clearfix">
        <img src="{{asset($sideBarBlog->photo)}}" alt="blog-image">
        <h4><a href="{{route('blog.show.title', ['title' => $sideBarBlog->title])}}">{{$sideBarBlog->title}}</a></h4>
        <time datetime="2020-01-01">{{date('D-M-Y', strtotime($sideBarBlog->created_at))}}</time>
      </div>
      @endforeach
  
    </div><!-- End sidebar recent posts-->

    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
      <ul>
        @foreach ($categories as $category)
          <li><a href="#">{{$category->name}}</a></li>
        @endforeach
        
      </ul>
    </div><!-- End sidebar tags-->

  </div><!-- End sidebar -->