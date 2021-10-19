<x-main-layout>
    <div class="col-lg-8 pb-5">

        {{-- <div class="d-flex justify-content-end pb-3">
            <div class="form-inline">
                <label class="text-muted mr-3" for="order-sort">Sort Orders</label>
                <select class="form-control" id="order-sort">
                    <option>All</option>
                    <option>Delivered</option>
                    <option>In Progress</option>
                    <option>Delayed</option>
                    <option>Canceled</option>
                </select>
            </div>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date Purchased</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($tickets as $ticket)  
                    <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">{{$ticket->id}}</a></td>
                            <td>{{$ticket->active_date}}</td>
                                @if ($ticket->status == 'end') 
                                      <td><span class="badge badge-danger m-0">End</span></td>      
                                @elseif($ticket->status == 'active')
                                     <td><span class="badge badge-info m-0">Acive</span></td>
                                @endif
                                @if ($ticket->status == 'active') 
                                <form action="{{route('tickets.end')}}" method="POST">
                                    @csrf
                                    
                                     
                                      <input type="text" hidden class="form-control" name="ticket_id" value='{{$ticket->id}}' id="">
                                    <td><button class="btn btn-sm btn-dark">End</button></td>
                                </form>
                                @endif
                    </tr>
                             @endforeach
                
            </tbody>
        </table>
    </div>
</div>

</x-main-layout>

{{-- <td><span class="badge badge-warning m-0">Delayed</span></td> --}}