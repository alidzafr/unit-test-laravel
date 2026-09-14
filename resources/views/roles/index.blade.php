<x-layout title="Role">
    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">
                        Role
                    </th>

                    <th class="px-6 py-3 text-left">
                        Permissions
                    </th>

                    <th class="px-6 py-3 text-right">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody>

                @forelse($roles as $role)

                    <tr class="border-t">

                        <td class="px-6 py-4 font-medium">
                            {{ $role->name }}
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex flex-wrap gap-2">

                                @foreach($role->permissions as $permission)

                                    <span class="px-2 py-1 text-xs
                                                 bg-gray-100 rounded">
                                        {{ $permission->name }}
                                    </span>

                                @endforeach

                            </div>

                        </td>

                        <td class="px-6 py-4 text-right">

                            <a href="{{ route('roles.edit', $role) }}"
                               class="text-blue-600 mr-3">
                                Edit
                            </a>

                            @if($role->name !== 'Super Admin')

                                <form action="{{ route('roles.destroy', $role) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Delete this role?')"
                                            class="text-red-600">
                                        Delete
                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3"
                            class="px-6 py-8 text-center text-gray-500">
                            No roles found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-layout>