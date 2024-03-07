<!-- component -->
<div class="border-b-2 shadow-md border-gray-100 pb-1">
    <div class="max-w-7xl mx-auto my-2 px-4 sm:px-6 ">
        <div
            class="flex flex-col-reverse md:flex-row min-w-full py-2 space-y-2 justify-center md:justify-between  md:space-x-10">
            <input id="search" class="flex leading-none focus:outline-none border-b-2 hover:border-b-3 border-red-800  w-5/6 mt-12 mx-auto md:w-1/4 md:mt-0 md:mx-0 " type="text" placeholder=" Searsh.."><a
                class="flex-1 md:self-start" href="/">
                <div class="flex justify-center ">
                    <div class="flex justify-center items-center">
                        <span class=" pt-1 mx-3 whitespace-nowrap text-4xl italic font-light text-red-700 hover:text-gray-900">Evento.</span>
                    </div>
                </div>
            </a>
            <div class="flex justify-around">
                <div class="flex justify-end ">
                    @auth
                        @if(Auth::user()->hasAnyRole(['Organizer', 'Admin']))
                        <main class=" w-full place-items-center bg-gray-100">
                            <!-- component -->
                            <button
                                data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="group relative px-4 py-1 overflow-hidden rounded-lg bg-white text-lg shadow"
                            >
                                <div class="absolute inset-0 w-3 bg-red-800 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                <span class="relative text-lg text-black group-hover:text-white">Create Event</span>
                            </button>
                        </main>
                        @endif
                        @if(Auth::user()->getRoleNames()->first() === 'Admin')
                            <main class=" w-full place-items-center bg-gray-100">
                                <!-- component -->
                                <button
                                    onclick="window.location.href = '/dashboard';"
                                    class="group relative px-4 py-1 overflow-hidden rounded-lg bg-white text-lg shadow"
                                >
                                    <div class="absolute inset-0 w-3 bg-gray-800 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                    <span class="relative text-lg text-black group-hover:text-white">Dashboard</span>
                                </button>
                            </main>
                        @endif
                        <form
                            class=" whitespace-nowrap text-base  text-gray-500 hover:text-gray-900"
                            action="/logout"
                            method="post" >
                            @csrf
                            <img class="m-1 inline-block h-5 w-5 rounded-full ring-2 ring-white" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="">
                            <button type="submit">logout</button>
                        </form>
                    @else
                       <a
                           class=" whitespace-nowrap text-base  text-gray-500 hover:text-gray-900"
                           href="/login">
                               <img class="m-1 inline-block h-5 w-5 rounded-full ring-2 ring-white" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="">
                               Sign in
                       </a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
    <nav id="bar" class="flex justify-center max-w-7xl mx-auto">
        <div style="overflow-x: auto; white-space: nowrap;" class=" flex flex-col md:flex-row justify-center md:space-y-0 text-center text-gray-500">
            <div class="flex">
                @foreach(\App\Models\Category::all() as $cat)
                    <button value="{{ $cat->name }}" class="cat_name hover:opacity-80" style="margin: 30px 30px;flex: 0 0 auto;">{{ $cat->name }}</button>
                @endforeach
            </div>
        </div>
    </nav>
</div>

@if(session('success'))
    <div class="max-w-7xl mx-auto p-4 mt-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success !</span> {{ session('success') }}
    </div>
@endif

{{-- create event form --}}
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Event
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="/event/create" method="post">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Type event name" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="$2999" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                            @foreach(\App\Models\Category::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Description</label>
                        <textarea name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Write event description here"></textarea>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                        <select name="city_name" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                            @foreach(\App\Models\City::all() as $city)
                                <option value="{{ $city->name }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <input type="date" name="date" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="places_available" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Places Available</label>
                        <input type="number" name="places_available" id="places_available" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="99" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acceptation Method</label>
                        <select id="method" name="acceptation_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
                            <option value="auto">Auto</option>
                            <option value="manual">Manual</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-red-800 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-800 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new Event
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector('.categories-container');
        const wrapper = document.querySelector('.category-wrapper');
        const categories = document.querySelectorAll('.cat_name');
        const categoryWidth = categories[0].offsetWidth;
        const visibleCategories = 8;
        const totalCategories = categories.length;

        const containerWidth = categoryWidth * totalCategories;

        container.style.width = containerWidth + 'px';

        container.addEventListener('wheel', function(event) {
            if (event.deltaY > 0) {
                container.scrollLeft += categoryWidth;
            } else {
                container.scrollLeft -= categoryWidth;
            }
        });
    });
</script>
