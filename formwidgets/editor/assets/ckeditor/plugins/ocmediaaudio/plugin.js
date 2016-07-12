(function()
{
  CKEDITOR.plugins.add('ocmediaaudio',
  {
    icons: 'ocmediaaudio',

    init: function( editor ) {
      var pluginName = 'ocmediaaudio';

      // Register the toolbar button.
      editor.ui.addButton && editor.ui.addButton('OcMediaAudio',
      {
        command: pluginName,
        toolbar: 'insert,10',
        title: 'Insert Media Audio'
      });

      // Add command
      editor.addCommand(pluginName, { exec: function(editor) { }});

      editor.on( 'afterCommandExec', function(event)
      {
        var commandName = event.data.name;

        if (commandName != 'ocmediaaudio')
          return;

        new $.oc.mediaManager.popup({
          alias: 'ocmediamanager',
          onInsert: function(items) {
            if (!items.length)
            {
              alert('Please select file to be inserted.')
              return;
            }

            editor.insertHtml('<audio controls=""><source src="' + items[0].publicUrl + '" type=""></audio>', 'unfiltered_html');

            this.hide();
          }
        });
      });
    }
  });
})();
