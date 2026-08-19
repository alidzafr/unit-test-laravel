<x-layout title="Detail Produk">
    <div class="space-y-6">
        {{-- Category edit button--}}
        <div class="flex justify-between">
            <a href="{{ route('products.index') }}" class="btn btn-soft btn-primary rounded-xl">
                Kembali
            </a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-soft btn-secondary rounded-xl">
                Edit
            </a>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-4 border-b border-gray-100 pb-6">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $product->name }}</h2>
                </div>
                
                <div class="mt-6 grid grid-cols-3 gap-4">
                    {{-- Overview --}}
                    <div class="flex flex-col col-span-2 w-4xl">
                        {{-- Name --}}
                        <h1 class="font-bold">Primary Detail</h1>
                        <div class="flex my-4">
                            <div class="flex flex-col w-xs text-gray-600 space-y-2">
                                <span>Product Name</span>
                                <span>Brand</span>
                                <span>Category</span>
                                <span>Color</span>
                                <span>Price</span>
                                <span>Stock</span>
                            </div>
                            <div class="flex flex-col space-y-2">
                                <span>{{ $product->name }}</span>
                                <span>{{ $product->brand  }}</span>
                                <span>{{ $product->category->name }}</span>
                                <span>{{ $product->color }}</span>
                                <span>{{ $product->price }}</span>
                                <span>{{ $product->stock }}</span>
                            </div>
                        </div>
                        {{-- Description --}}
                        <h1 class="font-bold">Description</h1>
                        <div class="my-4">
                            <span>{{ $product->description }}</span>
                        </div>
                    </div>

                    {{-- Picture --}}
                    <div class="flex flex-col item-center justify-center w-68">
                        <div class="flex justify-center mb-4">
                            <img src="{{Storage::url(($product->photo))}}" 
                            alt ="album">
                        </div>
                        <div class="flex justify-between mb-4">
                            <div class="flex flex-col text-gray-600">
                                <span>Avaibility status</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span>{{ $product->qty }}</span>
                                {!! $product->qty > 0 ? 
                                    '<div class="badge badge-outline badge-success">
                                        In-Stock
                                    </div>' : 
                                    '<div class="badge badge-outline badge-error">
                                        Out of Stock
                                    </div>' 
                                !!}
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">Informasi Tambahan</h3>
                <div class="mt-4 space-y-4 text-sm">
                    <div class="rounded-lg border border-dashed border-gray-200 px-3 py-4 text-gray-600">
                        <p class="font-medium text-gray-700">Catatan</p>
                        <p class="mt-1 text-sm">Gunakan halaman ini untuk melihat data pelanggan secara ringkas sebelum melakukan pembaruan.</p>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-3">
                        <span class="text-gray-500">Dibuat pada</span>
                        <span class="font-medium text-gray-700">{{ $product->created_at ? $product->created_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-3">
                        <span class="text-gray-500">Terakhir diubah</span>
                        <span class="font-medium text-gray-700">{{ $product->updated_at ? $product->updated_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>