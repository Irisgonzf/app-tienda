<?php

namespace App\Exports;

use App\Models\Asignacion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;


class AsignacionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //lo que quiero tener en el excel 
        return new Collection(
            Asignacion::with(['cliente', 'producto'])->get()->map(function ($asignacion) {
                return [
                    $asignacion->cliente->nombre,  
                    $asignacion->producto->nombre, 
                    $asignacion->cantidad,      
                ];
            })
        );
    }
}
