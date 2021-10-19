{{-- {{$ticket_id}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <form  method="POST" action="{{route('users.store')}}">
        @csrf
        <button class="btn btn-primary">get Clint</button>
    </form>
    @if (isset($ticket_id) && $ticket_id != 0)
        
    <div> last Ticket number # {{$ticket_id}}</div>
    @endif
</body>
</html>