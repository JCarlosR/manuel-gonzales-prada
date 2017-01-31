// filter fields
var $career, $academic_year, $status;

$(function () {
    // Filters
    $career = $('#career_id');
    $academic_year = $('#academic_year');
    $status = $('#status');

    // On change events
    $career.on('change', applyFilters);
    $academic_year.on('change', applyFilters);
    $status.on('change', applyFilters);
});

function applyFilters() {
    var career = $career.val();
    var academic_year = $academic_year.val();
    var status = $status.val();

    var params = '?career_id='+career + '&academic_year='+academic_year + '&status='+status;
    location.href = 'listar' + params;
}
