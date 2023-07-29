<?php
session_start();

include("config.php");
include("./../scratch.php");

if (isset($_SESSION['admin']) and $_SESSION['admin'] == "$user") {
    
if(isset($_POST['appname']) and !is_null($_POST['appname']) and $_POST['appname'] != ''){
    $appname = $_POST['appname'];
    
    mysqli_query($conn,"UPDATE `config` SET `appname`='$appname'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['caption']) and !is_null($_POST['caption']) and $_POST['caption'] != ''){
    $caption = $_POST['caption'];
    
    mysqli_query($conn,"UPDATE `config` SET `caption`='$caption'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['instagram']) and !is_null($_POST['instagram']) and $_POST['instagram'] != ''){
    $instagram = $_POST['instagram'];
    
    mysqli_query($conn,"UPDATE `config` SET `instagram`='$instagram'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['telegram']) and !is_null($_POST['telegram']) and $_POST['telegram'] != ''){
    $telegram = $_POST['telegram'];
    
    mysqli_query($conn,"UPDATE `config` SET `telegram`='$telegram'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['walet']) and !is_null($_POST['walet']) and $_POST['walet'] != ''){
    $walet = $_POST['walet'];
    
    mysqli_query($conn,"UPDATE `config` SET `walet`='$walet'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['crisp-script']) and !is_null($_POST['crisp-script']) and $_POST['crisp-script'] != ''){
    $crispSC = $_POST['crisp-script'];
    
    mysqli_query($conn,"UPDATE `config` SET `crispSC`='$crispSC'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['zarinpal-token']) and !is_null($_POST['zarinpal-token']) and $_POST['zarinpal-token'] != ''){
    $zarinpal = $_POST['zarinpal-token'];
    
    mysqli_query($conn,"UPDATE `config` SET `zarinpal`='$zarinpal'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['seo-data']) and !is_null($_POST['seo-data']) and $_POST['seo-data'] != ''){
    $seo = $_POST['seo-data'];
    
    mysqli_query($conn,"UPDATE `config` SET `seo`='$seo'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['alert']) and !is_null($_POST['alert']) and $_POST['alert'] != ''){
    $alert = $_POST['alert'];
    
    mysqli_query($conn,"UPDATE `config` SET `alert`='$alert'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['logout']) && $_POST['logout'] !== null and $_POST['logout'] !== ''){
    session_destroy();
    echo json_encode(['success' => 1]);
}

if(isset($_POST['deleteByProductId']) and !is_null($_POST['deleteByProductId']) and $_POST['deleteByProductId'] != ''){
    $deleteByProductId = $_POST['deleteByProductId'];
    
    mysqli_query($conn,"DELETE FROM `serF` WHERE `id`=$deleteByProductId");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['EditServiceName']) and !is_null($_POST['EditServiceName']) and $_POST['EditServiceName'] != ''){
    $EditServiceName = $_POST['EditServiceName'];
    
    mysqli_query($conn,"UPDATE `serF` SET `name`='$EditServiceName'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['EditServiceValue']) and !is_null($_POST['EditServiceValue']) and $_POST['EditServiceValue'] != ''){
    $EditServiceValue = $_POST['EditServiceValue'];
    
    mysqli_query($conn,"UPDATE `serF` SET `hajm`='$EditServiceValue'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['EditAlert']) and !is_null($_POST['EditAlert']) and $_POST['EditAlert'] != ''){
    $EditServiceValue = $_POST['EditAlert'];
    
    mysqli_query($conn,"UPDATE `serF` SET `alert`='$EditServiceValue'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['EditServiceTime']) and !is_null($_POST['EditServiceTime']) and $_POST['EditServiceTime'] != ''){
    $EditServiceTime = $_POST['EditServiceTime'];
    
    mysqli_query($conn,"UPDATE `serF` SET `time`='$EditServiceTime'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['EditServiceType']) and !is_null($_POST['EditServiceType']) and $_POST['EditServiceType'] != ''){
    $EditServiceType = $_POST['EditServiceType'];
    
    mysqli_query($conn,"UPDATE `serF` SET `protocol`='$EditServiceType'");
    echo json_encode(['success' => 1]);
}
if(isset($_POST['alert-visability']) and !is_null($_POST['alert-visability']) and $_POST['alert-visability'] != ''){

    $visability = $_POST['alert-visability'];
    
    if($visability == "true"){
        
    mysqli_query($conn,"UPDATE `config` SET `alertShow`='on'");
    echo json_encode(['success' => 1]);
    }else{
        mysqli_query($conn,"UPDATE `config` SET `alertShow`='off'");
    echo json_encode(['success' => 1]);
    }
}

if(isset($_POST['EditServiceRegion']) and !is_null($_POST['EditServiceRegion']) and $_POST['EditServiceRegion'] != ''){
    $EditServiceRegion = $_POST['EditServiceRegion'];
    
    mysqli_query($conn,"UPDATE `serF` SET `contry`='$EditServiceRegion'");
    echo json_encode(['success' => 1]);
}

if(isset($_POST['serviceTime']) and !is_null($_POST['serviceTime']) and $_POST['serviceTime'] != ''){
    
    $serviceTime     = $_POST['serviceTime'];
    $serviceType     = $_POST['serviceType'];
    $serviceRegion   = $_POST['serviceRegion'];
    $serviceIp       = $_POST['serviceIp'];
    $tlsPublic       = $_POST['tlsPublic'];
    $tlsPrivate      = $_POST['tlsPrivate'];
    $requestHostURI  = $_POST['requestHostURI'];
    $serviceName     = $_POST['serviceName'];
    $serviceValue    = $_POST['serviceValue'];
    $servicePrice    = $_POST['servicePrice'];
    $servicePort     = $_POST['servicePort'];
    $serviceNetwork  = $_POST['serviceNetwork'];
    $servispanel     = $_POST['servicePanel'];

    

    $sql2    = "INSERT INTO `serF` (`name`, `coin`, `protocol`, `natwork`, `port`, `ip`, `time`, `hajm`, `active`, `contry`, `hosturl`, `public`, `privet`) VALUES ('$serviceName', '$servicePrice', '$serviceType', '$serviceNetwork', '$servicePort', '$servispanel', '$serviceTime', '$serviceValue', 'active', '$serviceRegion', '$requestHostURI', '$tlsPublic', '$tlsPrivate')";
    $result2 = mysqli_query($conn,$sql2);
    
    echo json_encode(['success' => 1]);
    
    
}

if(isset($_POST['panelIp']) and !is_null($_POST['panelIp']) and $_POST['panelIp'] != ''){
    
    $panelIp         = $_POST['panelIp'];
    $panelPort       = $_POST['panelPort'];
    $panelUsername   = $_POST['panelUsername'];
    $panelPassword   = $_POST['panelPassword'];
    

    
    $sql2    = "INSERT INTO `panel` (`ip`, `username`, `password`, `port`) VALUES ('$panelIp', '$panelUsername', '$panelPassword', '$panelPort')";
    $result2 = mysqli_query($conn,$sql2);
    
    echo json_encode(['success' => 1]);
    

    
}
    
}else{
    header("Location: ./login.php");
}

?>