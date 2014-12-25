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

    <!-- TinyMCE Popup class (REQUIRED) -->
    <script type="text/javascript" src="<?= asset($dir.'/js/tiny_mce_popup.js') ?>"></script>

    <?php if($locale){ ?>
        <!-- elFinder translation (OPTIONAL) -->
        <script src="<?= asset($dir."/js/i18n/elfinder.$locale.js") ?>"></script>
    <?php } ?>


    <script type="text/javascript">
        var FileBrowserDialogue = {
            init: function() {
                // Here goes your code for setting your custom things onLoad.
            },
            mySubmit: function (URL) {
                var win = tinyMCEPopup.getWindowArg('window');

                // Pass selected file path to TinyMCE.
                win.document.getElementById(tinyMCEPopup.getWindowArg('input')).value = URL;

                // Are we an image browser?
                if (typeof(win.ImageDialog) != 'undefined') {
                    // Update image dimensions.
                    if (win.ImageDialog.getImageData) {
                        win.ImageDialog.getImageData();
                    }
                    // Update preview if necessary.
                    if (win.ImageDialog.showPreviewImage) {
                        win.ImageDialog.showPreviewImage(URL);
                    }
                }

                // Close popup window
                tinyMCEPopup.close();
            }
        }

        tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);

        $().ready(function() {
            var elf = $('#elfinder').elfinder({
                // Set your elFinder options here.
                <?php if($locale){ ?>
                    lang: '<?= $locale ?>', // Locale
                <?php } ?>
                url : '<?= URL::action('Barryvdh\Elfinder\ElfinderController@showConnector') ?>', // Connector URL
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
