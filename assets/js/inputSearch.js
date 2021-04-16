
$(document).ready(function ()
{
    document.getElementById('inputSearch').addEventListener("keyup", myFunction);

    let div = document.createElement("div");
    div.setAttribute("id", "containerInputSearch");
    div.style.display = "none";
    document.getElementsByClassName('container')[0].parentNode.insertBefore(div, document.getElementsByClassName('container')[0]);

    function myFunction()
    {
        if (document.getElementById('inputSearch').value.length >= 1)
        {
            document.getElementsByClassName('container')[0].style.display = "none";
            document.getElementById('containerInputSearch').style.display = "block";  

            let xml = new XMLHttpRequest();
            let search = document.getElementById("inputSearch").value;
            let url = "Products/show_matches";

            xml.open("POST", url, true);

            xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xml.onreadystatechange = function ()
            {
                if(xml.readyState == 4)
                {
                    if (xml.status == 200)
                    {
                        if (xml.responseText != "1")
                        {
                            result = '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-3">';
                            result += xml.responseText;
                            result += '</div>';
                        }
                        else
                        {
                            result = 'Without results ....';
                        }
                    }
                    else
                    {
                        result = 'Server error ' + xml.status;
                    }
                    
                    document.getElementById('containerInputSearch').innerHTML = result;
                }
            }

            xml.send('search=' + search);
        }
        if (document.getElementById('inputSearch').value.length == 0)
        {
            document.getElementsByClassName('container')[0].style.display = "block";
            document.getElementById('containerInputSearch').style.display = "none";  
        }
    }
});