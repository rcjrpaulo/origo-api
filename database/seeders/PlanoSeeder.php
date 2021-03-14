<?php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planos = [
          [
              'nome' => 'Free',
              'valor_mensal' => 0.00,
          ],
          [
              'nome' => 'Basic',
              'valor_mensal' => 100.00,
          ],
          [
              'nome' => 'Plus',
              'valor_mensal' => 187.00,
          ],
        ];

        foreach ($planos as $plano) {
            Plano::factory()->create($plano);
        }
    }
}
