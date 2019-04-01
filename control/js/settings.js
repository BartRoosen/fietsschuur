$(document).ready(function () {
    var saveButton = $('#add_type_button');

    saveButton.attr('disabled', 'disabled');

    $('#type_input').on('change keyup', function () {
        var value = $(this).val();

        if ('' !== value) {
            saveButton.removeAttr('disabled');
        } else {
            saveButton.attr('disabled', 'disabled');
        }
    });
});

function activateMenuItem(id) {
    $('.settings_menu').removeClass('active');
    $('#' + id).addClass('active');
}