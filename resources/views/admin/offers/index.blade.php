<x-app-layout>
    <div class="container">
        <a href="{{ route('offers.create') }}" class="btn btn-primary mb-3">Add New Offer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Discount</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($offers) && count($offers) > 0)
                    @foreach($offers as $offer)
                    <tr>
                        <td>{{ $offer->title }}</td>
                        <td>{{ $offer->discount }}</td>
                        <td><img src="{{ asset('storage/' . $offer->image) }}" width="100"></td>
                        <td>
                            <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No offers available.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
