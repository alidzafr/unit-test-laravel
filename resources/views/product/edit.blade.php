{{-- {{ dump($products) }} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('products.update', $products->id) }}">
        @method("PUT")
        @csrf
        <input name="name" type="text" value="{{ $products->name }}">
        <input name="price" type="number" step=".01" value="{{ $products->price }}">
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</body>
</html>