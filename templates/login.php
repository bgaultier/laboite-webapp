<?php
  $user = user_exists_and_password_match($_POST['email'], $_POST['password']);
  if($user && !empty($_POST['email'])) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['locale'] = $user['locale'];
    // Redirect browser
    header("Location: http://" . $_SERVER['SERVER_NAME']);
    // Make sure that code below does not get executed when we redirect
    exit;
  }
?>

<?php $title = _('Connexion - laboîte.cc'); ?>

<?php ob_start() ?>
  <div class="container">
    <form class="form-signin" action="login" method="post" accept-charset="utf-8">
      <h2 class="form-signin-heading"><?php echo _('Connexion'); ?></h2>
      <input type="text" name="email" class="input-block-level" placeholder="<?php echo _('Adresse e-mail'); ?>">
      <input type="password" name="password" class="input-block-level" placeholder="<?php echo _('Mot de passe'); ?>">
      <div style="text-align:center; margin-bottom:16px;">
        <a href="signup"><?php echo _('Créer un compte ?'); ?></a> - <a href="signup"><?php echo _('Mot de passe oublié ?'); ?>
      </div>
      <button class="btn btn-inverse" type="submit"><?php echo _('Connexion'); ?></button>
    </form>
  </div> <!-- /container -->
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
