/* 
 * TinyMCE plugin for WordPress hRecipe plug-in.
 * Details on creating TinyMCE plugins at
 * http://tinymce.moxiecode.com/wiki.php/Creating_a_plugin
 */
/*global tinymce, edInsertHRecipe */

(function () {

  // Grab the text strings to be used by hrecipe TinyMCE button
  tinymce.PluginManager.requireLangPack('hrecipe_plugin');

  tinymce.create('tinymce.plugins.hrecipe_plugin', {
	  getInfo : function () {
		  return {
			  longname : 'hRecipe Support for Editor',
			  author : 'Dave Doolin',
			  authorurl : 'http://website-in-a-weekend.net/',
			  infourl : 'http://website-in-a-weekend.net/',
			  version : "0.1"
		  };
	  },

	  init : function (ed, url) {
		  ed.addButton('hrecipe_button', {
			  title : 'hrecipe_plugin.insertbutton',
        image : url + '/../hrecipe_icon_20x20.png',
        onclick : function () {
          edInsertHRecipe();
        }
		  });
	  },

	  createControl : function (n, cm) {
		  return null;
	  }

  });

  tinymce.PluginManager.add('hrecipe_plugin', tinymce.plugins.hrecipe_plugin);
})();
