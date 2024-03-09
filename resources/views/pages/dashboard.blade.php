@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-50/50">
        <aside class="bg-gradient-to-br from-gray-800 to-gray-900 -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0">
            <div class="relative border-b border-white/20">
                <div class="flex items-center gap-4 py-6 px-8">
                    <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white">{{ auth()->user()->name }}</h6>
                </div>
                <div class="flex items-center gap-4  px-8">
                    <h6 class="block antialiased tracking-normal font-sans text-sm font-semibold leading-relaxed text-green-400">{{ auth()->user()->getRoleNames('name')[0] }}</h6>
                </div>
                <div class="flex items-center gap-4 py-2 px-8">
                    <p class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-400 text-sm">{{ auth()->user()->email }}</p>
                </div>

                <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden" type="button">
                    <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                    </span>
                </button>
            </div>
            <div class="m-4">
                <ul class="mb-4 flex flex-col gap-1">
                    <li>
                        <div aria-current="page" class="active">
                            <button onclick="showDiv('div1', this)" class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
                                    <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
                                </svg>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Home</p>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="">
                            <button onclick="showDiv('div2', this)" class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Categories</p>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="">
                            <button onclick="showDiv('div3', this)" class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Event Validation</p>
                            </button>
                        </div>
                    </li>
                    <li>
                        <div class="">
                            <a href="/" class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Home</p>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="">
                            <button onclick="showDiv('div4', this)" class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">Manage Users</p>
                            </button>
                        </div>
                    </li>
                </ul>
                <ul class="mb-4 flex flex-col gap-1">

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-red-400 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize bg-red-600" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-5 h-5 text-inherit">
                                    <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">log out</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
        @if(session('success'))
            <p class="text-green-900 border-2 p-2 border-green-800 rounded-lg bg-green-300 pl-96" >{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class="text-red-900 border-2 p-2 border-red-800 rounded-lg bg-red-300 pl-96" >{{ session('error') }}</p>
        @endif

        <!-- DIV 1 -->
        <div id="div1" class="p-4 xl:ml-80">
            @if(true)
                <nav class="block w-full max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1">
                    <div class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center">
                        <div class="capitalize">
                            <nav aria-label="breadcrumb" class="w-max">
                                <ol class="flex flex-wrap items-center w-full bg-opacity-60 rounded-md bg-transparent p-0 transition-all">
                                    <li class="flex items-center text-blue-gray-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-light-blue-500">
                                        <a href="#">
                                            <p class="block antialiased font-sans text-sm leading-normal text-blue-900 font-normal opacity-50 transition-all hover:text-blue-500 hover:opacity-100">dashboard</p>
                                        </a>
                                        <span class="text-gray-500 text-sm antialiased font-sans font-normal leading-normal mx-2 pointer-events-none select-none">/</span>
                                    </li>
                                    <li class="flex items-center text-blue-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-blue-500">
                                        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">home</p>
                                    </li>
                                </ol>
                            </nav>
                            <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">home</h6>
                        </div>
                        <div class="flex items-center">

            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" stroke-width="3" class="h-6 w-6 text-blue-gray-500">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
              </svg>
            </span>
                            </button>
                            <a href="#">
                                <button class="middle none font-sans font-bold center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 hidden items-center gap-1 px-4 xl:flex" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-blue-gray-500">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                                    </svg>{{ Auth::user()->name }}</button>
                                <button class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30 grid xl:hidden" type="button">
              <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-blue-gray-500">
                  <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                </svg>
              </span>
                                </button>
                            </a>
                            <button class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-blue-gray-500">
                <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd"></path>
              </svg>
            </span>
                            </button>
                            <button aria-expanded="false" aria-haspopup="menu" id=":r2:" class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-blue-gray-500">
                <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd"></path>
              </svg>
            </span>
                            </button>
                        </div>
                    </div>
                </nav>
                <div class="mt-12">
                    <div class="mb-12 grid gap-y-10 gap-x-6 md:grid-cols-2 xl:grid-cols-4">
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-blue-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                                    <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                                    <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd"></path>
                                    <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"></path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total Templates</p>
                                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">322</h4>
                            </div>
                        </div>
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-pink-600 to-pink-400 text-white shadow-pink-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total Subscribers</p>
                                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">122</h4>
                            </div>

                        </div>
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-green-600 to-green-400 text-white shadow-green-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                                    <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">All Users</p>
                                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">44</h4>
                            </div>

                        </div>
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md">
                            <div class="bg-clip-border mx-4 rounded-xl overflow-hidden bg-gradient-to-tr from-orange-600 to-orange-400 text-white shadow-orange-500/40 shadow-lg absolute -mt-4 grid h-16 w-16 place-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-6 h-6 text-white">
                                    <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                                </svg>
                            </div>
                            <div class="p-4 text-right">
                                <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600">Total Media Uploaded</p>
                                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">443</h4>
                            </div>

                        </div>
                    </div>

                    <div class="mb-4 grid grid-cols-1 gap-6 xl:grid-cols-3">
                        <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md overflow-hidden xl:col-span-2">
                            <div class="relative bg-clip-border rounded-xl overflow-hidden bg-transparent text-gray-700 shadow-none m-0 flex items-center justify-between p-6">
                                <div>
                                    <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-blue-gray-900 mb-1">Projects</h6>
                                    <p class="antialiased font-sans text-sm leading-normal flex items-center gap-1 font-normal text-blue-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true" class="h-4 w-4 text-blue-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
                                        </svg>
                                        <strong>30 done</strong> this month
                                    </p>
                                </div>
                                <button aria-expanded="false" aria-haspopup="menu" id=":r5:" class="relative middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
              <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currenColor" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true" class="h-6 w-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z"></path>
                </svg>
              </span>
                                </button>
                            </div>
                            <div class="p-6 overflow-x-scroll px-0 pt-0 pb-2">
                                <table class="w-full min-w-[640px] table-auto">
                                    <thead>
                                    <tr>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">companies</p>
                                        </th>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">budget</p>
                                        </th>
                                        <th class="border-b border-blue-gray-50 py-3 px-6 text-left">
                                            <p class="block antialiased font-sans text-[11px] font-medium uppercase text-blue-gray-400">completion</p>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Material XD Version</p>
                                            </div>
                                        </td>

                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">$14,000</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">60%</p>
                                                <div class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                    <div class="flex justify-center items-center h-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Add Progress Track</p>
                                            </div>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">$3,000</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">10%</p>
                                                <div class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                    <div class="flex justify-center items-center h-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white" style="width: 10%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Fix Platform Errors</p>
                                            </div>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">Not set</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">100%</p>
                                                <div class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                    <div class="flex justify-center items-center h-full bg-gradient-to-tr from-green-600 to-green-400 text-white" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Launch our Mobile App</p>
                                            </div>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">$20,500</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">100%</p>
                                                <div class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                    <div class="flex justify-center items-center h-full bg-gradient-to-tr from-green-600 to-green-400 text-white" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="flex items-center gap-4">
                                                <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-bold">Add the New Pricing Page</p>
                                            </div>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <p class="block antialiased font-sans text-xs font-medium text-blue-gray-600">$500</p>
                                        </td>
                                        <td class="py-3 px-5 border-b border-blue-gray-50">
                                            <div class="w-10/12">
                                                <p class="antialiased font-sans mb-1 block text-xs font-medium text-blue-gray-600">25%</p>
                                                <div class="flex flex-start bg-blue-gray-50 overflow-hidden w-full rounded-sm font-sans text-xs font-medium h-1">
                                                    <div class="flex justify-center items-center h-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white" style="width: 25%;"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-blue-gray-600">
                    <footer class="py-2">
                        <div class="flex w-full flex-wrap items-center justify-center gap-6 px-2 md:justify-between">
                            <p class="block antialiased font-sans text-sm leading-normal font-normal text-inherit">© 2023, made with <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="-mt-0.5 inline-block h-3.5 w-3.5">
                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"></path>
                                </svg> by <a href="https://www.creative-tim.com" target="_blank" class="transition-colors hover:text-blue-500">Creative Tim</a> for a better web. </p>
                            <ul class="flex items-center gap-4">
                                <li>
                                    <a href="https://www.creative-tim.com" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Creative Tim</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/presentation" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">About Us</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/blog" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">Blog</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/license" target="_blank" class="block antialiased font-sans text-sm leading-normal py-0.5 px-1 font-normal text-inherit transition-colors hover:text-blue-500">License</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                </div>
            @else
                <h1 class="text-red-600 text-xl border-2 border-red-800 p-6 rounded-lg mx-auto">Err 1 :you don't have this permission</h1>
            @endif
        </div>


        <!-- DIV 2 -->
        <div id="div2" class="p-4 xl:ml-80">
            <div class="capitalize mt-1 mb-16">
                <nav aria-label="breadcrumb" class="w-max">
                    <ol class="flex flex-wrap items-center w-full bg-opacity-60 rounded-md bg-transparent p-0 transition-all">
                        <li class="flex items-center text-blue-gray-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-light-blue-500">
                            <a href="#">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-900 font-normal opacity-50 transition-all hover:text-blue-500 hover:opacity-100">dashboard</p>
                            </a>
                            <span class="text-gray-500 text-sm antialiased font-sans font-normal leading-normal mx-2 pointer-events-none select-none">/</span>
                        </li>
                        <li class="flex items-center text-blue-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-blue-500">
                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">categories</p>
                        </li>
                    </ol>
                </nav>
                <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">categories</h6>
            </div>

            <button data-modal-target="category-modal" data-modal-toggle="category-modal" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-blue-800 mb-2" type="button">
                Create Category
            </button>

            <div id="category-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Create Category
                            </h3>
                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="category-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="/category/create" method="post">
                                @csrf
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Comedy" required />
                                </div>

                                <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Create
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- categories table here   -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Category ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Category::all() as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $category->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $category->name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a
                                    data-modal-target="edit-category-modal"
                                    data-modal-toggle="edit-category-modal"
                                    data-category-id="{{ $category->id }}"
                                    data-category-name="{{ $category->name }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Edit
                                </a>
                                <form action="category/{{ $category->id }}/destroy" method="post" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            {{--                                edit category form --}}
            <div id="edit-category-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Update Category
                            </h3>
                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-category-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="/category/update" class="space-y-4" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="category_id" id="edit-category-id">
                                <div>
                                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                                    <input type="text" name="category_name" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Comedy" required />
                                </div>
                                <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Update Category
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--                                edn edit category form --}}

        </div>


        <!-- DIV 3 -->
        <div id="div3" class="p-4 xl:ml-80">
        {{-- litt nav strt--}}
            <div class="capitalize mt-1 mb-16">
                <nav aria-label="breadcrumb" class="w-max">
                    <ol class="flex flex-wrap items-center w-full bg-opacity-60 rounded-md bg-transparent p-0 transition-all">
                        <li class="flex items-center text-blue-gray-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-light-blue-500">
                            <a href="#">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-900 font-normal opacity-50 transition-all hover:text-blue-500 hover:opacity-100">dashboard</p>
                            </a>
                            <span class="text-gray-500 text-sm antialiased font-sans font-normal leading-normal mx-2 pointer-events-none select-none">/</span>
                        </li>
                        <li class="flex items-center text-blue-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-blue-500">
                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">event validation</p>
                        </li>
                    </ol>
                </nav>
                <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">event validation</h6>
            </div>
            {{--  litt nav end --}}

            <div class="holder mx-auto w-10/12 grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
                @foreach($events as $event)
                    <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                        <img class="w-full" src="https://i.ytimg.com/vi/qew27BNl7io/maxresdefault.jpg" alt="" />
                        <div class="badge absolute top-0 right-0 bg-red-500 m-1 text-gray-200 p-1 px-2 text-xs font-bold rounded">{{ $event->category->name }}</div>
                        <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
                        <span class="mr-1 p-1 px-2 font-bold">
                            <span class="text-red-800"> {{ $event->places_available }}</span>
                            place
                        </span>
                                        <span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">
                            <span class="text-red-800">{{ $event->price }} </span>
                            MAD
                        </span>
                                        <span class="mr-1 p-1 px-2 font-bold border-l border-gray-400">
                            <span class="text-red-800"> {{ ucfirst($event->acceptation_method) }} </span>
                            Acceptation
                        </span>
                        </div>
                        <div class="desc p-4 text-gray-800">
                            <a href="https://www.youtube.com/watch?v=dvqT-E74Qlo" target="_new" class="title font-bold block cursor-pointer hover:underline">
                                {{ $event->title }}
                            </a>
                            <div class="w-full flex items-center my-2">
                                <div class="w-4 text-red-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="{1.5}" stroke="currentColor" className="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                </div>
                                <div class="text-red-800">
                                    <p class="event-location" style="font-size: 10px;">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $event->city_name }}
                                    </p>
                                </div>
                            </div>
                            <a href="https://www.youtube.com/user/sam14319" target="_new" class="badge bg-indigo-500 text-blue-100 rounded px-1 text-xs font-bold cursor-pointer">@ {{ $event->user->name }}</a>
                            <span class="description text-sm block py-2 border-gray-400 mb-2">{{ strlen($event->description) > 100 ? substr($event->description, 0, 100) . '...' : $event->description }}</span>

                            <!-- Buttons -->
                            <div class="flex justify-between mt-4">
                                <form action="/valid_event/{{ $event->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="hover:border hover:border-black transition-all btn-valid bg-green-500 text-white px-4 py-1 rounded">Valid</button>
                                </form>
                                <form action="/not_valid_event/{{ $event->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="hover:border hover:border-black transition-all btn-not-valid bg-red-500 text-white px-4 py-1 rounded">Not Valid</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(count($events) === 0)
                    <h1 class="text-red-800">No events was created yet !!!</h1>
                @endif
            </div>

        </div>

        <!-- DIV 4 -->
        <div id="div4" class="p-4 xl:ml-80 bg-white h-screen overflow-hidden">
            <div class="capitalize mt-1 mb-16">
                <nav aria-label="breadcrumb" class="w-max">
                    <ol class="flex flex-wrap items-center w-full bg-opacity-60 rounded-md bg-transparent p-0 transition-all">
                        <li class="flex items-center text-blue-gray-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-light-blue-500">
                            <a href="#">
                                <p class="block antialiased font-sans text-sm leading-normal text-blue-900 font-normal opacity-50 transition-all hover:text-blue-500 hover:opacity-100">dashboard</p>
                            </a>
                            <span class="text-gray-500 text-sm antialiased font-sans font-normal leading-normal mx-2 pointer-events-none select-none">/</span>
                        </li>
                        <li class="flex items-center text-blue-900 antialiased font-sans text-sm font-normal leading-normal cursor-pointer transition-colors duration-300 hover:text-blue-500">
                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">Manage Users</p>
                        </li>
                    </ol>
                </nav>
                <h6 class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-gray-900">Manage Users</h6>
            </div>
            <div class="flex items-center justify-center">
                <div class="col-span-12">
                    <div class="overflow-y-auto max-h-full">
                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead class="bg-gray-800 text-gray-500">
                            <tr>
                                <th class="p-3">ID</th>
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Account Created At</th>
                                <th class="p-3">Roles</th>
                                <th class="p-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\User::all() as $single_user)
                                <tr class="bg-gray-800">
                                    <td class="p-3">{{ $single_user->id }}</td>
                                    <td class="p-3">{{ $single_user->name }}</td>
                                    <td class="p-3">{{ $single_user->email }}</td>
                                    <td class="p-3">{{ $single_user->created_at }}</td>
                                    <td class="p-3">
                                        <form action="/update_user_role/{{ $single_user->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label for="role"></label>
                                            <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                    <option value="{{ $role->name }}" {{ $role->name === $single_user->getRoleNames()->first() ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="text-gray-400 hover:text-gray-100 mr-2">
                                                <i class="material-icons-outlined text-base text-green-400 px-2 hover:underline">save</i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="p-3">
                                        <form action="/delete_user/{{ $single_user->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600">
                                                <i class="material-icons-outlined text-base px-2">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        function showDiv(divId, button) {
            var divs = document.querySelectorAll('div[id^="div"]');
            divs.forEach(function(div) {
                if (div.id === divId) {
                    div.style.display = 'block';
                } else {
                    div.style.display = 'none';
                }
            });

            var buttons = document.querySelectorAll('button');
            buttons.forEach(function(btn) {
                btn.style.backgroundColor = '';
            });

            button.style.backgroundColor = 'blue';
        }

        document.addEventListener('DOMContentLoaded', function () {
            const editLinks = document.querySelectorAll('[data-modal-toggle="edit-category-modal"]');

            editLinks.forEach(function (editLink) {
                editLink.addEventListener('click', function (event) {
                    event.preventDefault();

                    const categoryId = editLink.dataset.categoryId;
                    const categoryName = editLink.dataset.categoryName;

                    const categoryIdInput = document.getElementById('edit-category-id');
                    categoryIdInput.value = categoryId;

                    const categoryNameInput = document.getElementById('category_name');
                    categoryNameInput.value = categoryName;

                    const modalTarget = editLink.dataset.modalTarget;
                    const modal = document.getElementById(modalTarget);
                    modal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                });
            });
        });

    </script>
@endsection

