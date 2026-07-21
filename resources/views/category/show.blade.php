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
            <div class="flex min-w-0 gap-x-4">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-12 flex-none rounded-full bg-gray-50" />
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
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-12 flex-none rounded-full bg-gray-50" />
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