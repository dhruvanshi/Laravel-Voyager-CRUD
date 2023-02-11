<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;

class PersonTagDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'person_tag');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'person_tag',
                'display_name_singular' => 'Person Tag',
                'display_name_plural'   => 'Person Tags',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'Fen\\Fenbooth\\Models\PersonTag',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        if ($dataType->exists) {
            $dataType->update([
                'model_name' => 'Fen\\Fenbooth\\Models\PersonTag',
                'controller' => '',
            ]);
        }
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
