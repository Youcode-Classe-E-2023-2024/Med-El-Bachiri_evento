@extends('layouts.app')
@section('content')

    <section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
        <div class="container max-w-7xl mx-auto">
            @if(session('error'))
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">Error !</span> {{ session('error') }}
                </div>
            @endif
            <div class="flex flex-wrap -mx-4">
                @foreach($events as $event)
                    <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 md:px-4 mb-4">
                        <div class="bg-white rounded-lg overflow-hidden border-2">
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
                                <div class="flex justify-between items-center">
                                    <a href="/event/{{ $event->id }}" class="inline-block mt-3 p-2 border-2 border-[#E5E7EB] rounded-full text-sm text-body-color font-medium hover:border-red-800 hover:bg-red-800 hover:text-white transition">
                                        View Details
                                    </a>
                                    <a href="/event/{{ $event->id }}/edit" class="inline-block mt-3 p-2 border-2 border-[#E5E7EB] rounded-full text-sm text-body-color font-medium hover:border-red-800 hover:bg-red-800 hover:text-white transition">
                                        Edit
                                    </a>

                                    <form action="/not_valid_event/{{ $event->id }}" method="post" class="flex justify-center items-center">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="mt-2 bg-red-800 text-white rounded-full p-2 text-xs shadow-md hover:shadow-lg hover:bg-gray-100 hover:text-black hover:border-2 focus:outline-none focus:ring-2 focus:ring-red-600">Delete</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
