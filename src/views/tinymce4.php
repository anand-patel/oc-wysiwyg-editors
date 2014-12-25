<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>elFinder 2.0</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL::to('plugins/anandpatel/wysiwygeditors/public/css/elfinder.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo URL::to('plugins/anandpatel/wysiwygeditors/public/css/theme.css'); ?>">

    <!-- elFinder JS (REQUIRED) -->
    <script src="<?php echo URL::to('plugins/anandpatel/wysiwygeditors/public/js/elfinder.min.js'); ?>"></script>

    <?php if ($locale) { ?>
        <!-- elFinder translation (OPTIONAL) -->
        <script src="<?= asset($dir."/js/i18n/elfinder.$locale.js") ?>"></script>
    <?php } ?>
    
    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript">
        var FileBrowserDialogue = {
            init: function() {
                // Here goes your code for setting your custom things onLoad.
            },
            mySubmit: function (URL) {
                // Pass selected file path to TinyMCE.
                parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

                // Close popup window.
                parent.tinymce.activeEditor.windowManager.close();
            }
        }

        $().ready(function() {
            var elf = $('#elfinder').elfinder({
                // Set your elFinder options here.
                <?php if ($locale) { ?>
                    lang: '<?= $locale ?>', // Locale
                <?php } ?>
                <?php if ($csrf) { ?>
                customData: { _token:  '<?php echo csrf_token(); ?>' },
                <?php } ?>
                url: '<?= URL::action('Barryvdh\Elfinder\ElfinderController@showConnector') ?>', // Connector URL
                getFileCallback: function(file) { // Editor callback
                    FileBrowserDialogue.mySubmit(file.url); // Pass selected file path to TinyMCE.
                }
            }).elfinder('instance');
        });
    </script>
</head>
<body>

    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>

</body>
</html>
