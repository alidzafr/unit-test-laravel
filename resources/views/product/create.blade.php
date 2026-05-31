<x-layout>
    <div class="p-8 bg-white w-fit border border-gray-200 rounded-2xl">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <h3 class="mb-2 text-lg font-bold">Hello!</h3>
            <fieldset class="fieldset mb-2">
                <legend class="fieldset-legend">Name</legend>
                <input 
                    name="name" type="text" 
                    class="input w-md" placeholder="Type here"
                />
            {{-- <p class="label">Optional</p> --}}
            </fieldset>

            <fieldset class="fieldset mb-2">
                <legend class="fieldset-legend">Price</legend>
                <input 
                    name="price" type="text" 
                    class="input w-md" placeholder="Type here"
                />
            {{-- <p class="label">Optional</p> --}}
            </fieldset>
            <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
    </div>

    <div class="mt-6">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Login</legend>

            <label class="label">Email</label>
            <input type="email" class="input" placeholder="Email" />

            <label class="label">Password</label>
            <input type="password" class="input" placeholder="Password" />

            <button class="btn btn-neutral mt-4">Login</button>
        </fieldset>
    </div>
</x-layout>