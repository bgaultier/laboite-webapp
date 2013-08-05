<?php
  if(!isset($_SESSION['id'])) {
    // Redirect browser
    header("Location: http://" . $_SERVER['SERVER_NAME'] . "/login");
    // Make sure that code below does not get executed when we redirect
    exit;
  }
?>

<?php $title = _('Connexion - laboîte.cc'); ?>

<?php ob_start() ?>
  <div class="container">
    <form class="form-signin" action="account" method="post" accept-charset="utf-8">
      <h3 class="form-signin-heading"><?php echo _('Modifier votre compte'); ?></h3>
      <h4 class="form-signin-heading"><?php echo _('Adresse email'); ?></h4>
      <input type="text" name="email" class="input-block-level" value="<?php echo $_SESSION['email']; ?>" disabled>
      <h4 class="form-signin-heading"><?php echo _('Modifier votre mot de passe'); ?></h4>
      <input type="password" name="oldpassword" class="input-block-level" placeholder="<?php echo _('Ancien mot de passe'); ?>">
      <input type="password" name="password" class="input-block-level" placeholder="<?php echo _('Mot de passe'); ?>">
      <h4 class="form-signin-heading"><?php echo _('Langue'); ?></h4>
      <select name="locale" class="input-block-level" style="margin-bottom : 24px;">
        <option<?php if($_SESSION['locale'] == "en_US") echo " selected=\"selected\""; ?>>en_US</option>
        <option<?php if($_SESSION['locale'] == "fr_FR") echo " selected=\"selected\""; ?>>fr_FR</option>
      </select>
      <button type="submit" class="btn btn-inverse btn-block"><i class="icon-ok-circle icon-white"></i> <?php echo _('Enregistrer les modifications'); ?></button>
      <a href="logout" class="btn btn-block btn-warning" type="button"><i class="icon-off icon-white"></i> <?php echo _('Déconnexion'); ?></a>
    </form>
  </div><!-- /container -->
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
