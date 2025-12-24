<?php

namespace Tests\Feature;

use Tests\TestCase;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportExportTest extends TestCase
{
    use RefreshDatabase;

    public function test_exportar_endpoint_retorna_xlsx()
    {
        $this->seed(); 

        $respuesta = $this->get('/reports/export');

        $respuesta->assertStatus(200);
        $respuesta->assertHeader('content-type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }

    public function test_exportar_con_fechas()
    {
        $this->seed();

        $respuesta = $this->get('/reports/export?start_date=2024-01-01&end_date=2025-12-31');

        $respuesta->assertStatus(200);
    }
}
