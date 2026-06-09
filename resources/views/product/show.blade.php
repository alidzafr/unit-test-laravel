<x-layout>
    <div class="p-8 mb-8 bg-white w-full border border-gray-200 rounded-2xl">
        <h3 class="mb-2 text-lg font-bold">Product Detail</h3>
        <div class="flex p-4 mb-4 justify-between">
            {{-- Overview --}}
            <div class="flex flex-col w-4xl">
                {{-- Name --}}
                <h1 class="font-bold">Primary Detail</h1>
                <div class="flex my-4">
                    <div class="flex flex-col w-xs text-gray-600 space-y-2">
                        <span>Product Name</span>
                        <span>Brand</span>
                        <span>Category</span>
                        <span>Color</span>
                        <span>Price</span>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <span>Susi</span>
                        <span>susimas</span>
                        <span>Food</span>
                        <span>Black, Cyan, Rose Gold</span>
                        <span>5000</span>
                    </div>
                </div>
                {{-- Description --}}
                <h1 class="font-bold">Description</h1>
                <div class="my-4">
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni officiis similique expedita odio blanditiis ipsum hic minus eligendi nisi exercitationem?</span>
                </div>

            </div>
            {{-- Picture --}}
            <div class="flex flex-col item-center justify-center w-2xs">
                <div class="flex justify-center mb-4">
                    <img
                    src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
                    class="max-w-sm rounded-lg shadow-2xl"
                    />
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex flex-col text-gray-600">
                        <span>Stock avaibility</span>
                        <span>Status</span>
                    </div>
                    <div class="flex flex-col">
                        <span>86</span>
                        <span>In-Stock</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layout>