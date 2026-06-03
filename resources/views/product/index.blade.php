<x-layout>
    {{-- Card --}}
    <div class="flex flex-col bg-white w-full border border-gray-200 rounded-2xl">
        @role('owner')
            <div class="flex p-6">
                <a href="{{ route('products.create') }}"
                    class="btn btn-soft btn-primary">
                    Add new product +
                </a>
            </div>
        @endrole
        
        <div class="mb-2 border-b-2 border-gray-200"></div>

        <p>
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table table-zebra text-lg bg-white">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Products</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Qty</th>
                        <th></th>
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
                    <td>-</td>
                    <td>-</td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        <div class="badge badge-soft badge-success">
                            In-Stock
                        </div>
                    </td>
                    <td>-</td>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/></svg>
                    </td>

                    {{-- <th class="flex space-x-2">
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
                    </th> --}}
                </tr>
                
                @empty
                <h1>No item found</h1>
                @endforelse
                </tbody>
            </table>
            </div>
        </p>

    </div>
</x-layout>