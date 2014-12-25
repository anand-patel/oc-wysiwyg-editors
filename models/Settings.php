<?php namespace AnandPatel\WysiwygEditors\models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'anandpatel_wysiwygeditors_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    protected $cache = [];
}
