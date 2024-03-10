<!-- component -->
<div class="border-b-2 shadow-md border-gray-100 pb-1">
    <div class="max-w-7xl mx-auto my-2 px-4 sm:px-6 ">
        <div class="flex flex-col md:flex-row justify-between items-center min-w-full py-2 space-y-2 md:space-x-10">

            <a class="flex-1 md:self-start" href="/">
                <div class="flex justify-start">
                    <div class="flex justify-center items-center">
                        <span class="pt-1 mx-3 whitespace-nowrap text-4xl italic font-light text-red-700 hover:text-gray-900">Evento.</span>
                    </div>
                </div>
            </a>

            <div class="flex items-center">
                @auth
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        <div class="mr-4 text-black hover:text-red-800">
                            <p class="text-sm">{{ Auth::user()->name }}</p>
                            <p class="" style="font-size: 10px;">{{ Auth::user()->email }}</p>
                        </div>
                        <svg class="w-2.5 h-2.5 ms-2.5 text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-red-100 rounded-lg shadow w-44 dark:bg-red-700 dark:divide-red-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-white" aria-labelledby="dropdownLargeButton">
                            @if(Auth::user()->getRoleNames()->first() === 'Admin')
                                <li>
                                    <a href="/dashboard" class="block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">Dashboard</a>
                                </li>
                            @endif
                            @if(Auth::user()->hasAnyRole(['Organizer', 'Admin']))
                                <li>
                                    <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">Create Event</a>
                                </li>

                                <li>
                                    <a href="/my/events" class="block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">My Events</a>
                                </li>
                                <li>
                                    <a onclick="notificationHandler(false)" class="block px-4 py-2 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">Reservations</a>
                                </li>
                            @endif

                            {{-- <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li> --}}
                        </ul>
                        <div class="py-1">
                            <form action="/logout" method="post" class="block px-4 py-2 text-sm text-white hover:bg-red-100 dark:hover:bg-red-600 dark:text-gray-200 dark:hover:text-white">
                                @csrf
                                <button type="submit">
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a class="whitespace-nowrap text-base text-gray-500 hover:text-gray-900" href="/login">
                        <img class="m-1 inline-block h-5 w-5 rounded-full ring-2 ring-white" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="">
                        Sign in
                    </a>
                @endauth
            </div>

        </div>
    </div>
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

<div class="hidden w-full h-full bg-gray-800 bg-opacity-90 top-0 overflow-y-auto overflow-x-hidden fixed sticky-0" id="chec-div">
    <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-0 transition ease-in-out duration-700" id="notification">
        <div class="2xl:w-4/12 bg-gray-50 h-screen overflow-y-auto p-8 absolute right-0">
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-2xl font-semibold leading-6 text-gray-800">Reservations</p>
                <button role="button" aria-label="close modal" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 rounded-md cursor-pointer" onclick="notificationHandler(false)">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="#4B5563" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            @auth
            @if(ticketsNotReserved()->isEmpty())
                <p class="text-red-800 mt-10"> No reservation found !!!</p>
            @else
            @foreach(ticketsNotReserved() as $ticket)
                <div class="w-full p-3 mt-4 bg-white rounded shadow flex flex-shrink-0">
                <div tabindex="0" aria-label="group icon" role="img" class="focus:outline-none w-8 h-8 border rounded-full border-gray-200 flex flex-shrink-0 items-center justify-center">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.33325 14.6667C1.33325 13.2522 1.89516 11.8956 2.89535 10.8954C3.89554 9.89523 5.2521 9.33333 6.66659 9.33333C8.08107 9.33333 9.43763 9.89523 10.4378 10.8954C11.438 11.8956 11.9999 13.2522 11.9999 14.6667H1.33325ZM6.66659 8.66666C4.45659 8.66666 2.66659 6.87666 2.66659 4.66666C2.66659 2.45666 4.45659 0.666664 6.66659 0.666664C8.87659 0.666664 10.6666 2.45666 10.6666 4.66666C10.6666 6.87666 8.87659 8.66666 6.66659 8.66666ZM11.5753 10.1553C12.595 10.4174 13.5061 10.9946 14.1788 11.8046C14.8515 12.6145 15.2515 13.6161 15.3219 14.6667H13.3333C13.3333 12.9267 12.6666 11.3427 11.5753 10.1553ZM10.2266 8.638C10.7852 8.13831 11.232 7.52622 11.5376 6.84183C11.8432 6.15743 12.0008 5.41619 11.9999 4.66666C12.0013 3.75564 11.7683 2.85958 11.3233 2.06466C12.0783 2.21639 12.7576 2.62491 13.2456 3.2208C13.7335 3.81668 14.0001 4.56315 13.9999 5.33333C14.0001 5.80831 13.8987 6.27784 13.7027 6.71045C13.5066 7.14306 13.2203 7.52876 12.863 7.84169C12.5056 8.15463 12.0856 8.38757 11.6309 8.52491C11.1762 8.66224 10.6974 8.7008 10.2266 8.638Z"
                            fill="#047857"
                        />
                    </svg>
                </div>
                <div class="pl-3 w-full">
                    <div class="flex items-center justify-between w-full">
                        <p tabindex="0" class="focus:outline-none text-sm leading-none"><span class="text-indigo-700">{{ $ticket->user->name }}</span> reserved :  <span class="text-indigo-700">{{ $ticket->event->title }}</span></p>
                        <div tabindex="0" aria-label="close icon" role="button" class="flex pt-2">

                            <form action="/ticket/{{ $ticket->id }}/approve" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit">
                                    <svg class="mr-2 hover:opacity-60" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 17.59L4.41 13L3 14.41L9 20.41L21 8.41L19.59 7L9 17.59Z" fill="#1EAE5D"/>
                                    </svg>
                                </button>
                            </form>

                            <form action="/ticket/{{ $ticket->id }}/deny" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg class="hover:opacity-60" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13.41 12L18 16.59L16.59 18L12 13.41L7.41 18L6 16.59L10.59 12L6 7.41L7.41 6L12 10.59L16.59 6L18 7.41L13.41 12Z" fill="#FF5252"/>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                    <p tabindex="0" class="focus:outline-none text-xs leading-3 pt-1 text-gray-500">{{ $ticket->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
            @endif
            @endauth

        </div>
    </div>
</div>
<script>
    let notification = document.getElementById("notification");
    let checdiv = document.getElementById("chec-div");
    let flag3 = false;
    const notificationHandler = () => {
        if (!flag3) {
            notification.classList.add("translate-x-full");
            notification.classList.remove("translate-x-0");
            setTimeout(function () {
                checdiv.classList.add("hidden");
            }, 1000);
            flag3 = true;
        } else {
            setTimeout(function () {
                notification.classList.remove("translate-x-full");
                notification.classList.add("translate-x-0");
            }, 1000);
            checdiv.classList.remove("hidden");
            document.getElementById('dropdownNavbar').classList.add('hidden');
            flag3 = false;
        }
    };
</script>
