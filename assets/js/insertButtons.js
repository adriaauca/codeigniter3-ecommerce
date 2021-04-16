function insertButtons (table)
{
  let hasButtons = document.getElementById("table_btn").hasChildNodes();

  if (hasButtons)
  {
    document.getElementById("table_btn").innerHTML = '';
  }
  else
  {
    $("#" + table).DataTable().buttons(0, null).container().appendTo("#table_btn");
  }
}