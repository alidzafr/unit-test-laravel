<x-layout title="Ubah Pengguna">
    <div class="space-y-6">
        {{-- Top row title --}}
        <div class="flex w-full gap-3 justify-between items-center">
            <label for="my_modal_7" class="btn btn-soft btn-primary rounded-xl">Kembali</label>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1.3fr_0.7fr]">
            {{-- Card --}}
            <form action="{{ route('users.update', $user) }}" method="post"
                class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                @method("PUT")
                @csrf
                <div class="flex items-center gap-3 border-b border-gray-100 pb-4">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Pengguna</h3>
                        <p class="text-sm text-gray-500">Ubah nama, email dan password pengguna.</p>
                    </div>
                    <label for="my_modal_6" class="btn btn-soft btn-error rounded-xl">Hapus pengguna</label>
                </div>

                @if ($errors->any())
                <div role="alert" class="mb-2 alert alert-error">
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

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="name" class="block text-sm font-medium text-gray-900">
                            Username
                        </label>
                        <div class="mt-2">
                            <input id="name" type="text" 
                            name="name" autocomplete="name" 
                            class="@error('name') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            value="{{ $user->name }}"/>

                            @error('name')
                            <p class="mt-1 text-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="email" class="block text-sm font-medium text-gray-900">
                            Email
                        </label>
                        <div class="mt-2">
                            <input id="email" type="email" 
                            name="email" autocomplete="email" 
                            class="@error('email') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            value="{{ $user->email }}"/>

                            @error('email')
                            <p class="mt-1 text-error">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Roles</legend>
                        <div class="flex items-center gap-4">
                            <select name="role" class="select w-full rounded-xl @error('role') outline-2 outline-red-500 @enderror">
                                <option selected>{{ $user->getRoleNames()->first() }}</option>
                                @foreach ($roles as $role)
                                    @if ($role->name == $user->getRoleNames()->first())
                                        @continue {{-- Skips the rest of the loop for this specific item --}}
                                    @endif
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                            <div class="label text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </fieldset>

                    {{-- Password --}}
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Password</legend>
                        <input 
                            name="password" type="password" value="{{ old('password') }}"
                            class="input rounded-xl w-full @error('password') outline-2 outline-red-500 @enderror" 
                            placeholder="Type here"
                        />
                        @error('password')
                            <div class="label text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    
                    {{-- Password Confirmation--}}
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Password Confirmation</legend>
                        <input 
                            name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"
                            class="input rounded-xl w-full @error('password') outline-2 outline-red-500 @enderror" 
                            placeholder="Type here"
                        />
                        @error('password')
                            <div class="label text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </fieldset>
                </div>

                <div class="flex flex-wrap mt-8 gap-3">
                    <button type="submit" class="btn btn-primary rounded-xl">
                        Simpan Perubahan
                    </button>
                    <label for="my_modal_7" class="btn btn-soft btn-secondary rounded-xl">
                        Batal
                    </label>
                </div>
            </form>
            
            {{-- Description Card --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900">
                    Informasi Tambahan
                </h3>
                <div class="mt-4 space-y-4 text-sm">
                    <div class="rounded-lg border border-dashed border-gray-200 px-3 py-4 text-gray-600">
                        <p class="font-medium text-gray-700">
                            Catatan
                        </p>
                        <p class="mt-1 text-sm">
                            Pastikan semua form terisi dengan benar sebelum menekan tombol simpan.
                        </p>
                    </div>
                    <div class="rounded-lg bg-gray-50 px-3 py-3">
                        <p class="text-gray-500">
                            Dibuat pada
                        </p>
                        <p class="mt-1 font-medium text-gray-700">
                            {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                        </p>
                    </div>
                    <div class="rounded-lg bg-gray-50 px-3 py-3">
                        <p class="text-gray-500">
                            Terakhir diperbarui
                        </p>
                        <p class="mt-1 font-medium text-gray-700">
                            {{ $user->updated_at ? $user->updated_at->format('d M Y, H:i') : '-' }}
                        </p>
                    </div>
                </div>
            </div>
    
        </div>
    </div>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my_modal_6" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Perhatian!</h3>
            <p class="py-4">Apakah anda yakin untuk menghapus pengguna ?</p>
            
            <div class="modal-action">
                <form action="{{ route('users.destroy', $user ) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-error">Hapus</button>
                </form>
                <label for="my_modal_6" class="btn">Batal</label>
            </div>
        </div>
    </div>
    
    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Caution</h3>
            <p class="py-4">All Changes will be loss.</p>
            <div class="modal-action">
                <label for="my_modal_7" class="btn">
                    Cancel
                </label>
                <a href="{{ route('users.index') }}" class="btn btn-error">
                    Yes
                </a>
            </div>
        </div>
        {{-- box shadow actually close button too--}}
        <label class="modal-backdrop" for="my_modal_7"></label>
    </div>
</x-layout>