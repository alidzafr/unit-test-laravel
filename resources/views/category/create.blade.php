<x-layout>
    {{-- Top row title --}}
    <div class="flex mb-8 w-full justify-between items-center">
        <div class="prose">
            <h1>
                Add New Category
            </h1>
        </div>
    </div>
    
    <div class="flex space-x-6">
        {{-- Card --}}
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="p-4 bg-white w-3xl border border-gray-200 rounded-2xl">
                
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

                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 font-semibold text-gray-900">Complete the form</h2>
                    
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            
                            <div class="col-span-full">
                                <label for="photo" class="block text-sm/6 font-medium text-gray-900">Photo</label>
                                <div class="mt-2 flex items-center justify-center space-x-4">
                                    <div class="p-10 bg-gray-200 rounded-lg">
                                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-12 text-gray-700">
                                            <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <label for="file-upload" 
                                    class="flex px-6 py-5 w-sm justify-center rounded-lg font-bold border border-dashed border-accent hover:bg-accent hover:cursor-pointer">
                                        <div class="text-center">
                                            <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="mx-auto size-12 text-gray-600">
                                                <path d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                                            </svg>
                                            <div class="flex text-sm/6">
                                                {{-- <label for="file-upload" class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                                    <span>Upload a file</span>
                                                    <input id="file-upload" type="file" name="file-upload" class="sr-only" />
                                                </label> --}}
                                                <p class="pl-1">Klik untuk upload foto</p>
                                            </div>
                                            <p class="text-xs/5 text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                        <input id="file-upload" type="file" name="file-upload" class="sr-only" />
                                    </label>

                                    {{-- <input name="photo" 
                                        type="file" 
                                        class="@error('photo') border-error @enderror file-input w-full rounded-md" /> --}}

                                    @error('photo')
                                    <p class="mt-1 text-error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="name" class="block text-sm/6 font-medium text-gray-900">Category Name</label>
                                <div class="mt-2">
                                    <input id="name" type="text" 
                                    name="name" autocomplete="name" 
                                    class="@error('name') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />

                                    @error('name')
                                    <p class="mt-1 text-error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="tagline" class="block text-sm/6 font-medium text-gray-900">Category Tagline</label>
                                <div class="mt-2">
                                    <input id="tagline" type="text" 
                                    name="tagline" autocomplete="tagline" 
                                    class="@error('tagline') outline-red-500 @else outline-gray-300 @enderror block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />

                                    @error('tagline')
                                    <p class="mt-1 text-error">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                    

                        </div>
                    </div>
                </div>
                
                <div class="mt-6 flex items-center justify-end gap-x-2">
                    {{-- <button class="btn btn-error">Error</button> --}}

                    <label for="my_modal_6" class="btn btn-soft btn-error">
                        Discard
                    </label>
                    <button type="submit" class="btn btn-info">
                        Save
                    </button>
                </div>

            </div>
        </form>

        {{-- Description card --}}
        <div class="hidden flex-col p-4 bg-white w-md h-fit border border-gray-200 rounded-2xl lg:flex">
            <span>Desscription</span>
        </div>
    </div>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my_modal_6" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Caution</h3>
            <p class="py-4">Data akan dihapus</p>
            <div class="modal-action">
                <label for="my_modal_6" class="btn">
                    Batal
                </label>
                <a href="{{ route('categories.index') }}" class="btn btn-error">
                    Hapus
                </a>
            </div>
        </div>
        {{-- box shadow actually close button too--}}
        <label class="modal-backdrop" for="my_modal_6"></label>
    </div>

</x-layout>