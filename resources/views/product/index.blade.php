<x-layout>
    @role('owner')
        <div class="flex">
            <a href="{{ route('products.create') }}"
                class="btn btn-soft btn-primary">
                Add new product
            </a>
        </div>
    @endrole
    <p>
        <div class="overflow-x-auto">
        <table class="table table-zebra">
            <!-- head -->
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)

            <!-- row 1 -->
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <th class="flex space-x-2">
                    @role('owner')
                    <a href="{{ route('products.edit', $product->id) }}"
                        class="btn btn-soft btn-primary">
                        Edit
                    </a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="btn btn-soft btn-error">
                            Delete
                        </button>
                    </form>
                    @endrole
                </th>
            </tr>
            
            @empty
            _('No product found')
            @endforelse
            </tbody>
        </table>
        </div>
    </p>
</x-layout>