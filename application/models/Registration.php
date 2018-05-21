<?php
namespace models;

class Registration
{
  public function __construct()
  {
     echo "<!doctype html>
    <html lang=\"ru\">
    <head>
    
    <script type=\"text/javascript\">
    function showTime()
    {
        var dat = new Date();
        var H = '' + dat.getHours();
        H = H.length<2 ? '0' + H:H;
          var M = '' + dat.getMinutes();
          M = M.length<2 ? '0' + M:M;
          var S = '' + dat.getSeconds();
          S =S.length<2 ? '0' + S:S;
          var clock = H + ':' + M + ':' + S;

         .getElementById('time_div')
        .innerHTML=clock;
        setTimeout(showTime,1000);  // перерисовать 1 раз в сек.
    }
    </script>
      <meta charset=\"UTF-8\">
      <title>Registration</title>
      </head>
      <body>
      
      <div id=\"time_div\" style=\"font-size:20px; margin-left:20px%\"></div>
      <script type=\"text/javascript\">  showTime();</script>
      
        <form action=\"http://notes.wrk/login\" method=\"post\">
          <div>Registration</div> <br>
          <input type=\"text\" name=\"login\" value =\"\" placeholder=\"login\" required> <br>
          <input type=\"password\" name=\"pass\" placeholder=\"pass\" required> <br>
          <input type=\"password\" name=\"repeat_pass\" placeholder=\"repeat your pass\" required> <br>
          <input type=\"text\" name=\"email\" placeholder=\"e-mail\" required> <br>
          <input type=\"text\" name=\"name\" placeholder=\"name\" required><br>
          <input type=\"text\" name=\"surname\" placeholder=\"surname\" required><br>
          <p></p>
          <button>register now</button>
        </form>
      </body>
    </html>";
  }
}
?>
