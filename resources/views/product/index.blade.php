<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @role('owner')
        <div class="flex">
            <a href="{{ route('products.create') }}">Add new product</a>
        </div>
    @endrole
    <p>
        @forelse ($products as $product)
            <div>
                {{ $product->name }}
            </div>
            <div>
                {{ $product->price }}
            </div>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
        @empty
        _('No product found')
        @endforelse
    </p>
</body>
</html>