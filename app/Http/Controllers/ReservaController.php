<?php

namespace App\Http\Controllers;

use App\Models\ReservaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ReservaController extends Controller
{
    /** Reservamos la boleta */
    public function addReserve(Request $request)
    {
        try {
            $shared = new sharedFunctionController();
            if ($shared->cantidadBoletasDisponibles($request->id_boleta) > 0) {
                $insert = [
                    'cedula' => $request->cedula,
                    'boleta_id' => $request->id_boleta,
                    'estado' => $request->estado,
                    'fecha_reservacion' => now()
                ];
                $response =  ReservaModel::insert($insert);
                $shared->actualizarCantidadDisponible($request->id_boleta);
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Trae las reservas de el usuario */
    public function getReserve(Request $request)
    {
        try {
            $response =  ReservaModel::where('cedula', $request->cedula)
                ->join('res_boletas', 'res_reservacion_usuario.boleta_id', '=', 'res_boletas.id_boleta')
                ->join('res_eventos', 'res_boletas.id_evento', '=', 'res_eventos.id_evento')
                ->orderBy('fecha_reservacion', 'ASC')
                ->get();
            return response()->json(['status' => 1, 'message' => $response]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Consulta todas las reservaciones */
    public function getAllReserve()
    {
        try {
            $response =  ReservaModel::join('res_boletas', 'res_reservacion_usuario.boleta_id', '=', 'res_boletas.id_boleta')
                ->join('res_eventos', 'res_boletas.id_evento', '=', 'res_eventos.id_evento')
                ->orderBy('fecha_reservacion', 'ASC')
                ->get();
            return response()->json(['status' => 1, 'message' => $response]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Cambia el estado de la reservacion
     *  0 - Pendiente
     *  1 - Asignada
     *  2 - Rechazada
     */
    public function setStatusReserve(Request $request)
    {
        try {
            ReservaModel::where('id_reservacion', $request->id_reservacion)
                ->update(['estado' => $request->status]);
            return response()->json(['status' => 1]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }
}
