<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            padding: 0;
            margin: 0;

        }
        .con{
            /* background: #eee; */
          

        }
        form{
            
            background: #fff;
        }
        .con *{
            margin: 10px;
            
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
   <div class="con container">
       
           
            <form class="container" method="POST" action="{{route('tickets.store')}}">
                <label for="">* check your services</label>
                <select class="form-control" name="services_id" id="">
                    @foreach ($services as $id=>$name)
                    <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
                @csrf
                <button class="btn btn-primary">Tacke Ticket</button>
            </form>
         
        <div style="width:50%; margin:50px auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#ticket Number</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">time request</th>
                    <th scope="col">time expected serve</th>
                    <th scope="col">time service</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <th scope="row">{{$ticket->id}}</th>
                        <td>{{App\Models\Ticket::serviceName($ticket->services_id)}}</td>
                        <td>{{$ticket->created_at}}</td>
                        <td>{{$ticket->expected_time}}</td>
                        <td>{{$ticket->active_date}}</td>
                    </tr>
                 @endforeach 
                    
                </tbody>
                </table>
        </div>
    </div>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js/text.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
<script src="{{asset('js/app.js')}}"></script>
</html>