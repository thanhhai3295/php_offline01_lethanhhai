<?php 
  $url = URL_GOLD;
  $xml = simplexml_load_file($url);
  $xmlJson = json_encode($xml);
  $xmlArr = json_decode($xmlJson, 1);
  $items   = $xmlArr['ratelist']['city'][0]['item'];
  $goldArr = [];
  foreach($items as $key => $value) {
    $goldArr[] = [
      'name' => $value['@attributes']['type'],
      'buy'  => $value['@attributes']['buy'],
      'sell' => $value['@attributes']['sell']
    ];
  }

?>