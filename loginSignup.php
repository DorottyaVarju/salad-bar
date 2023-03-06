<?php
require_once('header.php');
?>
<link rel="stylesheet" href="css/login.css" type="text/css" />
<?php
require_once('operations/signup.php');
?>

<main class="container-fluid">
<?php
if (isset($success))
    echo '<br><br><br><p class="text-success">
  ' . $success . '</p>';
?>
 <section class="col-md-6 loginSignup">
    <h1>Log in</h1>
    <form action="">
      <fieldset>
        <label for="email">E-mail</label><br />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="test@test.com"
        /><br /><br /><br />
        <label for="password">Password</label><br />
        <input
          type="password"
          name="password"
          id="password"
          placeholder="Blueberry123"
        /><br /><br />
        <input
          type="submit"
          class="btn btn-success submit"
          name="submit"
          id="submit"
          value="Log In"
        />
      </fieldset>
      <br />
      <hr />
      <br />
      <fieldset>
        <a href="#">Did you forget Your password?</a><br /><br />
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
      <?php
if (isset($noFirstName))
    echo '<p class="text-danger">' . $noFirstName . '</p>';
else
    echo '<br /><br /><br />';

?>
     <label for="lastname">Lastname</label><br />
      <input
        type="text"
        name="lastname"
        id="lastname"
        placeholder="Test"
      />
      <?php
if (isset($noLastName))
    echo '<p class="text-danger">' . $noLastName . '</p>';
else
    echo '<br /><br /><br />';
?>
     <label for="address">Address</label><br />
      <input
        type="text"
        name="address"
        id="address"
        placeholder="123 Main St, Suite 4A, Anytown, USA 12345"
      />
      <?php
if (isset($noAddress))
    echo '<p class="text-danger">' . $noAddress . '</p>';
else
    echo '<br /><br /><br />';
?>
     <label for="email">E-mail</label><br />
      <input
        type="email"
        name="email"
        id="email"
        placeholder="test@test.com"
      />
      <?php
if (isset($noEmail))
    echo '<p class="text-danger">' . $noEmail . '</p>';
else if (isset($emailTaken))
    echo '<p class="text-danger">' . $emailTaken . '</p>';
else if (isset($noValidEmail))
    echo '<p class="text-danger">' . $noValidEmail . '</p>';
else
    echo '<br /><br /><br />';
?>
     <label for="password">Password</label><br />
      <input
        type="password"
        name="password"
        id="password"
        placeholder="Blueberry123"
      /><?php
if (isset($noPassword))
    echo '<p class="text-danger">' . $noPassword . '</p>';
else
    echo '<br /><br /><br />';

?>
     <label for="passwordConfirmation">Password again</label><br />
      <input
        type="password"
        name="passwordConfirmation"
        id="passwordConfirmation"
        placeholder="Blueberry123"
      />  <?php
if (isset($noPasswordConf))
    echo '<p class="text-danger">' . $noPasswordConf . '</p>';

else if (isset($noMatchingPw))
    echo '<p class="text-danger">' . $noMatchingPw . '</p>';
else
    echo '<br /><br />';

?>
   
      <input
        type="submit"
        class="btn btn-success submit"
        name="submit2"
        id="submit2"
        value="Sign Up"
      />
    
    </form>
  </section>
  <?php
if (isset($success))
    echo '<script>
  document.getElementsByClassName("loginSignup")[0].style.padding = "0% 7.5% 5% 2.5%";
  document.getElementsByClassName("loginSignup")[1].style.padding = "0% 7.5% 5% 2.5%";
  </script>';
?>
</main>
<?php
require_once "footer.php";
?>