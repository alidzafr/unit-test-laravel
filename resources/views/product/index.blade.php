<x-layout>
    {{-- Card --}}
    <div class="flex flex-col bg-white border border-gray-200 rounded-2xl">
        @role('owner')
            <div class="flex p-6">
                <a href="{{ route('products.create') }}"
                    class="btn btn-soft btn-primary">
                    Add new product
                </a>
            </div>
        @endrole
        
        <div class="mb-2 border-b-2 border-gray-200"></div>

        <p>
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
            <table class="table table-zebra bg-white">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    
                @forelse ($products as $product)
                <!-- row 1 -->
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <th class="flex space-x-2">
                        @role('owner')
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="btn btn-soft btn-primary">
                            Edit
                        </a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                class="btn btn-soft btn-error">
                                Delete
                            </button>
                        </form>
                        @endrole
                    </th>
                </tr>
                
                @empty
                <h1>No item found</h1>
                @endforelse
                </tbody>
            </table>
            </div>
        </p>

    </div>
</x-layout>