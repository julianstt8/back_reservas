<?php

namespace App\Http\Controllers;

use App\Models\EventModel;
use App\Models\BoletasModel;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /** Agregar evento */
    public function addEvent(Request $request)
    {
        try {
            // DB::beginTransaction();
            $insert = [
                'nombre' => $request->nombre,
                'ciudad' => $request->ciudad,
                'direccion' => $request->direccion,
                'horario' => $request->horario,
                'artistas' => $request->artistas
            ];
            EventModel::insert($insert);
            $boletas = [
                'id_evento' => EventModel::all()->last()->id_evento,
                'cantidad_boletas' => $request->cantidad_boletas,
                'cantidad_boletas_disponibles' => $request->cantidad_boletas
            ];
            BoletasModel::insert($boletas);
            return response()->json(['status' => 1]);
            // DB::commit();
        } catch (\Throwable $th) {
            // DB::rollback();
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Consulta todos los eventos con su respectiva informacion*/
    public function getEvents()
    {
        try {
            $response =  EventModel::select()
                ->join('res_boletas', 'res_eventos.id_evento', '=', 'res_boletas.id_evento')
                ->get();
            return response()->json(['status' => 1, 'message' => $response]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Eliminar evento */
    public function eliminarEvento()
    {
    }

    /** Modificar evento ya creado */
    public function editarEvento()
    {
    }



    /** Se actualiza el estado de la reserva */
    public function actualizarEstadoReserva()
    {
    }



    public function traerReservaPorUsuario($cedula)
    {
    }
}
