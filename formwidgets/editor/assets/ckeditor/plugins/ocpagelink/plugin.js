(function()
{
  CKEDITOR.plugins.add('ocpagelink',
  {
    icons: 'ocpagelink',

    init: function( editor ) {
      var pluginName = 'ocpagelink';

      CKEDITOR.dialog.add('ocpagelink', this.path  + 'dialogs/link.js');

      editor.addCommand(pluginName, new CKEDITOR.dialogCommand('ocpagelink'));

      // Register the toolbar button.
      editor.ui.addButton && editor.ui.addButton('OcPageLink',
      {
        command: pluginName,
        toolbar: 'insert,10',
        title: 'Insert link to page'
      });
    }
  });
})();
