<?php
include 'header.php';
?>
<style>* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}

.header-paralax {
  background-image: url('https://goo.gl/TiDA5i');
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  position: fixed;
  height: 600px;
}

.header-paralax h1 {
  text-align: center;
  color: #fff;
  text-shadow: 2px 3px 1px #111111;
  font-family: 'Raleway', sans-serif;
  font-weight: 900;
  letter-spacing: 0.16em;
  font-size: 6em;
  padding: 210px 0;
}

.header-paralax h2{
  text-align: center;
  color: #fff;
  text-shadow: 2px 3px 1px #111111;
  font-family: 'Raleway', sans-serif;
  font-weight: 900;
  letter-spacing: 0.16em;
  font-size: 6em;
  padding: 210px 0;
}
main {
  background: #f5f5f5;
  position: relative;
  top: 600px;
  font-family: 'Raleway', sans-serif;
  color: #111111;
}

.container {
  padding: 0 2% 5%;
}
.container p {
  padding: 10px 50px 20px;
  font-size:1em;
  line-height: normal;
  color: #212121;
}

</style>
<header class="header-paralax">
  <h1>HOPITAL H2N</h1>
</header>
<main>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="liens-pages">
                <a href="ajout-patient.php" class="btn btn-light">
                    <i class="fa fa-user-plus fa-5x"></i><br>
                    <p>Ajout patient</p>
                </a>
                <a href="liste-patients.php" class="btn btn-light">
                    <i class="fa fa-users fa-5x"></i><br/>
                    <p>Liste patients</p>
                </a>
                <a href="ajout-rendezvous.php" class="btn btn-light">
                    <i class="fa fa-calendar-plus-o fa-5x"></i><br/>
                    <p>Ajout rendez-vous</p>
                </a>
                <a href="liste-rendezvous.php" class="btn btn-light">
                    <i class="fa fa-calendar fa-5x"></i><br/>
                    <p>Liste rendez-vous</p>
                </a>
                <a href="ajout-patient-rendez-vous.php" class="btn btn-light">
                    <i class="fa fa-calendar fa-5x"></i><br/>
                    <p>Ajout d'un patient et d'un rendez-vous</p>
                </a>
            </div>
        </div>
    </div>  
</div>  
</main>
<script>
function scrollBanner() {
  var scrollPos;
  var headerText = document.querySelector('.header-paralax h1');
  scrollPos = window.scrollY;

  if (scrollPos <= 600) {
    headerText.style.transform = "translateY(" + (-scrollPos / 3) + "px" + ")";
    headerText.style.opacity = 1 - (scrollPos / 600);
  }
}
window.addEventListener('scroll', scrollBanner);
</script>
<?php
include 'footer.php';
?>