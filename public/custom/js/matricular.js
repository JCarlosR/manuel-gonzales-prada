$(document).on('ready', funcPrincipal);

var $form;
var $modalStudents;

function funcPrincipal() {
    $form = $('#newEnrollment');
    $modalStudents = $('#modalStudents');

    // Selecting students
    $modalStudents.on('click', '[data-student]', selectStudent);
}

function selectStudent() {
    var $tr = $(this).parents('tr');
    var first_name = $tr.find('[data-first]').text();
    var last_name = $tr.find('[data-last]').text();

    var user_id = $(this).data('student');
    var full_name = first_name + ' ' + last_name;

    $form.find('[name=user_id]').val(user_id);
    $form.find('[name=name]').val(full_name);

    $modalStudents.modal('hide');
}
