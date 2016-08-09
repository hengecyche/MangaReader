<?php
    $dir="./mangaFiles/non_non";
    $files=scandir($dir,SCANDIR_SORT_NONE);
    natsort($files);
$output=<<<EOF
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="jquery-3.1.0.min.js" defer></script>
    </head>
    <body>
        <header>Manga Reader Beta For: <a href="http://kamitranslation.com">KamiTranslation</a></header
        <div class="container">
            <div class="container reader-header" id="reader-header">
                <div class="row">
                    <div class="col-md-4">
                        <select class="selectpicker" id="manga-select" name="manga-select">
                            <option value="default" selected>Choose a Manga:</option>
                            <option value="manga_22rdsd">Some Manga Name</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="selectpicker" id="chapter-select" name="chapter-select">
                            <option value="default" selected>Choose a Chapter....</option>
                            <option value="manga_22rdsd">Some Chapter Name</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="selectpicker" id="page-select" name="page-select">
EOF;
        for($i=1;$i<=count($files);$i++)
        {
            $output.="<option value='page-$i'>Page $i</option>";
        }
$output.=<<<EOF
                        </select>
                    </div>
                </div>
            </div>
            <div class="container reader-setting" id="reader-setting">
                
            </div>
            <div class="container reader-body" id="reader-body">
EOF;

$j=1;
foreach($files as $file)
{
    if($file=="." || $file=="..") continue;
    $k=$j+1;
    $imgsource=$dir."/".$file;
    $output.="<div class='container manga-img-container'><a href='#$k'><img id='$j' src='$imgsource' class='manga-img'/>
    </div>";
    $j++;
}
$output.=<<<EOF
            </div>
        </div>
    </body>
</html>
<style>
    body
    {
        background-color:rgb(204, 255, 204);
    }
    .reader-header
    {
        padding:20px 0px;
        background-color:red;
    }
    
    .manga-img-container
    {
        border:2px solid black;
        margin:20px 0px;
        padding:0px;
    }

    .manga-img
    {
        width:100%;
    }
</style>
EOF;

echo $output;