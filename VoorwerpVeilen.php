<?php
    include_once('header.php');
    include_once('footer.php');
?>
<head>
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
<div class="col-md-12">
    <form class="form-horizontal" action='VoorwerpVeilenActie.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Voorwerp Veilen</legend>
    </div>
      <div class="col-md-2">
    <div class="control-group">
      <!-- titel -->
      <label class="control-label"  for="titel"> Titel Voorwerp</label>
      <div class="controls">
        <input type="text" id="titel" name="titel" placeholder="titel" class="form-control">
      </div>
    </div>
    <div class="control-group">
      <!-- Rubriek -->
      <label class="control-label" for="rubriek">Rubriek</label>
      <div class="controls">
        <select class="form-control" name="rubriek">
          <option value=""> Rubriek...</option>
          <option value="Auto"> .....Auto.....</option>
          <option value=""> .....Kleding.....</option>
          <option value="Onderbroeken"> Onderbroeken</option>
          <option value="T-Shirts"> T-Shirts</option>
          <option value="Broeken"> Broeken</option>
          <option value="Schoenen"> Schoenen</option>
          <option value="Sokken"> Sokken</option>
          <option value="Fietsen"> .....Fietsen.....</option>
          <option value="Electronica"> .....Elektronica.....</option>
        </select>
      </div>
    </div>

    <div class="control-group">
      <!-- Startprijs-->
      <label class="control-label" for="startprijs">Startprijs</label>
      <div class="controls">
        <input type="text" id="startprijs" name="startprijs" placeholder="0.00" class="form-control">
      </div>
    </div>

    <div class="control-group">
      <!-- Betalingswijze -->
      <label class="control-label"  for="betalingswijze">Betalingswijze</label>
      <div class="controls">
        <select class="form-control" name="betalingswijze">
          <option value=""> Betalingswijze...</option>
          <option value="Bank"> Bank</option>
          <option value="Giro"> AcceptGiro</option>
        </select>
      </div>
    </div>
      </div>
      <div class="col-md-2">

    <div class="control-group">
      <!-- Voorwerplokatie -->
      <label class="control-label" for="voorwerplokatie">Voorwerplokatie</label>
      <div class="controls">
        <input type="text" id="voorwerplokatie" name="voorwerplokatie" placeholder="voorwerplokatie" class="form-control">
      </div>

      <div class="control-group">
      <!-- Looptijd-->
      <label class="control-label" for="looptijd">Looptijd</label>
      <div class="controls">
        <input type="text" id="looptijd" name="looptijd" placeholder="looptijd" class="form-control">
      </div>
    </div>
    </div>
          <div class="control-group">
      <!-- Beschrijving-->
      <label class="control-label" for="beschrijving">Beschrijving</label>
      <div class="controls">
        <input type="text" id="beschrijving" name="beschrijving" placeholder="beschrijving" class="form-control-groot">
      </div>
    </div>
    </div>


    <div class="col-md-2">
        <div class="control-group">
      <!-- Betalingsinstructie -->
      <label class="control-label" for="betalingsinstructie">Betalingsinstructie</label>
      <div class="controls">
        <input type="text" id="betalingsinstructie" name="betalingsinstructie" placeholder="betalingsinstructie" class="form-control-groot">
      </div>
    </div>

        <div class="control-group">
      <!-- Verzendinstructies -->
      <label class="control-label" for="verzendinstructies">Verzendinstructies</label>
      <div class="controls">
        <input type="text" id="verzendinstructies" name="verzendinstructies" placeholder="verzendinstructies" class="form-control-groot">
      </div>
    </div>
  </div>
</fieldset>
</form>


    </div>
    </div>


<div class="row">
  <div class="col-md-12">
        <form class="form-horizontal" action='upload.php' method="POST" enctype="multipart/form-data">
      <fieldset>
        <div id="legend">
          <legend class="">Afbeelding uploaden</legend>
        </div>
        <div class="col-md-3">
          <div class="control-group">
        <label class="control-label" for="Afbeelding 1">Afbeelding 1</label>
        <div class="controls">
         <input type="file" name="fileToUpload" id="filetoupload">
         <input type="submit" value="Upload Image" name="submit">
      </div>
    </div>
          <div class="control-group">
       <label class="control-label" for="Afbeelding 2">Afbeelding 2</label>
       <div class="controls">
         <input type="file" name="fileToUpload" id="filetoupload">
         <input type="submit" value="Upload Image" name="submit">
       </div>
     </div>
   </div>
    <div class="col-md-3">
          <div class="control-group">
       <label class="control-label" for="Afbeelding 3">Afbeelding 3</label>
       <div class="controls">
        <input type="file" name="fileToUpload" id="filetoupload">
        <input type="submit" value="Upload Image" name="submit">
      </div>
    </div>
          <div class="control-group">
       <label class="control-label" for="Afbeelding 4">Afbeelding 4</label>
       <div class="controls">
         <input type="file" name="fileToUpload" id="filetoupload">
         <input type="submit" value="Upload Image" name="submit">
       </div>
     </div>
    </fieldset>
  </form>
</div>
</div>

</body>
