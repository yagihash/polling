<?php
  function check($param) {
    if(isset($_POST[$param]) and !is_array($_POST[$param]) and $_POST[$param]) 
      return true;
    else
      return false;
  }
  $filepath = "text";
  $timestamp = time();
  if (check("name") and check("message")) {
    $name = base64_encode($_POST["name"]);
    $message = base64_encode($_POST["message"]);
    file_put_contents($filepath, "{$timestamp},{$name},{$message}\n", FILE_APPEND | LOCK_EX);
    die("ok");
  } else {
    die("error");
  }
