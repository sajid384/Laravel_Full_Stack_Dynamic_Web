
<style>
  .about_section {
    padding: 60px 0;
    background-color: #1E1E22;
    color: #fff;
}

.img-box img {
    max-width: 100%;
    height: auto;
}

.detail-box h2 {
    font-family: 'Brush Script MT', cursive;
    font-size: 2rem;
}

.detail-box p {
    font-size: 1rem;
    line-height: 1.6;
}

.detail-box a {
    display: inline-block;
    background-color: #ffc107;
    color: #000;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-size: 1rem;
    transition: background 0.3s;
}

.detail-box a:hover {
    background-color: #ff9800;
}

</style>

<section class="about_section layout_padding" style="background-color: #1E1E22; color: #fff;">
    <div class="container">
      <div class="row align-items-center">
      @foreach($abouts as $about)
        <!-- Left Side: Image -->
        <div class="col-md-6">
          <div class="img-box text-center">
            <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" style="max-width: 100%; height: auto;">
          </div>
        </div>

        <!-- Right Side: Text -->
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2 style="font-family: 'Brush Script MT', cursive; font-size: 2rem;">
                {{ $about->title }}
              </h2>
            </div>
            <p style="font-size: 1rem; line-height: 1.6;">
              {{ $about->description }}
            </p>
            <a href="#" class="btn btn-warning" style="padding: 10px 20px; font-size: 1rem; border-radius: 25px;">
              Read More
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
