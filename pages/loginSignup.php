<?php
require_once "./header.php";
require_once "../database/dbConnection.php";
?>
<link rel="stylesheet" href="/salad-bar/css/login.css" type="text/css"/>;
<?php
require_once "../operations/signup.php";
require_once "../operations/login.php";
?>

<main class="container-fluid">
<?php if (isset($success)) {
  echo '<br><br><br><p class="text-success">
  ' .
    $success .
    "</p>";
} ?>
 <section class="col-md-6 loginSignup">
    <h1>Log in</h1>
    <form action="" method="POST">
      <fieldset>
        <label for="email">E-mail</label><br />
        <input
          type="email"
          name="email1"
          id="email1"
          placeholder="test@test.com"
          <?php if(isset($_COOKIE["email"])) { echo "value=".$_COOKIE["email"]; } ?>
        />
        <?php if (isset($notRegisteredEmail)) {
          echo '<p class="text-danger">' . $notRegisteredEmail . "</p>";
        } elseif (isset($emptyEmail)) {
          echo '<p class="text-danger">' . $emptyEmail . "</p>";
        } else {
          echo "<br /><br /><br />";
        } ?>
    
        <label for="password">Password</label><br />
        <input
          type="password"
          name="password1"
          id="password1"
          placeholder="Blueberry123"
          <?php if(isset($_COOKIE["password"])) { echo "value=".$_COOKIE["password"]; } ?>
        />
        <?php if (isset($wrongPassword)) {
          echo '<p class="text-danger">' . $wrongPassword . "</p>";
        } elseif (isset($emptyPassword)) {
          echo '<p class="text-danger">' . $emptyPassword . "</p>";
        } else {
          echo "<br /><br />";
        } ?>
        <label for="remember"><span>Remember me</span></label>
        <input type="checkbox" name="remember" id="remember"><br>
        <input
          type="submit"
          class="btn btn-success submit"
          name="submit1"
          id="submit1"
          value="Log In"
        /> 
      </fieldset>
      <br />
      <hr />
      <br />
      <fieldset>
        <a href="#" class="link-success">Did you forget Your password?</a><br /><br />
        <p>
          Don't have an account yet?
          <span>Sign up! <i class="fa fa-arrow-right"></i></span>
        </p>
      </fieldset>
    </form>
  </section>

  <section class="col-md-6 loginSignup">
    <h1>Sign up</h1>
    <form action="" method="POST">
      <label for="firstname">Firstname</label><br />
      <input
        type="text"
        name="firstname"
        id="firstname"
        placeholder="Sarah"
      />
      <?php if (isset($noFirstName)) {
        echo '<p class="text-danger">' . $noFirstName . "</p>";
      } else {
        echo "<br /><br /><br />";
      } ?>
     <label for="lastname">Lastname</label><br />
      <input
        type="text"
        name="lastname"
        id="lastname"
        placeholder="Test"
      />
      <?php if (isset($noLastName)) {
        echo '<p class="text-danger">' . $noLastName . "</p>";
      } else {
        echo "<br /><br /><br />";
      } ?>
     <label for="address">Address</label><br />
      <input
        type="text"
        name="address"
        id="address"
        placeholder="123 Main St, Suite 4A, Anytown, USA 12345"
      />
      <?php if (isset($noAddress)) {
        echo '<p class="text-danger">' . $noAddress . "</p>";
      } else {
        echo "<br /><br /><br />";
      } ?>
     <label for="email2">E-mail</label><br />
      <input
        type="email"
        name="email2"
        id="email2"
        placeholder="test@test.com"
      />
      <?php if (isset($noEmail)) {
        echo '<p class="text-danger">' . $noEmail . "</p>";
      } elseif (isset($emailTaken)) {
        echo '<p class="text-danger">' . $emailTaken . "</p>";
      } elseif (isset($noValidEmail)) {
        echo '<p class="text-danger">' . $noValidEmail . "</p>";
      } else {
        echo "<br /><br /><br />";
      } ?>
     <label for="password2">Password</label><br />
      <input
        type="password"
        name="password2"
        id="password2"
        placeholder="Blueberry123"
      /><?php if (isset($noPassword)) {
        echo '<p class="text-danger">' . $noPassword . "</p>";
      } else {
        echo "<br /><br /><br />";
      } ?>
     <label for="passwordConfirmation">Password again</label><br />
      <input
        type="password"
        name="passwordConfirmation"
        id="passwordConfirmation"
        placeholder="Blueberry123"
      />  <?php if (isset($noPasswordConf)) {
        echo '<p class="text-danger">' . $noPasswordConf . "</p>";
      } elseif (isset($noMatchingPw)) {
        echo '<p class="text-danger">' . $noMatchingPw . "</p>";
      } else {
        echo "<br /><br />";
      } ?>
   
      <input
        type="submit"
        class="btn btn-success submit"
        name="submit2"
        id="submit2"
        value="Sign Up"
      />
    
    </form>
  </section>
  <?php if (isset($success)) {
    echo '<script>
  document.getElementsByClassName("loginSignup")[0].style.padding = "0% 7.5% 5% 2.5%";
  document.getElementsByClassName("loginSignup")[1].style.padding = "0% 7.5% 5% 2.5%";
  </script>';
  } ?>
</main>

<?php require_once "./footer.php";
?>
