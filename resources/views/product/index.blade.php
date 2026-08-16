<x-layout title="Produk">
    <div class="space-y-6">
        {{-- Search Bar --}}
        <div class="flex justify-between space-x-4">
            <form>
                <div class="join">
                    <label class="input w-md rounded-l-xl">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input name="search" type="search" required value="{{ request('search') }}" autocomplete="off"/>
                            
                    </label>
                    
                    <button class="btn btn-soft btn-primary rounded-r-xl join-item border-2">
                        Search
                    </button>

                    
                    @if (request()->has('search') && !is_null(request()->input('search')))
                    <a href="{{ route('warehouse.index', request()->query->remove('search')) }}" 
                        class="ml-1 btn btn-soft btn-secondary rounded-xl border-2">
                        Clear
                    </a>
                    @endif
                    
                    
                </div>
            </form>
            
            {{--------------------------------------------------- Work in Progress --------------------------------------------------------------}}
            
            {{-- Category tab --}}
            <div class="dropdown dropdown-bottom dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost rounded-lg border border-gray-300">
                    <span>
                        {{ $selectedctg?->name ?? 'All Categories' }}
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16"><path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5z"/></svg>
                </div>
                <div
                    tabindex="0"
                    class="dropdown-content card card-sm bg-base-100 z-1 w-64 shadow-md">
                    <div class="card-body list-none">
                    {{-- This is a card. You can use any element as a dropdown. --}}
                    @forelse ($categories as $category)
                        @if ($category->id == $selectedctg?->id)
                            @continue {{-- Skips the rest of the loop for this specific item --}}
                        @endif
                    <li>
                        <a href="{{ route('products.index', 
                            array_merge(request()->query(), ['category' => $category->slug])) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @empty
                    <li>-</li>
                    @endforelse
                    </div>
                </div>
            </div>
            {{-- Clear Category --}}
            @if (request()->query('category') > 0)
            <a href="{{ route('products.index', request()->except('category')) }}" class="btn btn-soft btn-error">
                Remove Category Filter
            </a>
            @endif
            
            @role('owner')
                <a href="{{ route('products.create') }}" class="btn btn-primary rounded-xl">
                    + Tambahkan Produk
                </a>
            @endrole
            
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
            <table class="table">
                <!-- head -->
                <thead class="bg-gray-100">
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
                    <tr class="group hover:bg-gray-100 transition-colors">
                        <th class="ps-4">{{ $loop->iteration }}</th>
                        <td class="flex py-4 space-x-2 items-center">
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
                            {!! $product->stock > 0 ? 
                            '<div class="badge badge-soft badge-success">
                                In-Stock
                            </div>' : 
                            '<div class="badge badge-soft badge-error">
                                Out of Stock
                            </div>' 
                            !!}

                            
                        </td>
                        <td>{{ $product->stock }}</td>
                        
                        @role('owner')
                        <td>
                            <div class="dropdown dropdown-left dropdown-center">
                                <div tabindex="0" role="button" class="hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"><path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/></svg>
                                </div>
                                <ul tabindex="-1" class="menu text-sm dropdown-content bg-base-100 rounded-box border border-gray-200 z-1 w-36 shadow-md">
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
        </div>
    </div>

</x-layout>