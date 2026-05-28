<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <div class="hidden flex-col p-3 bg-white w-xs h-screen lg:flex border-r border-gray-200">
            <!-- Username Menu -->
            <div class="flex items-center">
                <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true" class="size-14 text-gray-300">
                <path d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
                
                <div class="flex flex-col mx-2">
                    <span class="text-lg">Username</span>
                    <span class="font-light">Role</span>
                </div>
            </div>
            <div class="flex my-2 space-x-3 text-center text-sm justify-between">
                <a href="#" class="py-1 w-1/2 border border-gray-300 rounded-full hover:bg-gray-100">
                    Settings
                </a>
                <a href="#" class="py-1 w-1/2 border border-gray-300 rounded-full hover:bg-gray-100">
                    Sign Out
                </a>
            </div>

            <!-- Main Menu -->
            <div class="flex flex-col my-10 text-xl font-light text-gray-600">
                <a href="dashboard.html"
                    class="flex px-6 py-2 my-2 items-center space-x-6 rounded-xl hover:cursor-pointer hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer size-6" viewBox="0 0 16 16">
                      <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
                      <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
                    </svg>                    
                    <span>Dashboard</span>
                </a>
                
                <a href="talent_list.html" 
                class="flex px-6 py-2 my-2 items-center space-x-6 rounded-xl hover:cursor-pointer
                {{ request()->routeIs('products.edit') ? 'bg-blue-200 text-gray-950' : 'hover:text-gray-950' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people size-6" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                    </svg>
                    <span>Edit</span>
                </a>

                <a href="{{ route('products.index') }}" 
                class="flex px-6 py-2 my-2 items-center space-x-6 rounded-xl hover:cursor-pointer
                {{ request()->routeIs('products.index') ? 'bg-blue-200 text-gray-950' : 'hover:text-gray-950' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase size-6" viewBox="0 0 16 16">
                      <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                    <span>Products</span>
                </a>
            </div>
        </div>

        {{-- Content --}}
        <div class="flex flex-col px-16 py-10 bg-gray-100 w-full h-screen">
            {{-- Header --}}
            <div>

            </div>

            {{-- Main Page --}}
            <div class="p-2 bg-white rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>