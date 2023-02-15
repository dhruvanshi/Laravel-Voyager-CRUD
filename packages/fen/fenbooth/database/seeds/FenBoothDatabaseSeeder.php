<?php

use TCG\Voyager\Traits\Seedable;
use Illuminate\Database\Seeder;

class FenBoothDatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed('PersonDataTypesTableSeeder');
        $this->seed('PersonDataRowsTableSeeder');
        $this->seed('PersonPermissionsTableSeeder');
        $this->seed('PersonTableSeeder');
        
        $this->seed('PersonTagDataTypesTableSeeder');
        $this->seed('PersonTagDataRowsTableSeeder');
        $this->seed('PersonTagPermissionsTableSeeder');
        $this->seed('PersonTagTableSeeder');

        $this->seed('PersonTagRelationDataTypesTableSeeder');
        $this->seed('PersonTagRelationDataRowsTableSeeder');
        $this->seed('PersonTagRelationPermissionsTableSeeder');
        
        $this->seed('FenBoothPermissionRoleTableSeeder');
        $this->seed('FenBoothMenuItemsTableSeeder');
    }
}
