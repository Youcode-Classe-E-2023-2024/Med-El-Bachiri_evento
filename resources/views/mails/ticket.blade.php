<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Ticket</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url(https://images.unsplash.com/photo-1519666336592-e225a99dcd2f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1888&q=80);
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ticket-container {
            max-width: 400px;
            width: 100%;
            background-color: #3b82f6;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        .ticket-header {
            padding: 20px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .ticket-header h2 {
            margin: 0;
        }

        .ticket-details {
            padding: 20px;
        }

        .ticket-details h3 {
            margin: 0 0 10px;
        }

        .ticket-details p {
            margin: 0 0 5px;
        }

        .barcode {
            position: relative;
            left: 50%;
            transform: translateX(-90px);
            width: 0;
            height: 0;
            box-shadow: 1px 0 0 1px, 5px 0 0 1px, 10px 0 0 1px, 11px 0 0 1px, 15px 0 0 1px, 18px 0 0 1px, 22px 0 0 1px, 23px 0 0 1px, 26px 0 0 1px, 30px 0 0 1px, 35px 0 0 1px, 37px 0 0 1px, 41px 0 0 1px, 44px 0 0 1px, 47px 0 0 1px, 51px 0 0 1px, 56px 0 0 1px, 59px 0 0 1px, 64px 0 0 1px, 68px 0 0 1px, 72px 0 0 1px, 74px 0 0 1px, 77px 0 0 1px, 81px 0 0 1px, 85px 0 0 1px, 88px 0 0 1px, 92px 0 0 1px, 95px 0 0 1px, 96px 0 0 1px, 97px 0 0 1px, 101px 0 0 1px, 105px 0 0 1px, 109px 0 0 1px, 110px 0 0 1px, 113px 0 0 1px, 116px 0 0 1px, 120px 0 0 1px, 123px 0 0 1px, 127px 0 0 1px, 130px 0 0 1px, 131px 0 0 1px, 134px 0 0 1px, 135px 0 0 1px, 138px 0 0 1px, 141px 0 0 1px, 144px 0 0 1px, 147px 0 0 1px, 148px 0 0 1px, 151px 0 0 1px, 155px 0 0 1px, 158px 0 0 1px, 162px 0 0 1px, 165px 0 0 1px, 168px 0 0 1px, 173px 0 0 1px, 176px 0 0 1px, 177px 0 0 1px, 180px 0 0 1px;
        }
    </style>
</head>
<body>
<div class="ticket-container">
    <div class="ticket-header">
        <h2>Your Ticket Details</h2>
    </div>
    <div class="ticket-details">
        <h3>Ticket Code : {{ $ticket->ticket_code }}</h3>
        <h3>Event Location : {{ $event->city_name }}</h3>
        <h4>Date : {{{ $event->date }}}</h4>
        <h5>Event: {{ $event->title }}</h5>
        <p>Description : {{ $event->description }}</p>
        <p>Thank you {{ Auth::user()->name }}, for using our service!</p>
        <button style="background-color: #00bb00; padding: 5px; border-radius: 10px; color: white;"> {{ $event->price }} MAD</button>
    </div>
    <div class="barcode"></div>
</div>
</body>
</html>
