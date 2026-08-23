<x-layout title="Ubah Gudang">
    <div class="space-y-6">
        <div class="flex flex-col gap-3 justify-between sm:flex-row sm:items-center sm:justify-between">
            <label for="my_modal_7" class="btn btn-soft btn-primary rounded-xl">Kembali</label>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            
            <form method="POST" action="{{ route('warehouse.store') }}" class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                @csrf
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi gudang</h3>
                        <p class="text-sm text-gray-500">Ubah nama, kontak, email, dan alamat.</p>
                    </div>
                </div>

                @if ($errors->any())
                    <div role="alert" class="alert alert-error mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mt-6 grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-900">Nama gudang</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" autocomplete="name"
                                class="@error('name') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-xl bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm"
                                value="{{ old('name') }}" />
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-900">Telepon</label>
                        <div class="mt-2">
                            <input id="phone" type="number" name="phone" autocomplete="tel"
                                class="@error('phone') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-xl bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm"
                                value="{{ old('phone') }}" />
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-900">Alamat</label>
                        <div class="mt-2">
                            <textarea id="address" name="address" rows="5"
                                class="@error('address') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-xl bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm"
                                placeholder="Masukkan alamat gudang">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex mt-8 justify-between">
                    <div class="flex flex-wrap gap-3">
                        <button type="submit" class="btn btn-primary rounded-xl">
                            Simpan perubahan
                        </button>
                        <label for="my_modal_7" class="btn btn-soft rounded-xl">Batal</label>
                    </div>
                </div>
                
            </form>
            
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">Informasi tambahan</h3>
                <div class="mt-4 space-y-4 text-sm">
                    <div class="rounded-lg border border-dashed border-gray-200 px-3 py-4 text-gray-600">
                        <p class="font-medium text-gray-700">Catatan</p>
                        <p class="mt-1 text-sm">Pastikan semua form terisi dengan benar sebelum menekan tombol simpan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Perhatian!</h3>
            <p class="py-4">Perubahan akan hilang, anda yakin?</p>
            
            <div class="modal-action">
                <a class="btn btn-primary rounded-xl" href="{{ route('warehouse.index') }}">Ya</a>
                <label for="my_modal_7" class="btn rounded-xl">Batal</label>
            </div>
        </div>
    </div>

</x-layout>