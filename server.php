<?php
    //define env
    require 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    //url define
    $baseip = $_SERVER['HTTP_HOST'];
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? $protocol = 'https' : $protocol = 'http';
    $path = $_ENV['APP'];
    $configpath = $_ENV['NODEM'];
    $configurl = $protocol."://".$baseip.$configpath;
    $app = $protocol."://".$baseip.$path;
    $baseRoot = $_ENV['ROOT'];
    $baseurl = $protocol."://".$baseip.$baseRoot;
    define('ROOT_DIR',dirname(__FILE__));

    //Database
    $Dbname = $_ENV['DBNAME'];
    $host = $_ENV['DBHOST'];
    $user = $_ENV['DBUSER'];
    $pass = $_ENV['DBPASSWORD'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$Dbname;",$user,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
        echo "Connect failed: ". $e->getMessage();
    }

    //load Component
    require 'Component/notify.php';
    require 'Component/Controller.php';
    require 'Component/CssPackage.php';
    $Controller = new Controller($conn);
    $notify = new Notify();
    $CssConfig = new CssPackage(ROOT_DIR,$baseurl);
?>