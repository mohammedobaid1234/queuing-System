<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class TicketController extends Controller
{
    // protected $name;

    // public function __construct()
    // {
    //     $this->name ='service'. Auth::id();
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = collect([]);
        $items = $this->all('service');
        foreach($items as $item){
            $ticket= Ticket::find($item);
            $tickets->push($ticket);
        }
        $services = Service::pluck('name','id');
        // return $tickets;
        // $orders = Ticket::where()
        // }
        return view('ticket', [
            'services' => $services,
            'tickets' => $tickets
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $this->all('service-20');
        $ticket = Ticket::Create($request->all());
        $name = 'service-'. $ticket->id;
        // return $name;
        // return $this->all($name);
        $this->add($ticket->id, $name);
        $this->add($ticket->id, 'service');
        return redirect()->back();
    }

    public function all($name)
    {
        // return $name;
     $items= Cookie::get($name);
        if($items){
            return unserialize($items);
        }
        return [];
    }
    
    public function serviceCookie()
    {
        // return $name;
     $items= Cookie::get('service');
        if($items){
            return unserialize($items);
        }
        return [];
    }
    public function add($item ,$name ,$qty = 1)
    {
        $items = $this->all($name);
    
        $items [] = $item;
        Cookie::queue($name, serialize($items) , 24*60);
    }

    public function end(Request $request)
    {
        // return $request;
        $ticket = Ticket::findOrFail($request->ticket_id);
        $ticket->update([
            'status' => 'end'
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
