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