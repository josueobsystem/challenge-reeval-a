<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_pagina_inicio_carga_correctamente()
    {
        $respuesta = $this->get('/');

        $respuesta->assertStatus(200);
        $respuesta->assertSee('Generador de Reportes Crediticios');
        $respuesta->assertSee('Fecha de Inicio');
        $respuesta->assertSee('Fecha Fin');
        $respuesta->assertSee('Descargar Excel');
    }
}
