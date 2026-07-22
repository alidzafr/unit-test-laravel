<x-layout>
    {{-- Top row title --}}
    <div class="flex mb-8 w-full justify-between items-center">
        <div class="prose">
            <h1>
                View Category
            </h1>
        </div>
    </div>
    
    <div class="flex flex-col space-x-6">
        {{-- Card Atas --}}
        <div class="flex p-4 mb-4 justify-between bg-white rounded-xl w-full">
            {{-- Nama Category --}}
            <div class="flex items-center min-w-0 gap-x-4">
                @isset($category->photo)
                    <img src="{{ Storage::url(($category->photo)) }}" alt="" class="w-16">
                @else
                    <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-12 text-gray-300">
                        <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                    </svg>
                @endisset
                
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">{{ $category->name }}</p>
                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $category->slug }}</p>
                    </div>
            </div>
            {{-- Edit --}}
            <a href="{{ route('categories.edit', $category->slug) }}"
                class="btn btn-neutral">
                Edit
            </a>
        </div>

        {{-- Card Bawah --}}
        <div class="flex flex-col p-4 bg-white rounded-xl">
            <div class="flex mb-8 justify-between">
                <span class="mb-4">All Product</span>
                <a href="#" class="btn btn-neutral">Add Product</a>
            </div>
            @forelse ($products as $product)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    @isset($product->photo)
                        <img src="{{ Storage::url(($product->photo)) }}" alt="" class="w-16">
                    @else
                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-12 text-gray-300">
                            <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                    @endisset
                    
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">{{ $product->name }}</p>
                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $product->brand }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    {{-- <a href="{{ route('categories.show', $product->brand) }}" class="btn btn-neutral rounded-lg">
                        View
                    </a> --}}
                    <!-- The button to open modal -->
                    <label for="my_modal_7" class="btn">View</label>
                    
                    <!-- Put this part before </body> tag -->
                    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                    <div class="modal" role="dialog">
                        <div class="modal-box">
                            <ul>
                                {{-- Content --}}
                                <li>{{ $product->name }}</li>
                                <li>{{ $product->brand }}</li>
                                <li>{{ $product->color }}</li>
                                <li>{{ $product->description }}</li>
                                <li>{{ $product->price }}</li>
                                <li>{{ $product->qty }}</li>

                            </ul>
                    
                        </div>
                        {{-- box shadow actually close button too--}}
                        <label class="modal-backdrop" for="my_modal_7"></label>
                    </div>
                    

                </div>
            </li>
                
            @empty
                Kosong
            @endforelse
        </div>
    </div>
</x-layout>