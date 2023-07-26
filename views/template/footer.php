   

    <!-- Footer -->
<footer class="bg-light text-center text-white">
     <!-- je fais apparaitre un lien de déconnexion uniquement si l'utilisateur est connecté -->
     <?php if (isset($_SESSION['user'])) { ?>
        <a class="text-decoration-none text-dark d-block mt-1" href="../controllers/Logoff-controller.php">Déconnexion</a>
    <?php } ?>
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Instagram -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
      <!-- Github -->
      <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Section: Social media -->


    <!-- Section: Form -->
    <section>
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div class="form-outline form-white mb-4">
              <input type="email" id="form5Example2" class="form-control" />
              <label class="form-label" for="form5Example2">Email address</label>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">

            <!-- Submit button -->
            <button type="submit" class="btn btn-outline-light mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>
    <!-- Section: Form -->



    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">A propos</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Le concept</a>
            </li>
            <li>
              <a href="#!" class="text-white">Nos points forts</a>
            </li>
            <li>
              <a href="#!" class="text-white">Nos outils</a>
            </li>
            <li>
              <a href="#!" class="text-white">Notre réseau</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Presse</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Provence and You</a>
            </li>
            <li>
              <a href="#!" class="text-white">Made In Marseille</a>
            </li>
            <li>
              <a href="#!" class="text-white">Le Bonbon</a>
            </li>
            <li>
              <a href="#!" class="text-white">OutreMers 360</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Nos produits</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Pitaya</a>
            </li>
            <li>
              <a href="#!" class="text-white">Mangue</a>
            </li>
            <li>
              <a href="#!" class="text-white">Letchi</a>
            </li>
            <li>
              <a href="#!" class="text-white">Goyave de Chine</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">FAQ</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Ma commande</a>
            </li>
            <li>
              <a href="#!" class="text-white">Nos colis, nos fruits, nos..</a>
            </li>
            <li>
              <a href="#!" class="text-white">Paiement</a>
            </li>
            <li>
              <a href="#!" class="text-white">Livraison</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->

  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.5)">
    © 2023 Copyright:
    <a class="text-white" href="#">VSCoLtd</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="../../assets/script/script.js"></script>
</body>
</html>

</footer>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>