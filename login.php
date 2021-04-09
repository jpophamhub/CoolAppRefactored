<?php
require 'config.php';

//additional php code for this page goes here

?>

<?= template_header('Home') ?>
<?= template_nav() ?>

    <!-- START PAGE CONTENT -->
    <h1 class="title">Login</h1>
    <form action="authenticate.php" method="post">
        <div class="field">
            <p class="control has-icons-left">
                <input name="username" class="input" type="text" placeholder="Username" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </p>
        </div>
        <div class="field">
            <p class="control has-icons-left">
                <input name="password" class="input" type="password" placeholder="Password" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </p>
        </div>
        <div class="field">
            <p class="control">
                <button class="button is-success">
                    Login
                </button>
            </p>
        </div>
          <a href="login.php" class="button">
    <span class="icon"><i class="fas fa-address-book"></i></span>
    <span>Sign Up</span>
  </a>
  <a href="login.php" class="button">
    <span class="icon"><i class="fas fa-key"></i></span>
    <span>Forgot Password</span>
  </a>
  <a href="login.php" class="button">
    <span class="icon"><i class="fas fa-question"></i></span>
    <span>Need Help</span>
  </a>
    </form>
    <!-- END PAGE CONTENT -->

<?= template_footer() ?>
