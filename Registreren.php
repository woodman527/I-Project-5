<?php
    include_once('header.php');
    include_once('footer.php');
    include_once('dbactions.php');
    database_connect();
    $url = "http://localhost/I-Project-5/I-Project-5/RegistreerActie.php";
    $name = "page";
    $value = "Registreren";
    $newUrl = $url . "?$name=$value";

    $vraagsql = "SELECT *
      	         FROM VRAAG";
    $vraagresult = sqlsrv_query($conn, $vraagsql);
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
    <form class="form-horizontal" action=<?php echo $newUrl; ?> method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Registreren</legend>
    </div>
      <div class="col-md-2">
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Gebruikersnaam*</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="Gebruikersnaam" class="form-control" required>
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail*</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="e@mail.com" class="form-control"  required>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Wachtwoord*</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="******" class="form-control"  required>
      </div>
    </div>

    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Wachtwoord (bevestigen)*</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="******" class="form-control" required>
      </div>
    </div>
      </div>
      <div class="col-md-2">

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="voornaam">Voornaam*</label>
      <div class="controls">
        <input type="text" id="voornaam" name="voornaam" placeholder="voornaam" class="form-control">
      </div>

      <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="achternaam">Achternaam*</label>
      <div class="controls">
        <input type="text" id="achternaam" name="achternaam" placeholder="achternaam" class="form-control" required>
      </div>
    </div>
    </div>
          <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="adres">Hoofdadres*</label>
      <div class="controls">
        <input type="text" id="adres" name="adres" placeholder="adres" class="form-control" required>
      </div>
    </div>

        <div class="control-group">
          <!-- E-mail -->
          <label class="control-label" for="adres2">Tweede adres</label>
          <div class="controls">
            <input type="text" id="adres2" name="adres2" placeholder="adres2" class="form-control">
          </div>
        </div>
      </div>

      <div class="col-md-2">

          <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="woonplaats">Woonplaats*</label>
      <div class="controls">
        <input type="text" id="woonplaats" name="woonplaats" placeholder="woonplaats" class="form-control" required>
      </div>
    </div>



        <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="postcode">Postcode*</label>
      <div class="controls">
        <input type="text" id="Postcode" name="postcode" placeholder="Postcode" class="form-control" required>
      </div>
    </div>

        <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="land">Land*</label>
      <select class="form-control" name="land" required>
<option value="">Land...</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="geboortedatum">Geboortedatum*</label>
      <div class="controls">
        <input type="text" id="geboortedatum" name="geboortedatum" placeholder="01-01-2015" class="form-control" required>
      </div>
    </div>
  </div>


        <div class="col-md-2">

         <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="telefoonnummer1">Telefoonnummer 1*</label>
      <div class="controls">
        <input type="text" id="telefoonnummer1" name="telefoonnummer1" placeholder="telefoonnummer 1" class="form-control" required>
      </div>
    </div>
         <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="telefoonnummer2">Telefoonnummer 2</label>
      <div class="controls">
        <input type="text" id="telefoonnummer2" name="telefoonnummer2" placeholder="telefoonnummer 2" class="form-control">
      </div>
    </div>

          <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="telefoonnummer3">Telefoonnummer 3</label>
      <div class="controls">
        <input type="text" id="telefoonnummer3" name="telefoonnummer3" placeholder="telefoonnummer 3" class="form-control">
      </div>
    </div>

    </div>

    <div class="col-md-2">

          <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="geheimevraag">Geheime vraag*</label>
      <select class="form-control" name="geheimevraag" required>
        <?php  while($vragen = sqlsrv_fetch_array($vraagresult, SQLSRV_FETCH_ASSOC)){ ?>
                  <option value=<?php echo $vragen['TEKSTVRAAG'] ?>> <?php echo $vragen['TEKSTVRAAG'] ?> </option>
                  <?php } ?>
              </select>
    </div>

          <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="antgeheimevraag">Antwoord*</label>
      <div class="controls">
        <input type="text" id="antgeheimevraag" name="antgeheimevraag" placeholder="Antwoord" class="form-control" required>
      </div>
      </div>


          <div class="control-group">
      <!-- Button -->
    <label class="control-label" for="registreren">Klik om u te registreren</label>
      <div class="controls">
        <button class="btn btn-success form-control" >Registreren</button>
      </div>
    </div>
      </div>
  </fieldset>
</form>


    </div>
    </div>
    <?php database_disconnect(); ?>
</body>
