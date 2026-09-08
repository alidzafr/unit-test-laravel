<x-layout title="Pengaturan">
    <div class="space-y-6">
        <div class="overflow-x-auto bg-white border border-gray-200 rounded-2xl shadow">
            <!-- name of each tab group should be unique -->
            <div class="tabs tabs-lift">
                <input type="radio" name="my_tabs_3" class="tab" aria-label="Profil Pengguna" checked="checked" />
                <div class="tab-content bg-base-100 border-base-300 p-6">
                    {{-- Content 1 --}}
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Profile</h3>
                        <p class="text-sm text-gray-500">Ubah nama, email dan Role Akses pengguna.</p>
                    </div>

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

                    {{-- Delete row --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Hapus Akun</h3>
                        <p class="text-sm text-gray-500">Hapus akun anda beserta seluruh datanya.</p>
                        <button type="submit" class="btn btn-error mt-2">Hapus Akun</button>
                    </div>

                </div>

                <input type="radio" name="my_tabs_3" class="tab" aria-label="Password" />
                <div class="tab-content bg-base-100 border-base-300 p-6">
                    Content 2
                </div>

                <input type="radio" name="my_tabs_3" class="tab" aria-label="Tema Tampilan" />
                <div class="tab-content bg-base-100 border-base-300 p-6">
                    Content 3
                </div>
            </div>
        </div>
    </div>
</x-layout>