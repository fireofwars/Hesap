<?php
$kur = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
foreach ($kur -> Currency as $cur) 
{
	if ($cur["Kod"] == "USD") 
  {
		$usdAlis  = $cur -> ForexBuying;
		$usdSatis = $cur -> ForexSelling;
    $usdbankal= $cur -> BanknoteBuying;
    $usdbanksat= $cur -> BanknoteSelling;
	}

	if ($cur["Kod"] == "EUR") {
		$eurAlis  = $cur -> ForexBuying;
		$eursatis = $cur -> ForexSelling;
    $eurbankal= $cur -> BanknoteBuying;
    $eurbanksat= $cur -> BanknoteSelling;
	}
  if($cur["Kod"] == "GBP")
  {
    $sterlinal =  $cur -> ForexBuying;
    $sterlinsatis = $cur -> ForexSelling;
    $sterlinbankal =  $cur -> BanknoteBuying;
    $sterlinbanksat = $cur -> BanknoteSelling;
  }
}



?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">   
    </head>
    <body>
        
        
        <script src="js/bootstrap.bundle.min.js"></script>      
           
        <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Döviz</th>
      <th scope="col">Alış Fiyatı</th>
      <th scope="col">Satış Fiyatı</th>
      <th scope="col">Banknote alış Fiyatı</th>
      <th scope="col">Banknote Satış Fiyatı</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Dolar</th>
      <td><?php echo $usdAlis; ?></td>
      <td><?php echo $usdSatis; ?></td>
      <td><?php echo $usdbankal; ?></td>
      <td><?php echo $usdbanksat; ?></td>
    </tr>
    <tr>
      <th scope="row">Euro</th>
      <td><?php echo $eurAlis; ?></td>
      <td><?php echo $eursatis; ?></td>
      <td><?php echo $eurbankal; ?></td>
      <td><?php echo $eurbanksat; ?></td>
    </tr>
    <tr>
      <th scope="row">Sterlin</th>
      <td><?php echo $sterlinal; ?></td>
      <td><?php echo $sterlinsatis; ?></td>
      <td><?php echo $sterlinbankal; ?></td>
      <td><?php echo $sterlinbanksat; ?></td>
    </tr>
  </tbody>
</table>
<div class="container">
      
      <form method="post" action="process.php">
        <div class="form-group">
          <label for="selectOption">Seçenekler:</label>
          <select class="form-control" id="selectOption" name="optionValue">
            <option value="1">dolar</option>
            <option value="2">Euro</option>
            <option value="3">Sterlin</option>
          </select>
        </div>
        <input type="text" name="kutu"></input>
        <button type="submit" class="btn btn-primary">Gönder</button>
      </form>
    </div>
  </body>
      </html>