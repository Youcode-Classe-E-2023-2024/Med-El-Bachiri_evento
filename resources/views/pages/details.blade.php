@extends('layouts.app')

@section('content')

    <div class="container py-8 max-w-7xl mx-auto">
        @if(session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error !</span> {{ session('error') }}
        </div>
        @endif
        <!-- Event Title -->
        <div class="event-title text-center mb-6">
            <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
        </div>

        <!-- Event Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Event Image -->
            <div class="col-span-1 lg:col-span-2">
                <div>
                    <img src="https://gcdn.imgix.net/events/elgrandetoto-en-live-concert-a-casablanca-twenty-seven-tour.png" alt="Event Image" class="w-full rounded-lg shadow">
                </div>
                    <p class="mt-4 italic text-gray-600 text-xl">{{ $event->category->name }}</p>
                <!-- Event Description -->
                <div class="event-description mt-10">
                    <h5 class="font-semibold mb-2 text-4xl">Description de l'événement</h5>
                    <p class="text-xl">
                        {{ $event->description }}
                    </p>
                </div>
            </div>

            <!-- Event Info -->
            <div class="col-span-1">
                <div class="event-info bg-white p-6 rounded-lg shadow">
                    <img src="https://gcdn.imgix.net/providers/WhatsApp Image 2023-11-15 at 18.02.13 (1).jpeg" alt="Provider Logo" class="mx-auto mb-4">
                    <div class="text-center mb-4">
                        <h5 class="font-semibold">
                            {{ \Carbon\Carbon::parse($event->date)->format('l j M Y') }}
                        </h5>
                        <h6 class="text-sm text-red-900">{{ $event->city_name }}</h6>
                        <p>Places Available :  {{ $event->places_available }}</p>
                    </div>
                    <div class="mb-4">
                        <!-- Ticket Selection Dropdown -->
                        <div class="select-box--box">
                            <div class="select-box--container">
                                <div class="select-box--selected-item text-sm">Acceptation Method : <span class="text-red-800 font-bold">{{ ucfirst($event->acceptation_method) }} </span></div>
                                <div class="select-box--selected-item text-xs">Event Created by : <span class="text-red-800 italic">{{ $event->user->name }} </span></div>
                                <div class="select-box--arrow"><span><i aria-hidden="true" role="presentation" class="remixicon-arrow-down-s-line "></i></span></div>
                            </div>
                        </div>
                    </div>
                    <!-- Quantity Input and Buy Now Button -->
                    <div class="mb-4 flex items-center">
                        <div class="w-1/2 pr-2">
                            <div class="g-input mb-0 text-xl font-medium">
                                {{ $event->price }} MAD
                            </div>
                        </div>
                        @if($event->places_available > 0)
                        <form action="/reserve_ticket/{{ $event->id }}" method="post" class="w-1/2 pl-2">
                            @csrf
                            <input type="hidden" name="category_name" value="{{ $event->category->name }}">
                            @if(Auth::user()->id !== $event->user_id)
                            <button type="submit" class="bg-red-800 hover:opacity-80 border border-gray-500 transition-all text-white px-4 py-2 rounded">Buy Now</button>
                            @else
                            <a href="#statistics" class="bg-green-800 hover:opacity-80 border border-gray-500 transition-all text-white px-4 py-2 rounded">View Statistics</a>
                            @endif
                        </form>
                        @else
                            <p class="bg-gray-800  cursor-no-drop border border-red-800 transition-all text-white px-4 py-2 rounded">Run out of places</p>
                        @endif
                    </div>
                    <p class="text-sm text-center mb-4">Vite !! Achetez rapidement vos tickets</p>
                    <!-- Event Countdown -->
                    <div class="event-countdown flex justify-center mb-4">
                        <div class="countdown-item mr-4">
                            <span class="text-2xl font-bold">51</span>
                            <span class="block">Jours</span>
                        </div>
                        <div class="countdown-item mr-4">
                            <span class="text-2xl font-bold">07</span>
                            <span class="block">Heures</span>
                        </div>
                        <div class="countdown-item mr-4">
                            <span class="text-2xl font-bold">56</span>
                            <span class="block">Minutes</span>
                        </div>
                        <div class="countdown-item">
                            <span class="text-2xl font-bold">32</span>
                            <span class="block">Secondes</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @if($event->user_id === Auth::user()->id)


        <div class="py-8 max-w-7xl mx-auto" id="statistics" style="display: flex; justify-content: space-between;">
            <div style="width: 30%;">
                <canvas id="confirmedReservationsChart" width="400" height="400"></canvas>
            </div>
            <div style="width: 30%;">
                <canvas id="waitingForApprovalChart" width="400" height="400"></canvas>
            </div>
            <div style="width: 30%;">
                <canvas id="newReservationsChart" width="400" height="400"></canvas>
            </div>
        </div>

        <script>
            var confirmedReservationsChart = new Chart(document.getElementById('confirmedReservationsChart'), {
                type: 'bar',
                data: {
                    labels: ["Confirmed Reservations"],
                    datasets: [{
                        label: 'Confirmed Reservations',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: [{{ $eventStatistics->confirmed_reservations }}]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var waitingForApprovalChart = new Chart(document.getElementById('waitingForApprovalChart'), {
                type: 'bar',
                data: {
                    labels: ["Reservations Waiting for Approval"],
                    datasets: [{
                        label: 'Reservations Waiting for Approval',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: [{{ $eventStatistics->waiting_for_approval }}]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var newReservationsChart = new Chart(document.getElementById('newReservationsChart'), {
                type: 'line',
                data: {
                    labels: {!! json_encode($reservationsPerDay->pluck('date')) !!},
                    datasets: [{
                        label: 'New Reservations Each Day',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        data: {!! json_encode($reservationsPerDay->pluck('count')) !!}
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

    @endif

@endsection
