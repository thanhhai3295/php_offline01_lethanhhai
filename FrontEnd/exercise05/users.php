<?php 
  $data = array(
    'john' => 'john|e10adc3949ba59abbe56e057f20f883e|John Smith',
    'peter'=> 'peter|c33367701511b4f6020ec61ded352059|Peter Brown',
    'mary' => 'mary|c92b51b2f4d93d4e1081670bd9273402|Mary Claure',
    'hai'	 => 'hai|42810cb02db3bb2cbb428af0d8b0376e|Thanh Hai',
    'admin'=> 'admin|21232f297a57a5a743894a0e4a801fc3|Administrator'
  );
  $json_data = json_encode($data);
  file_put_contents('./users.json',$json_data);
?>