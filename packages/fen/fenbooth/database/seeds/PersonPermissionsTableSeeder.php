<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PersonPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_person',
            'read_person',
            'edit_person',
            'add_person',
            'delete_person',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('person');
    }
}
