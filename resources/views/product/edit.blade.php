<x-layout title="Ubah Produk">
    <!-- You can open the modal using ID.showModal() method -->
    <div class="flex mb-4 justify-end">
        <button class="btn btn-outline btn-error" onclick="my_modal_3.showModal()">Delete</button>
        <dialog id="my_modal_3" class="modal">
          <div class="modal-box">
            <form method="dialog">
              <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Delete Confirm</h3>
            <p class="py-4">Are you sure want to delete this product ?</p>
            <div class="flex justify-center space-x-2">
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
        
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        {{-- Desc --}}
        <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
            <h3 class="mb-2 text-lg font-bold">{{ $product->name }}</h3>
            
            @if ($errors->any())
            <div role="alert" class="alert alert-error">
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
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Name</legend>
                    <input 
                        value="{{ $product->name }}"
                        name="name" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Brand</legend>
                    <input
                        value="{{ $product->brand }}"
                        name="brand" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Category</legend>
                    <select name="category_id" class="select w-2xl">
                        <option value="{{ $product->category_id }}">
                            {{ $product->category->name }}
                        </option>
                        @foreach ($categories as $category)
                            @if ($category->id == $product->category_id)
                                @continue {{-- Skips the rest of the loop for this specific item --}}
                            @endif
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Color</legend>
                    <input
                        value="{{ $product->color }}"
                        name="color" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Price</legend>
                    <input
                        value="{{ $product->price }}"
                        name="price" type="number" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Description</legend>
                    <textarea
                        name="description" 
                        class="textarea h-48 w-340" placeholder="Product info (optional)"
                    >{{ $product->description }}</textarea>
                </fieldset>
            </div>
        </div>

        {{-- Avaibility --}}
        <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
            <h3 class="mb-2 text-lg font-bold">Avaibility</h3>
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Stock Quantity</legend>
                    <input
                        value="{{ $product->qty }}"
                        name="qty" type="number" 
                        class="input w-2xl" placeholder="Type here"
                    />
                {{-- <p class="label">Optional</p> --}}
                </fieldset>
            </div>

        </div>

        {{-- Upload --}}
        <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
            <h3 class="mb-2 text-lg font-bold">Upload Image</h3>
            <img src="{{Storage::url(($product->photo))}}" alt ="album">
            <div class="flex justify-center">
                <input name="photo" type="file" class="file-input file-input-neutral" />
            </div>

        </div>
        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</x-layout>