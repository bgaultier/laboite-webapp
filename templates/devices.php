<?php
  if(!isset($_SESSION['id'])) {
    // Redirect browser
    header("Location: http://" . $_SERVER['SERVER_NAME'] . "/login");
    // Make sure that code below does not get executed when we redirect
    exit;
  }
?>

<?php $title = _('Mes boîtes - laboîte.cc'); ?>

<?php ob_start() ?>
  <style type="text/css">
    .connected {
      color : #73d216;
    }

    .not-connected {
      color : #cc0000;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.icon-question-sign').tooltip();
      $('#newdevice').height($(".thumbnail:first-child").height());
      $(".update-btn").click(function() {
      		$.getJSON('device.json?id=' + $(this).attr("id").substring(6), function(device) {
      		  $("#id").val(device.id);
      		  $("#name").val(device.name);
      		  $("#location").val(device.location);
      		  $("#apikey").val(device.apikey);
      		  $("#regenerate").attr("href", "regenerate?id=" + device.id);
      		  $.each(device.apps, function(element, value) {
      		    $("#" + element).attr('checked', true);
            });
      		});
      });
      $(".message-btn").click(function() {
        $.getJSON('device.json?id=' + $(this).attr("id").substring(7), function(device) {
          $("#deviceid").val(device.id);
          $("#messageModalLabel").text("<?php echo _('Envoyer un message à'); ?> " + device.name);

        });
      });
    });
  </script>
  <div class="row">
    <h1><?php echo _('Boîtes'); ?></h1>
    <div class="row">
      <ul class="thumbnails">
        <?php foreach ($devices as $device): ?>
          <li class="span3">
            <div class="thumbnail" style="background-color : #fff; padding : 20px;">
              <h3><?php echo $device['name'] ?></h3>
              <span><strong><?php echo _('Emplacement'); ?></strong><div><?php echo $device['location'] ?></div></span>
              <span><strong><?php echo _('Statut'); ?> <i class="icon-question-sign" data-toggle="tooltip" title="<?php echo _('Indique si cette boîte s\'est connectée à ce serveur dans les 10 dernières minutes'); ?>"></i></strong><div class="<?php echo get_device_status($device['lastactivity']) ?>"><?php echo get_device_status($device['lastactivity']) ?></div></span>
              <span><strong><?php echo _('Message'); ?> <i class="icon-question-sign" data-toggle="tooltip" title="<?php echo _("Envoyer un message court à cette boîte (l'app Messages doit être activée)"); ?>"></i></strong></span>
              <div class="muted">"<?php if(strlen($device['message']) <= 20) echo $device['message']; else echo implode(' ', array_slice(explode(' ', $device['message']), 0, 5)) . "..."; ?>"</div>
              <!-- Button to trigger messageModal -->
              <div style="margin-bottom : 8px;"><a id="message<?php echo $device['id'] ?>" class="btn btn-mini btn-inverse message-btn" role="button" data-toggle="modal" data-target="#messageModal"><i class="icon-envelope icon-white"></i> <?php echo _('Envoyer'); ?></a></div>
              <span><strong><?php echo _('Clé d\'API'); ?> <i class="icon-question-sign" data-toggle="tooltip" title="<?php echo _('Identifie de manière unique votre boîte'); ?>"></i></strong><div class="muted"><?php echo $device['apikey'] ?></div></span>
              <span><strong><?php echo _('API'); ?> <i class="icon-question-sign" data-toggle="tooltip" title="<?php echo _('Voir le fichier envoyé à la boîte au format xml ou json'); ?>"></i></strong>
              <div>
                <a href="<?php echo 'http://api.' . $_SERVER['SERVER_NAME'] . '/' . $device['apikey'] . '.xml'; ?>" class="btn btn-mini btn-info" target="_blank" type="button">.xml</a>
                <a href="<?php echo 'http://api.' . $_SERVER['SERVER_NAME'] . '/' . $device['apikey'] . '.json'; ?>" class="btn btn-mini btn-warning" target="_blank" type="button">.json</a>
              </div></span>
              <div style="margin-top : 16px;">
                <!-- Button to trigger updateModal -->
                <a id="device<?php echo $device['id'] ?>" class="btn btn-mini update-btn" role="button" data-toggle="modal" data-target="#updateModal"><i class="icon-wrench"></i> <?php echo _('Configurer'); ?></a>
                <a class="btn btn-mini btn-danger" href="/delete?id=<?php echo $device['id'] ?>"><i class="icon-remove icon-white"></i> <?php echo _('Supprimer'); ?></a>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
        <li class="span3">
          <div id="newdevice" class="thumbnail" style="background-color : #f2f2f0; padding : 20px;">
            <h3><?php echo _('Ajouter une boîte'); ?></h3>
            <!-- Button to trigger modal -->
            <a class="btn" role="button" data-toggle="modal" data-target="#addModal"><i class="icon-plus-sign"></i> <?php echo _('Ajouter'); ?></a>

            <!-- addModal -->
            <div aria-hidden="true" aria-labelledby="addModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="addModal" style="display: none;">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h3 id="addModalLabel"><?php echo _('Ajouter une boîte'); ?></h3>
              </div>
              <form action="add" method="post" accept-charset="utf-8" style="margin:0">
                <div class="modal-body">
                  <h4><?php echo _('Nom de la boîte'); ?></h4>
                  <input type="text" name="name" class="input-large" placeholder="<?php echo _('Nom de la boîte'); ?>">
                  <h4><?php echo _('Localisation'); ?></h3>
                  <input type="text" name="location" class="input-large" placeholder="<?php echo _('Localisation (exemple : salon)'); ?>">
                  <h3><?php echo _('Apps'); ?></h3>
                  <?php foreach ($apps as $app): ?>
                    <label class="checkbox">
                      <input type="checkbox" name="app<?php echo $app['id']; ?>"><?php echo ' ' .$app['name_' . getenv('LANG')]; ?>
                    </label>
                  <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn"><?php echo _('Fermer'); ?></button>
                  <button type="submit" class="btn btn-inverse"><i class="icon-ok-circle icon-white"></i> <?php echo _('Enregistrer les modifications'); ?></button>
                </div>
              </form>
            </div><!--/addModal-->

            <!-- updateModal -->
            <div aria-hidden="true" aria-labelledby="updateModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="updateModal" style="display: none;">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h3 id="updateModalLabel"><?php echo _('Configurer une boîte'); ?></h3>
              </div>
              <form action="/" method="post" accept-charset="utf-8" style="margin:0">
                <div class="modal-body">
                  <h4><?php echo _('Nom de la boîte'); ?></h4>
                  <input id="id" type="hidden" name="id">
                  <input id="name" type="text" name="name" class="input-large" placeholder="<?php echo _('Nom de la boîte'); ?>">
                  <h4><?php echo _('Localisation'); ?></h3>
                  <input id="location" type="text" name="location" class="input-large" placeholder="<?php echo _('Localisation (exemple : salon)'); ?>">
                  <h4><?php echo _('Clé d\'API'); ?></h4>
                  <div class="input-append">
                    <input type="text" id="apikey" name="apikey" class="input-medium uneditable-input" disabled value="">
                    <a id="regenerate" class="btn" href="#"><i class="icon-repeat"></i></a>
                  </div>
                  <h3><?php echo _('Apps'); ?></h3>
                  <?php foreach ($apps as $app): ?>
                    <label class="checkbox">
                      <input id="app<?php echo $app['id']; ?>" type="checkbox" name="app<?php echo $app['id']; ?>"><?php echo ' ' . $app['name_' . getenv('LANG')]; ?>
                    </label>
                  <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn"><?php echo _('Fermer'); ?></button>
                  <button type="submit" class="btn btn-inverse"><i class="icon-ok-circle icon-white"></i> <?php echo _('Enregistrer les modifications'); ?></button>
                </div>
              </form>
            </div><!--/updateModal-->

            <!-- messageModal -->
            <div aria-hidden="true" aria-labelledby="messageModalLabel" role="dialog" tabindex="-1" class="modal hide fade" id="messageModal" style="display: none;">
              <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h3 id="messageModalLabel"><?php echo _('Envoyer un message'); ?></h3>
              </div>
              <form action="/" method="post" accept-charset="utf-8" style="margin:0">
                <div class="modal-body">
                  <h4><?php echo _('Message pour laboîte'); ?></h4>
                  <input id="deviceid" type="hidden" name="id">
                  <textarea id="message" name="message" rows="2" class="input-block-level" placeholder="<?php echo _('Tapez ici votre message (max. 140 caractères)'); ?>"></textarea>
                </div>
                <div class="modal-footer">
                  <button data-dismiss="modal" class="btn"><?php echo _('Fermer'); ?></button>
                  <button type="submit" class="btn btn-inverse"><i class="icon-envelope icon-white"></i> <?php echo _('Envoyer message'); ?></button>
                </div>
              </form>
            </div><!--/messageModal-->


          </div><!--/.thumbnail-->
        </li><!--/span5-->
      </ul>
    </div><!--/.row-fluid -->
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
