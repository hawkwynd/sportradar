<?php
echo "<pre>";
/* gets the data from a URL */
$url = "https://api.sportradar.us/nhl-ot4/games/2017/01/14/schedule.json?api_key=2mgdutn9dqdxrk7urq85zxqz";


// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

 $out =  json_decode($resp) ;

echo $out->league->name . PHP_EOL;

foreach ($out->games as $game){
    echo $game->id . PHP_EOL;
            $dt = new DateTime($game->scheduled);

    echo $dt->format('D, M jS @ g:i a'). PHP_EOL;
    echo $game->away->alias . " @ ";
    echo $game->home->alias . PHP_EOL;
    echo $game->broadcast->satelite . PHP_EOL;
    echo "---------------------" . PHP_EOL;

}

print_r($out);