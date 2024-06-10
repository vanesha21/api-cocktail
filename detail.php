<?php

$id = $_GET["id"];

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db3.p.rapidapi.com/".$id,
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
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>

<body>
  <div class="jumbotron text-center" style="background-image: url('img/bg2.jpg'); background-size: 100% 100%;">
  <div>
    <h1 style="color: white">WELCOME TO THE COCKTAIL</h1>
  </div>
    <h4 style="color: white">Our Cocktail Recipe Collection</h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  </div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top justify-content-center">
  <div class="container-fluid">
      <img src="img/logo.jpg" alt="Cocktail Logo" style="width:90px;" class="rounded-pill"> 
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home<a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
      <div class="row">
        <div class="container text-center">
          <h2>RECIPE COCKTAIL</h2>

<div class="container mt-5">
  <div class="row">
    <div class="container text-center">
     <div class="card-body">
          <div class="d-inline-block card pb-3" style="width: 28rem;">
            <img src="<?=$data->image?>" class="card-img-top" alt="..." width="100%"><br>
            <strong class="card-text"><?=$data->title?></strong> <br><br>
            <p><?=$data->description?></p>
            <span class="badge bg-secondary"><?=$data->time?></span><br>
            <span class="badge bg-info"><?=$data->portion?></span><br>
            <span class="badge bg-danger"><?=$data->difficulty?></span>
            <ol class="list-group mt-3"> 
                <?php foreach ($data->ingredients as $bahan) { ?>
                    <li class="list-group-item"><?=$bahan?></li>
                <?php } ?>
            </ol>
          </div>
        </div>
    </div>
  </div>
</div>

</body>
</html>