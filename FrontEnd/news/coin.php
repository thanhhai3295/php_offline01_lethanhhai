<?php 
  $url = URL_COIN;
  
  $json = json_decode(file_get_contents($url));

  $coinArr = [];
  foreach($json as $key => $value) {

    $coinArr[] = [
      'name' => $value->name,
      'price' => $value->current_price,
      'change' => $value->market_cap_change_percentage_24h
    ];
  }

?>