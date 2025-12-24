<?php

namespace App\Interfaces;

use Illuminate\Database\Query\Builder;

interface ReportRepositoryInterface
{
    public function obtenerQueryReporte($inicio = null, $fin = null): Builder;
}
