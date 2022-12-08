<?php

namespace App\Http\Controllers;

use App\Models\BoletasModel;
use Illuminate\Http\Request;

class SharedFunctionController extends Controller
{
    /** Se actualiza el estado de la reserva */
    public function actualizarCantidadDisponible($id_boleta)
    {
        try {
            $response = BoletasModel::where([
                ['id_boleta', $id_boleta],
            ])->update([
                'cantidad_boletas_disponibles' => $this->cantidadBoletasDisponibles($id_boleta) - 1,
            ]);
            return response()->json(['status' => $response]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Cantidad de boletas disponibles */
    public function cantidadBoletasDisponibles($id_boleta)
    {
        try {
            $info = BoletasModel::where([
                ['id_boleta', $id_boleta],
            ])->get()[0];
            return  $info->cantidad_boletas_disponibles;
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }
}
