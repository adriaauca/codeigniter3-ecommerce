(function()
{
    let password = document.getElementById("password");
    let emoji = document.getElementById("emoji_password");

    emoji.addEventListener("click", function ()
    {
        if(password.type == 'text')
        {
            password.type = 'password';
            emoji.innerHTML = "🔒";
        }
        else if(password.type == 'password')
        {
            password.type = 'text';
            emoji.innerHTML = "🔓";
        }
    });
})();