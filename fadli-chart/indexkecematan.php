<!DOCTYPE html>
<html>
<?php
    include_once("config.php"); 
    $result = mysqli_query($conn, "SELECT Monthname(bulan) as bulan,kecematan,jumlahPeserta,jumlahLulus,persentase FROM ujiankelulusan ORDER BY MONTH(bulan)");

    $bulan="";
    $kecematan="";
    $jumlahPeserta="";
    $jumlahLulus="";
    $persentase="";
    while ($res = mysqli_fetch_array($result)) {
        $bulan =$bulan."'".$res['bulan']."',";
        $kecematan=$kecematan."'".$res['kecematan']."',";
        $jumlahPeserta=$jumlahPeserta."".$res['jumlahPeserta'].",";
        $jumlahLulus=$jumlahLulus."".$res['jumlahLulus'].",";
        $persentase=$persentase."".$res['persentase'].",";
    }

    echo "<script class='code-js' id='code-js'>
        var data = {
        categories: [$kecematan],
         series: [
            {
                name: 'Peserta',
                data: [$jumlahPeserta]
            },
            {
                name: 'Kelulusan',
                data: [$jumlahLulus]
            },
            {
                name: 'Persentase',
                data: [$persentase] 
            }
        ]
    };
    </script>"

?>
<head lang="kr">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <title>Grafik Kedua Saya</title>
    <link rel="stylesheet" type="text/css" href="./dist/tui-chart.css" />
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.css'/>
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.css'/>
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/theme/neo.css'/>
    <link rel="stylesheet" type="text/css" href="./css/example.css" />
</head>
<body>
<div class='wrap'>
    <div class='code-html' id='code-html'>
        <div id='chart-area'></div>
    </div>
</div>
<script type='text/javascript' src='https://uicdn.toast.com/tui.chart/latest/raphael.js'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/core-js/2.5.7/core.js'></script>
<script src='./dist/tui-chart.js'></script>
<script class='code-js' id='code-js'>
var container = document.getElementById('chart-area');
var options = {
    chart: {
        width: 1160,
        height: 650,
        title: 'Daftar Kelulusan Di Kecematan',
    },
    yAxis: {
        title: 'Kecematan'
    },
    xAxis: {
        title: 'Peserta Kelulusan',
        min: 0,
        max: 200,
    },
    xAxis: {
        title: 'Persentase Kelulusan',
        min: 0,
        max: 100,
    },
     series: {
         showLabel: true
     }
};
var theme = {
    series: {
        colors: [
            '#83b14e', '#458a3f', '#295ba0', '#2a4175', '#289399',
            '#289399', '#617178', '#8a9a9a', '#516f7d', '#dddddd'
        ]
    }
};

// For apply theme

// tui.chart.registerTheme('myTheme', theme);
// options.theme = 'myTheme';

tui.chart.columnChart(container, data, options);
</script>

<!--For tutorial page-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/codemirror.js'></script>
<script src='//ajax.aspnetcdn.com/ajax/jshint/r07/jshint.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/edit/matchbrackets.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/selection/active-line.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/mode/javascript/javascript.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/lint.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.43.0/addon/lint/javascript-lint.js'></script>
<script src='./js/example.js'></script>
</body>
</html>
