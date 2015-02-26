<?php namespace AnandPatel\WysiwygEditors\FormWidgets;

use Backend\Classes\FormWidgetBase;
use AnandPatel\WysiwygEditors\Models\Settings;

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
    }

    public function loadAssets()
    {
        $editor = Settings::instance()->editor;

        if ($editor == 'tinymce')
        {
            $this->addJs('tinymce/tinymce.min.js');
        }

        if ($editor == 'ckeditor')
        {
            $this->addJs('ckeditor/ckeditor.js');
            $this->addJs('ckeditor/adapters/jquery.js');
        }

        if ($editor == 'froala')
        {
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
        }
    }
}
