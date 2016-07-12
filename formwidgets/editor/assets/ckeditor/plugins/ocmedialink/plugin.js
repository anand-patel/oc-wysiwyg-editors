(function()
{
  CKEDITOR.plugins.add('ocmedialink',
  {
    icons: 'ocmedialink',

    init: function( editor ) {
      var pluginName = 'ocmedialink';

      // Register the toolbar button.
      editor.ui.addButton && editor.ui.addButton('OcMediaLink',
      {
        command: pluginName,
        toolbar: 'insert,10',
        title: 'Insert Media Link'
      });

      // Add command
      editor.addCommand(pluginName, { exec: function(editor) { }});

      editor.on( 'afterCommandExec', function(event)
      {
        var commandName = event.data.name;

        if (commandName != 'ocmedialink')
          return;

        new $.oc.mediaManager.popup({
          alias: 'ocmediamanager',
          onInsert: function(items) {
            if (!items.length)
            {
              alert('Please select file to be inserted.')
              return;
            }

            var element = CKEDITOR.dom.element.createFromHtml('<a href="' + items[0].publicUrl +  '"/>' + items[0].title + '</a>');
            element.setText(items[0].title);
            editor.insertElement(element);

            this.hide();
          }
        });
      });
    }
  });
})();
