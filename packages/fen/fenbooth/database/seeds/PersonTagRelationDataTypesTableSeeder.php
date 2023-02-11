<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;

class PersonTagRelationDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'person_person_tag');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'person_person_tag',
                'display_name_singular' => 'Person Tag Relation',
                'display_name_plural'   => 'Person Tag Relations',
                'icon'                  => 'voyager-dot',
                'model_name'            => 'Fen\\Fenbooth\\Models\PersonPersonTag',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        if ($dataType->exists) {
            $dataType->update([
                'model_name' => 'Fen\\Fenbooth\\Models\PersonPersonTag',
                'controller' => '',
            ]);
        }

        $dataRow = $this->dataRow($dataType, 'person_id');
        $dataRow->fill([
            'type'         => 'select_dropdown',
            'display_name' => 'Person',
            'required'     => 0,
            'browse'       => 1,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'default' => '',
                'null'    => '',
                'options' => [
                    '' => '-- None --',
                ],
                'relationship' => [
                    'key'   => 'id',
                    'label' => 'firstname',
                ],
            ],
            'order' => 2,
        ])->save();
    
        $dataRow = $this->dataRow($dataType, 'person_tag_id');
        $dataRow->fill([
            'type'         => 'select_dropdown',
            'display_name' => 'Person Tag',
            'required'     => 0,
            'browse'       => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'default' => '',
                'null'    => '',
                'options' => [
                    '' => '-- None --',
                ],
                'relationship' => [
                    'key'   => 'id',
                    'label' => 'name',
                ],
            ],
            'order' => 3,
        ])->save();
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }

    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }
}
