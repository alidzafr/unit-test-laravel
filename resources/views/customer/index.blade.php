<x-layout title="Pelanggan">
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
                    <a href="{{ route('customers.index', request()->query->remove('search')) }}" 
                        class="ml-1 btn btn-soft btn-secondary rounded-xl border-2">
                        Clear
                    </a>
                    @endif

                </div>
            </form>
                
            @role('owner')
                <a href="{{ route('customers.create') }}" class="btn btn-primary rounded-xl">
                    + Tambah Pelanggan
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Dibuat pada tanggal</th>
                    <th class="w-50 text-center">Opsi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($customers as $customer)
                <tr class="group hover:bg-gray-100 transition-colors">
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm/6 font-semibold text-gray-900">{{ $customer->name }}</p>
                        </div>
                    </td>
                    
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('customers.show', $customer->slug) }}" class="btn btn-soft btn-info rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
                                View
                            </a>
                            <a href="{{ route('customers.edit', $customer->slug) }}" class="btn btn-soft btn-warning rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
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
                {{ $customers->links() }}
            </div>
        </div>
    </div>

</x-layout>