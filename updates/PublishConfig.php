<?php namespace AnandPatel\WysiwygEditors\Updates;

use Artisan;
use Exception;
use October\Rain\Database\Updates\Seeder;

class PublishConfig extends Seeder
{
    public function run()
    {
        try {
            Artisan::call('vendor:publish --provider="AnandPatel\WysiwygEditors\Plugin"');
            Artisan::call('elfinder:publish --provider="AnandPatel\WysiwygEditors\Plugin"');
        } catch (Exception $e) {}
    }
}
