<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                <div class="footer_contact">
                    <h4>Contact Us</h4>
                    <div class="contact_link_box">
                        <a href="{{ $footer->location ?? '#' }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>Location</span>
                        </a>
                        <a href="tel:{{ $footer->phone ?? '#' }}">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Call {{ $footer->phone ?? '' }}</span>
                        </a>
                        <a href="mailto:{{ $footer->email ?? '#' }}">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>{{ $footer->email ?? '' }}</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail">
                    <a href="#" class="footer-logo">Feane</a>
                    <p>{{ $footer->description ?? 'Default description text' }}</p>
                    <div class="footer_social">
                        <a href="{{ $footer->facebook ?? '#' }}"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $footer->twitter ?? '#' }}"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $footer->linkedin ?? '#' }}"><i class="fa fa-linkedin"></i></a>
                        <a href="{{ $footer->instagram ?? '#' }}"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $footer->pinterest ?? '#' }}"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>Opening Hours</h4>
                <p>Everyday</p>
                <p>{{ $footer->opening_hours ?? '10.00 AM - 10.00 PM' }}</p>
            </div>
        </div>
        <div class="footer-info">
            <p>&copy; {{ date('Y') }} All Rights Reserved By <a href="#">Your Company</a></p>
        </div>
    </div>
</footer>


