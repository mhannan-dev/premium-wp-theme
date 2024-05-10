jQuery(document).ready(function($){
    // Ensure the DOM is fully loaded before executing JavaScript
    
    // Initialize the Ace Editor
    var editor = ace.edit("customCss");
    
    // Set the theme
    editor.setTheme("ace/theme/monokai");
    
    // Set the editor mode to CSS
    editor.getSession().setMode("ace/mode/css");
    
    // Function to update the hidden textarea with editor content
    var updateCSS = function() {
        $("#sunset_css").val(editor.getSession().getValue());
    };
    
    // Submit form event handler to update hidden textarea before submission
    $("#save-custom-css-form").submit(updateCSS);
});
