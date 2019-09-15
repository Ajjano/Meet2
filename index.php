<?php
if(isset($_POST['country'])){
    $country='';
    $error='';
    $country=$_POST['country'];
    $isExist=false;
    $isCan=false;
    $writeCounty=fopen("countries.txt", 'a+') or die ("file cannot be opened");
    if($writeCounty){
        while (($buffer=fgets($writeCounty,4096))!==false) {
            $check=explode(" ", $buffer);
            echo (ltrim(htmlspecialchars($buffer))).' - '.(ltrim(htmlspecialchars($country))).'--------';
            if(ltrim(htmlspecialchars($buffer))==ltrim(htmlspecialchars($country))){
                $isExist=true;
                break;
            }
        }
    }
    if(!$isCan){
        $test=fopen("test.txt", 'a+') or die ("file cannot be opened");
        while (($buffer=fgets($test, 4096))!=false){
            if($buffer==$country){
                $isCan=true;
                break;
            }
        }
    }
    if($country!=''&&!$isExist&&$isCan){
        fwrite($writeCounty,"$country\n");
    }
    else{
        $error="Error!";
    }

    $str='';
    $str=$str."<select>";
    $countFile=fopen("countries.txt", 'r') or die("");
    if($countFile){
            while (($buffer=fgets($countFile))!==false) {
                $str=$str."<option>$buffer</option>";
            }
    }

    $str=$str."</select>";
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Document</title>
    <style>
        .country_error{
            font-size: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="#">
        <label for="country">Enter the country:</label>
        <input type="text" name="country">
        <input type="submit" name="sub_btn">
    </form>
    <div class="country_error"> <?php echo $error?></div>
   <div class="country_select"> <?php echo $str?></div>
</body>
</html>