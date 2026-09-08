<x-layout title="Pengaturan">
    <div class="space-y-6">
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
            <!-- name of each tab group should be unique -->
            <div class="tabs tabs-lift">
                <input type="radio" id="tab1" name="my_tabs_3" class="tab" aria-label="Profil Pengguna" @if(! $errors->has('password')) checked="checked" @endif />
                
                {{-- Content 1 --}}
                <div class="tab-content bg-base-100 border-base-300 p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Profile</h3>
                        <p class="text-sm text-gray-500">Ubah nama, email dan Role Akses pengguna.</p>
                    </div>

                    <form action="{{ route('users.update', $user) }}" method="post">
                        @method("PUT")
                        @csrf
                        {{-- Grid --}}
                        <div class="w-3xl grid gap-6 lg:grid-cols-1">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Nama</legend>
                                <input 
                                    name="name" type="text" value="{{ $user->name }}"
                                    class="input rounded-xl w-full @error('name') outline-2 outline-red-500 @enderror" 
                                    placeholder="Type here"
                                />
                                @error('name')
                                    <div class="label text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </fieldset>

                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Email</legend>
                                <input 
                                    name="email" type="email" value="{{ $user->email }}"
                                    class="input rounded-xl w-full @error('email') outline-2 outline-red-500 @enderror" 
                                    placeholder="Type here"
                                />
                                @error('email')
                                    <div class="label text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </fieldset>
                            
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
                            
                        </div>

                        {{-- Save row --}}
                        <div class="my-6">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </div>
                    </form>

                    {{-- Delete row --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Hapus Akun</h3>
                        <p class="text-sm text-gray-500">Hapus akun anda beserta seluruh datanya.</p>
                        <label for="my_modal_6" class="btn btn-soft btn-error rounded-xl">Hapus Akun</label>
                    </div>

                </div>

                <input type="radio" id="tab2" name="my_tabs_3" class="tab" aria-label="Password" @if($errors->has('password')) checked="checked" @endif />

                {{-- Content 2 --}}
                <div class="tab-content bg-base-100 border-base-300 p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Password</h3>
                        <p class="text-sm text-gray-500">Ubah password pengguna.</p>
                    </div>


                    <form action="{{ route('users.update', $user) }}" method="post">
                        @method("PUT")
                        @csrf
                        <input type="hidden" name="name" value="{{ $user->name }}">
                        <input type="hidden" name="role" value="{{ $user->getRoleNames()->first() }}">

                        {{-- Grid --}}
                        <div class="w-3xl grid gap-6 lg:grid-cols-1">
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

                        {{-- Save row --}}
                        <div class="my-6">
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </div>
                    </form>
                </div>

                {{-- <input type="radio" name="my_tabs_3" class="tab" aria-label="Tema Tampilan" />
                <div class="tab-content bg-base-100 border-base-300 p-6">
                    Content 3
                </div> --}}
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
</x-layout>