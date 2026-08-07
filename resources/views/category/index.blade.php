<x-layout>
    {{-- Search Bar --}}
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
                <a href="{{ route('categories.index', request()->query->remove('search')) }}" 
                    class="ml-1 btn btn-soft btn-secondary rounded-xl border-2">
                    Clear
                </a>
                @endif

            </div>
        </form>
            
        @role('owner')
            <a href="{{ route('categories.create') }}" class="btn btn-primary rounded-xl">
                + Add Category
            </a>
        @endrole
        
    </div>

    <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
        <table class="table">
            <!-- head -->
            <thead class="bg-gray-100">
            <tr>
                <th></th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Dibuat pada tanggal</th>
                <th class="w-50 text-center">Opsi</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
            <tr class="group hover:bg-gray-100 transition-colors">
                <th>{{ $loop->iteration }}</th>
                <td>
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">{{ $category->name }}</p>
                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $category->slug }}</p>
                    </div>
                </td>
                
                <td>{{ $category->tagline }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <div class="flex justify-center space-x-2">
                        <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-soft btn-info rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
                            View
                        </a>
                        <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-soft btn-warning rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
                            Edit
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <th>Data Kosong</th>
            @endforelse
            </tbody>
        
        </table>
        {{-- Pagination radio --}}
        <div class="p-6">
            {{ $categories->links() }}
        </div>
    </div>   
</x-layout>