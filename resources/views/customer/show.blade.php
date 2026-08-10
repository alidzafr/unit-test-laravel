<x-layout>
    <div class="space-y-6">
        {{-- <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <a href="{{ route('customers.index') }}" class="text-sm font-medium text-primary hover:underline">
                    ← Kembali ke daftar pelanggan
                </a>
                <h1 class="text-2xl font-semibold text-gray-900">Detail Pelanggan</h1>
                <p class="text-sm text-gray-500">Informasi lengkap pelanggan yang terdaftar.</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('customers.index') }}" class="btn btn-soft btn-secondary rounded-xl">
                    Kembali
                </a>
                <a href="{{ route('customers.edit', $customer->slug) }}" class="btn btn-warning rounded-xl">
                    Edit
                </a>
            </div>
        </div> --}}

        <div class="flex justify-end gap-2">
            <a href="{{ route('customers.index') }}" class="btn btn-soft btn-secondary rounded-xl">
                Kembali
            </a>
            <a href="{{ route('customers.edit', $customer->slug) }}" class="btn btn-warning rounded-xl">
                Edit
            </a>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-4 border-b border-gray-100 pb-6">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">{{ $customer->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $customer->email }}</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-500">Nama</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $customer->name }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-500">Email</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $customer->email }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-500">Kontak</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $customer->phone }}</p>
                    </div>

                    <div class="rounded-xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-500">Slug</p>
                        <p class="mt-1 font-semibold text-gray-900">{{ $customer->slug }}</p>
                    </div>
                </div>

                <div class="mt-6 rounded-xl border border-gray-100 bg-gray-50 p-4">
                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                    <p class="mt-1 leading-7 text-gray-700">{{ $customer->address ?: 'Alamat belum diisi' }}</p>
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
                        <span class="font-medium text-gray-700">{{ $customer->created_at ? $customer->created_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-3">
                        <span class="text-gray-500">Terakhir diubah</span>
                        <span class="font-medium text-gray-700">{{ $customer->updated_at ? $customer->updated_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>