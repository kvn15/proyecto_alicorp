<?php

namespace Database\Seeders;

use App\Models\SalesPoint;
use Illuminate\Database\Seeder;

class PointSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalesPoint::create([
            'name' => 'Punto de Venta 1'
        ]);
        SalesPoint::create([
            'name' => 'Punto de Venta 2'
        ]);
        SalesPoint::create([
            'name' => 'Punto de Venta 3'
        ]);
        SalesPoint::create([
            'name' => 'Punto de Venta 4'
        ]);
        SalesPoint::create([
            'name' => 'Punto de Venta 5'
        ]);
        SalesPoint::create([
            'name' => 'Punto de Venta 6'
        ]);
    }
}
