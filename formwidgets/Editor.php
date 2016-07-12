<?php namespace AnandPatel\WysiwygEditors\FormWidgets;

use Backend\Classes\FormWidgetBase;
use AnandPatel\WysiwygEditors\Models\Settings;
use App;
use File;
use Request;
use Event;

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

        $this->vars['toolbar_tinymce'] = (empty(Settings::instance()->toolbar_tinymce)) ? "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ocmediamanager" : Settings::instance()->toolbar_tinymce;

        $this->vars['toolbar_ckeditor'] = (empty(Settings::instance()->toolbar_ckeditor)) ? "['Undo', 'Redo'], ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'], ['Format', 'FontSize'], ['ShowBlocks', 'SelectAll', 'RemoveFormat'], ['Source'], ['Maximize'], '/', ['Bold', 'Italic', 'Underline', 'Strike'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['BulletedList', 'NumberedList', 'Outdent', 'Indent'], ['TextColor', 'BGColor'], ['Link', 'Unlink', 'Anchor'], ['Image', 'Table', 'oembed', 'SpecialChar', 'OcMediaManager', 'OcMediaVideo', 'OcMediaLink', 'OcMediaAudio']" : Settings::instance()->toolbar_ckeditor;

        $this->vars['toolbar_froala_lg'] = (empty(Settings::instance()->toolbar_froala_lg)) ? "'undo', 'redo', 'clearFormatting', 'html', '|', 'bold', 'italic', 'underline', 'strikeThrough', '|', 'paragraphFormat', 'align', 'fontSize', 'color', '|', 'formatUL', 'formatOL', 'outdent', 'indent', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertTable', '|', 'fullscreen'" : Settings::instance()->toolbar_froala_lg;

        $this->vars['toolbar_froala_md'] = (empty(Settings::instance()->toolbar_froala_md)) ? "'undo', 'clearFormatting', 'html', '|', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'align', 'fontSize', 'color', '|', 'formatUL', 'formatOL', 'outdent', 'indent', '|', 'insertLink', 'insertImage', 'insertVideo', 'insertTable', '|', 'fullscreen'" : Settings::instance()->toolbar_froala_md;

        $this->vars['toolbar_froala_sm'] = (empty(Settings::instance()->toolbar_froala_sm)) ? "'undo', 'html', '|', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'align', 'fontSize', 'color', '|', 'formatUL', 'formatOL', 'outdent', 'indent', '|', 'insertLink', 'insertImage', 'insertTable', '|', 'fullscreen'" : Settings::instance()->toolbar_froala_sm;

        $this->vars['toolbar_froala_xs'] = (empty(Settings::instance()->toolbar_froala_xs)) ? "'undo', 'html', '|', 'bold', 'italic', '|', 'paragraphFormat', 'align', '|', 'formatUL', 'formatOL', 'outdent', 'indent', '|', 'insertLink', 'insertImage'" : Settings::instance()->toolbar_froala_xs;
    }

    public function loadAssets()
    {
        $editor = Settings::instance()->editor;
        $locale = App::getLocale();

        if ($editor == 'tinymce') {
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/tinymce/tinymce.min.js');

            if ($locale != 'en' && File::exists('plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/tinymce/langs/'.$locale.'.js')) {
                $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/tinymce/langs/'.$locale.'.js');
            }
        }

        else if ($editor == 'ckeditor') {
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/ckeditor/ckeditor.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/ckeditor/adapters/jquery.js');

            if ($locale != 'en' && File::exists('plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/ckeditor/lang/'.$locale.'.js')) {
                $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/ckeditor/lang/'.$locale.'.js');
            }
        }

        else if ($editor == 'froala') {
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/font-awesome.min.css');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/froala_editor.min.css');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/froala_style.min.css');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/themes/october.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/froala_editor.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/align.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/char_counter.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/char_counter.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/code_beautifier.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/code_view.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/code_view.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/colors.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/colors.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/draggable.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/draggable.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/emoticons.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/emoticons.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/entities.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/file.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/file.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/font_family.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/font_size.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/fullscreen.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/fullscreen.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/image.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/image.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/image_manager.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/image_manager.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/inline_style.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/line_breaker.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/line_breaker.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/link.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/lists.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/paragraph_format.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/paragraph_style.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/quick_insert.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/quick_insert.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/quote.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/save.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/table.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/table.min.js');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/url.min.js');
            $this->addCss('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/css/plugins/video.min.css');
            $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/plugins/video.min.js');

            if ($locale != 'en' && File::exists('plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/languages/'.$locale.'.js')) {
                $this->addJs('/plugins/anandpatel/wysiwygeditors/formwidgets/editor/assets/froala/js/languages/'.$locale.'.js');
            }
        }
    }

    // shamelessly copied from modules/backend/formwidgets/RicheEditor.php

    /**
     * Returns a single collection of available page links.
     * This implementation has room to place links under
     * different groups based on the link type.
     * @return array
     */
    public function onGetPageLinks()
    {
        $links = [];
        $types = $this->getPageLinkTypes();

        $links[] = ['name' => 'Select a page...', 'url' => false];

        $iterator = function($links, $level = 0) use (&$iterator) {
            $result = [];
            foreach ($links as $linkUrl => $link) {

                /*
                 * Remove scheme and host from URL
                 */
                $baseUrl = Request::getSchemeAndHttpHost();
                if (strpos($linkUrl, $baseUrl) === 0) {
                    $linkUrl = substr($linkUrl, strlen($baseUrl));
                }

                $linkName = str_repeat('&nbsp;', $level * 4);
                $linkName .= is_array($link) ? array_get($link, 'title', '') : $link;
                $result[] = ['name' => $linkName, 'url' => $linkUrl];

                if (is_array($link)) {
                    $result = array_merge(
                        $result,
                        $iterator(array_get($link, 'links', []), $level + 1)
                    );
                }
            }

            return $result;
        };

        foreach ($types as $typeCode => $typeName) {
            $links = array_merge($links, $iterator($this->getPageLinks($typeCode)));
        }

        return ['links' => $links];
    }

    /**
     * Returns a list of registered page link types.
     * This is reserved functionality for separating the links by type.
     * @return array Returns an array of registered page link types
     */
    protected function getPageLinkTypes()
    {
        $result = [];

        $apiResult = Event::fire('backend.richeditor.listTypes');
        if (is_array($apiResult)) {
            foreach ($apiResult as $typeList) {
                if (!is_array($typeList)) {
                    continue;
                }

                foreach ($typeList as $typeCode => $typeName) {
                    $result[$typeCode] = $typeName;
                }
            }
        }

        return $result;
    }

    protected function getPageLinks($type)
    {
        $result = [];
        $apiResult = Event::fire('backend.richeditor.getTypeInfo', [$type]);
        if (is_array($apiResult)) {
            foreach ($apiResult as $typeInfo) {
                if (!is_array($typeInfo)) {
                    continue;
                }

                foreach ($typeInfo as $name => $value) {
                    $result[$name] = $value;
                }
            }
        }

        return $result;
    }
}
