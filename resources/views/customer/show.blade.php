<x-layout>
    {{-- Category edit button--}}
    <div class="flex mb-4 justify-end w-full">
        <a href="{{ route('customers.edit', $customer->slug) }}"
            class="btn btn-warning rounded-lg">
            Edit
        </a>
    </div>

    <div class="flex">
        <div class="p-8 overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
                        {{-- Name --}}
                <h1 class="font-bold">Detail Pelanggan</h1>
                <div class="flex my-4">
                    <div class="flex flex-col w-2xs text-gray-600 space-y-2">
                        <span>Name</span>
                        <span>Email</span>
                        <span>Kontak</span>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <span>{{ $customer->name }}</span>
                        <span>{{ $customer->email }}</span>
                        <span>{{ $customer->phone }}</span>
                    </div>
                </div>
                {{-- Description --}}
                <h1 class="font-bold">Alamat</h1>
                <div class="my-4">
                    <span>{{ $customer->address }}</span>
                </div>
        </div>
    </div>
</x-layout>