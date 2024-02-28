<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $permissions = ['selectAll','canView','canPost','canEdit','canDelete'];


        // foreach($permissions as $permission)
        // {
        //     Permission::factory()->create([
        //         'name' => $permission,
        //         'feature_id' => rand(1,9)
        //     ]);
        // }

        $features = Feature::all();
        $permissions = ['selectAll','View','Create','Update','Delete'];

        foreach($features as $feature)
        {
            foreach($permissions as $permission)
            {
                $feature->permissions()->create([
                    'name' => $permission
                ]);
            }
        }


    
    }
}
