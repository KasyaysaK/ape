$(document).ready(function() {
	tinymce.init({ 
        height : "480",
        selector:'.post-editor', 
        language: 'fr_FR',
        plugins: 'placeholder copy cut paste link lists image code preview',
        menubar: 'insert edit',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |  copy | cut | paste | link | numlist bullist outdent indent | image | code | preview',
	   	image_advtab: true,
	    file_picker_callback: function(callback, value, meta) {
	      if (meta.filetype == 'image') {
	        $('#upload').trigger('click');
	        $('#upload').on('change', function() {
	          var file = this.files[0];
	          var reader = new FileReader();
	          reader.onload = function(e) {
	            callback(e.target.result, {
	              alt: ''
	            });
	          };
	          reader.readAsDataURL(file);
	        });
	      }
	    },
	    templates: [{
	      title: 'Test template 1',
	      content: 'Test 1'
	    }, {
	      title: 'Test template 2',
	      content: 'Test 2'
	    }]
    });
});