<?php $title = _('Connexion - laboîte.cc'); ?>

<?php ob_start() ?>
  <div class="container">
    <form class="form-signin" action="login" method="post" accept-charset="utf-8">
      <h2 class="form-signin-heading"><?php echo _('Connexion'); ?></h2>
      <input type="text" name="email" class="input-block-level" placeholder="<?php echo _('Adresse e-mail'); ?>">
      <input type="password" name="password" class="input-block-level" placeholder="<?php echo _('Mot de passe'); ?>">
      <div style="text-align:center; margin-bottom:16px;">
        <a href="signup"><?php echo _('Créer un compte ?'); ?></a> - <a href="signup"><?php echo _('Mot de passe oublié ?'); ?></a>
      </div>
      <button class="btn btn-inverse" type="submit"><?php echo _('Connexion'); ?></button>
    </form>
  </div> <!-- /container -->
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
