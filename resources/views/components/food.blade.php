<style>
    .menu-card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .menu-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
    }

    .menu-img {
        transition: transform 0.3s ease-in-out;
    }

    .menu-card:hover .menu-img {
        transform: scale(1.1);
    }
</style>

<section class="food_section layout_padding-bottom">
    <div class="container">
        <h1 class="text-center" style="font-family: cursive; margin-bottom: 20px;">Our Menu</h1>

        {{-- Category Filter Buttons --}}
        <div class="text-center mb-4">
            <a href="?category=All" class="btn {{ request('category', 'All') == 'All' ? 'btn-dark' : 'btn-light' }}">All</a>
            <a href="?category=Fast Food" class="btn {{ request('category') == 'Fast Food' ? 'btn-dark' : 'btn-light' }}">Fast Food</a>
            <a href="?category=BBQ" class="btn {{ request('category') == 'BBQ' ? 'btn-dark' : 'btn-light' }}">BBQ</a>
            <a href="?category=Chinese Food" class="btn {{ request('category') == 'Chinese Food' ? 'btn-dark' : 'btn-light' }}">Chinese Food</a>
            <a href="?category=Desserts" class="btn {{ request('category') == 'Desserts' ? 'btn-dark' : 'btn-light' }}">Desserts</a>
        </div>

        {{-- Display Filtered Menu Items --}}
        <div class="row">
            @forelse ($menuItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card menu-card shadow-lg border-0">
                        <div class="text-center p-4">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid menu-img" style="max-height: 150px; width: auto;">
                        </div>
                        <div class="card-body bg-dark text-white rounded-bottom">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text" style="font-size: 14px;">{{ $item->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>${{ $item->price }}</strong>
                                <button class="btn btn-warning rounded-circle">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">No items found for this category.</p>
            @endforelse
        </div>
    </div>
</section>
