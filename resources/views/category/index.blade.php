<x-layout>
    {{-- Top row title --}}
    <div class="flex mb-8 w-full justify-between items-center">
        <div class="flex flex-col">
            <div class="prose">
                <h1>
                    Categories
                </h1>
            </div>
            <div class="breadcrumbs text-sm">
              <ul>
                <li>Categories</li>
              </ul>
            </div>
            
        </div>
        <a href="{{ route('categories.create') }}"
            class="btn bg-primary text-white hover:bg-primary/75 rounded-lg">
            Add New +
        </a>
    </div>
    <div class="flex flex-col p-4 bg-white w-full border border-gray-200 rounded-2xl">
        
        <ul role="list" class="divide-y divide-gray-100">
            
            @forelse ($categories as $category)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    @isset($category->photo)
                        <img src="{{ Storage::url(($category->photo)) }}" alt="" class="w-14 rounded-full">
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
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-neutral rounded-lg">
                        View
                    </a>
                </div>
            </li>
                
            @empty
                Kosong
            @endforelse

        </ul>

        {{-- Pagination radio --}}
        <div class="p-6">
            {{ $categories->links() }}
        </div>
        
    </div>
    
</x-layout>