<x-layout title="Edit Role">
    <div class="max-w-4xl mx-auto px-4 py-6">

        <h1 class="text-2xl font-bold mb-6">
            Edit Role
        </h1>

        <form action="{{ route('roles.update', $role) }}"
            method="POST"
            class="bg-white p-6 rounded-lg shadow">

            @csrf
            @method('PUT')

            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Role Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $role->name }}"
                    class="w-full border rounded-lg px-3 py-2"
                >

                @error('name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            <h2 class="font-semibold text-lg mb-4">
                Permissions
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                @foreach($permissions as $permission)

                    <label class="flex items-center gap-2">

                        <input
                            type="checkbox"
                            name="permissions[]"
                            value="{{ $permission->id }}"
                            @checked(
                                in_array(
                                    $permission->id,
                                    old(
                                        'permissions',
                                        $role->permissions->pluck('id')->toArray()
                                    )
                                )
                            )
                        >

                        <span>
                            {{ $permission->name }}
                        </span>

                    </label>

                @endforeach

            </div>


            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                    Update Role
                </button>

                <a
                    href="{{ route('roles.index') }}"
                    class="px-4 py-2 bg-gray-200 rounded-lg">
                    Cancel
                </a>

            </div>

        </form>

    </div>
</x-layout>