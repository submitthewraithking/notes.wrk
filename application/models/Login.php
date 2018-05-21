<?php
namespace models;
class Login
{
    public function __construct()
    {
        echo "<!doctype html>
        <html lang=\"ru\">
        <head>
        <meta charset=\"UTF-8\">
        <title>Login</title>
        </head>
        <body>
        <form action=\"http://notes.wrk/main\" method=\"post\">
        <div>Login</div> <br>
        <input type=\"text\" name=\"login\" placeholder=\"login\" required> <br>
        <input type=\"password\" name=\"pass\" placeholder=\"pass\" required> <br>
        <button>Sign in</button>
        </form>
        </body>
        </html>";
    }
}
?>




