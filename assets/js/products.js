
function deleteRow(id)
{
  if (confirm("Are you sure you want to permanently remove this product?"))
  {
    $.post( "Products/destroy", {id: id}, function()
    {
      location.replace('products');
    });
  }
}


function updateRow(name)
{
  if (confirm("Are you sure you want to update this product?"))
  {
    product_name = name.replace(' ', '_');;
    window.location.href = baseURL + product_name;
  }
}


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
          {
            data: null,
            mRender: function (data, type, full)
            {
              return '<button type="button" class="btn btn-info" onclick="updateRow(`' + full["name"] + '`)" >Update</button>   <button type="button" class="btn btn-danger" onclick="deleteRow(' + full["id"] + ')" >Delete</button>';
            },
            type: "string",
          }
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
                  text: 'Copy',
                  titleAttr: "Copiar",
                  className: "btn btn-sm btn-rounded btn-warning text-light",
              },
              {
                  extend: "excel",
                  text: 'Excel',
                  title:
                    "products_" +
                    ("0" + new Date().getDate()).slice(-2) +
                    "-" +
                    ("0" + (new Date().getMonth() + 1)).slice(-2) +
                    "-" +
                    new Date().getFullYear(),
                  customize: function (xlsx) {
                      var sheet = xlsx.xl.worksheets["sheet1.xml"];
                      var filters = $("#Products").DataTable().searchBuilder.getDetails();
                      var result = "";
                      var depth = 0;
          
                      function criteria(filters) {
                        depth++;
                        var logic = "";
                        if (filters["logic"] == "AND") {
                          logic = " * All options must be met [AND]";
                        }
                        if (filters["logic"] == "OR") {
                          logic = " * Se pueden cumplir todas las opciones [OR]";
                        }
          
                        for (let index = 0; index < depth; index++) {
                          result += "    ";
                        }
          
                        result += logic + "\n";
          
                        var condition = "";
                        filters["criteria"].forEach(function (valor, indice, array) {
                          if (valor["criteria"]) {
                            criteria(valor);
                            depth--;
                          } else {
                            switch (valor["condition"]) {
                              case "!=":
                                condition = "not";
                                break;
                              case "!between":
                                condition = "not between";
                                break;
                              case "between":
                                condition = "between";
                                break;
                              case "!null":
                                condition = "not empty";
                                break;
                              case "null":
                                condition = "empty";
                                break;
                              case "<":
                                condition = "less than";
                                break;
                              case "<=":
                                condition = "less than equal to";
                                break;
                              case "=":
                                condition = "equals";
                                break;
                              case ">":
                                condition = "greater than";
                                break;
                              case ">=":
                                condition = "greater than equal to";
                                break;
                              default:
                                condition = valor["condition"];
                                break;
                            }
          
                            for (let index = 0; index < depth; index++) {
                              result += "    ";
                            }
                            result +=
                              "   --> " +
                              valor["data"] +
                              " " +
                              condition +
                              " " +
                              valor["value"] +
                              "\n";
                          }
                        });
                      }
          
                      if (Object.keys(filters).length > 0) {
                        criteria(filters);
                      } else {
                        result = " * No filter applied.";
                      }
          
                      var numrows = 1;
                      var clR = $("row", sheet);
          
                      //update Row
                      clR.each(function () {
                        var attr = $(this).attr("r");
                        var ind = parseInt(attr);
                        ind = ind + numrows;
                        $(this).attr("r", ind);
                      });
          
                      // Create row before data
                      $("row c ", sheet).each(function () {
                        var attr = $(this).attr("r");
                        var pre = attr.substring(0, 1);
                        var ind = parseInt(attr.substring(1, attr.length));
                        ind = ind + numrows;
                        $(this).attr("r", pre + ind);
                      });
          
                      function Addrow(index, data) {
                        if (index == 1) {
                          msg = '<row ht="120" r="' + index + '">';
                        } else {
                          msg = '<row r="' + index + '">';
                        }
          
                        for (i = 0; i < data.length; i++) {
                          var key = data[i].k;
                          var value = data[i].v;
                          msg += '<c t="inlineStr" r="' + key + index + '" s="42">';
                          msg += "<is>";
                          msg += "<t>" + value + "</t>";
                          msg += "</is>";
                          msg += "</c>";
                        }
                        msg += "</row>";
                        return msg;
                      }
          
                      //insert
                      var r1 = Addrow(1, [{ k: "A", v: "ColA" }]);
          
                      sheet.childNodes[0].childNodes[1].innerHTML = r1 + sheet.childNodes[0].childNodes[1].innerHTML;
          
                      $("row c[r=A1] t", sheet).text("APPLIED FILTERS: \n " + result);
                      $("row c[r=A2] t", sheet).text("");
                      $("row:nth-child(3) c", sheet).attr("s", "42");
                    },
                  titleAttr: "Excel",
                  className: "btn btn-sm btn-rounded btn-success",
              },
              {
                  extend: "pdf",
                  text: 'PDF',
                  title: 'Products',
                  titleAttr: "PDF",
                  className: "btn btn-sm btn-rounded btn-danger",
                  filename:
                    "products_" +
                    ("0" + new Date().getDate()).slice(-2) +
                    "-" +
                    ("0" + (new Date().getMonth() + 1)).slice(-2) +
                    "-" +
                    new Date().getFullYear(),
                  messageTop: function () {
                      var filters = $("#Products").DataTable().searchBuilder.getDetails();
                      var result = "";
                      var depth = 0;
          
                      function criteria(filters) {
                        depth++;
                        var logic = "";
                        if (filters["logic"] == "AND") {
                          logic = " * All options must be met [AND]";
                        }
                        if (filters["logic"] == "OR") {
                          logic = " * Se pueden cumplir todas las opciones [OR]";
                        }
          
                        for (let index = 0; index < depth; index++) {
                          result += "    ";
                        }
          
                        result += logic + "\n";
          
                        var condition = "";
                        filters["criteria"].forEach(function (valor, indice, array) {
                          if (valor["criteria"]) {
                            criteria(valor);
                            depth--;
                          } else {
                            switch (valor["condition"]) {
                              case "!=":
                                condition = "not";
                                break;
                              case "!between":
                                condition = "not between";
                                break;
                              case "between":
                                condition = "between";
                                break;
                              case "!null":
                                condition = "not empty";
                                break;
                              case "null":
                                condition = "empty";
                                break;
                              case "<":
                                condition = "less than";
                                break;
                              case "<=":
                                condition = "less than equal to";
                                break;
                              case "=":
                                condition = "equals";
                                break;
                              case ">":
                                condition = "greater than";
                                break;
                              case ">=":
                                condition = "greater than equal to";
                                break;
                              default:
                                condition = valor["condition"];
                                break;
                            }
          
                            for (let index = 0; index < depth; index++) {
                              result += "    ";
                            }
                            result +=
                              "   --> " +
                              valor["data"] +
                              " " +
                              condition +
                              " " +
                              valor["value"] +
                              "\n";
                          }
                        });
                      }
          
                      if (Object.keys(filters).length > 0) {
                        criteria(filters);
                      } else {
                        result = " * No filter applied.";
                      }

                      return "APPLIED FILTERS: \n " + result; 
                  },
                  customize: function (doc) {

                      // Create a footer
                      doc['footer']=(function(page, pages) {
                          return {
                              columns: [
                                  '',
                                  {
                                      // This is the right column
                                      alignment: 'right',
                                      text: ['Page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                                  }
                              ],
                              margin: [10, 0]
                          }
                      });
                  },
              },
          ],
      },
      order: [[0, "desc"]],
  });

  $("#Products").css("display", "");
});