<?php
return [
    'plugin' => [
        'name' => 'Éditeurs Wysiwyg',
        'description' => 'Ajouter votre éditeur Wysiwyg préféré à October CMS.'
    ],
    'settings' => [
        'label' => 'Éditeurs Wysiwyg',
        'description' => 'Configurer vos préférences d\'éditeur Wysiwyg.'
    ],
    'widget' => [
        'label' => 'Wysiwyg',
        'name' => 'Éditeurs Wysiwyg',
        'description' => 'Affiche un éditeur Wysiwyg selon le choix de l\'utilisateur'
    ],
    'form' => [
        'settings' => [
            'select_editor' => 'Sélectionnez l\'éditeur',
            'editor_width' => 'Largeur de l\'éditeur',
            'editor_height' => 'Hauteur de l\'éditeur',
            'toolbar_label' => 'Personnalisation de la barre d\'outils',
            'toolbar_tinymce' => 'Documentation: http://www.tinymce.com/docs/advanced/editor-control-identifiers/#toolbarcontrols',
            'toolbar_ckeditor' => 'Documentation: http://docs.ckeditor.com/#!/guide/dev_toolbar'
        ],
        'page' => [
            'label' => 'Utiliser pour CMS - Page?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour la section Page du CMS'
        ],
        'content' => [
            'label' => 'Utiliser pour CMS - Contenu?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour la section Contenu du CMS'
        ],
        'partial' => [
            'label' => 'Utiliser pour CMS - Modèle Partiel?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour la section Modèle Partiel du CMS'
        ],
        'layout' => [
            'label' => 'Utiliser pour CMS - Maquette?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour la section Maquette du CMS'
        ],
        'others' => [
            'label' => 'Utiliser pour autres?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour toute autre instance excepté dans le CMS'
        ],
        'spages' => [
            'label' => 'Utiliser pour RainLab Static Pages',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin RainLab Static Pages comme éditeur de page'
        ],
        'blog' => [
            'label' => 'Utiliser pour RainLab Blog?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin RainLab Blog comme éditeur d\'article'
        ],
        'problog' => [
            'label' => 'Utiliser pour Radiantweb Problog?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin Radientweb Problog comme éditeur d\'article'
        ],
        'proevent' => [
            'label' => 'Utiliser pour Radiantweb ProEvents?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin Radientweb ProEvents comme éditeur de détails d\'évènement'
        ],
        'apages' => [
            'label' => 'Utiliser pour Autumn Pages?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin Autumn Pages comme éditeur de page'
        ],
        'cplus' => [
            'label' => 'Utiliser pour Indikator Content Plus?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin Indikator Content Plus comme éditeur de contenu'
        ],
        'news' => [
            'label' => 'Utiliser pour Indikator News & Newsletter?',
            'comment' => 'Utiliser l\'éditeur Wysiwyg pour le plugin Indikator Content News & Newsletter comme éditeur de nouvelle'
        ],
        'tab' => [
            'settings' => 'Paramètres',
            'content' => 'Contenu',
            'section' => 'Plugins'
        ]
    ]
];
