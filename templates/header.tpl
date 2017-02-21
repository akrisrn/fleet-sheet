<!DOCTYPE html>{config_load file="site.conf"}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title} | {#sitename#}</title>
    <link rel="stylesheet" type="text/css" href="theme/css/style.css?v={#version#}">
    <script type="text/javascript" src="theme/js/pace.min.js?v={#version#}"></script>
    <link rel="stylesheet" type="text/css" href="theme/css/pace.css?v={#version#}">
    {if {$type} != "index" }
        <script>
            Pace.on("done", function () {
                $("#content").fadeIn(500);
            });
        </script>
        <link rel="stylesheet" type="text/css" href="theme/css/table.css?v={#version#}">
        <link rel="stylesheet" type="text/css" href="theme/css/gh-buttons.css?v={#version#}">
        <link rel="stylesheet" type="text/css" href="theme/css/{$type}.css?v={#version#}">
        <script type="text/javascript" src="theme/js/jquery.min.js?v={#version#}"></script>
        <script type="text/javascript" src="theme/js/jquery.tablesorter.min.js?v={#version#}"></script>
        <script type="text/javascript" src="theme/js/table.js?v={#version#}"></script>
        <script type="text/javascript" src="theme/js/{$type}.js?v={#version#}"></script>
    {/if}
</head>
<body>
<div id="header">
    <ul>
        <li>
            <a href="index.php"><img src="theme/img/anchor.png"></a>
        </li>
        <li>
            <a href="index.php">{#sitename#}</a>
        </li>
        <li>
            <a href="ships.php">舰娘</a>
        </li>
        <li>
            <a href="equip.php">装备</a>
        </li>
        <li>
            <a href="map.php">海图</a>
        </li>
        <li>
            <a href="mission.php">远征</a>
        </li>
        {if {$search} }
            <li>
                <input type="text" id="searchBox" placeholder="请输入要查找的{$search}．．．"
                       onkeydown='{literal}if(event.keyCode==13){searchBtn.click()}{/literal}'/>
                <a href="#" id="searchBtn">搜索</a>
            </li>
        {/if}
    </ul>
    <a href="https://github.com/akrisrn/fleet-sheet" target="_blank">
        <img style="position: absolute; top: 0; right: 0; border: 0;"
             src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67"
             alt="Fork me on GitHub"
             data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png">
    </a>
</div>
<div id="content">
    <div id="show">