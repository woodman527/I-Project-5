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
<div cl4ass="row">
<div class="col-md-12">
    <form class="form-horizontal" action='RegistrerenVerkoperActie.php' method="POST">
        <fieldset>

            <div id="legend">
            <legend class="">Verkoop registratie</legend>
            </div>

            <div class="col-md-2">

                <div class="control-group">
                    <!-- Bank -->
                    <label class="control-label"  for="Bank">Selecteer uw bank:</label>
                    <select class="form-control" name="Bank">
                            <option value="">Bank...</option>
                            <option value="Rabobank">Rabobank</option>
                            <option value="Postbank">Postbank</option>
                            <option value="ING">ING</option>
                            <option value="ABN">ABN Amro</option>
                            <option value="SNS">SNS Bank</option>
                            <option value="Achmea">Achmea Bank</option>
                            <option value="AEGON Bank">AEGON Bank</option>
                        </select>
                </div>

                <div class="control-group">
                    <!-- Iban -->
                    <label class="control-label" for="IBAN">IBAN (rekeningnummer):</label>
                    <div class="controls">
                    <input type="text" id="IBAN" name="IBAN" placeholder="NLXXABCDXXXXXXXX" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-2">

                <!-- Controle optie -->
                <div class="control-group">
                    <label class="control-label"  for="CtrOptie">Controleoptie:</label>
                        <select class="form-control" name="CtrOptie">
                            <option value="">Optie...</option>
                            <option value="Post">Post</option>
                            <option value="Creditcard">Creditcard</option>
                        </select>
                </div>

                <div class="control-group">
                    <!-- Iban -->
                    <label class="control-label" for="Creditcard">Creditcard</label>
                    <div class="controls">
                    <input type="text" id="Creditcard" name="Creditcard" placeholder="1234-1234-1234-1234" class="form-control">
                    </div>
                </div>
              </div>

              <div class="col-md-2">

                <div class="control-group">
                    <!-- Button -->
                    <label class="control-label" for="registreren">Klik hier om u te registreren</label>
                    <div class="controls">
                    <button class="btn btn-success form-control" >Registreren</button>
                    </div>
                </div>

            </div>
        </fieldset>
    </form>
</div>
</div>
</body>
