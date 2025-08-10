<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::create([
            'resident_id' => 1,
            'title' => 'Sampah menumpuk',
            'content' => 'Halo pak kades, sampah menumpuk nih',
            'status' => 'new',
        ]);
    }
}
