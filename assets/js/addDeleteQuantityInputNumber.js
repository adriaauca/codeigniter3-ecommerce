(function()
{
    let minus = document.getElementById("minus");
    let plus = document.getElementById("plus");
    let quantity = document.getElementById("quantity");

    minus.addEventListener("click", function ()
    {
        if (quantity.value > 1)
        {
            quantity.stepDown();
            document.getElementById("max_quantity").style.color = "black";
        }
    });

    plus.addEventListener("click", function ()
    {
        if (quantity.value < parseInt(max_quantity))
        {
            quantity.stepUp();
        }
        if (quantity.value >= parseInt(max_quantity)) {
            document.getElementById("max_quantity").style.color = "red";
        }
    });
})();