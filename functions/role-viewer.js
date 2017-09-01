(function () {
	var roles = role_viewer_shortcodes.roles;
	tinymce.PluginManager.add( "role_viewer_shortcodes", function( editor, url ) {
		editor.addButton('role_viewer_shortcodes', {
			text: '[Role Viewer]',
			onclick: function() {
				editor.windowManager.open({
					title: 'Insert Role Viewer Shortcode',
					body: buildCheckboxes(),
					onsubmit: function( e ) {
						
						var r = '',
							c = '',
							n = 0
							z = 0;
						
						// count number of checkboxes checked
						for (var i = 0; i < roles.length; i++) {
							
							var checkbox = roles[i];
							
							if (e.data[checkbox]) {
								n++;
							}
						}
						
						// then build strings with commas of selected checkboxes
						for (var i = 0; i < roles.length; i++) {
							
							var checkbox = roles[i];
							
							if (e.data[checkbox]) {
								
								if (z > 0) {
									if (z == n - 1) {
										r += ',';
										c += ' and ';
									} else if (n > 1) {
										r += ',';
										c += ', ';
									}
								}
								
								r += roles[i];
								c += capFirstLetter(roles[i]);
								z++;
							}
						}
						
						editor.insertContent('[role_viewer role="'+r+'"]'+c+' Content[/role_viewer]');
					}
				});
			}
		});
	});
	
	var buildCheckboxes = function() {
		
		var a = [];
		
		for (var i = 0; i < roles.length; i++) {
			
			var o = {
				type:  'checkbox',
				name:  roles[i],
				label: capFirstLetter(roles[i])
			};
					
			a.push(o);
		}
		
		return a;
	}
	
	var capFirstLetter = function(string) {
	    
	    return string.charAt(0).toUpperCase() + string.slice(1);
	};
})();