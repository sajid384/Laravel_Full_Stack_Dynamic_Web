{{-- <section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container ">
            <div class="row">
              <div class="col-md-7 col-lg-6 ">
                <div class="detail-box">
                  <h1>
                    Fast Food Restaurant
                  </h1>
                  <p>
                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Order Now
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="container ">
            <div class="row">
              <div class="col-md-7 col-lg-6 ">
                <div class="detail-box">
                  <h1>
                    Fast Food Restaurant
                  </h1>
                  <p>
                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Order Now
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container ">
            <div class="row">
              <div class="col-md-7 col-lg-6 ">
                <div class="detail-box">
                  <h1>
                    Fast Food Restaurant
                  </h1>
                  <p>
                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                  </p>
                  <div class="btn-box">
                    <a href="" class="btn1">
                      Order Now
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>
    </div>

  </section> --}}


  <section class="slider_section">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
            {{-- Loop through the slides --}}
            @foreach($slides as $index => $slide)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="slider-item" style="background-image: url('{{ asset('storage/' . $slide->bg_image) }}'); height: 100vh; background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-lg-6">
                                    <div class="detail-box">
                                        <h1>{{ $slide->title }}</h1>
                                        <p>{{ $slide->description }}</p>
                                        <div class="btn-box">
                                            <a href="#" class="btn1">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="container">
    <ol class="carousel-indicators">
        @php $count = 0; @endphp
        @foreach($slides as $index => $slide)
            @if($count < 3)
                <li data-target="#customCarousel1" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                @php $count++; @endphp
            @else
                @break
            @endif
        @endforeach
    </ol>
</div>

    </div>
</section> 
