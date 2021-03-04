/*require('./bootstrap');*/

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
            let dateTable = $('#dataTableBuilder');
            if (dateTable.length) dateTable.DataTable().ajax.reload();
        }
    });
});
