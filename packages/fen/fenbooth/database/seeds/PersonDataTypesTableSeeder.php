<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;

class PersonDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'person');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'person',
                'display_name_singular' => 'Person',
                'display_name_plural'   => 'People',
                'icon'                  => 'voyager-people',
                'model_name'            => 'Fen\\Fenbooth\\Models\Person',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        if ($dataType->exists) {
            $dataType->update([
                'model_name' => 'Fen\\Fenbooth\\Models\Person',
                'controller' => '',
            ]);
        }
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
