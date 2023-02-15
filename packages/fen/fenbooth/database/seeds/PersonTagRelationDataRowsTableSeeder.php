<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class PersonTagRelationDataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $personTagDataType = DataType::where('slug', 'person_person_tag')->firstOrFail();

        $dataRow = $this->dataRow($personTagDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => 'ID',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($personTagDataType, 'person_person_tag_belongsto_person_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'person',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model' => 'Fen\\Fenbooth\\Models\Person',
                    'table'    => 'person',
                    'type'    => 'belongsTo',
                    'column'    => 'person_id',
                    'key'    => 'id',
                    'label'    => 'firstname',
                    'pivot_table'    => 'categories',
                    'pivot'    => '0',
                    'taggable'    => null,
                ],
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($personTagDataType, 'person_person_tag_belongsto_person_tag_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'person_tag',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model' => 'Fen\\Fenbooth\\Models\PersonTag',
                    'table'    => 'person_tag',
                    'type'    => 'belongsTo',
                    'column'    => 'person_tag_id',
                    'key'    => 'id',
                    'label'    => 'name',
                    'pivot_table'    => 'categories',
                    'pivot'    => '0',
                    'taggable'    => null,
                ],
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($personTagDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'created_at',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($personTagDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => 'updated_at',
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 5,
            ])->save();
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }
}
