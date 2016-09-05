$(document).on('ready', funcPrincipal);

var $cboGrade;
var $cboSection;
var $form;
var $modalStudents;

function funcPrincipal() {
    $form = $('#newEnrollment');
    $modalStudents = $('#modalStudents');

    // Sections will be loaded dynamically
    $cboGrade = $('#grade_id');
    $cboSection = $('#section_id');
    $cboGrade.on('change', loadSections);

    // Selecting students
    $modalStudents.on('click', '[data-student]', selectStudent);
}

function loadSections() {
    var sectionsUrl = $cboSection.data('source');
    var grade_id = $cboGrade.val();
    sectionsUrl = sectionsUrl.replace('{id}', grade_id);

    $.get(sectionsUrl, function (sections) {
        $cboSection.find('option').remove();
        $(sections).each(renderOption);
    });
}

function renderOption() {
    var option = '<option value="'+this.id+'">'+this.name+'</option>';
    $cboSection.append(option);
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