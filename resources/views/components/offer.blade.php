<section class="offer_section layout_padding-bottom">
    <div class="offer_container">
        <div class="container">
            <div class="row">
            @if(isset($offers) && count($offers) > 0)
    @foreach($offers as $offer)
        <div class="col-md-6">
            <div class="box">
                <div class="img-box">
                    <img src="{{ asset('storage/' . $offer->image) }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>{{ $offer->title }}</h5>
                    <h6><span>{{ $offer->discount }}</span> Off</h6>
                    <a href="#">Order Now</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>No offers available.</p>
@endif

            </div>
        </div>
    </div> 
</section>
