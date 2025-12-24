<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateReportRequest;
use App\Interfaces\ReportServiceInterface;
use App\DTOs\ReportResponseDTO;

class ReportController extends Controller
{
    protected $service;

    public function __construct(ReportServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('welcome');
    }

    public function export(GenerateReportRequest $request)
    {
        $inicio = $request->input('start_date');
        $fin = $request->input('end_date');

        // El servicio retorna un BinaryFileResponse
        return $this->service->descargarReporte($inicio, $fin);
    }
}
