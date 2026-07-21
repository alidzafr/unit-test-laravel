<x-layout>
    {{-- Top row title --}}
    <div class="flex mb-8 w-full justify-between items-center">
        <div class="prose">
            <h1>
                Categories
            </h1>
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
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-12 flex-none rounded-full bg-gray-50" />
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