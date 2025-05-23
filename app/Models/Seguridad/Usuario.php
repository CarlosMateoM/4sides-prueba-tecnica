<?php

namespace App\Models\Seguridad;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

    protected $table = 'seg_usuario';
    protected $primaryKey = "idUsuario";
    public $timestamps = false;

    protected $fillable = [
        "usuarioImagen",
        "usuarioAlias",
        "usuarioPassword",
        "usuarioNombre",
        "usuarioEmail",
        "usuarioEstado",
        "usuarioConectado",
        "usuarioUltimaConexion",
        "usuarioCodigoRecuperacion"
    ];

    protected $casts = [
        "usuarioUltimaConexion" => "datetime"
    ];

    protected $hidden = ['usuarioPassword'];


    public function conectar($id, $token)
    {
        $row = $this->find($id);
        if ($row) {
            $fecha = date("Y-m-d H:i:s");
            $row->usuarioUltimaConexion = $fecha;
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function desconectar($id)
    {
        $row = $this->find($id);
        if ($row) {
            $row->save();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function obtenerUsuario($usuarioAlias)
    {
        $usuario = $this->whereRaw("usuarioAlias = BINARY '" . $usuarioAlias . "'")->get()->first();
        return $usuario;
    }

    function guardarSesion($idUsuario)
    {
        $usuario = $this->find($idUsuario);
        $usuario->usuarioConectado = true;
        $usuario->usuarioUltimaConexion = date('Y-m-d H:i:s');
        $usuario->save();
        return true;
    }

    public function getAuthPassword()
    {
        return $this->usuarioPassword;
    }
}
