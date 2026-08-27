<x-layout title="Pengguna">
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
                    <a href="{{ route('users.index', request()->query->remove('search')) }}" 
                        class="ml-1 btn btn-soft btn-secondary rounded-xl border-2">
                        Clear
                    </a>
                    @endif
                    
                    
                </div>
            </form>
            
            {{-- @role('owner') --}}
                {{-- <a href="{{ route('users.create') }}" class="btn btn-primary rounded-xl">
                    + Tambahkan Produk
                </a> --}}
                <label for="my_modal_7" class="btn btn-primary rounded-xl">+ Tambahkan User</label>
                
            {{-- @endrole --}}
            
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
            <table class="table">
                <!-- head -->
                <thead class="bg-gray-100">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                        
                    @forelse ($users as $user)
                    <!-- row 1 -->
                    <tr class="group hover:bg-gray-100 transition-colors">
                        <th class="ps-4">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->first() }}</td>
                        
                        {{-- @role('owner') --}}
                        <td>
                            <div class="dropdown dropdown-left dropdown-center">
                                <div tabindex="0" role="button" class="hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16"><path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/></svg>
                                </div>
                                <ul tabindex="-1" class="menu text-sm dropdown-content bg-base-100 rounded-box border border-gray-200 z-1 w-36 shadow-md">
                                    <li>
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.show', $user->id) }}">
                                            View Detail
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
                        {{-- @endrole --}}
                    </tr>
                    
                    @empty
                    <h1>No item found</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Category Button -->
        <input type="checkbox" id="my_modal_7" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <h3 class="mb-3 text-lg font-bold">Mendaftarkan Pengguna Baru</h3>
                    <input name="name" 
                            type="text"
                            value="{{ old('name') }}"
                            class="input w-md @error('name') border-error @enderror" 
                            placeholder="Type here">

                    @error('name')
                        <p class="mt-1 text-error">
                            {{ $message }}
                        </p>
                        <script>
                            document.getElementById('my_modal_7').checked = true;
                        </script>
                    @enderror

                    <legend class="fieldset-legend">Kategori</legend>
                    <div class="flex items-center gap-4">
                        <select name="category_id" class="select w-full rounded-xl @error('category_id') outline-2 outline-red-500 @enderror">
                            <option disabled selected>Select existing category</option>
                            <option>Select existing category</option>
                            <option>Select existing</option>
                            {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="modal-action">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <label for="my_modal_7" class="btn">
                            Cancel
                        </label>
                    </div>
                </form>
            </div>
            {{-- box shadow actually close button too--}}
            <label class="modal-backdrop" for="my_modal_7"></label>
        </div>

</x-layout>