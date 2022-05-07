<?php
  
namespace App\Http\Controllers;
  
use App\Models\tickets;
use Illuminate\Http\Request;
  
class ticketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = tickets::latest()->paginate(5);
      
        return view('tickets.home',compact('tickets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required',
            'question' => 'required',
           'status' => 'required',
        ]);
      
        tickets::create($request->all());
        return redirect()->route('home')
                        ->with('success',' tickets created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(  $ticket_id)
    {
        $ticket=tickets::findOrFail($ticket_id);

        // return view('tickets.edit',compact('tickets'));
        return view('tickets.show',[
            'ticket'=> $ticket]);
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit( $ticket_id)
    {

        $ticket=tickets::findOrFail($ticket_id);

        // return view('tickets.edit',compact('tickets'));
        return view('tickets.edit',[
            'ticket'=> $ticket]);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'categorie' => 'required',
            'question' => 'required',
           'status' => 'required',
        ]);
      
        $ticket=tickets::findOrFail($id);
        $ticket->categorie=$request->input('categorie');
        $ticket->question=$request->input('question');
        $ticket->status=$request->input('status');
        $ticket->save();
        return redirect()->route('home');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(tickets $tickets)
    {
        $tickets->delete();
       
        return redirect()->route('home');
    }
    
}