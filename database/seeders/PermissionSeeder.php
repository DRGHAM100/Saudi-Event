<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if(!Permission::where('name','Registered Details')->first())
            Permission::create(['name' => 'Registered Details']);
        if(!Permission::where('name','Attenders Details')->first())
            Permission::create(['name' => 'Attenders Details']);
        if(!Permission::where('name','Attend')->first()) 
            Permission::create(['name' => 'Attend']);
        if(!Permission::where('name','Attend & Print')->first()) 
            Permission::create(['name' => 'Attend & Print']);
        if(!Permission::where('name','Settings')->first()) 
            Permission::create(['name' => 'Settings']);
        if(!Permission::where('name','Users')->first()) 
            Permission::create(['name' => 'Users']);
        
        
    }
}
