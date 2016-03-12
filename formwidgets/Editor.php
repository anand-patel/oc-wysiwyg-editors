<?php namespace AnandPatel\WysiwygEditors\FormWidgets;

use Backend\Classes\FormWidgetBase;
use AnandPatel\WysiwygEditors\Models\Settings;
use App;
use File;

class Editor extends FormWidgetBase
{
    public function widgetDetails()
    {
        return [
            'name'        => 'anandpatel.wysiwygeditors::lang.widget.name',
            'description' => 'anandpatel.wysiwygeditors::lang.widget.description'
        ];
    }

    public function render()
    {
        $this->prepareVars();
        $editor = Settings::instance()->editor;

        return $this->makePartial($editor);
    }

    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->model->{$this->fieldName};
        $this->vars['width'] = (empty(Settings::instance()->editor_width)) ? '100%' : Settings::instance()->editor_width;
        $this->vars['height'] = (empty(Settings::instance()->editor_height)) ? '500px' : Settings::instance()->editor_height;
        $this->vars['lang'] = App::getLocale();
    }

    public function loadAssets()
    {
        $editor = Settings::instance()->editor;
        $locale = App::getLocale();

        if ($editor == 'tinymce') {
            $this->addJs('tinymce/tinymce.min.js');

            if ($locale != 'en' && File::exists('plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/tinymce/langs/'.$locale.'.js')) {
                $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/tinymce/langs/'.$locale.'.js');
            }
        }

        else if ($editor == 'ckeditor') {
            $this->addJs('ckeditor/ckeditor.js');
            $this->addJs('ckeditor/adapters/jquery.js');

            if ($locale != 'en' && File::exists('plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/ckeditor/lang/'.$locale.'.js')) {
                $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/ckeditor/lang/'.$locale.'.js');
            }
        }

        else if ($editor == 'froala') {
            $this->addCss('froala/css/font-awesome.min.css');
            $this->addCss('froala/css/froala_editor.min.css');
            $this->addJs('froala/js/froala_editor.min.js');
            $this->addJs('froala/js/plugins/video.min.js');
            $this->addJs('froala/js/plugins/block_styles.min.js');
            $this->addJs('froala/js/plugins/colors.min.js');
            $this->addJs('froala/js/plugins/char_counter.min.js');
            $this->addJs('froala/js/plugins/font_family.min.js');
            $this->addJs('froala/js/plugins/font_size.min.js');
            $this->addJs('froala/js/plugins/lists.min.js');
            $this->addJs('froala/js/plugins/tables.min.js');

            if ($locale != 'en' && File::exists('plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/langs/'.$locale.'.js')) {
                $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/langs/'.$locale.'.js');
            }
        }
    }
}
