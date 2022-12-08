<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    /** Crear usuario */
    public function createUser(Request $request)
    {
        try {
            $exists = UserModel::where('cedula', $request->cedula)->exists();
            if (!$exists) {
                $insert = [
                    'cedula' => $request->cedula,
                    'nombre' => $request->nombre,
                    'apellido' => $request->apellido,
                    'correo' => $request->correo,
                    'fecha_creacion' => now(),
                    'tipo_usuario' => $request->tipo_usuario ? $request->tipo_usuario : 0,
                    'contrasena' => $request->contrasena
                ];
                $response = UserModel::insert($insert);
                return response()->json(['status' => 1]);
            }
            return response()->json(['status' => 2]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Eliminar usuario */
    public function deleteUser($id)
    {
        try {
            $response = UserModel::find($id)->delete();
            return response()->json(['status' => 1]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Iniciar sesion */
    public function login(Request $request)
    {
        try {
            $statusUser = UserModel::where('cedula', $request->cedula)->where('contrasena', $request->contrasena)->get();
            return response()->json(['status' => count($statusUser) > 0 ? 1 : 0, 'data' => $statusUser]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }

    /** Consulta todos los usuarios registrados */
    public function getUsers()
    {
        try {
            $response = UserModel::all();
            return $response;
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'message' => $th]);
        }
    }
}
