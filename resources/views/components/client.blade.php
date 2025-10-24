<style>
  .client_owl-carousel {
    display: block !important;
    opacity: 1 !important;
    visibility: visible !important;
}


  .client_owl-carousel .item {
    padding: 15px;
  }



  .client_owl-carousel .img-box {
    text-align: center;
    margin-top: 15px;
  }

  .client_owl-carousel .img-box img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
  }



</style>

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />


<section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div class="carousel-wrap row">
        <div class="owl-carousel client_owl-carousel">
          @foreach($clients as $client)
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  {{ $client->review }}
                </p>
                <h6>
                  {{ $client->name }}
                </h6>
                <p>
                  {{ $client->designation }}
                </p>
              </div>
              <div class="img-box">
                <img src="{{ asset('storage/'.$client->image) }}" alt="" class="box-img">
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</section>


<!-- jQuery (Required by Owl) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
  $(document).ready(function(){
    $('.client_owl-carousel').owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 2
        }
      }
    });
  });
</script>

