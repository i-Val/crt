@extends('layout.app')

    @section('body')
        
        
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">
    
            <ol>
              <li><a href="{{route('page.home')}}">Home</a></li>
              <li>Team</li>
            </ol>
            <h2>Team</h2>
    
          </div>
        </section><!-- End Breadcrumbs -->
    
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
          <div class="container">
    
            <div class="row">
            @if ($teams->count() > 0)
              @foreach ($teams as $team)
                  <div class="col-lg-4 col-md-6 ">
                    <div class="member">
                      <img src="{{asset($team->photo)}}" alt="Team Photo">
                      <h4>{{ $team->name }}</h4>
                      <span>{{ $team->role }}</span>
                      <p>
                        {{ $team->bio }}
                      </p>

                    </div>
                  </div>
              @endforeach
              @else
              <p>No Team Members Yet!</p>
              @endif
            </div>
    
          </div>
        </section><!-- End Team Section -->
    
      </main><!-- End #main -->


    @endsection