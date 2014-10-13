<?php namespace AnandPatel\WysiwygEditors;

use System\Classes\PluginBase;
use App;
use Backend;
use Illuminate\Foundation\AliasLoader;
use Event;
use AnandPatel\WysiwygEditors\Models\Settings;
use System\Classes\PluginManager;
use Cms\Classes\Theme;
use System\Classes\SettingsManager;
/**
 * WysiwygEditors Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Wysiwyg Editors',
            'description' => 'Inject your Favorite Wysiwyg Editor to CMS and other Code Editor',
            'author'      => 'Anand Patel'
        ];
    }

    public function registerFormWidgets()
    {
        return [
            'AnandPatel\WysiwygEditors\FormWidgets\Wysiwyg' => [
                'label' => 'Wysiwyg',
                'alias' => 'wysiwyg'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Wysiwyg Editors',
                'description' => 'Configure Wysiwyg Editors preferences.',
                'icon'        => 'icon-pencil-square-o',
                'context'     => 'mysettings',
                'category'    =>  SettingsManager::CATEGORY_MYSETTINGS,
                'class'       => 'AnandPatel\WysiwygEditors\Models\Settings',
                'order'       => 100
            ]
        ];

    }


    public function boot()
    {

        \App::register('Barryvdh\Elfinder\ElfinderServiceProvider');

        Event::listen('backend.form.extendFields', function($form)
        {

            /*
             * Check for the installed plugin if install then extends fields for that
             */
            if ($form->model instanceof \AnandPatel\WysiwygEditors\Models\Settings)
            {
                if (!($theme = Theme::getEditTheme()))
                {
                    throw new ApplicationException(Lang::get('cms::lang.theme.edit.not_found'));
                }


                if(PluginManager::instance()->hasPlugin('Radiantweb.Problog'))
                {
                    $form->addFields([
                        'radiant_problog_as_wysiwyg' => [
                            'label'     => 'Use for Radiantweb Problog?',
                            'type'      => 'switch',
                            'span'      => 'left',
                            'default'   => 'false',
                            'comment'   => 'Use Wysiwyg editor in Radientweb Problog plugin as post editor',
                            'tab'       =>  'Content'
                        ]
                    ],'primary');
                }

                if(PluginManager::instance()->hasPlugin('Radiantweb.Proevents'))
                {
                    $form->addFields([
                        'radiant_proevents_as_wysiwyg' => [
                            'label'     => 'Use for Radiantweb ProEvents?',
                            'type'      => 'switch',
                            'span'      => 'left',
                            'default'   => 'false',
                            'comment'   => 'Use Wysiwyg editor in Radientweb ProEvents plugin as Event details editor',
                            'tab'       =>  'Content'
                        ]
                    ],'primary');
                }


                if(PluginManager::instance()->hasPlugin('RainLab.Pages'))
                {
                    $form->addFields([
                        'static_page_as_wysiwyg' => [
                            'label'     => 'Use for RainLab Static Pages?',
                            'type'      => 'switch',
                            'span'      => 'left',
                            'default'   => 'false',
                            'comment'   => 'Use Wysiwyg editor in RainLab Static Pages plugin as page editor',
                            'tab'       =>  'Content'
                        ]
                    ],'primary');
                }

                if(PluginManager::instance()->hasPlugin('RainLab.Blog'))
                {
                    $form->addFields([
                        'blog_as_wysiwyg' => [
                            'label'     => 'Use for RainLab Blog?',
                            'type'      => 'switch',
                            'span'      => 'left',
                            'default'   => 'false',
                            'comment'   => 'Use Wysiwyg editor in RainLab blog plugin as post editor',
                            'tab'   =>  'Content'
                        ]
                    ],'primary');
                }

                if(PluginManager::instance()->hasPlugin('Autumn.Pages'))
                {
                    $form->addFields([
                        'autumn_page_as_wysiwyg' => [
                            'label'     => 'Use for Autumn Pages?',
                            'type'      => 'switch',
                            'span'      => 'left',
                            'default'   => 'false',
                            'comment'   => 'Use Wysiwyg editor in Autumn page plugin as page editor',
                            'tab'       =>  'Content'
                        ]
                    ],'primary');
                }
            }

                    if(Settings::get('cms_content_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Content')
                    {
                        useWysiwyg($form);
                    }

                    else if(Settings::get('cms_partial_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Partial')
                    {
                        useWysiwyg($form);
                    }

                    else if(Settings::get('cms_layout_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Layout')
                    {
                        useWysiwyg($form);
                    }

                    else if(Settings::get('cms_page_as_wysiwyg', false) && get_class($form->config->model) == 'Cms\Classes\Page')
                    {
                        useWysiwyg($form);
                    }

                    else if(Settings::get('others_as_wysiwyg',false))
                    {
                        if(get_class($form->config->model) != 'Cms\Classes\Layout' && get_class($form->config->model) != 'Cms\Classes\Page' && get_class($form->config->model) != 'Cms\Classes\Content' && get_class($form->config->model) != 'Cms\Classes\Partial' )
                        {
                            useWysiwyg($form);
                        }

                    }

                    else{

                        if(Settings::get('radiant_problog_as_wysiwyg', false) && $form->model instanceof \Radiantweb\Problog\Models\Post )
                        {
                            useWysiwyg($form);
                        }

                        if(Settings::get('radiant_proevents_as_wysiwyg', false) && $form->model instanceof \Radiantweb\Proevents\Models\Event)
                        {
                            useWysiwyg($form);
                        }
                        if(Settings::get('blog_as_wysiwyg', false) && $form->model instanceof \RainLab\Blog\Models\Post)
                        {
                            useWysiwyg($form);
                        }

                        if(Settings::get('autumn_page_as_wysiwyg', false) && $form->model instanceof \Autumn\Pages\Models\Page)
                        {
                            useWysiwyg($form);
                        }
                        if(Settings::get('static_page_as_wysiwyg', false) && $form->model instanceof \RainLab\Pages\Classes\Page)
                        {
                            useWysiwyg($form);
                        }
                    }


        });

        function useWysiwyg($form)
        {
            foreach ($form->getFields() as $field )
            {
                if(!empty($field->config['type']))
                {
                    if($field->config['type'] == 'codeeditor' || $field->config['type'] == 'Eein\Wysiwyg\FormWidgets\Trumbowyg' || $field->config['type'] == 'richeditor')
                    {
                        if(Settings::instance()->editor == "richeditor")
                            $field->config['type'] = $field->config['widget'] = 'richeditor';
                        else
                            $field->config['type'] = $field->config['widget'] = 'AnandPatel\WysiwygEditors\FormWidgets\Editor';

                        return;
                    }
                }
            }
        }
    }
}

