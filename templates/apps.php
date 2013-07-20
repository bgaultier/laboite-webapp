<?php
  if(!isset($_SESSION['id'])) {
    // Redirect browser
    header("Location: http://" . $_SERVER['SERVER_NAME'] . "/login");
    // Make sure that code below does not get executed when we redirect
    exit;
  }
?>

<?php $title = _('Apps - laboîte.cc'); ?>

<?php ob_start() ?>
  <script type="text/javascript">
    $(document).ready(function () {
      //$('.icon-question-sign').tooltip();
      $(".conf-btn").click(function() {
        var appid = $(this).attr("id").substring(3);
        $.getJSON('app.json?id=' + appid, function(app) {
          $.each(app, function(index, value) {
            $("#"+index).val(value);
          });
    		});
    		$.getJSON('apps.json', function(apps) {
    		  $.each(apps, function(index, app) {
    		    if(app.id == appid) {
    		      $.each(app, function(index, value) {
        		    $("#"+index.replace('_needed', '')).show(0);
        		  });
        		  $.each(app, function(index, value) {
          		  if(value != 1)
          		    $("#"+index.replace('_needed', '')).hide(0);
        		  });
        		}
    		  });
        });
      });
    }); 
  </script>
  <style type="text/css">
    .description {
      height : 96px;
    }
  </style>
  <h1><?php echo _('Apps'); ?></h1>
  <div class="row">
    <ul class="thumbnails">
      <?php foreach ($apps as $app): ?>
        <li class="span3">
          <div class="thumbnail" style="padding : 20px;">
            <h3><?php echo $app['name'] ?></h3>
            <img src="/templates/images/apps/<?php echo strtolower($app['name']) . '.png' ?>" class="img-rounded">
            <span><strong><?php echo _('Description'); ?></strong><div class="description"><?php echo $app['description'] ?></div></span>
            <!-- confModal -->
            <div aria-hidden="true" aria-labelledby="confModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="confModal" style="display: none;">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h3 id="confModalLabel"><?php echo _('Configurer une app'); ?></h3>
              </div>
              <form action="apps" method="post" accept-charset="utf-8" style="margin:0">
                <div class="modal-body">
                  <input id="appid" type="hidden" name="id">
                  <p><?php echo _('Merci d\'indiquer vos préférences dans les champs ci-dessous (n\'hésitez pas à consulter l\''); ?><a title="<?php echo _('Aide'); ?>" href="help"><?php echo _('aide'); ?></a><?php echo _(' pour plus d\'informations) : '); ?></p>
                  <div>
                    <input id="city" type="text" name="city" class="input-large" placeholder="<?php echo _('Ville'); ?>" >
                  </div>
                  <div>
                    <input id="login" type="text" name="login" class="input-large" placeholder="<?php echo _('Nom d\'utilisateur ou email'); ?>" >
                  </div>
                  <div>
                    <input id="password" type="password" name="password" class="input-large" placeholder="<?php echo _('Mot de passe'); ?>" >
                  </div>
                  <div>
                    <input id="apikey" type="text" name="apikey" class="input-large" placeholder="<?php echo _('Clé d\'API'); ?>" >
                  </div>
                  <div>
                    <input id="feedid" type="text" name="feedid" class="input-large" placeholder="<?php echo _('N° de flux'); ?>" >
                  </div>
                  <div>
                    <input id="stop" type="text" name="stop" class="input-large" placeholder="<?php echo _('N° arrêt de bus (Timeo)'); ?>" >
                  </div>
                  <div>
                    <input id="route" type="text" name="route" class="input-large" placeholder="<?php echo _('N° ligne de bus (004)'); ?>" >
                  </div>
                  <div>
                    <input id="direction" type="text" name="direction" class="input-large" placeholder="<?php echo _('Direction (0 ou 1)'); ?>" >
                  </div>
                  <div>
                    <input id="station" type="text" name="station" class="input-large" placeholder="<?php echo _('N° station de vélo'); ?>" >
                  </div>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn"><?php echo _('Fermer'); ?></button>
                  <button type="submit" class="btn btn-inverse"><i class="icon-ok-circle icon-white"></i> <?php echo _('Enregistrer les modifications'); ?></button>
                </div>
              </form>
            </div><!--/confModal-->
            <!-- Button to trigger confModal -->
            <a id="app<?php echo $app['id'] ?>" class="btn btn-block conf-btn" role="button" data-toggle="modal" data-target="#confModal"><i class="icon-wrench"></i> <?php echo _('Configurer'); ?></a>
          </div><!--/.thumbnail-->
        </li><!--/.span-->
      <?php endforeach; ?> 
    </ul><!--/thumbnails-->
  </div><!--/.row-fluid -->
      
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
