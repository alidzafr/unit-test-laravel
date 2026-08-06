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