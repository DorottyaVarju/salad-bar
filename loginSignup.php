<?php require_once('header.php');?>
<link rel="stylesheet" href="css/login.css" type="text/css" />

<main class="container-fluid">
  <section class="col-md-6">
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

  <section class="col-md-6">
    <h1>Sign up</h1>
    <form action="">
      <label for="firstname">Firstname</label><br />
      <input
        type="text"
        name="firstname"
        id="firstname"
        placeholder="Sarah"
      /><br /><br /><br />
      <label for="lastname">Lastname</label><br />
      <input
        type="text"
        name="lastname"
        id="lastname"
        placeholder="Test"
      /><br /><br /><br />
      <label for="address">Address</label><br />
      <input
        type="text"
        name="address"
        id="address"
        placeholder="123 Main St, Suite 4A, Anytown, USA 12345"
      /><br /><br /><br />
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
      /><br /><br /><br />
      <label for="password2">Password again</label><br />
      <input
        type="password"
        name="password2"
        id="password2"
        placeholder="Blueberry123"
      /><br /><br />
      <input
        type="submit"
        class="btn btn-success submit"
        name="submit2"
        id="submit2"
        value="Sign Up"
      />
    </form>
  </section>
</main>
<?php require_once "footer.php"; ?>
