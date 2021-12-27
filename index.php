<?php


require_once "./stream.php";
$stream = new VideoStream("./sample2.mp4");
$stream->start();
exit;