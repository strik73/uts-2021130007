<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $amount = $faker->numberBetween(0,1000000);
            $type = $faker->randomElement(['Income','Expense']);
            $category = $faker->sentence(2);
            $notes = $faker->paragraph(5);
            $created_at = $faker->dateTimeBetween('-3 months', 'now');

            DB::table('transactions')->insert([
                'amount' => $amount,
                'type' => $type,
                'category' => $category,
                'notes' => $notes,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ]);
        }
    }
}
