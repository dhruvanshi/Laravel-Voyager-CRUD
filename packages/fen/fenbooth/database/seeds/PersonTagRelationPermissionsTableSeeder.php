<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PersonTagRelationPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_person_person_tag',
            'read_person_person_tag',
            'edit_person_person_tag',
            'add_person_person_tag',
            'delete_person_person_tag',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('person_person_tag');
    }
}
