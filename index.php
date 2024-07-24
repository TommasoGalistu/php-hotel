<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    
    $data = $_GET;
    $hotelFiltred = $hotels;
    if(isset($data['parcheggio'])){
      $hotelFiltred = array_filter($hotelFiltred, function ($hotel) {
        return $hotel['parking'];
      });
    }
    if(isset($data['voto'])){
      $hotelFiltred = array_filter($hotelFiltred, function ($hotel) use ($data) {
        return $hotel['vote'] >= $data['voto'];
      });
    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Hotel Filter</title>
</head>
<body>

    <div class="container">
      <div class="row mt-3">
        <h1>PHP HOTEL</h1>
      </div>
      <div class="row">
        <div class="col">

          <form action="index.php" method="GET">
            
            <input  type="checkbox" id="parcheggio" name="parcheggio" >
            <label class="me-3">Solo con parcheggio</label>
            <label>Voto</label>
            <input type="radio" id="parcheggio" name="voto" value="0">
            <label>0</label>
            <input type="radio" id="parcheggio" name="voto" value="1">
            <label>1</label>
            <input type="radio" id="parcheggio" name="voto" value="2">
            <label>2</label>
            <input type="radio" id="parcheggio" name="voto" value="3">
            <label>3</label>
            <input type="radio" id="parcheggio" name="voto" value="4">
            <label>4</label>
            <input type="radio" id="parcheggio" name="voto" value="5">
            <label>5</label>
            <button class="btn btn-primary ms-4" type="submit">Submit form</button>
          </form>
        </div>
      </div>

        
      <div class="row">

          <table class="table">
            <thead>
            
              <tr>
                <th scope="col">Nome Hotel</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Disanza dal centro</th>
                <th scope="col">Voto</th>
              </tr>
              
            </thead>
            <tbody>
            <?php if($hotelFiltred): ?>
              <?php foreach($hotelFiltred as $hotel): ?>
                <tr>
                  <th scope="row"><?php echo $hotel['name'] ?></th>
                  <td><?php echo $hotel['description'] ?></td>
                  <td><?php echo $hotel['parking'] ? 'si' : 'no' ?></td>
                  <td><?php echo $hotel['distance_to_center'] ?> km</td>
                  <td><?php echo $hotel['vote'] ?>/5</td>
                </tr>
                <?php endforeach; ?>
            <?php else:?>
              <tr class="text-center">
                <th class="text-danger" colspan="5">NESSUN RISULTATO TROVATO</th>
              </tr>
            <?php endif;?>
            </tbody>
          </table>
      </div>
    </div>
</body>
</html>