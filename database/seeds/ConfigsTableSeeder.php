<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('configs')->truncate();

        $rows[] = [ 'name' => 'theme', 'value' => 'front', 'deletable' => 0];
        $rows[] = [ 'name' => 'currency', 'value' => 'USD', 'deletable' => 0];

        foreach($rows as $row) {
            $config = \App\Models\Config::where("name",$row['name'])->first();
            if(!$config) {
                \App\Models\Config::create($row)->save();
            }
        }
    }
}
