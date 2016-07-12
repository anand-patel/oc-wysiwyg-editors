/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

'use strict';

( function() {
  CKEDITOR.dialog.add( 'ocpagelink', function( editor ) {
    var plugin = CKEDITOR.plugins.ocpagelink;

    var commonLang = editor.lang.common,
      linkLang = editor.lang.link;

    return {
      title: linkLang.title,
      minWidth: 350,
      minHeight: 230,
      contents: [ {
        id: 'page',
        label: 'UNUSED',
        title: 'UNUSED',
        elements: [ {
          id: 'page',
          type: 'select',
          label: linkLang.label,
          items: [
          ],
          commit: function( data ) {
            data.name = this.getInputElement().find(':checked').getItem(0).getText();
            data.url = this.getValue();
          }
        }, ]
      } ],
      onShow: function() {
        var editor = this.getParentEditor(),
          selection = editor.getSelection(),
          element = null;

        // Fill in all the relevant fields if there's already one link selected.
        if ( ( element = CKEDITOR.plugins.link.getSelectedLink( editor ) ) && element.hasAttribute( 'href' ) ) {
          // Don't change selection if some element is already selected.
          // For example - don't destroy fake selection.
          if ( !selection.getSelectedElement() )
            selection.selectElement( element );
        } else {
          element = null;
        }

        var data = CKEDITOR.plugins.link.parseLinkAttributes( editor, element );

        var selectElement = this.getContentElement('page', 'page');

        selectElement.clear();

        $.request(editor.config.ocPageLink.linksHandler, {
          success: function(ajaxData) {
            this.success(ajaxData).done(function() {
              ajaxData.links.forEach(function(item) {
                selectElement.add(item.name, item.url);
              });
              if (data.url)
                selectElement.setValue(data.url.url);
            });
          }
        });

        // Record down the selected element in the dialog.
        this._.selectedElement = element;

        //this.setupContent( data );
      },
      onOk: function() {
        var data = {};

        // Collect data from fields.
        this.commitContent( data );

        var selection = editor.getSelection();

        if ( !this._.selectedElement ) {
          var range = selection.getRanges()[ 0 ];

          // Use link URL as text with a collapsed cursor.
          if ( range.collapsed ) {
            var text = new CKEDITOR.dom.text(data.name, editor.document );
            range.insertNode( text );
            range.selectNodeContents( text );
          }

          // Apply style.
          var style = new CKEDITOR.style( {
            element: 'a',
            attributes: {
              href: data.url
            }
          } );

          style.type = CKEDITOR.STYLE_INLINE; // need to override... dunno why.
          style.applyToRange( range, editor );
          range.select();
        } else {
          // We're only editing an existing link, so just overwrite the attributes.
          this._.selectedElement.setAttribute('href', data.url);

          delete this._.selectedElement;
        }
      }
    };
  } );
} )();
