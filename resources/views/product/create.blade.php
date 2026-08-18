<x-layout title="Tambahkan Produk">
    <div class="space-y-6">
        {{-- Top row title --}}
        <div class="flex w-full gap-3 justify-between items-center">
            <label for="my_modal_7" class="btn btn-soft btn-primary rounded-xl">Kembali</label>
        </div>
        
        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            {{-- Card --}}
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('products.store') }}" 
                class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                @csrf
                {{-- Title Card--}}
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Tambah Produk Baru</h3>
                        {{-- <p class="text-sm text-gray-500">Ubah nama, kontak, email, dan alamat.</p> --}}
                    </div>
                </div>
                {{-- Content Card --}}
                <div class="col-span-full">
                    <label for="cover-photo" class="block text-sm/6 font-medium">Foto Produk</label>
                    <div class="mt-2 flex justify-center rounded-xl border border-gray-300 px-6 py-10">
                        <div class="text-center">
                            <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-600">
                                <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm/6 text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                    <span>Upload a file</span>
                                    <input id="file-upload" type="file" name="file-upload" class="sr-only" />
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-900">Nama Produk</label>
                        <div class="mt-2">
                            <input id="name" type="text" name="name" autocomplete="name"
                                class="@error('name') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-xl bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm"/>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="brand" class="block text-sm font-medium text-gray-900">Brand</label>
                        <div class="mt-2">
                            <input id="brand" type="text" name="brand" autocomplete="brand"
                                class="@error('name') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-xl bg-white px-3 py-2.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-primary sm:text-sm"/>
                            @error('brand')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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
                </div>
            </div>
        </div>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my_modal_7" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Caution</h3>
                <p class="py-4">All Changes will be loss.</p>
                <div class="modal-action">
                    <label for="my_modal_7" class="btn">
                        Cancel
                    </label>
                    <a href="{{ route('products.index') }}" class="btn btn-error">
                        Yes
                    </a>
                </div>
            </div>
            {{-- box shadow actually close button too--}}
            <label class="modal-backdrop" for="my_modal_6"></label>
        </div>
    </div>

</x-layout>