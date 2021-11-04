//[editor Javascript]



//Add text editor
    $(function () {
    "use strict";

    // Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('editor1')
 // CKEDITOR.replaceClass="editor1";
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();		
	
  });

  $(document).ready(function() {
    CKEDITOR.replaceClass = 'ckeditor';
  });