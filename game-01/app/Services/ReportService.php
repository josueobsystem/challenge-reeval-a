<?php

namespace App\Services;

use App\Interfaces\ReportServiceInterface;
use App\Interfaces\ReportRepositoryInterface;
use App\Exports\CreditReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ReportService implements ReportServiceInterface
{
    protected $repo;

    public function __construct(ReportRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function descargarReporte($inicio, $fin): BinaryFileResponse
    {
        // Obtener el query builder del repositorio
        $queryBuilder = $this->repo->obtenerQueryReporte($inicio, $fin);
        
        // Pasamos el builder directamente al export, en lugar de las fechas
        return Excel::download(new CreditReportExport($queryBuilder), 'reporte_crediticio.xlsx');
    }
}
