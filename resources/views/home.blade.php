@extends('layouts.app')
@section('content')

    <section class="pt-20 lg:pt-[0px] pb-10 lg:pb-20 bg-[#F3F4F6]">

        <nav id="bar" class="flex  max-w-7xl mx-auto">
            <div style="overflow-x: auto; white-space: nowrap;" class=" flex  md:space-y-0 text-center text-gray-500">
                <div class="flex">
                    @foreach(\App\Models\Category::all() as $cat)
                        <button onclick="filterEventsByCategory(this, '{{ $cat->name }}')" value="{{ $cat->id }}" class="cat_name hover:opacity-80 text-gray-700 hover:text-red-700 py-1" style="margin: 30px 30px;flex: 0 0 auto;">{{ $cat->name }}</button>
                    @endforeach
                </div>
            </div>
        </nav>
        <div class="max-w-7xl mx-auto mb-6">
            <input id="searchEvent" class="leading-none h-fit focus:outline-none border-b-2 hover:border-b-3 border-red-800  w-5/6  mx-auto md:w-1/4 md:mt-0 md:mx-0 " type="text" placeholder=" Searsh..">
        </div>


        <div class="container max-w-7xl mx-auto">
            @if(session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Error !</span> {{ session('error') }}
                </div>
            @endif
                <p id="noData" class="text-red-800"></p>
                <div class="flex flex-wrap -mx-4" id="showEventsHere">
                @if($events->isEmpty())
                    <p class="">no events found !</p>
                @else
                @foreach($events as $event)
                    <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 md:px-4 mb-4">
                        <div class="bg-white rounded-lg overflow-hidden border-2 relative">
                            @auth
                            @if(Auth::user()->id === $event->user_id)
                                <p class="absolute border-2 border-red-800 p-1 bg-red-900 opacity-80 text-white rounded-lg m-2 w-fit text-sm">MINE</p>
                            @endif
                            @endauth
                            <p class="absolute border-2 border-red-800 p-1 text-red-800 bg-white rounded-lg m-2 w-fit text-sm right-0">{{ $event->category->name }}</p>

                            <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
                            <div class="p-6">
                                <h3>
                                    <a href="javascript:void(0)" class="font-semibold text-dark text-lg sm:text-xl md:text-lg lg:text-xl xl:text-lg 2xl:text-lg mb-3 block hover:text-primary">
                                        {{ $event->title }}
                                    </a>
                                </h3>

                                <div class="flex items-center text-sm text-black">
                                    <p class="event-date">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($event->date)->format('l j M Y') }}
                                    </p>
                                    <p class="mx-2 text-black font-bold"> - </p>
                                    <p class="event-price">
                                        <i class="fas fa-money-bill-wave mr-1"></i>
                                        DH {{ $event->price }}
                                    </p>
                                </div>
                                <div class="w-full flex items-center mt-2">
                                    <div class="w-6 text-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="{1.5}" stroke="currentColor" className="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                    </div>
                                    <div class="text-red-800">
                                        <p class="event-location">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            {{ $event->city_name }}
                                        </p>
                                    </div>
                                </div>
                                <a href="/event/{{ $event->id }}" class="inline-block mt-3 py-2 px-6 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-red-800 hover:bg-red-800 hover:text-white transition">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector('.categories-container');
            const categories = document.querySelectorAll('.cat_name');
            const categoryWidth = categories[0].offsetWidth;
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

    <script src="{{ url('js/FilterAndSearch.js') }}"></script>

@endsection
