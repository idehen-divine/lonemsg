<?php

namespace Database\Seeders;

use App\Models\MsgType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MsgTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('msg_types')->delete();

        $roles = [
            'text', 'image', 'video'
        ];

        foreach ($roles as $role) {
            MsgType::create(['name' => $role]);
        }
    }
}
