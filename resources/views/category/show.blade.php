<x-layout>
    
    {{-- Category edit button--}}
    <div class="flex mb-4 justify-end w-full">
        <a href="{{ route('categories.edit', $category->slug) }}"
            class="btn btn-warning rounded-lg">
            Edit
        </a>
    </div>

    {{-- Card Top --}}
    <div class="flex mb-8 space-x-6 w-full">
        <div class="flex-1 flex-col p-4 mb-4 justify-between bg-white border border-gray-200 rounded-2xl shadow">

            {{-- Nama Category --}}
            <div class="flex mb-4 min-w-xs">
                <ul class="flex-1">
                    <li class="font-bold">Nama</li>
                    <li>{{ $category->name }}</li>
                </ul>
                <ul class="flex-1">
                    <li class="font-bold">Slug</li>
                    <li>{{ $category->slug }}</li>
                </ul>
            </div>

            {{-- Tagline --}}
            <div>
                <ul>
                    <li class="font-bold">Tagline</li>
                    <li>{{ $category->tagline }}</li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col p-4 w-xs h-fit bg-white border border-gray-200 rounded-2xl shadow">
            <ul class="mb-4">
                <li class="font-bold">Created at</li>
                <li>{{ $category->created_at }}</li>
            </ul>
            <ul>
                <li class="font-bold">Last modified at</li>
                <li>{{ $category->updated_at }}</li>
            </ul>
        </div>
    </div>

    {{-- Product search Bar --}}
    <div class="flex mb-4 justify-between space-x-4">
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
                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" 
                    class="ml-1 btn btn-soft btn-secondary rounded-xl border-2">
                    Clear
                </a>
                @endif

            </div>
        </form>
            
        @role('owner')
            <a href="{{ route('products.create') }}" class="btn btn-primary rounded-xl">
                + Add Product
            </a>
        @endrole
        
    </div>
    
    {{-- Card Bottom --}}
    @if($products->count() > 0)
    <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
        <table class="table">
            <!-- head -->
            <thead class="bg-gray-100">
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th class="w-50 text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="group hover:bg-gray-100 transition-colors">
                    <td>{{ $loop->iteration }}</td>
                    <td class="py-4 space-x-2 items-center">
                        <div>
                            {{ $product->name }}
                        </div>
                    </td>
                    <td>{{ $product->brand}}</td>
                    <td>{{ $product->price }}</td>
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
                    <td>
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-soft btn-info rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
                                View
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-soft btn-warning rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @else
    <div class="flex py-10 justify-center font-bold text-xl bg-white border border-gray-200 rounded-2xl shadow">
        Produk Kosong
    </div>
    @endif

</x-layout>