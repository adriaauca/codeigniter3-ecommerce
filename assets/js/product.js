function removeComment()
{
    if (confirm("Are you sure you want to permanently remove this comment?"))
    {
        $.post( "Comments/destroy", function() {
            location.replace(product_name);
        });
    }
}