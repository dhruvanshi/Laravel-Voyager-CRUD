<?php

use Fen\Fenbooth\Models\PersonTag;
use Illuminate\Database\Seeder;

class PersonTagTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Seed our example blog posts
        $firstPersonTag = $this->findPersonTag('First Tag');
        if (!$firstPersonTag->exists) {
            $firstPersonTag->fill([
                'name' => 'First tag',
                'description' => 'Test tag',
                'color' => 'Blue',
                'status' => 'ACTIVE',
                'order' => 1,
            ])->save();
        }

        $secondPersonTag = $this->findPersonTag('Second Tag');
        if (!$secondPersonTag->exists) {
            $secondPersonTag->fill([
                'name' => 'Second tag',
                'description' => 'Test tag',
                'color' => 'Red',
                'status' => 'INACTIVE',
                'order' => 2,
            ])->save();
        }

    }

    protected function findPersonTag($name)
    {
        return PersonTag::firstOrNew(['name' => $name]);
    }
}
