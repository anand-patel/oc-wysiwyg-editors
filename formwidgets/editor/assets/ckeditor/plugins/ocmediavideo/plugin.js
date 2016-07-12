(function()
{
  CKEDITOR.plugins.add('ocmediavideo',
  {
    icons: 'ocmediavideo',

    init: function( editor ) {
      var pluginName = 'ocmediavideo';

      // Register the toolbar button.
      editor.ui.addButton && editor.ui.addButton('OcMediaVideo',
      {
        command: pluginName,
        toolbar: 'insert,10',
        title: 'Insert Media Video'
      });

      // Add command
      editor.addCommand(pluginName, { exec: function(editor) { }});

      editor.on( 'afterCommandExec', function(event)
      {
        var commandName = event.data.name;

        if (commandName != 'ocmediavideo')
          return;

        new $.oc.mediaManager.popup({
          alias: 'ocmediamanager',
          onInsert: function(items) {
            if (!items.length)
            {
              alert('Please select file to be inserted.')
              return;
            }

            //TODO: Would be great to the the mimetype from ocmediamanager.
            editor.insertHtml('<video controls=""><source src="' + items[0].publicUrl + '"></video>', 'unfiltered_html');

            this.hide();
          }
        });
      });
    }
  });
})();
