<?php
  $channel = ($_GET['c']);
  if(!empty($channel)) {
    $path = '/home/getmnvmr/roam-excalidraw.com/'.$channel.'/';

    header('content-type: application/javascript');
    $response = 'ExcalidrawConfig.mainComponent = `';
    $code = file_get_contents($path.'main-component.cljs');
    $code = str_replace('\\','\\\\',$code);
    $response = $response.$code.'`; ';

    $response = $response.'ExcalidrawConfig.dataComponent = `';
    $code = file_get_contents($path.'data-component.cljs');
    $code = str_replace('\\','\\\\',$code);
    $response = $response.$code.'`; ';
    $code = file_get_contents($path.'cljs-loader.js');

    echo $response.$code;
  } else {
    echo 'unexpected input';
  }
?>
