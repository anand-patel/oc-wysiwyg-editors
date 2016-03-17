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

        $this->vars['toolbar_tinymce'] = (empty(Settings::instance()->toolbar_tinymce)) ? 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | ocmediamanager' : Settings::instance()->toolbar_tinymce;

        $this->vars['toolbar_ckeditor'] = (empty(Settings::instance()->toolbar_ckeditor)) ? "['Undo', 'Redo'], ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'], ['Format', 'FontSize'], ['Maximize', 'ShowBlocks', 'SelectAll', 'RemoveFormat'], ['Source'], '/', ['Bold', 'Italic', 'Underline', 'Strike'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['NumberedList', 'BulletedList', 'Outdent', 'Indent'], ['TextColor', 'BGColor'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Table', 'oembed', 'SpecialChar']" : Settings::instance()->toolbar_ckeditor;

        $this->vars['toolbar_froala'] = (empty(Settings::instance()->toolbar_froala)) ? "'bold', 'italic', 'underline', 'strikeThrough', '|', 'fontSize', 'paragraphFormat', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertTable', '|', 'undo', 'redo', 'html'" : Settings::instance()->toolbar_froala;
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
