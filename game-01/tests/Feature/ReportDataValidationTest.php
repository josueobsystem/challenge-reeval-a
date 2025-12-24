<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Exports\CreditReportExport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\SubscriptionReport;

class ReportDataValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_export_query_returns_rows_with_seed_data()
    {
        // 1. Ejecutar Seeder
        $this->seed();

        // 2. Verificar datos
        $this->assertDatabaseCount('subscriptions', 100);
        $this->assertDatabaseCount('subscription_reports', 100);

        // 3. Crear Repository
        $repo = new \App\Repositories\ReportRepository();
        $inicio = now()->subDay()->format('Y-m-d');
        $fin = now()->addDay()->format('Y-m-d');
        
        // 4. Obtener Query
        $query = $repo->obtenerQueryReporte($inicio, $fin);

        // 5. Contar resultados
        $count = $query->count();
        
        $this->assertTrue($count > 0, "El reporte debería tener filas, obtuvo $count");

        // 6. Verificar estructura
        $firstRow = $query->first();
        $this->assertNotNull($firstRow->full_name);
        $this->assertNotNull($firstRow->company);
    }
}
