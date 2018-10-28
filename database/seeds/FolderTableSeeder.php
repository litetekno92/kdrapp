<?php

use Illuminate\Database\Seeder;
use App\Folder;

class FolderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Folder::class, 10)->create();
    }
}
