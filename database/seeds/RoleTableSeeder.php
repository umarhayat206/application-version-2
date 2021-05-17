<?php

use Illuminate\Database\Seeder;
use App\Role;
use Carbon\Carbon;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $now=Carbon::now()->toDateTimeString();
        Role::insert([
            ['role_name'=>'admin','created_at'=>$now,'updated_at'=>$now],
            ['role_name'=>'author','created_at'=>$now,'updated_at'=>$now],
            ['role_name'=>'subscriber','created_at'=>$now,'updated_at'=>$now]

        ]);
    }
}
