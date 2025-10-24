<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Book A Table
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="{{ route('admin.bookings.store') }}" method="POST">
                        @csrf
                        @foreach($bookings as $booking)
            @foreach(json_decode($booking->fields, true) as $index => $field)
                            <div>
                                <input type="text" name="{{ $field['name'] }}" class="form-control" placeholder="{{ $field['placeholder'] }}" required />
                            </div>
                        @endforeach
                        @endforeach
                        <div class="btn_box">
                            <button type="submit">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container">
                    <div id="googleMap"></div>
                </div>
            </div>
        </div>
    </div>
</section>
