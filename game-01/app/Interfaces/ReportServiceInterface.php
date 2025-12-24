<?php

namespace App\Interfaces;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface ReportServiceInterface
{
    public function descargarReporte($inicio, $fin): BinaryFileResponse;
}
