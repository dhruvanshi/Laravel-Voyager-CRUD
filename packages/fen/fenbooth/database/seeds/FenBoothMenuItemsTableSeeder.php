<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class FenBoothMenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->createMainMenu();
        $this->updateAdminMenu();
    }

    protected function createMainMenu()
    {
        $menu = Menu::firstOrCreate([
            'name' => 'fenbooth',
        ]);

        $firstMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'People',
            'url' => '/person',
            'route' => 'voyager.person.index',
            'target' => '_self',
            'icon_class' => 'voyager-dot',
            'color' => null,
            'order' => 1,
        ])->save();

        $persontagMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Person Tag',
            'url' => '/person_tag',
            'route' => 'voyager.person_tag.index',
            'target' => '_self',
            'icon_class' => 'voyager-dot',
            'color' => null,
            'order' => 2,
        ])->save();

        // $persontagrelationMenuItem = MenuItem::firstOrNew([
        //     'menu_id' => $menu->id,
        //     'title' => 'Person Tag Relation',
        //     'url' => '/person_tag_relation',
        //     'route' => 'voyager.person_person_tag.index',
        //     'target' => '_self',
        //     'icon_class' => 'voyager-dot',
        //     'color' => null,
        //     'order' => 3,
        // ])->save();
    }

    protected function updateAdminMenu()
    {
        Menu::firstOrCreate([
            'name' => 'admin',
        ]);

        $menu = Menu::where('name', 'admin')->firstOrFail();

        $parentItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Fenbooth',
            'url' => '',
            'route' => null,
        ]);

        if (!$parentItem->exists) {
            $parentItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-dot',
                'color' => null,
                'parent_id' => null,
                'order' => 1,
            ])->save();
        }
        
        $peopleMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'People',
            'url' => '/person',
            'route' => 'voyager.person.index',
            'target' => '_self',
            'icon_class' => 'voyager-dot',
            'color' => null,
            'parent_id' => $parentItem->id,
            'order' => 1,
        ])->save();

        $persontagMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Person Tag',
            'url' => '/person_tag',
            'route' => 'voyager.person_tag.index',
            'target' => '_self',
            'icon_class' => 'voyager-dot',
            'color' => null,
            'parent_id' => $parentItem->id,
            'order' => 2,
        ])->save();

        // $persontagrelationMenuItem = MenuItem::firstOrNew([
        //     'menu_id' => $menu->id,
        //     'title' => 'Person Tag Relation',
        //     'url' => '/person_tag_relation',
        //     'route' => 'voyager.person_person_tag.index',
        //     'target' => '_self',
        //     'icon_class' => 'voyager-dot',
        //     'color' => null,
        //     'parent_id' => $parentItem->id,
        //     'order' => 3,
        // ])->save();
    }
}
