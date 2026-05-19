<x-layout>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <input name="name" type="text" placeholder="Name">
        <input name="price" type="text" placeholder="Price">
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-layout>