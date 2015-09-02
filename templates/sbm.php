<?php $title = _("Configuration - laboitestar.fr"); ?>

<?php ob_start() ?>
	<script>
		$("#update-btn").click(function() {
			$(this).remove();
		});
		function set_station_input(element, stop) {
			$(element).buttonMarkup({theme: 'b'});
			$('#stop').val(stop);
			//$('#departures').hide();
		}

		function find_station_action(name) {
			$.mobile.loading('show');

			station_input = document.getElementById('inset-autocomplete-input');
			station_input.disabled = true;
			station_input.value = name;

			$.getJSON( "/stations/?name=" + name, function( data ) {
				$.mobile.loading('hide');
				$('#stations').hide();
				departures = $('#departures');
				$.each(data, function( key, value ) {
					departures.append('<a href="#" class="ui-btn ui-icon-check ui-btn-icon-left" onclick="set_station_input(this,' + value['stop'] + ')">' + value['nomcourtligne'] + ' - ' + key + '</a>');
				});
			});
		}
	</script>
	<?php if($update_message) { ?>
		<button id="update-btn" type="button" class="ui-btn ui-icon-delete ui-btn-icon-right"><?php echo _('Vos mises à jour ont bien été prises en compte et seront effectives dans quelques instants.'); ?></button>
	<?php } ?>
	<form method="post" accept-charset="utf-8">
		<h2><?php echo _('Nom de la boîte'); ?></h2>
		<input id="id" type="hidden" name="id" value="<?php echo $device['id']; ?>">
		<input id="name" type="text" name="name" class="input-large" value="<?php echo $device['name']; ?>">
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
		<h2><?php echo _('Apps'); ?></h2>
		<?php foreach ($apps as $app): ?>
			<label class="checkbox">
				<input id="app<?php echo $app['id']; ?>" type="checkbox" name="app<?php echo $app['id']; ?>"<?php if(array_key_exists('app'.$app['id'], $device_apps)) echo " checked"; ?>><?php echo ' ' . $app['name_' . getenv('LANG')]; ?>
			</label>
		<?php endforeach; ?>
		<h2><?php echo _('LE vélo STAR'); ?></h2>
		<select name="station">
			<option value="1" <?php if($station == 1) echo " selected=\"selected\""; ?>>République</option>
			<option value="2" <?php if($station == 2) echo " selected=\"selected\""; ?>>Mairie</option>
			<option value="3" <?php if($station == 3) echo " selected=\"selected\""; ?>>Champ Jacquet</option>
			<option value="4" <?php if($station == 4) echo " selected=\"selected\""; ?>>Place Hoche</option>
			<option value="5" <?php if($station == 5) echo " selected=\"selected\""; ?>>Sainte-Anne</option>
			<option value="6" <?php if($station == 6) echo " selected=\"selected\""; ?>>Hôtel Dieu</option>
			<option value="7" <?php if($station == 7) echo " selected=\"selected\""; ?>>Fac de Droit</option>
			<option value="8" <?php if($station == 8) echo " selected=\"selected\""; ?>>Rectorat</option>
			<option value="9" <?php if($station == 9) echo " selected=\"selected\""; ?>>Saint-Georges</option>
			<option value="10" <?php if($station == 10) echo " selected=\"selected\""; ?>>Musée Beaux-Arts</option>
			<option value="11" <?php if($station == 11) echo " selected=\"selected\""; ?>>Liberté</option>
			<option value="12" <?php if($station == 12) echo " selected=\"selected\""; ?>>TNB</option>
			<option value="13" <?php if($station == 13) echo " selected=\"selected\""; ?> disabled>Dinan</option>
			<option value="14" <?php if($station == 14) echo " selected=\"selected\""; ?>>Laënnec</option>
			<option value="15" <?php if($station == 15) echo " selected=\"selected\""; ?>>Gares - Solferino</option>
			<option value="16" <?php if($station == 16) echo " selected=\"selected\""; ?>>Champs Libres</option>
			<option value="17" <?php if($station == 17) echo " selected=\"selected\""; ?>>Charles de Gaulle</option>
			<option value="18" <?php if($station == 18) echo " selected=\"selected\""; ?>>Dalle Colombier</option>
			<option value="19" <?php if($station == 19) echo " selected=\"selected\""; ?>>Plélo Colombier</option>
			<option value="20" <?php if($station == 20) echo " selected=\"selected\""; ?>>Pont de Nantes</option>
			<option value="21" <?php if($station == 21) echo " selected=\"selected\""; ?> disabled>Les Halles</option>
			<option value="22" <?php if($station == 22) echo " selected=\"selected\""; ?>>Oberthur</option>
			<option value="23" <?php if($station == 23) echo " selected=\"selected\""; ?>>La Rotonde</option>
			<option value="24" <?php if($station == 24) echo " selected=\"selected\""; ?>>Place de Bretagne</option>
			<option value="25" <?php if($station == 25) echo " selected=\"selected\""; ?>>Office de Tourisme</option>
			<option value="26" <?php if($station == 26) echo " selected=\"selected\""; ?>>Les Lices</option>
			<option value="27" <?php if($station == 27) echo " selected=\"selected\""; ?>>Horizons</option>
			<option value="28" <?php if($station == 28) echo " selected=\"selected\""; ?>>Chèques Postaux</option>
			<option value="29" <?php if($station == 29) echo " selected=\"selected\""; ?>>Jules Ferry</option>
			<option value="30" <?php if($station == 30) echo " selected=\"selected\""; ?>>Guéhenno - Fougères</option>
			<option value="31" <?php if($station == 31) echo " selected=\"selected\""; ?>>Voltaire</option>
			<option value="32" <?php if($station == 32) echo " selected=\"selected\""; ?>>La Touche</option>
			<option value="33" <?php if($station == 33) echo " selected=\"selected\""; ?>>Anatole France</option>
			<option value="34" <?php if($station == 34) echo " selected=\"selected\""; ?>>Brest - Verdun</option>
			<option value="35" <?php if($station == 35) echo " selected=\"selected\""; ?>>Pont de Châteaudun</option>
			<option value="36" <?php if($station == 36) echo " selected=\"selected\""; ?>>Paul Bert</option>
			<option value="37" <?php if($station == 37) echo " selected=\"selected\""; ?>>Auberge de Jeunesse</option>
			<option value="38" <?php if($station == 38) echo " selected=\"selected\""; ?>>Marbeuf</option>
			<option value="39" <?php if($station == 39) echo " selected=\"selected\""; ?>>Pontchaillou Métro</option>
			<option value="40" <?php if($station == 40) echo " selected=\"selected\""; ?>>Pierre Martin</option>
			<option value="41" <?php if($station == 41) echo " selected=\"selected\""; ?>>Cimetière Est</option>
			<option value="42" <?php if($station == 42) echo " selected=\"selected\""; ?>>Robidou</option>
			<option value="43" <?php if($station == 43) echo " selected=\"selected\""; ?>>Cité Judiciaire</option>
			<option value="44" <?php if($station == 44) echo " selected=\"selected\""; ?>>Metz - Sévigné</option>
			<option value="45" <?php if($station == 45) echo " selected=\"selected\""; ?>>Gares Sud - Féval</option>
			<option value="46" <?php if($station == 46) echo " selected=\"selected\""; ?>>Plaine de Baud</option>
			<option value="47" <?php if($station == 47) echo " selected=\"selected\""; ?>>Beaulieu Chimie</option>
			<option value="48" <?php if($station == 48) echo " selected=\"selected\""; ?> disabled>Beaulieu Restau U</option>
			<option value="49" <?php if($station == 49) echo " selected=\"selected\""; ?>>Beaulieu Diapason</option>
			<option value="51" <?php if($station == 51) echo " selected=\"selected\""; ?>>Bouzat</option>
			<option value="52" <?php if($station == 52) echo " selected=\"selected\""; ?>>Villejean-Université</option>
			<option value="53" <?php if($station == 53) echo " selected=\"selected\""; ?>>J.F. Kennedy</option>
			<option value="54" <?php if($station == 54) echo " selected=\"selected\""; ?>>Pontchaillou Halte TER</option>
			<option value="55" <?php if($station == 55) echo " selected=\"selected\""; ?>>Préfecture</option>
			<option value="56" <?php if($station == 56) echo " selected=\"selected\""; ?>>Berger</option>
			<option value="57" <?php if($station == 57) echo " selected=\"selected\""; ?>>Atalante Champeaux</option>
			<option value="58" <?php if($station == 58) echo " selected=\"selected\""; ?>>La Harpe</option>
			<option value="59" <?php if($station == 59) echo " selected=\"selected\""; ?>>Gayeulles Piscine</option>
			<option value="60" <?php if($station == 60) echo " selected=\"selected\""; ?>>Cucillé</option>
			<option value="61" <?php if($station == 61) echo " selected=\"selected\""; ?>>Jacques Cartier</option>
			<option value="62" <?php if($station == 62) echo " selected=\"selected\""; ?>>Clemenceau</option>
			<option value="63" <?php if($station == 63) echo " selected=\"selected\""; ?>>Henri Fréville</option>
			<option value="64" <?php if($station == 64) echo " selected=\"selected\""; ?>>Italie</option>
			<option value="66" <?php if($station == 66) echo " selected=\"selected\""; ?>>Bréquigny Piscine</option>
			<option value="67" <?php if($station == 67) echo " selected=\"selected\""; ?>>Binquenais</option>
			<option value="68" <?php if($station == 68) echo " selected=\"selected\""; ?>>Alma</option>
			<option value="69" <?php if($station == 69) echo " selected=\"selected\""; ?>>Champs Manceaux</option>
			<option value="70" <?php if($station == 70) echo " selected=\"selected\""; ?>>Mermoz</option>
			<option value="71" <?php if($station == 71) echo " selected=\"selected\""; ?>>Sainte-Thérèse</option>
			<option value="72" <?php if($station == 72) echo " selected=\"selected\""; ?>>Cleunay</option>
			<option value="73" <?php if($station == 73) echo " selected=\"selected\""; ?>>Géniaux</option>
			<option value="74" <?php if($station == 74) echo " selected=\"selected\""; ?>>De Lesseps</option>
			<option value="75" <?php if($station == 75) echo " selected=\"selected\""; ?>>ZA Saint Sulpice</option>
			<option value="76" <?php if($station == 76) echo " selected=\"selected\""; ?>>Monts d'Arrée</option>
			<option value="77" <?php if($station == 77) echo " selected=\"selected\""; ?>>Houx Cité U</option>
			<option value="78" <?php if($station == 78) echo " selected=\"selected\""; ?>>Gros-Chêne</option>
			<option value="80" <?php if($station == 80) echo " selected=\"selected\""; ?>>Painlevé</option>
			<option value="81" <?php if($station == 81) echo " selected=\"selected\""; ?>>Turmel</option>
			<option value="82" <?php if($station == 82) echo " selected=\"selected\""; ?>>La Poterie</option>
			<option value="83" <?php if($station == 83) echo " selected=\"selected\""; ?>>Ronceray</option>
			<option value="84" <?php if($station == 84) echo " selected=\"selected\""; ?>>Gares - Beaumont</option>
			<option value="85" <?php if($station == 85) echo " selected=\"selected\""; ?>>La Courrouze</option>
		</select>
		<h2><?php echo _('Parc Relais'); ?></h2>
		<select name="parking">
		  <option value="HFR" <?php if($parking == "HFR") echo " selected=\"selected\""; ?>>Henri Fréville</option>
		  <option value="JFK" <?php if($parking == "JFK") echo " selected=\"selected\""; ?>>J.F. Kennedy</option>
		  <option value="POT" <?php if($parking == "POT") echo " selected=\"selected\""; ?>>La Poterie</option>
		  <option value="VU" <?php if($parking == "VU") echo " selected=\"selected\""; ?>>Villejean-Université</option>
		</select>
		<h2><?php echo _('Arrêt de Bus'); ?></h2>
		<div id="stations-search" class="ui-filterable">
			<input id="inset-autocomplete-input" name="stop" data-type="search" placeholder="<?php echo _("Nom de l'arrêt"); ?>">
		</div>
		<ul id="stations" data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="true" data-input="#inset-autocomplete-input">
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">25 Fusillés</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Abbé Grimault</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Acigné Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Acquêts</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Agrocampus</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Aire Libre Aéroport</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Aire du 8 Mai</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Alexandre Gilois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Alfred de Musset</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Alma</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Alphasis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Anatole France</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Anita Conti</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Anjou</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Anne de Bretagne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Argoat</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Argonautes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Armorique</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Assomption</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Atalante Champeaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Auberge de Jeunesse</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Auditoire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Auriol</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Avenir</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Balzac</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Barberais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bas Village</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Base de Loisirs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Beaulieu Chimie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Beaulieu Cité U</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Beaulieu INSA</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Beaulieu Restau U</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bel Air</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bellangerais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Belle Epine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Belle Fontaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bellevue</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Berger</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Berry</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Berthault</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Besneraie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Betton Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Betton Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Betton Rue de Rennes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Betton Vallée</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bigot de Préameneu</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Binquenais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Binquenais Collège</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Binquenais Le Moine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Boberil</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bobinais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bocage</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bois Esnault</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bois Labbé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bois Perrin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bordage</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Botrel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Boulais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bouleaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourbonnais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourg</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourgbarré Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourgchevreuil</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourgeois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourgogne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bourgueil</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bouriande</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bout de Lande</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bouvrais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bouzat</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bray</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Breillou</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Brest Verdun</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bretonnière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Brocéliande</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Brossolette</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bruz Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bruz Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bréquigny Piscine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Buisson</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Bécherel Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">CARSAT</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">CAT La Hautière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">CHP Saint-Grégoire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Calendrou</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Caliorne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Callouët</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Calmette</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Calvaire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Camus</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Canada</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Carré Dumaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Centre Météo</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Centre de Loisirs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Centre scolaire Pacé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cesson Collège</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cesson Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cesson Hôpital Privé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cesson Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cesson Piscine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chalotais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chambre Agriculture</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Daguet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Devant</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Giron</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Jacquet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Martin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Mulon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Niguel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champ Noël</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champalaune</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champelé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champion de Cicé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champs Blancs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champs Bleus</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champs Freslons</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champs Libres</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champs Manceaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Champs Péans</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chantepie Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chantepie Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chapelle-Chaussée</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chaperonnais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chapitre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chardonnet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Charles de Gaulle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Charmilles</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chartres Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chateaubriand</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chaussairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chemin Vert</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chesnais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chevaigné Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chevaigné Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cheval Blanc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chopinais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Châtaigneraie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Château de Vaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Châteaudun</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Châteliers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Châtillon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chèques Postaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chêne Centenaire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chêne Germain</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chêne Hervé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Chêne Vert</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cicé Blossac</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cimetière Nord</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cimetière de l'Est</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cité Judiciaire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cité des Jardins</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clairefontaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clairville</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clayes Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clemenceau</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cleunay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clinique La Sagesse</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clos Courtel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clos des Cerisiers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clos des Tilleuls</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Clotilde Vautier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Coeur de Campus</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Coeur de Courrouze</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Colin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Collège Brassens</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Collège Cleunay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Collège Jean Moulin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Collège Pôle Sud</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Collège Récipon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Collège Saint-Paul</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Combes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Commeurec</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Condate</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Constant Mérel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cormier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cornouaille</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Corps-Nuds Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Corps-Nuds Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Coteau</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Coualeuc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Coubertin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cour Neuve</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cours Kennedy</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Courtines</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Blanche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Faucheux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Fleurie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Ignon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Madame</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Malinge</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Rouge</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Saint-Hélier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Simon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Vaisserelle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix Verte</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix aux Potiers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix de Pierre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Croix du Pigeonnet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cropy</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Crotigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cucillé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Cucé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Curien</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Côteaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Dargent</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">De Lesseps</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Destiers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Deux Ruisseaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Dinan</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Discalceat</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Docteur Léon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Docteur Quentin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Domaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Dominos</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Donelière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Donzelot</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Doublé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Douro</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Duchesse Anne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Dulac</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Durafour</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Durafour Strasbourg</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Décoparc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">EDEFS</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">ESPE de Bretagne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Eclosel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Edonia</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Egalité</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Enseigne Abbaye</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Epalet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Epron</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Erbonière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Estuaires</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Etangs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Europe</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fac de Droit</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Flume</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fonderies</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fontaine Blanche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fontenelle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Forge</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fort Joual</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Forum</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fosse Gauchère</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fossés</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fouaye</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fougerolle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Fouillard</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Foyer</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Foyer Rennais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Frogerais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Frères Aubert</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Frères Moine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Félix Eboué</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gaité</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Galicie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gallets</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gare Sud Féval</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Garenne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gares</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Garigliano</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gast</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gaston Bardet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gaudais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gautrais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gavrinis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gayeulles</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gayeulles Piscine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gentilhommière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Genêts</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">George Sand</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gerhoui</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gide</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gingouillère</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ginguené</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gohier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Grand Domaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Grand Quartier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Grande Fontaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gretay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Grippay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Grippière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gros Chêne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Groupe Scolaire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Grée Barel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Guilloux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Guilloux Lorient</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Guyomerais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Guéhenno</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Guérinais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Géniaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gériatrie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Gévezé Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haie de Terre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hallerais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hallouvry</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haut Bois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haut Grippé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haut Launay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haut Plessis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haut Sancé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haut Trait</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haute Abbaye</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haute Rabine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hautière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Haye Renaud Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Henri Fréville</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hil-Bintinais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Holywell</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Horizons</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Housset</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Houx Cité U</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Huberdières</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hublais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hélias</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Héronière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hôpital Régnier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hôpital Sud</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hôtel Dieu</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Hôtel de Région</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">IUT</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ile des Bois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Italie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">J. Sébastien Bach</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">J.F. Kennedy</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jacques Cartier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Janais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jardin Moderne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jean Jaurès</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jean Marin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jean-Paul II</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jeanne d'Arc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Joliot-Curie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jules Ferry</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jules Maniez</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Jules Verne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Juteauderies</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Kennedy Guyenne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Kerfleury</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Kerguelen</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Kerviler</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">L'Autre Lieu</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">L'Hermitage Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">L'Hermitage Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">L'Ourmais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">L'hermitière Village</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Basse Erable</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Brosse</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Coulée</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Cour aux Pages</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Croix de l'Epine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Drouais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Jaille</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Jaunais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Motte</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Noë</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Plesse</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Poste</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Poterie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Renardière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Salle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">La Touche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Laillé Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lande</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lande Bouhard</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lande Saint Denis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lande du Breil</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lande du Jardin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lande du Pont</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Landelles</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Landes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Landrel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Landry</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Langan Bourg</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Langevin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Langlois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Languedoc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Launay Garnier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lavoisier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Laënnec</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Blizz</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Blosne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Brix</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Dantec</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Hô</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Mail</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Nid</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Petit Beauvais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Plessix</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Ponant</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Pâtis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Reuvre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Tertronais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Le Verger Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Legraverend</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lemaistre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lenoir</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Leray</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Les Arts</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Les Halles</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Les Lacs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Les Lices</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Les Pins</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Les Préales</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Leuzières</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Levant</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Liberté TNB</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lilas</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lion d'Or</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Loges</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Longs Champs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Longs Champs Est</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Longs Prés</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Basch</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Bréquigny</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Chateaubriand</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Descartes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Mendes France</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Mendès France</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Monod</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Ozanam</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Sévigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Lycée Zola</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Léonard</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">MFR Rabinardières</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Maffeys</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mahomat</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mail Lancé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Maillardière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mainguère</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Maison Blanche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Maison Diocésaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Maison Neuve</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Maison d'Accueil</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Malakoff</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Malraux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Marais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Marbeuf</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mare Doux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mare Pavée</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mare de la Salle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Marronniers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Martinière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Menault</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Merlin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mermoz</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mettrie Templiers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Metz Volney</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Miniac Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mirabeau</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mivoie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Moc Souris</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Moigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Molène</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Monnet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Monniais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Monsieur Vincent</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Montand</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Montgermont Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Monts Gaultier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Monts d'Arrée</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Morbihan</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mordelles Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mordelles Lilas</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mordelles Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mordelles Pâtis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Morinais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Morvan Lebesque</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Motte Brûlon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Moulin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Moulin de Joué</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mouton Blanc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mouézy</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mozart</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Muguet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Musset Cité U</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Musée Beaux Arts</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Médiathèque</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Métairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Métairies Chalotais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Métrie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Mézières</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Neruda</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Nobel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Nominoë</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Norvège</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Noë</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Noë Biche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Noë Diolé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Oberthur</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Oliverie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Olympe de Gouges</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Omblais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Opéra</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Orgerblon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ormeaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Orée du Bois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ouessant</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pacé Cimetière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pacé Collèges</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Painlevé</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Papeteries</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Parc Expo</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Parc d'Activités</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Parc de Loisirs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Parc des Sports</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Parthenay Fontaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Parthenay Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pasteur</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Patton</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Patton Gast</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Paul Bert</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Paul Féval</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Paul-Emile Victor</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pavie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Perelle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Petit Beaulieu</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Petit Champeaux</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Petite Hublais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Petite Rochelle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Petite Saudrais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Petits Champs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Peupliers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Piardière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pie Neuve</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pierre Texier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pigeon Blanc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pilate</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Piletière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pinault</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Piré</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Place Hoche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Place Pasteur</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Place Sévigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Place de Bretagne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Place de Kildare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Place de la Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Placis Vert</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Placis de la Touche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Plaine de Baud</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Planche Fagline</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Plardière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Plessix Saucourt</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Plélo Colombier</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Point du Jour</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pologne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pommerais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pommiers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont Amelin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont Brand</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont aux Moines</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont d'Avoine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont d'Ohin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont de Bretagne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont de Châteaudun</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont de Nantes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont de Strasbourg</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont-Péan Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pont-Réan</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pontay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pontchaillou</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Portail</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Porte de Ker-Lann</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Portugal</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Potiers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pressoirs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Provence</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pré Garel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Préfecture</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Prés Verts</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pâtis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pâtis Roussel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pâtis Tatelin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Pâtis du Moulinet</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Quatre Vents</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rabine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rablais Allende</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Raison</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rectorat</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Redon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Renaissance</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Renan</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Renaudais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rennes Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Reuzerais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ricoquais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rigourdière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rivaudière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rive Ouest</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Robidou</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Robinot de St-Cyr</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rocade Sud</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rochers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rochester</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Roger Dodin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Romillé Collège</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Romillé Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ronceray</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rond Point de Bray</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rosa Parks</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rossel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Rue de Rennes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Récipon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">République</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sacrés Coeurs</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Armel Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Armel Gare</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Conwoïon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Exupéry</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Gilles Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Laurent</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Martin</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Melaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Saëns</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Vincent</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saint-Yves</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sainte-Anne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sainte-Elisabeth</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sainte-Thérèse</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Salle Polyvalente</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Saules</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sauvaie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Schuman</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sept Fours</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Serpette</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Servigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Silandière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Solidor</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Square de la Rance</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Stade Rennais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Surcouf</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Suède</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sénestrais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sévignière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Sévigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Tage</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Taillebois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Taillis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Terrain des Sports</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Terseul</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Tertre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Thabor</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Thorigné Mairie</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Tihouït</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Timonière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Torigné</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Touche Annette</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Touche Champagne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Touche Milon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Touche Tizon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Tournebride</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Triangle</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Trois Croix</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Trois Marches</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Tronchay</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Trégain</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Trégor</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Turbanière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Turmel</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Télégraphe</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Université</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Uttenreuth</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Val Blanc</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Val d'Orson</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vallon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vallée</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vaugon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Verdaudais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Verger</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vern Eglise</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vern La Touche</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vert Buisson</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Veyettes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vezin Centre</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Victoire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Viennais</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vieux Bourg</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vigne</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vilaine</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Village</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Village Collectivités</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Ville aux Archers</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Villebois-Mareuil</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Villejean-Churchill</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Villejean-Université</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vincennes</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vitré Danton</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vitré Foulon</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vitré Péguy</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vivier Louis</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vivier des Bois</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Vizeule</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Volney</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">Voltaire</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">ZA L'Hermitière</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">ZA Saint-Sulpice</a></li>
		    <li><a onclick="find_station_action(this.innerHTML)" href="#">ZI Ouest</a></li>
		</ul>
		<div id="departures">
		</div>
		<input id="stop" type="hidden" name="stop" value="<?php echo $stop; ?>">
		<br>
		<input data-theme="b" data-icon="check" type="submit" value="<?php echo _('Enregistrer'); ?>">
	</form>

<?php $content = ob_get_clean() ?>

<?php include 'sbm_layout.php' ?>
