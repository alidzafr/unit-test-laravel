<x-layout>
    <form method="POST" action="{{ route('products.update', $products->id) }}">
        @method("PUT")
        @csrf
        {{-- Desc --}}
        <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
            <h3 class="mb-2 text-lg font-bold">Product Description</h3>
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Name</legend>
                    <input 
                        value="{{ $products->name }}"
                        name="name" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Brand</legend>
                    <input
                        value="{{ $products->brand }}"
                        name="brand" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Category</legend>
                    <input
                        value="{{ $products->category }}"
                        name="category" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Color</legend>
                    <input
                        value="{{ $products->color }}"
                        name="color" type="text" 
                        class="input w-2xl" placeholder="Type here"
                    />
                </fieldset>
            </div>
            
            <div class="flex mb-4">
                <fieldset class="fieldset mr-4">
                    <legend class="fieldset-legend">Price</legend>
                    <input
                        value="{{ $products->price }}"
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
                    >{{ $products->description }}</textarea>
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
                        value="{{ $products->qty }}"
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
            <div class="flex justify-center">
                <input name="image" type="file" class="file-input file-input-neutral" />
            </div>

        </div>
        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
</x-layout>