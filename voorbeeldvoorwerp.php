<?php
    include_once('header.php');
    include_once('footer.php');
    include'sidebartest.php';
?>

<div class="content">
    <div class="product">
        <div class="row">
            <div class="col-md-4">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="Images/voorbeeldlamp.JPG" alt="Chania" height="200px" width="200px">
                        </div>

                        <div class="item">
                            <img src="Images/voorbeeldlamp2.JPG" alt="Chania" height="200px" width="200px">
                        </div>

                        <div class="item">
                            <img src="Images/voorbeeldlamp3.JPG" alt="Flower" height="200px" width="200px">
                        </div>

                        <div class="item">
                            <img src="Images/voorbeeldlamp4.JPG" alt="Flower" height="200px" width="200px">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <!--dit is loze ruimte, hou dat zo svp-->
            </div>
            <div class="biedingen col-md-4">
                <h3>Huidig Bod:</h3>
                <h3>22 euro</h3>
                <form>
                    <div class="form-group">
                        <label for="inputbod">Uw Bod</label>
                        <input type="number" class="form-control" id="inputbod" placeholder="Uw bod">
                        <button type="submit" class="btn btn-default">Bieden</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="productinfo">
        <div class="row">
            <div class="col-md-5 productprops">
                <ul style="list-style-type:none">
                    <li>Locatie: Arnhem</li>
                    <li>Staat: Als Nieuw</li>
                    <li>Begin Veiling: 3-12-2015 12:00</li>
                    <li>Einde Veiling: 8-12-2015 12:00</li>
                    <li>Verkoper: Willem252</li>
                    <li>Betaling: Contant</li>
                    <li>Levering: Ophalen</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 productdisc">
                <p>Dit is een voorbeeldtekst voor een product. Hierin kan de verkoper uitleggen wat het product
                precies inhoud en kan de mogelijke klant alle informatie lezen. Dit is erg handig, zo weten alle partijen
                waar ze aan toe zijn en kunnen er geen onduidelijkheden ontstaan.</p>
            </div>
        </div>
        </div>
    </div>
</div>
