<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ReservaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('filter')) {

            return Reserva::where('status', $request->input('filter'))->get();
        }


        return Reserva::where('status', '!=', 'finalizado')->get();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'from_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:255',
            'user_type' => 'required|string|max:255',
            'activity_nature' => 'required|string|max:255',
            'project_details' => 'required|string',
            'target_audience' => 'required|string|max:255',
            'number_of_people' => 'required|integer',
            'horario' => 'required|string|max:255',
            'stations' => 'required|string',
        ]);

        $data['status'] = 'pendente';

        $reserva = Reserva::create($data);

        Log::info($reserva);

        // Send email to admin for approval
        Mail::to('herbethlucas0@gmail.com')->send(new \App\Mail\ReservaSolicitada($reserva));

        return response()->json($reserva, 201);
    }

    public function show($id)
    {
        return Reserva::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $data = $request->validate([
            'status' => 'required|in:pendente,aprovado,recusado,finalizado',
        ]);

        $reserva->update($data);

        if ($data['status'] == 'aprovado') {
            Mail::to($reserva->email)->send(new \App\Mail\ReservaAprovada($reserva));
        } elseif ($data['status'] == 'recusado') {
            Mail::to($reserva->email)->send(new \App\Mail\ReservaRecusada($reserva));
        }

        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return response()->json(null, 204);
    }
}
