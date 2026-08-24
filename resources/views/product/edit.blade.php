<x-layout title="Ubah Produk">
        
    <div class="space-y-6">
        {{-- Top row title --}}
        <div class="flex w-full gap-3 justify-between items-center">
            <label for="my_modal_7" class="btn btn-soft btn-primary rounded-xl">Kembali</label>
            
            <button class="btn btn-soft btn-error rounded-xl" onclick="my_modal_3.showModal()">Delete</button>
            <dialog id="my_modal_3" class="modal">
            <div class="modal-box">
                <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold">Delete Confirm</h3>
                <p class="py-4">Are you sure want to delete this product ?</p>
                <div class="flex justify-center space-x-2">
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-accent">
                            Yes
                        </button>
                    </form>   
                    <form method="dialog">
                        <button class="btn btn-error">
                            No
                        </button>
                    </form>
                </div>
            </div>
            </dialog>
        </div>
        
        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            {{-- Card --}}
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('products.update', $product->id) }}" 
                class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                @method("PUT")
                @csrf
                {{-- Title Card--}}
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Tambah Produk Baru</h3>
                    </div>
                </div>
                
                {{-- Content Card --}}
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Foto Produk</legend>
                    <input type="hidden" name="oldImage" value="{{ $product->photo }}">
                    <div class="grid grid-cols-3 gap-2">    
                        {{-- Upload --}}
                        <div class="flex items-center h-full bg-cyan-400">
                            @if ($product->photo)
                            <img src="{{Storage::url(($product->photo))}}" class="img-preview w-xl">
                            @else
                            <img class="img-preview w-xl">
                            @endif
                        </div>
                        {{-- Upload column --}}
                        <div class="flex col-span-2 justify-center rounded-xl border border-gray-300 px-6 py-10 @error('photo') outline-2 outline-red-500 @enderror">
                            <div class="text-center">
                                <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-600"><path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" /></svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="photo" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                        <span>Upload a file</span>
                                        <input 
                                            id="photo" type="file" 
                                            name="photo" value="{{ old('photo') }}"
                                            onchange="previewImage()" class="sr-only" 
                                        />
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                    @error('photo')
                        <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Nama Produk</legend>
                    <input 
                        name="name" type="text" value="{{ $product->name }}"
                        class="input rounded-xl w-full @error('name') outline-2 outline-red-500 @enderror" 
                        placeholder="Type here"
                    />
                    @error('name')
                        <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Brand</legend>
                    <input 
                        name="brand" type="text" value="{{ $product->brand }}"
                        class="input rounded-xl w-full @error('brand') outline-2 outline-red-500 @enderror" 
                        placeholder="Type here"
                    />
                    @error('brand')
                        <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Kategori</legend>
                    <div class="flex items-center gap-4">
                        <select name="category_id" class="select w-full rounded-xl @error('category_id') outline-2 outline-red-500 @enderror">
                            <option disabled selected>Select existing category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span>or</span>
                        
                        <!-- The button to open modal -->
                        <label for="my_modal_7" class="btn btn-soft rounded-xl">+ Create new Category</label>
                    </div>
                    @error('category_id')
                    <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror 
                </fieldset>
                
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Color</legend>
                    <input 
                        name="color" type="text" value="{{ $product->color }}"
                        class="input rounded-xl w-full @error('color') outline-2 outline-red-500 @enderror" 
                        placeholder="Type here"
                    />
                    @error('color')
                    <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror    
                </fieldset>
                
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Price</legend>
                    <input 
                        name="price" type="number" value="{{ $product->price }}"
                        class="input rounded-xl w-full @error('price') outline-2 outline-red-500 @enderror" 
                        placeholder="Type here"
                    />
                    @error('price')
                    <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror    
                </fieldset>
                
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Stock</legend>
                    <input 
                        name="stock" type="number" value="{{ $product->stock }}"
                        class="input rounded-xl w-full @error('stock') outline-2 outline-red-500 @enderror" 
                        placeholder="Type here"
                    />
                    @error('stock')
                    <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror    
                </fieldset>
                
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Description</legend>
                    <textarea 
                        name="description" type="text"
                        class="textarea h-24 rounded-xl w-full @error('description') outline-2 outline-red-500 @enderror" 
                        placeholder="Type here"
                    >{{ $product->description }}</textarea>
                    @error('description')
                    <div class="label text-sm text-red-600">{{ $message }}</div>
                    @enderror    
                </fieldset>
                <button type="submit" class="btn btn-primary mt-2">Save</button>
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