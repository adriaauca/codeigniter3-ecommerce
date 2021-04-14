function removeItem (id)
{
    $.ajax({
        url: baseURL + "Chart/destroy",
        type: "POST",
        data: {
          id: id,
        },
        cache: false,
        dataType: "text",
        success: function (data) {
            location.reload(); 
        },
        error: function (error) {
            console.dir(error);
        },
    });
}


(function()
{
    let temporary_amount = document.getElementById("temporary_amount");
    let temporary_shipping = document.getElementById("shipping");

    temporary_amount.innerHTML = amount;
    temporary_shipping.innerHTML = shipping;
    
    document.getElementById("total_amount").innerHTML = parseFloat(temporary_amount.innerHTML) + parseFloat(temporary_shipping.innerHTML);
})();


document.getElementById("checkout").onclick = function()
{
    if (amount > 0)
    {
        window.open(baseURL + 'checkout',"_self");
    }
};