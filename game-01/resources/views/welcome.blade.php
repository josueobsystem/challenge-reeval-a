<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Generador de Reportes Crediticios</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Reporte Crediticio
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Selecciona el rango de fechas para descargar el reporte.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 border border-gray-100">
                <form action="/reports/export" method="GET" class="space-y-6">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">
                            Fecha de Inicio
                        </label>
                        <div class="mt-1">
                            <input id="start_date" name="start_date" type="date" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">
                            Fecha Fin
                        </label>
                        <div class="mt-1">
                            <input id="end_date" name="end_date" type="date" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Descargar Excel
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="mt-6">
                 <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-gray-50 text-gray-500">
                            Información
                        </span>
                    </div>
                </div>
                <div class="mt-6 text-center text-xs text-gray-500">
                    <p>El reporte incluye Préstamos, Tarjetas de Crédito y Otras Deudas.</p>
                </div>
            </div>
        </div>
    </body>
</html>
