/*require('./bootstrap');*/

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".select-filial").on('click', function(){
        $.ajax({
            data: {
                filial_id: this.dataset.filial_id
            },
            method: "POST",
            url: "/setfilial",
            success: function (result) {
                $("#current-filial").text(result.data.filial.filial_name);
                $(".select-filial").removeClass("active");
                $(".select-filial[data-filial_id = '" + result.data.filial.filial_id + "']").addClass("active");
                updateWorkerTable();
            }
        });
    });

    $(".filial-workers").on('click', function(){
        $.ajax({
            data: {
                filial_id: this.dataset.filial_id
            },
            method: "POST",
            url: "/setfilial",
            success: function (result) {
                document.location.href = '/workers';
            }
        });
    });

    function updateWorkerTable() {
        $.ajax({
            method: "GET",
            url: "/workers",
            dataType: 'html',
            success: function (result) {
                $("#workers-container").html($(result).find('#workers-container').html());
            }
        });
    }
});





