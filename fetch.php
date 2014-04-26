<?php
  date_default_timezone_set("Asia/Tokyo");

  header("Content-Type: application/json; charset=UTF-8");
  header("X-Content-Type-Options: nosniff");
  header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", FALSE);

  $filepath = "text";
  $ret = array();
  $ret["time"] = filemtime($filepath);
  $file = file_get_contents($filepath);
  $lines = explode("\n", $file);
  foreach($lines as $i => &$line) {
    if($line === "") {
      unset($lines[$i]);
      break;
    }
    $tmp = explode(",", $line);
    $line = array(
      "date" => date("Y/m/d H:i:s", $tmp[0]),
      "name" => base64_decode($tmp[1]),
      "message" => base64_decode($tmp[2])
    );
  }
  unset($line);
  $ret["line"] = $lines;

  echo json_encode($ret);

