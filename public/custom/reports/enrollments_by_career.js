var $career;

var data = {
    labels: [
        "Falta pagar",
        "Pago completo"
    ],
    datasets: [
        {
            data: numberStatePayment,
            backgroundColor: [
                "#FF6384",
                "#36A2EB"
            ],
            hoverBackgroundColor: [
                "#FF6384",
                "#36A2EB"
            ]
        }]
};

$(function () {
    $career = $('#career_id');
    $career.on('change', updateCareerFilter);

    var ctx = document.getElementById("myChart").getContext("2d");

    var myPieChart = new Chart(ctx,{
        type: 'pie',
        data: data
    });
});

function updateCareerFilter() {
    var career_id = $(this).val();
    location.href = 'carrera?career_id='+career_id;
}