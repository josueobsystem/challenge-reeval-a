<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $path = base_path('database.sql');
        if (!file_exists($path)) {
            $this->command->error("File not found: $path");
            return;
        }

        $sql = file_get_contents($path);
        
        $sql = preg_replace('/--.*$/m', '', $sql);
        
        $statements = array_filter(array_map('trim', explode(';', $sql)));

        foreach ($statements as $stmt) {
            if (stripos($stmt, 'INSERT INTO') === 0) {
                try {
                    \Illuminate\Support\Facades\DB::statement($stmt);
                } catch (\Exception $e) {
                    $this->command->error("Error executing statement: " . $e->getMessage());
                }
            }
        }
    }
}
