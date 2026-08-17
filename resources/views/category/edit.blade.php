<x-layout title="Edit Kategori">
    <div class="space-y-6">
        {{-- Top row title --}}
        <div class="flex w-full justify-between items-center">
            
            <div class="flex flex-col gap-3 justify-between sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('warehouse.index') }}" class="btn btn-soft btn-primary rounded-xl">
                    Kembali
                </a>
            </div>
        </div>
        
        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            {{-- Card --}}
            <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                @method("PUT")
                @csrf
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi kategori</h3>
                        <p class="text-sm text-gray-500">Ubah nama dan tagline Kategori.</p>
                    </div>
                    <label for="my_modal_6" class="btn btn-error rounded-xl">Hapus kategori</label>
                </div>
                    
                @if ($errors->any())
                <div role="alert" class="mb-2 alert alert-error">
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
                
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="name" class="block text-sm/6 font-medium text-gray-900">Category Name</label>
                        <div class="mt-2">
                            <input id="name" type="text" 
                            name="name" autocomplete="name" 
                            class="@error('name') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            value="{{ $category->name }}"/>

                            @error('name')
                            <p class="mt-1 text-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="tagline" class="block text-sm/6 font-medium text-gray-900">Category Tagline</label>
                        <div class="mt-2">
                            <input id="tagline" type="text" 
                            name="tagline" autocomplete="tagline" 
                            class="@error('tagline') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            value="{{ $category->tagline }}"/>

                            @error('tagline')
                            <p class="mt-1 text-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-wrap mt-8 gap-3">
                    <button type="submit" class="btn btn-primary rounded-xl">
                        Simpan perubahan
                    </button>
                    <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-soft btn-secondary rounded-xl">
                        Batal
                    </a>
                </div>

            </form>

            {{-- Description card --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">Informasi tambahan</h3>
                <div class="mt-4 space-y-4 text-sm">
                    <div class="rounded-lg border border-dashed border-gray-200 px-3 py-4 text-gray-600">
                        <p class="font-medium text-gray-700">Catatan</p>
                        <p class="mt-1 text-sm">Pastikan semua form terisi dengan benar sebelum menekan tombol simpan.</p>
                    </div>
                    <div class="rounded-lg bg-gray-50 px-3 py-3">
                        <p class="text-gray-500">Terakhir diperbarui</p>
                        <p class="mt-1 font-medium text-gray-700">{{ $category->updated_at ? $category->updated_at->format('d M Y, H:i') : '-' }}</p>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my_modal_6" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Caution</h3>
                <p class="py-4">All Changes will be loss.</p>
                <div class="modal-action">
                    <label for="my_modal_6" class="btn">
                        Cancel
                    </label>
                    <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-error">
                        Yes
                    </a>
                </div>
            </div>
            {{-- box shadow actually close button too--}}
            <label class="modal-backdrop" for="my_modal_6"></label>
        </div>
    </div>

</x-layout>