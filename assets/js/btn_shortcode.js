(function() {
    tinymce.create('tinymce.plugins.btn', {
        init : function(ed, url) {
            ed.addButton('btn', {
                title : 'Add a Button',
                image : url+'/btn_shortcode.png',
                onclick : function() {
                     ed.selection.setContent('[btn link="http://www.verrado.com" new_window="false"]' + ed.selection.getContent() + '[/btn]');
 
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('btn', tinymce.plugins.btn);
})();