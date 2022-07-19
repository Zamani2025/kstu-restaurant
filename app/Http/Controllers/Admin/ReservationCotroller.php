<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class ReservationCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view("admin.reservation.index", compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tables = Table::where("status", TableStatus::Available)->get();
        return view("admin.reservation.create", compact("tables"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with("warning_message", "Please choose the table based on guests");
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if($res->res_date->format('Y-m-d') == $request_date->format("Y-m-d")){
                return back()->with("warning_message", "This table is reserved for this date.");

            }
        }
        Reservation::create($request->validated());

        Alert::toast('Reservation successfully created', 'success');

        return redirect()->route("admin.reservation.index");
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where("status", TableStatus::Available)->get();
        return view("admin.reservation.edit", compact("reservation", "tables"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with("warning_message", "Please choose the table based on guests");
        }
        $request_date = Carbon::parse($request->res_date);
        $reservation = $table->reservations()->where("id", "!=", $reservation->id)->get();
        foreach ($reservation as $res) {
            if($res->res_date->format('Y-m-d') == $request_date->format("Y-m-d")){
                return back()->with("warning_message", "This table is reserved for this date.");

            }
        }
        $reservation->update($request->validated());
        Alert::toast('Reservstion successfully updated', 'info');

        return redirect()->route("admin.reservation.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        Alert::toast('Reservstion successfully deleted', 'error');

        return redirect()->route("admin.reservation.index");
    
    }
}
