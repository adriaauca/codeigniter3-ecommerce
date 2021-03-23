
$(document).ready(function () {


    $.fn.dataTable.ext.buttons.reload = {
        text: 'Reload Table',
        action: function (e, dt, node, config) {
            dt.ajax.reload();
        },
    };


    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
        },
        pagingType: "full_numbers",
        searchBuilder: {
            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
        },
        dom:
            "<'row'<'col-sm-12 col-md-7 p-0'RB>>" +
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12 col-md-12'Q>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        autoWidth: false,
        stateSave: false,
        destroy: true,
        responsive: true,
        pageLength: 10,
        lengthMenu: [
            [10, 20, 50, 100],
            [10, 20, 50, 100],
        ],
    });


    var Products = $("#Products").DataTable({
        ajax: {
            url: baseURL + "Products/show_all",
            type: "GET",
            error: function (err) {
                console.log(err);
                //window.location.href = baseURL + "dashboard";
            },
        },
        columns: [
            {
                data: "id",
                type: "num",
            },
            {
                data: "name",
                type: "text",
            },
            {
                data: "model",
                type: "text",
            },
            {
                data: "color",
                type: "text",
            },
            {
                data: "price",
                type: "num",
            },
            {
                data: "last_price",
                type: "num",
            },
            {
                data: "discount",
                type: "num",
            },
            {
                data: "discount_status",
                  mRender: function (data, type, full) {
                    if(data == 0) {
                      return 'OFF';
                    }
                    else {
                      return 'ON';
                    }
                  },
                type: "text",
            },
            {
                data: "status",
                  mRender: function (data, type, full) {
                    if(data == 0) {
                      return 'OFF';
                    }
                    else {
                      return 'ON';
                    }
                  },
                type: "text",
            },
            {
                data: "fk_department_id",
                type: "num",
            },
        ],
        buttons: {
            dom: {
                container: {
                    tag: "div",
                    className: "dt-buttons btn-group flex-wrap w-100 m-auto",
                },
            },
            buttons: [
                {
                    extend: "reload",
                    titleAttr: "Recargar",
                    className: " btn btn-sm btn-rounded btn-primary",
                },
                {
                    extend: "copy",
                    text: 'COPY',
                    titleAttr: "Copiar",
                    className: "btn btn-sm btn-rounded btn-warning text-light",
                },
                {
                    extend: "excel",
                    text: 'EXCEL',
                    titleAttr: "Excel",
                    className: "btn btn-sm btn-rounded btn-success",
                },
                {
                    extend: "pdf",
                    text: 'PDF',
                    titleAttr: "PDF",
                    className: "btn btn-sm btn-rounded btn-danger",
                },
            ],
        },
        order: [[0, "desc"]],
    });

    $("#Products").css("display", "");


    $("#Products").on("click", "tr", function ()
    {
        if (Products.row(this).data() != null)
        {
            data = Products.row(this).data();
            id = data["id"];
            product_name = data["name"].replace(' ', '_');;
            alert("Open product nº" + id);
            window.location.href = baseURL + product_name;
        }
    });
});