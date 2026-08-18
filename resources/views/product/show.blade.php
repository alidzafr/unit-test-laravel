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

        {{-- <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-4 border-b border-gray-100 pb-6">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">{{ $warehouse->name }}</h2>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-500">Nama</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $warehouse->name }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-500">Kontak</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $warehouse->phone }}</p>
                    </div>
                </div>

                <div class="mt-6 rounded-xl border border-gray-100 bg-gray-50 p-4">
                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                    <p class="mt-1 leading-7 text-gray-700">{{ $warehouse->address ?: 'Alamat belum diisi' }}</p>
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
                        <span class="font-medium text-gray-700">{{ $warehouse->created_at ? $warehouse->created_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-3">
                        <span class="text-gray-500">Terakhir diubah</span>
                        <span class="font-medium text-gray-700">{{ $warehouse->updated_at ? $warehouse->updated_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-------------- Layout lama  -------------------------}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h3 class="mb-2 text-lg font-bold">{{ $product->name }}</h3>
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
                            <span>{{ $product->name }}</span>
                            <span>{{ $product->brand  }}</span>
                            <span>{{ $product->category->name }}</span>
                            <span>{{ $product->color }}</span>
                            <span>{{ $product->price }}</span>
                        </div>
                    </div>
                    {{-- Description --}}
                    <h1 class="font-bold">Description</h1>
                    <div class="my-4">
                        <span>{{ $product->description }}</span>
                    </div>

                </div>
                {{-- Picture --}}
                <div class="flex flex-col item-center justify-center w-2xs">
                    <div class="flex justify-center mb-4">
                        <img src="{{Storage::url(($product->photo))}}" 
                        alt ="album">
                    </div>
                    <div class="flex justify-between mb-4">
                        <div class="flex flex-col text-gray-600">
                            <span>Stock avaibility</span>
                            <span>Status</span>
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
    </div>

</x-layout>