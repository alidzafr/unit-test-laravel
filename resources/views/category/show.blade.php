<x-layout>
    <div class="flex flex-col space-x-6">

        <div class="flex mb-4 justify-end w-full">
            {{-- Edit --}}
            <a href="{{ route('categories.edit', $category->slug) }}"
                class="btn btn-warning rounded-lg">
                Edit
            </a>
        </div>

        {{-- Card Atas --}}
        <div class="flex space-x-6 w-full">
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

        {{-- Card Bawah --}}
        <div class="flex flex-col p-4 bg-white border border-gray-200 rounded-2xl w-full">
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
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-neutral rounded-lg">
                        View
                    </a>

                </div>
            </li>
                
            @empty
                Kosong
            @endforelse
        </div>
    </div>
</x-layout>