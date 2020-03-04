<?php
namespace App;

date_default_timezone_set('Europe/Paris'); 

use App\Controller\App;

require('../controller/app.php');


if(isset($_GET['groupe'])){
    $group = $_GET['groupe'];
}else{
    $group = "D1";
}

if(isset($_GET['dateStart'])){
    $dateD = $_GET['dateStart'];
}else{
    $dateD = date('Y-m-d');
   
}
if(isset($_GET['dateEnd'])){

    $dateF = date('Y-m-d', strtotime("+1 day", strtotime($_GET['dateEnd'])));
}else{
   
    if(isset($_GET['dateStart'])){
        $dateF = date('Y-m-d', strtotime("+1 day", strtotime($_GET['dateStart'])));
    }else{
        $dateF = date('Y-m-d', strtotime("+1 day"));
       
    }
   
}

if(isset($_GET['semaine'])){
    if($_GET['semaine'] == "true"){

        $dateF = date('Y-m-d', strtotime("+7 day"));
    }else{
        $dateF = date('Y-m-d', strtotime("+1 day"));
    }
}

$res = App::getCours($dateD,$dateF,$group);

require('../view/calView.php');

