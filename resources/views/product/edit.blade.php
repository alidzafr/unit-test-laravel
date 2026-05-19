<x-layout>
    <form method="POST" action="{{ route('products.update', $products->id) }}">
        @method("PUT")
        @csrf
        <input name="name" type="text" value="{{ $products->name }}">
        <input name="price" type="number" step=".01" value="{{ $products->price }}">
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-layout>