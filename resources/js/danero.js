$(function() {
    /* Sticky Footer */
    setColumnSize();
    $(window).resize(function () { setColumnSize(); });

    /* Activate Tooltips */
    activateTooltips();

    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true
    };

    $(document).ajaxStart(function() {
        $('button').attr('disabled', 'disabled');
    });
    $(document).ajaxStop(function() {
        $('button').removeAttr('disabled');
    });
});

function activateTooltips() {
    $('[data-toggle="tooltip"]').tooltip({
        placement: 'top'
    });
}

function setColumnSize() {
    $('.wrapper').css('min-height', $( window ).height() - 164);
}
