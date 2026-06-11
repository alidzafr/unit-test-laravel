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
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>
                            {!! $product->qty > 0 ? 
                            '<div class="badge badge-soft badge-success">
                                In-Stock
                            </div>' : 
                            '<div class="badge badge-soft badge-error">
                                Out of Stock
                            </div>' 
                            !!}

                            
                        </td>
                        <td>{{ $product->qty }}</td>
                        
                        @role('owner')
                        <td>
                            <div class="dropdown dropdown-bottom dropdown-end">
                                <div tabindex="0" role="button" class="hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16"><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/></svg>
                                </div>
                                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box border border-gray-200 z-1 w-50 p-3 shadow-md font-bold">
                                    <li>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('products.show', $product->id) }}">
                                            View Detail
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button>
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        @endrole
                    </tr>
                    
                    @empty
                    <h1>No item found</h1>
                    @endforelse
                    </tbody>
                </table>

                {{-- Pagination radio --}}
                <div class="border-t border-gray-200 flex p-4 justify-center">
                    <div class="join">
                        <input class="join-item btn btn-lg btn-square" type="radio" name="options" aria-label="1"
                            checked="checked" />
                        <input class="join-item btn btn-lg btn-square checked:bg-red-200" type="radio" name="options" aria-label="2" />
                        <input class="join-item btn btn-lg btn-square" type="radio" name="options" aria-label="3" />
                        <input class="join-item btn btn-lg btn-square" type="radio" name="options" aria-label="4" />
                    </div>
                </div>
            </div>
        </p>

    </div>
</x-layout>