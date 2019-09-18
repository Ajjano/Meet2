<?php
$str='';
$error='';
if(isset($_GET['country'])){
    $country=$_GET['country'];
    $isExist=false;
    $isCan=false;
    $writeCounty=fopen("countries.txt", 'a+') or die ("file cannot be opened");
    if($writeCounty){
        while (($buffer=fgets($writeCounty))!==false) {
            if(trim($buffer)==trim($country)){
                $isExist=true;
                $error="this country has existed already in the file";
                break;
            }
        }
    }

    $test=fopen("test.txt", 'a+') or die ("file cannot be opened");
    while (($buffer=fgets($test))!=false){
        if(trim($buffer)==trim($country)){
            $isCan=true;
            break;
        }
    }

    if(!$isCan)
        $error="country is wrong!";
    
    if($country!=''&&!$isExist&&$isCan){
        fwrite($writeCounty,"$country".PHP_EOL);
    }


    $str=$str."<select>";
    $countFile=fopen("countries.txt", 'r') or die("");
    if($countFile){
        while (($buffer=fgets($countFile))!==false) {
            $str=$str."<option>$buffer</option>";
        }
    }

    $str=$str."</select>";
    $str .= "
         <div class='country_error'>$error</div>
    ";
    echo $str;
}
