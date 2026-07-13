<x-layout>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        {{-- Desc --}}
        <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
            <h3 class="mb-2 text-lg font-bold">Product Description</h3>

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
                        name="name" type="text" :value="old('name')"
                        class="input w-2xl" placeholder="Type here"
                    />
                {{-- <p class="label">Optional</p> --}}
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Brand</legend>
                    <input 
                        name="brand" type="text"
                        value="{{ old('brand') }}"
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Category</legend>
                    <div class="flex items-center space-x-2">
                        <select name="category_id" class="select w-md">
                            <option disabled selected>Select existing category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span>or</span>
                        
                        <!-- The button to open modal -->
                        <label for="my_modal_7" class="btn">+ Create new Category</label>
                    </div>
                </fieldset>
                
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Color</legend>
                    <input 
                        name="color" type="text" :value="old('color')"
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Price</legend>
                    <input 
                        name="price" type="number" :value="old('price')"
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Description</legend>
                    <textarea name="description" class="textarea h-48 w-340" placeholder="Product info (optional)"></textarea>
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
                        name="qty" type="number" :value="old('qty')"
                        class="input w-2xl" placeholder="Type here"
                    />
                {{-- <p class="label">Optional</p> --}}
                </fieldset>
            </div>

        </div>

        {{-- Upload --}}
        <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
            <h3 class="mb-2 text-lg font-bold">Upload Image</h3>
            <div class="flex justify-center">
                <input name="photo" type="file" :value="old('photo')" class="file-input file-input-neutral" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>


<!-- Put this part before </body> tag -->

<input type="checkbox" id="my_modal_7" class="modal-toggle" />
<div class="modal" role="dialog">
    <div class="modal-box">

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <h3 class="mb-3 text-lg font-bold">Create new category</h3>
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

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">
                    Submit
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