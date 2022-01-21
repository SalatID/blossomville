<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RtTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dbs_rt')->insert([
            'rt_no' => '01',
            'rt_name' => 'ADI SARPONO',
            'rt_whatsapp' => '628161191943',
            'rt_foto_src' => null,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_user'=>0,
            'updated_user'=>0,
        ]);
        DB::table('dbs_rt')->insert([
            'rt_no' => '02',
            'rt_name' => 'DERRY SUDRAJAT',
            'rt_whatsapp' => '62818846060',
            'rt_foto_src' => null,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_user'=>0,
            'updated_user'=>0,
        ]);
        DB::table('dbs_rt')->insert([
            'rt_no' => '03',
            'rt_name' => 'DANIEL TANTO',
            'rt_whatsapp' => '6281310542388',
            'rt_foto_src' => null,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_user'=>0,
            'updated_user'=>0,
        ]);
        DB::table('dbs_rt')->insert([
            'rt_no' => '04',
            'rt_name' => 'NANANG',
            'rt_whatsapp' => '6287780015512',
            'rt_foto_src' => null,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
            'created_user'=>0,
            'updated_user'=>0,
        ]);
    }
}
