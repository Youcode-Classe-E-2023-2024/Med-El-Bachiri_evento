
// filter events by category

let showEventsHere = document.getElementById('showEventsHere');
let noData = document.querySelector('#noData');

function formatDate(dateString) {
    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR', options);
}

function filterEventsByCategory(category, cat_name) {
    const categoryButtons = document.querySelectorAll('.cat_name');
    categoryButtons.forEach((button) => {
        button.classList.remove('text-red-600', 'border-2', 'border-red-600', 'p-2', 'rounded-lg');
    });
    noData.innerHTML = '';
    category.classList.add('text-red-600', 'border-2', 'border-red-600', 'p-2', 'rounded-lg');
    showEventsHere.innerHTML = '';
    fetch('/api/events/'+ category.value, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
        },

    })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((data) => {
            if (data.events.length === 0) {
                noData.innerHTML = 'No data Found, try filter by other categories';
            } else {
                data.events.forEach((event) => {
                    showEventsHere.innerHTML += `

                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 md:px-4 mb-4">
                        <div class="bg-white rounded-lg overflow-hidden border-2 relative">

                            <p class="absolute border-2 border-red-800 p-1 text-red-800 bg-white rounded-lg m-2 w-fit text-sm right-0">${cat_name}</p>

                            <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
                            <div class="p-6">
                                <h3>
                                    <a href="javascript:void(0)" class="font-semibold text-dark text-lg sm:text-xl md:text-lg lg:text-xl xl:text-lg 2xl:text-lg mb-3 block hover:text-primary">
                                        ${event.title}
                                    </a>
                                </h3>

                                <div class="flex items-center text-sm text-black">
                                    <p class="event-date">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        ${formatDate(event.date)}
                                    </p>
                                    <p class="mx-2 text-black font-bold"> - </p>
                                    <p class="event-price">
                                        <i class="fas fa-money-bill-wave mr-1"></i>
                                        DH ${event.price}
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
                                            ${event.city_name}
                                        </p>
                                    </div>
                                </div>
                                <a href="/event/${event.id}" class="inline-block mt-3 py-2 px-6 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-red-800 hover:bg-red-800 hover:text-white transition">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>

                `;
                });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}


// search events by title

const searchInput = document.getElementById('searchEvent');

searchInput.addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        search();
    }
});

function search() {
    noData.innerHTML = '';
    fetch('/api/search/event/', {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
        },
        method: 'POST',
        body: JSON.stringify({
            'event_title': searchInput.value,
        })

    })
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((data) => {
            if (data.length === 0) {
                showEventsHere.innerHTML = '';
                noData.innerHTML = 'No data Found, try update your search input ';
            } else {
                showEventsHere.innerHTML = '';
                data.forEach((event) => {
                    showEventsHere.innerHTML += `
                <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-2 md:px-4 mb-4">
                        <div class="bg-white rounded-lg overflow-hidden border-2 relative">
                            <p class="absolute border-2 border-red-800 p-1 text-red-800 bg-white rounded-lg m-2 w-fit text-sm right-0">${event.category.name}</p>
                            <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
                            <div class="p-6">
                                <h3>
                                    <a href="javascript:void(0)" class="font-semibold text-dark text-lg sm:text-xl md:text-lg lg:text-xl xl:text-lg 2xl:text-lg mb-3 block hover:text-primary">
                                        ${event.title}
                                    </a>
                                </h3>
                                <div class="flex items-center text-sm text-black">
                                    <p class="event-date">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        ${formatDate(event.date)}
                                    </p>
                                    <p class="mx-2 text-black font-bold"> - </p>
                                    <p class="event-price">
                                        <i class="fas fa-money-bill-wave mr-1"></i>
                                        DH ${event.price}
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
                                            ${event.city_name}
                                        </p>
                                    </div>
                                </div>
                                <a href="/event/${event.id}" class="inline-block mt-3 py-2 px-6 border border-[#E5E7EB] rounded-full text-base text-body-color font-medium hover:border-red-800 hover:bg-red-800 hover:text-white transition">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>

                `;
                });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}



