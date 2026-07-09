<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Membership;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Membership::create([
            'name' => 'Basic',
            'description' => 'Basic Membership',
            'monthly_price' => 150000
            
        ]);

        Membership::create([
            'name' => 'Premium',
            'description' => 'Premium Membership',
            'monthly_price' => 250000
        ]);
        Membership::create([
            'name' => 'VIP',
            'description' => 'VIP Membership',
            'monthly_price' => 500000
        ]);
    }
}
