<?php

namespace App\DTOs;

class ReportResponseDTO
{
    // Este DTO podría contener metadatos sobre el reporte generado
    // Para simplificar, dado que retornamos un Stream de archivo, 
    // este DTO podría usarse si retornáramos un JSON con el link.
    // El usuario pidió un DTO de respuesta, así que definimos la estructura.
    
    public $status;
    public $message;

    public function __construct(string $status, string $message) 
    {
        $this->status = $status;
        $this->message = $message;
    }
}
