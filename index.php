<script type="text/javascript">
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
        document
            .getElementById('time_div')
            .innerHTML=clock;
        setTimeout(showTime,1000);  // перерисовать 1 раз в сек.
    }
</script>
<script type="text/javascript">  showTime();</script>


<?php
echo "<pre>";
//header("Content-type:text/html;charset='utf-8");
require './application/libs/Bootstrap.php';



function __autoload($className)
{
    $class_pieces = explode('\\', $className);
    switch ($class_pieces[0])
    {
        case 'controllers':
            require __DIR__ . '/application/' . implode(DIRECTORY_SEPARATOR, $class_pieces) . '.php';
            break;
        case 'libs':
            require __DIR__ . '/application/' . implode(DIRECTORY_SEPARATOR, $class_pieces) . '.php';
            break;
        case 'models':
            require __DIR__ . '/application/' . implode(DIRECTORY_SEPARATOR, $class_pieces) . '.php';
            break;
    }
}











