<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db3.p.rapidapi.com/",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: the-cocktail-db3.p.rapidapi.com",
		"X-RapidAPI-Key: 4f0cafe09amsh7bd13f3a85873d4p153e15jsn4d6e28d0862f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;
	$data = json_decode($response);
	// echo "<pre>"; print_r($data); echo "</pre>"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>THE COCKTAIL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="jumbotron text-center" style="background-image: url('img/bg2.jpg'); background-size: 100% 110%;">
  <div>
    <h1 style="color: white">WELCOME TO THE COCKTAIL</h1>
  </div>
    <h4 style="color: white">Our Cocktail Recipe Collection</h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>

    <div class="container mt-5">
      <div class="row">
        <div class="container text-center">
          <h2>OUR COCKTAIL COLLECTION</h2><br>
        
        <?php foreach ($data as $d) : ?>
          <a href="detail.php?id=<?=$d->id; ?>">
            <div class="d-inline-block card m-2" style="width: 18rem;">
              <img src="<?=$d->image?>" class="card-img-top" alt="..." width="100%">
              <div class="card-body">
                <p class="card-text"><?=$d->title?></p>
              </div>
            </div>
          </a>
          <?php endforeach; ?>
      </div>
    
    </div>
  </div>
</body>
</html>