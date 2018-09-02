<?php

use Illuminate\Database\Seeder;
use App\MenuCategory;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1; $i++) { 
            $categories = MenuCategory::create(['name' => 'category-00'.$i ]);

            $submenu = $categories->menuItems()->create([
                'name'      => 'menu-item-00'.$i,
                'url'       => 'admin.dashboard',
                'active'    => 'admin.dashboard'
                ]);

            $submenu->subMenuItems()->create([
                'name' => 'submenu-item-00'.$i,
                'url'       => 'admin.dashboard',
                'active'    => 'admin.dashboard'
                ]);
        }

        $this->command->info('Menu Items Created !');
    }
}
