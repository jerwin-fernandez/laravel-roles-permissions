require('./bootstrap');


$('#deleteModal').on('shown.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let user_id = button.data('user_id');

    $('#delete_form').attr('action', function() {
        return $(this).attr('action') + '/users/' + user_id;
    });
});
