<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <style>
        * {
            scrollbar-width: 2px;
            scrollbar-color: #f1f1f1 transparent;
        }

        /* Set the thumb color */
        *::-webkit-scrollbar-thumb {
            background-color: #eeeeee;
        }

        /* Set the track color */
        *::-webkit-scrollbar-track {
            background-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-100">
@if(str_contains(url()->current(), '/dashboard') === false)
    @include('layouts.navbar')
@endif

@yield('content')

@if(str_contains(url()->current(), '/dashboard') === false)
    @include('layouts.footer')
@endif
</body>
</html>
