<?php

require_once './config/config.php';


$query ="q={$_REQUEST['q']}";//&place={$_REQUEST['place']}";

$reply = $cb->search_tweets($query, true);

//debug_arr($reply);

$data = array();
foreach($reply->statuses as $status){
  $data[] = array(
      'text' => $status->text,
      'location' => $status->user->location,
      'screen_name' => $status->user->screen_name,
  );

}
$dataf= json_encode($data);
//debug_arr($dataf);
//debug_arr(var dataa = $data;);
echo "var php_var = $dataf;";
//debug_arr($data, false);
//include_once './views/home.php';
?>

