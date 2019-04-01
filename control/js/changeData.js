$(document).ready(function () {
    $('select').select2({
        width : '100%'
    });
    change.highlightRow();
    change.revertChanges();
    doneLoading();
});

var change = function () {
    var highlightRow, revertChanges;

    highlightRow = function () {
        $('.change_trigger').on('change keyup', function () {
            var self = $(this),
                row = self.closest('tr'),
                id = row.data('id');

            $('#' + id).addClass('highlight');
            $('#save_button_id_' + id).removeClass('hidden-button');
            $('#undo_button_id_' + id).removeClass('hidden-button');
            $('#delete_button_id_' + id).addClass('hidden-button');
        });
    };

    revertChanges = function () {
        $('.undo-button').on('click', function (e) {
            e.preventDefault();
            location.reload();
        });
    };

    return {
        highlightRow  : highlightRow,
        revertChanges : revertChanges
    }
}();

var doneLoading = function () {
    $('.loading').hide();
    $('.page-content').show();
};