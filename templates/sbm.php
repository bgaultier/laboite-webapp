<?php $title = _("Configuration - laboitestar.fr"); ?>

<?php ob_start() ?>
	<script>
		$("#update-btn").click(function() {
			$(this).remove();
		});
	</script>
	<?php if($update_message) { ?>
		<button id="update-btn" type="button" class="ui-btn ui-icon-delete ui-btn-icon-right"><?php echo _('Vos mises à jour ont bien été prises en compte et seront effectives dans quelques instants.'); ?></button>
	<?php } ?>
	<form method="post" accept-charset="utf-8">
		<h2><?php echo _('Nom de la boîte'); ?></h2>
		<input id="id" type="hidden" name="id" value="<?php echo $device['id']; ?>">
		<input id="name" type="text" name="name" class="input-large" value="<?php echo $device['name']; ?>">
		<h2><?php echo _('Clé d\'API'); ?></h2>
		<input type="text" id="apikey" name="apikey" disabled="disabled" readonly value="<?php echo $device['apikey']; ?>">
		<h2><?php echo _('Vitesse de défilement'); ?></h2>
		<select name="speed">
			<option value="30"<?php if($device['speed'] == "30") echo " selected=\"selected\""; ?>><?php echo _('Rapide'); ?></option>
			<option value="50"<?php if($device['speed'] == "50") echo " selected=\"selected\""; ?>><?php echo _('Modéré'); ?></option>
			<option value="80"<?php if($device['speed'] == "80") echo " selected=\"selected\""; ?>><?php echo _('Lent'); ?></option>
		</select>
		<h2><?php echo _('Période de veille'); ?></h2>
		<div class="ui-grid-a">
			<div class="ui-block-a">
				<select name="startsleep">
					<option value="NULL"<?php if(is_null($device['startsleep'] == NULL)) echo " selected=\"selected\""; ?>><?php echo _('Début'); ?></option>
					<?php for ($i=18; $i < 24; $i++) { ?>
						<option value="<?php echo $i; ?>"<?php if($device['startsleep'] == strval($i)) echo " selected=\"selected\""; ?>><?php if($i<10) echo '0'; echo $i; ?>:00</option>
					<?php } ?>
				</select>
			</div>
			<div class="ui-block-b">
				<select name="stopsleep">
					<option value="NULL"<?php if($device['stopsleep'] == NULL) echo " selected=\"selected\""; ?>><?php echo _('Fin'); ?></option>
					<?php for ($i=0; $i < 13; $i++) { ?>
						<option value="<?php echo $i; ?>"<?php if($device['stopsleep'] == strval($i)) echo " selected=\"selected\""; ?>><?php if($i<10) echo '0'; echo $i; ?>:00</option>
					<?php } ?>
				</select>
			</div>
		</div><!-- /grid-b -->
		<h3><?php echo _('Apps'); ?></h3>
		<?php foreach ($apps as $app): ?>
			<label class="checkbox">
				<input id="app<?php echo $app['id']; ?>" type="checkbox" name="app<?php echo $app['id']; ?>"<?php if(array_key_exists('app'.$app['id'], $device_apps)) echo " checked"; ?>><?php echo ' ' . $app['name_' . getenv('LANG')]; ?>
			</label>
		<?php endforeach; ?>
		<br>
		<input data-theme="b" data-icon="check" type="submit" value="<?php echo _('Enregistrer les modifications'); ?>">
	</form>

<?php $content = ob_get_clean() ?>

<?php include 'sbm_layout.php' ?>
