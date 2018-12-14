
// Mail.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
// - ThemeOn.net -



$(document).on('nifty.ready', function() {



    // MAILBOX-COMPOSE.HTML
    // =================================================================

    if ($('#demo-mail-compose').length) {


        // SUMMERNOTE
        // =================================================================
        // Require Summernote
        // http://hackerwins.github.io/summernote/
        // =================================================================
        $('#demo-mail-compose').summernote({
            height:500
        });


        // Show The CC Input Field
        // =================================================================
        $('#demo-toggle-cc').on('click', function(){
            $('#demo-cc-input').toggleClass('hide');
        });



        // Show The BCC Input Field
        // =================================================================
        $('#demo-toggle-bcc').on('click', function(){
            $('#demo-bcc-input').toggleClass('hide');
        });



        // Attachment button.
        // =================================================================
        $('.btn-file :file').on('fileselect', function(event, numFiles, label, fileSize) {
            $('#demo-attach-file').html('<strong class="box-block text-capitalize"><i class="fa fa-paperclip fa-fw"></i> '+label+'</strong><small class="text-muted">'+fileSize+'</small>');
        });


        return;
    }





    // MAILBOX-MESSAGE.HTML
    // =================================================================

    // SUMMERNOTE
    // =================================================================
    // Require Summernote
    // http://hackerwins.github.io/summernote/
    // =================================================================
    if( $('#demo-mail-textarea').length ){
        $('#demo-mail-textarea').on('click', function(){
            $(this).empty().summernote({
                height:300,
                focus: true
            });
            $('#demo-mail-send-btn').removeClass('hide');
        });
        return;
    }





});

