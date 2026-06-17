<x-layout>
    {{-- Card --}}
    <div class="flex flex-col bg-white w-full border border-gray-200 rounded-2xl">
        @role('owner')
            <div class="flex p-6 justify-between">
                <form>
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="join">
                        <label class="input">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round"
                                stroke-linecap="round" stroke-width="2.5"
                                fill="none" stroke="currentColor">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </g>
                            </svg>
                            <input name="search" type="search" required placeholder="Type here" autocomplete="off"/>
                        </label>
                        <button class="btn btn-neutral join-item">Search</button>
                    </div>
                </form>

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
                            <th>
                                <div class="dropdown dropdown-hover">
                                    <div tabindex="0" role="button" class="flex items-center space-x-2">
                                        <span>Category</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z"/></svg>
                                    </div>
                                    <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                        @forelse ($categories as $category)
                                        <li>
                                            <a href="/products?category={{ $category->slug }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                        @empty
                                        <li>-</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </th>
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
                        <td class="flex space-x-2">
                            <span>
                                <img src="{{Storage::url(($product->photo))}}" alt ="album" class="w-16">
                            </span>
                            <div>
                                {{ $product->name }}
                            </div>
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
                <div class="p-6">
                    {{ $products->links() }}
                </div>
            </div>
        </p>

    </div>
</x-layout>