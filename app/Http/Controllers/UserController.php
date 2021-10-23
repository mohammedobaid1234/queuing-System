<?php

namespace App\Http\Controllers;

use App\Events\Ticket as EventsTicket;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tickets =  Ticket::where('user_id', Auth::id())->get();
        $thickets_count = $tickets->count();
        
        return view('components.content',[
            'tickets' => $tickets,
            'count' => $thickets_count
            
        ]);
        
    }
    public function store(Request $request)
    {
                
                // return $user;
                // dd($request);
                $newTicket = Ticket::where('services_id',Auth::user()->services_id)
                ->where('status', 'pending')
                ->first();
                // return $newTicket;
                if($newTicket){
                    $newTicket->update([
                        'status' => 'active',
                        'user_id' => Auth::id(),
                        'active_date' => date('Y-m-d H:i:s')
                    ]);
                    
                    
                    event( new EventsTicket($newTicket->id));
                }
                // return $newTicket->id;
                return redirect()->route('users.index');
    }
}
