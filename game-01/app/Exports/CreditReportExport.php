<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Facades\DB;

class CreditReportExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    use Exportable;

    protected $queryBuilder;

    public function __construct($queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function query()
    {
        return $this->queryBuilder;
    }

    public function headings(): array
    {
        return [
            'ID', 'Nombre Completo', 'DNI', 'Email', 'Teléfono',
            'Compañía', 'Tipo de deuda', 'Situación', 'Atraso',
            'Entidad', 'Monto total', 'Línea total', 'Línea usada',
            'Reporte subido el', 'Estado'
        ];
    }

    public function map($row): array
    {
        return [
            $row->report_id,
            $row->full_name,
            $row->document,
            $row->email,
            $row->phone,
            $row->company,
            $row->type,
            $row->status ?? '-',
            $row->delay,
            $row->entity,
            $row->total_amount,
            $row->line_total,
            $row->line_used,
            $row->report_date,
            'ACTIVO',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFF']],
                'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['argb' => '4F81BD']],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ],
        ];
    }
}
