<?php $title = _("Aide - laboîte.cc"); ?>

<?php ob_start() ?>
	<style>
		/* Sidenav */
		.bs-docs-sidenav {
			width: 228px;
			margin: 30px 0 0;
			padding: 0;
			background-color: #fff;
			-webkit-border-radius: 6px;
				 -moz-border-radius: 6px;
							border-radius: 6px;
			-webkit-box-shadow: 0 1px 4px rgba(0,0,0,.065);
				 -moz-box-shadow: 0 1px 4px rgba(0,0,0,.065);
							box-shadow: 0 1px 4px rgba(0,0,0,.065);
		}
		.bs-docs-sidenav > li > a {
			display: block;
			width: 190px \9;
			margin: 0 0 -1px;
			padding: 8px 14px;
			border: 1px solid #e5e5e5;
		}
		.bs-docs-sidenav > li:first-child > a {
			-webkit-border-radius: 6px 6px 0 0;
				 -moz-border-radius: 6px 6px 0 0;
							border-radius: 6px 6px 0 0;
		}
		.bs-docs-sidenav > li:last-child > a {
			-webkit-border-radius: 0 0 6px 6px;
				 -moz-border-radius: 0 0 6px 6px;
							border-radius: 0 0 6px 6px;
		}
		.bs-docs-sidenav > .active > a {
			position: relative;
			z-index: 2;
			padding: 9px 15px;
			border: 0;
			text-shadow: 0 1px 0 rgba(0,0,0,.15);
			-webkit-box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
				 -moz-box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
							box-shadow: inset 1px 0 0 rgba(0,0,0,.1), inset -1px 0 0 rgba(0,0,0,.1);
		}
		/* Chevrons */
		.bs-docs-sidenav .icon-chevron-right {
			float: right;
			margin-top: 2px;
			margin-right: -6px;
			opacity: .25;
		}
		.bs-docs-sidenav > li > a:hover {
			background-color: #f5f5f5;
		}
		.bs-docs-sidenav a:hover .icon-chevron-right {
			opacity: .5;
		}
		.bs-docs-sidenav .active .icon-chevron-right,
		.bs-docs-sidenav .active a:hover .icon-chevron-right {
			background-image: url(../templates/bootstrap/img/glyphicons-halflings-white.png);
			opacity: 1;
		}
		.bs-docs-sidenav.affix {
			top: 40px;
		}
		.bs-docs-sidenav.affix-bottom {
			position: absolute;
			top: auto;
			bottom: 270px;
		}
	</style>
	<div class="row">
		<div id="help-sidebar" class="span3 bs-docs-sidebar visible-desktop">
			<ul class="nav nav-list bs-docs-sidenav affix-top" data-spy="affix">
				<li class="active"><a href="#introduction"><i class="icon-chevron-right"></i> <?php echo _("Introduction"); ?></a></li>
				<li><a href="#guide"><i class="icon-chevron-right"></i> <?php echo _("Guide de montage"); ?></a></li>
				<li><a href="#apps"><i class="icon-chevron-right"></i> <?php echo _("Apps"); ?></a></li>
				<li><a href="#api"><i class="icon-chevron-right"></i> <?php echo _("API"); ?></a></li>
				<li><a href="#mailinglist"><i class="icon-chevron-right"></i> <?php echo _("Liste de discussion"); ?></a></li>
			</ul>
		</div>
		<div class="span9">
			<section id="introduction">
				<div class="page-header">
					<h1><?php echo _("Introduction"); ?></h1>
				</div>
				<p class="lead"><?php echo _("Les boîtes sont des petites horloges connectées qui affichent des informations provenant d'Internet. Pour monter votre boîte, nous vous invitons à lire le guide ci-dessous."); ?></p>
				<div class="row">
					<iframe class="span5" width="640" height="360" src="//www.youtube-nocookie.com/embed/nFBnD05FARQ?rel=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</section>
			<section id="guide">
				<div class="page-header">
					<h1><?php echo _("Guide de montage"); ?></h1>
				</div>
				<p><?php echo _("laboîte est un"); ?> <a href="<?php echo _("http://fr.wikipedia.org/wiki/Arduino"); ?>">Arduino</a> <?php echo _(" accompagnée d'un module Ethernet et d'un écran (appelé aussi matrice de LED)."); ?></p>
				<h2><?php echo _("Composants"); ?></h2>
				<div class="row">
					<div class="span4">
						<p><?php echo _("Pour construire une boite, vous aurez besoin de : "); ?></p>
						<ul>
							<li><a href="http://store.arduino.cc/product/A000066"><?php echo _("Un Arduino UNO"); ?></a></li>
							<li><a href="http://store.arduino.cc/product/A000072"><?php echo _("Un module Ethernet"); ?></a><?php echo _(" ou <i>shield</i> en anglais"); ?></li>
							<li><a href="http://store.arduino.cc/product/E000013"><?php echo _("Un écran de 32×16 leds"); ?></a></li>
							<li><a href="http://store.arduino.cc/product/M000006"><?php echo _("Un câble USB type A/B"); ?></a></li>
							<li><a href="http://snootlab.fr/cables/23-kit-10-cordons-6-m-f.html"><?php echo _("Des fils de prototypage male/femelle ×6"); ?></a></li>
							<li><a href="#"><?php echo _("Un boîtier imprimé en 3D"); ?></a></li>
						</ul>
					</div>
					<img class="span4" style="display: block; margin: 16px; " src="<?php echo _("templates/images/bom_kkbb_fr_FR.svg"); ?>">
				</div>
				<h2><?php echo _("Montage"); ?></h2>
				<p><?php echo _("Voici les étapes de montage d'une boîte : "); ?></p>
				<ol>
					<li>
						<?php echo _("Commencez par brancher le module Ethernet sur l’Arduino"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step1.gif">
						</div>
					</li>
					<li>
						<div style="margin-bottom:8px;"><?php echo _("Utilisez les fils de prototypage pour raccorder la matrice de LED au module Ethernet."); ?></div>
						<span class="label label-warning"><?php echo _("Attention"); ?></span> <?php echo _("Deux versions de la matrice de LED sont disponibles avec des connecteurs différents. La dernière version de la matrice indique une tension d'alimentation de 12V mais fonctionera parfaitement avec les 5V fournis par notre Arduino."); ?>
						<div class="row">
							<div class="span2">
								<table class="table span1">
									<thead>
										<tr>
											<th><?php echo _("Écran"); ?></th>
											<th>Arduino</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>5V/12V</td>
											<td><span class="badge badge-inverse">+5V</span></td>
										</tr>
										<tr>
											<td>GND</td>
											<td><span class="badge badge-inverse">GND</span></td>
										</tr>
										<tr>
											<td>DATA</td>
											<td><span class="badge badge-inverse">7</span></td>
										</tr>
										<tr>
											<td>WR</td>
											<td><span class="badge badge-inverse">6</span></td>
										</tr>
										<tr>
											<td>CS</td>
											<td><span class="badge badge-inverse">5</span></td>
										</tr>
										<tr>
											<td>CLK</td>
											<td><span class="badge badge-inverse">4</span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" style="margin : 16px" src="templates/images/step2.gif">
						</div>
						<div class="row">
							<img style="width: 288px;" src="templates/images/dotmatrix_connections.svg">
						</div>
					</li>
					<li>
						<?php echo _("Placez l'ensemble dans le boîtier assemblé (vis placées entre les parties avant et arrière)"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step4.gif">
						</div>
						<div><?php echo _("Si vous avez une imprimante 3D (ou un FabLab) à proximité, téléchargez nos fichiers .stl : "); ?></div>
						<a class="btn btn-mini btn-primary" href="laboite_stl.zip"><i class=" icon-download icon-white"></i> <?php echo _("boitiers.stl v1"); ?></a>
						<a class="btn btn-mini btn-primary" href="laboite_stl2.zip"><i class=" icon-download icon-white"></i> <?php echo _("boitiers.stl v2"); ?></a>
						<div class="row" style="margin-top:16px; margin-bottom:16px;">
							<iframe class="img-polaroid" width="288px" height="216px" src="https://sketchfab.com/models/4525f2a0ef7e4c66b6b2976e14d911ff/embed" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""></iframe>
						</div>
					</li>
					<li>
						<?php echo _("Raccordez le câble Ethernet sur votre box Internet"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step5.gif">
						</div>
					</li>
					<li>
						<div style="margin-bottom:8px;"><?php echo _("Raccordez le câble USB à votre ordinateur (après avoir installer l'"); ?><a href="http://arduino.cc/en/Main/Software"><?php echo _("IDE Arduino)"); ?></a></div>
						<span class="label label-warning"><?php echo _("Attention"); ?></span> <?php echo _("Si le téléversement échoue, veuillez installer ces pilotes"); ?> <a href="ch341ser_mac.zip">Mac</a> <?php echo _("ou"); ?> <a href="CH341SER.EXE">Windows</a>
					</li>
					<li style="margin-top:8px;">
						<div><?php echo _("Téléchargez la librairie ht1632c puis décompresser le contenu de l'archive dans votre répertoire Arduino"); ?> <code>/libraries</code></div>
						<a class="btn btn-mini btn-primary" href="ht1632c.zip"><i class=" icon-download icon-white"></i> <?php echo _("ht1632c.zip"); ?></a>
					</li>
					<li>
						<div><?php echo _("Téléchargez le croquis Arduino puis décompresser le contenu de l'archive dans votre répertoire Arduino (le répertoire laboite-master devra être renommé en laboite)"); ?></div>
						<a class="btn btn-mini btn-primary" href="https://github.com/bgaultier/laboite/archive/master.zip"><i class=" icon-download icon-white"></i> <?php echo _("laboite.ino"); ?></a>
						<div><?php echo _("Votre répertoire Arduino devrait ressembler à quelque chose comme cela :"); ?></div>
						<div class="row">
							<img style="margin : 32px; width: 256px;" src="templates/images/directories.svg">
						</div>
					</li>
					<li>
						<?php echo _("Créez un compte sur le site"); ?> <a href="signup"><?php echo $_SERVER['SERVER_NAME']; ?></a>
					</li>
					<li>
						<?php echo _("Identifiez vous ensuite pour ajouter une boîte en cliquant sur le bouton"); ?> <a class="btn btn-mini" href="/"><i class="icon-plus-sign"></i> <?php echo _('Ajouter'); ?></a>
					</li>
					<li id="step10">
						<?php echo _("Une fois votre boîte créée, copiez la suite de caractère appelée <b>Clé d'API</b>"); ?>
					</li>
					<li>
						<?php echo _("Configurez ensuite vos apps en cliquant sur l'onglet"); ?> <a href="apps" target="_blank"><?php echo _("Apps"); ?></a>. <?php echo _("Reportez vous à la"); ?> <a href="apps" target="_blank"><?php echo _("section"); ?></a> <?php echo _(" ci-dessous pour plus d'informations sur la configuration des apps"); ?>
					</li>
					<li>
						<?php echo _("Activez ensuite les apps sur votre boîte (onglet"); ?> <a href="/" target="_blank"><?php echo _("Mes boîtes"); ?></a>)
					</li>
					<li><?php echo _("Ouvrez votre IDE Arduino et modifiez la ligne 69 du fichier laboite.ino en indiquant la clé d'API que vous avez copié à l'"); ?><a href="#step10"><?php echo _("étape 10 "); ?></a>: <br/><code style="color: #000;"><span class="text-warning">char</span> apikey[] = <span class="text-success">"61c119ce"</span>; <span style="color: rgb(153, 153, 153);">// your device API key</span></code></li>

					<li><?php echo _("Téléversez le code et prenez un café pour fêter ça !"); ?></li>
				</ol>
			</section>
			<section id="apps">
				<div class="page-header">
					<h1><?php echo _("Apps"); ?></h1>
				</div>
				<p>
					<?php echo _("Les apps permettent de configurer facilement les informations affichées sur les "); ?><a href="#devices"><?php echo _("boîtes"); ?></a><?php echo _(". Chacune des apps permet l'affichage d'une ou plusieurs données. Voici quelques exemples : "); ?>
				</p>
				<ul class="thumbnails" style>
					<li class="thumbnail" style="width : 92px; text-align:center;">
						<div style="height : 40px;">
							<img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-time.svg" >
						</div>
						<small><?php echo _("<strong>Heure</strong><br> affiche l'heure d'une ville dans le monde"); ?></small>
					</li>
					<li class="thumbnail" style="width : 92px; text-align:center;">
						<div style="height : 40px;">
							<img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-emails.svg" >
						</div>
						<small><?php echo _("<strong>Emails</strong><br> affiche le nombre de mails non-lus"); ?></small>
					</li>
					<li class="thumbnail" style="width : 92px; text-align:center;">
						<div style="height : 40px;">
							<img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-weather.svg" >
						</div>
						<small><?php echo _("<strong>Météo</strong><br> affiche les conditions météo"); ?></small>
					</li>
					<li class="thumbnail" style="width : 92px; text-align:center;">
						<div style="height : 40px;">
							<img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-buses.svg" >
						</div>
						<small><?php echo _("<strong>Bus</strong><br> affiche les minutes avant le passage d'un bus"); ?></small>
					</li>
					<li class="thumbnail" style="width : 92px; text-align:center;">
						<div style="height : 40px;">
							<img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-waves.svg" >
						</div>
						<small><?php echo _("<strong>Vagues</strong><br> affiche les conditions d'un spot"); ?></small>
					</li>
				</ul>
				<div id="apps-accordion">
					<div class="accordion" id="accordion">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[0]["name_en_US"]); ?>">
									<?php echo $apps[0]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[0]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[0]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètre : "); ?></strong><?php echo _("Ville"); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de régler le fuseau horaire affiché par laboîte. Les valeurs possibles pour ce paramètre sont listées sur <a href="http://php.net/manual/fr/timezones.php">ce site</a>.'); ?></p>
									<p><strong><?php echo _("Défaut : "); ?></strong><?php echo _("Europe/Paris"); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[1]["name_en_US"]); ?>">
									<?php echo $apps[1]["name_fr_FR"]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[1]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[1]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètre : "); ?></strong><?php echo _("Ville"); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de régler la localisation des prévisions météo. Les valeurs possibles pour ce paramètre sont listées sur <a href="http://www.wunderground.com/weather-forecast/FR.html">le site de Wunderground</a>.'); ?></p>
									<p><strong><?php echo _("Défaut : "); ?></strong><?php echo _("Rennes"); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[2]["name_en_US"]); ?>">
									<?php echo $apps[2]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[2]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[2]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong><?php echo _('N° arrêt de bus (Timeo)'); ?>, <?php echo _('N° ligne de bus'); ?>, <?php echo _('Direction'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de spécifier votre arrêt de bus. Nous vous invitons à consulter le site <a href="http://m.starbusmetro.fr/">m.starbusmetro.fr</a> puis indiquez le nom de votre arrêt. Choississez ensuite votre direction et votre ligne. Enfin reprenez les éléments indiqués dans l\'url du site dans les paramètres comme indiqué ci-dessous :'); ?></p>
									<code style="font-size: 14px;" class="muted">http://m.starbusmetro.fr/arret/<span class="text-warning">1176</span>/<span class="text-error">4</span>/<span class="text-info">0</span></code>
									<p style="margin-top : 16px; " class="text-warning"><?php echo _('N° arrêt de bus (Timeo)'); ?>, <?php echo _('N° ligne de bus'); ?>, <?php echo _('Direction'); ?></p>
									<p class="text-error"><?php echo _('N° ligne de bus'); ?></p>
									<p class="text-info"><?php echo _('Direction'); ?></p>
									<p><strong><?php echo _("Exemple : "); ?></strong><?php echo _('Pour l\'arrêt Beaulieu Insa de la ligne 4, les paramètres seront les suivants : <span class="text-warning">1176 (N° arrêt de bus)</span>, <span class="text-error">4 (N° ligne de bus)</span>, <span class="text-info">0 (Direction)</span>.'); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[3]["name_en_US"]); ?>">
									<?php echo $apps[3]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[3]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[3]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètre : "); ?></strong><?php echo _('N° station de vélo'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de spécifier votre arrêt de vélo. Nous vous invitons à consulter le site <a href="https://www.levelostar.fr/fr/stations/liste-des-stations.html">levelostar.fr</a> puis indiquez le numéro de votre arrêt.'); ?></p>
									<p><strong><?php echo _("Exemple : "); ?></strong><?php echo _("Pour l'arrêt Place de Bretagne, le numéro de la station est 24."); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[4]["name_en_US"]); ?>">
									<?php echo $apps[4]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[4]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[4]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong> <?php echo _('Clé d\'API'); ?>, <?php echo _('N° de flux'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de configurer le flux emoncms qui sera affiché sur votre boîte. Pour connaître la valeur à indiquer, nous vous invitons à consulter le site	<a href="http://emoncms.org/feed/list">emoncms.org</a> puis indiquez le numéro de votre flux (ou <i>feed</i> en anglais).'); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[5]["name_en_US"]); ?>">
									<?php echo $apps[5]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[5]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[5]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong> <?php echo _('Clé d\'API'); ?>, <?php echo _('N° de flux'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de régler la localisation des prévisions de vagues. Les valeurs possibles pour ce paramètre sont listées sur <a href="http://www.allosurf.net/meteo-quiberon-port-blanc-surf-report-vent-premium-57.html">le site de Allosurf</a>.'); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[6]["name_en_US"]); ?>">
									<?php echo $apps[6]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[6]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[6]['description_' . getenv('LANG')]; ?></p>
									<p>
										<span class="label label-info"><?php echo _("Optionnel"); ?></span>
										<?php echo _('L\'application <strong>Messages</strong> permet l\'affichage de messages courts sur une boîte. Pour envoyer un message sur une boîte, vous pouvez utiliser le bouton <a href="/" class="btn btn-mini btn-inverse message-btn" role="button" data-toggle="modal" data-target="#messageModal"><i class="icon-envelope icon-white"></i> Envoyer</a> dans l\'onglet Mes boîtes. Vous pouvez également taper la commande suivante depuis votre ordinateur : '); ?>
										<code><span class="text-success"><?php echo _("$ curl http://api.laboite.cc/&lt;votre_clé_API&gt;/message -d '{\"message\":\"Votre message\"}' -H 'Content-Type: application/json'"); ?></span></code>
									</p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[7]["name_en_US"]); ?>">
									<?php echo $apps[7]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[7]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[7]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong> <?php echo _('Identifiant'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de spécifier votre identifiant utilisateur sur <a href="http://laclef.cc/kfet#api">api.laclef.cc</a>.'); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[8]["name_en_US"]); ?>">
									<?php echo $apps[8]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[8]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[8]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong> <?php echo _('Adresse email et mot de passe Gmail'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _('permet de spécifier vos identifiants Gmail afin de récupérer le nombre de mails non-lus de votre compte <a href="https://mail.google.com/">Gmail</a>.'); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[9]["name_en_US"]); ?>">
									<?php echo $apps[9]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[9]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[9]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong> <?php echo _("Nom des arrêts RATP/SNCF de départ et d'arrivée (Exemples : Sentier, Opéra...)"); ?></p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo strtolower($apps[10]["name_en_US"]); ?>">
									<?php echo $apps[10]['name_' . getenv('LANG')]; ?>
								</a>
							</div>
							<div style="height: 0px;" id="<?php echo strtolower($apps[10]["name_en_US"]); ?>" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><strong><?php echo _("Description : "); ?></strong> <?php echo $apps[10]['description_' . getenv('LANG')]; ?></p>
									<p><strong><?php echo _("Paramètres : "); ?></strong> <?php echo _('Adresse URL de votre agenda privé'); ?></p>
									<p><strong><?php echo _("Valeur : "); ?></strong> <?php echo _("permet de spécifier l'adresse de votre agenda privé (iCal uniquement). Pour savoir comment trouver cette URL, nous vous invitons à consulter l'aide de <a href=\"https://support.google.com/calendar/answer/2465776?hl=fr\" >Google agenda</a> ou celle de <a href=\"https://fr.aide.yahoo.com/kb/SLN15901.html\">Yahoo agenda</a>. Sachez que l'app <strong>Agenda</strong> est comptatible avec tous les agendas au format <code>.ics</code>."); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="api">
				<div class="page-header">
					<h1><?php echo _("API"); ?></h1>
				</div>
				<p>
					<?php echo _("Une API permet à votre boîte d'accéder à ses différentes apps en utilisant un protocole et un format compréhensible par une machine. Les deux protocoles applicatifs disponibles sont "); ?><a href="http://datatracker.ietf.org/doc/draft-ietf-core-coap/">CoAP</a><?php echo _(" et "); ?><a href="datatracker.ietf.org/doc/rfc2616/">HTTP</a><?php echo _(". Les formats de représentation de données sont "); ?><a href="http://wikipedia.org/wiki/Extensible_Markup_Language">XML</a><?php echo _(" et "); ?><a href="http://wikipedia.org/wiki/JavaScript_Object_Notation">json</a><?php echo _(". Voici un exemple de fichier XML contenant trois apps (<strong>Heure</strong>, <strong>Bus</strong> et <strong>Météo</strong>) :"); ?>
				</p>
				<pre>
<span class="text-warning">&lt;?xml</span><span class="text-success"> version=</span>"1.0" <span class="text-success">encoding=</span>"utf-8"<span class="text-warning">?&gt;</span>
<span class="text-info">&lt;response&gt;
  &lt;version&gt;</span>0.1<span class="text-info">&lt;/version&gt;
  &lt;time&gt;</span>18:18<span class="text-info">&lt;/time&gt;
  &lt;nextbus&gt;</span>5<span class="text-info">&lt;/nextbus&gt;
  &lt;weather&gt;
    &lt;today&gt;
      &lt;icon&gt;</span>0<span class="text-info">&lt;/icon&gt;
      &lt;temperature&gt;</span>25<span class="text-info">&lt;/temperature&gt;
    &lt;/today&gt;
    &lt;tomorrow&gt;
      &lt;icon&gt;</span>1<span class="text-info">&lt;/icon&gt;
      &lt;low&gt;</span>15<span class="text-info">&lt;/low&gt;
      &lt;high&gt;</span>28<span class="text-info">&lt;/high&gt;
    &lt;/tomorrow&gt;
  &lt;/weather&gt;
&lt;/response&gt;</span></pre>
        <p><?php echo _("Les mêmes informations au format json : "); ?>
        </p>
        <pre>{
  <span class="text-error">"version"</span>: <span class="text-error">"0.1"</span>,
  <span class="text-error">"time"</span>: <span class="text-error">"19:10"</span>,
  <span class="text-error">"nextbus"</span>: <span class="text-error">"1"</span>,
  <span class="text-error">"weather"</span>: {
    <span class="text-error">"today"</span>: {
      <span class="text-error">"icon"</span>: <span class="text-error">0</span>,
      <span class="text-error">"temperature"</span>: <span class="text-error">25</span>
    },
    <span class="text-error">"tomorrow"</span>: {
      <span class="text-error">"icon"</span>: <span class="text-error">1</span>,
      <span class="text-error">"low"</span>: <span class="text-error">"15"</span>,
      <span class="text-error">"high"</span>: <span class="text-error">"28"</span>
    }
  }
}</pre>
				<p>
					<?php echo _("Ces fichiers peuvent être récupérés en utilisant l'url suivante : "); ?><code><a href="http://api.<?php echo $_SERVER['SERVER_NAME'] . '/964de680.xml' ?>">http://api.<?php echo $_SERVER['SERVER_NAME'] . '/' . htmlentities('<apikey>.<xml|json>');; ?></a></code>
				</p>
			</section>
			<section id="mailinglist">
				<div class="page-header">
					<h1><?php echo _("Liste de discussion"); ?></h1>
				</div>
				<p><?php echo _("Si vous souhaitez partager avec la communauté une photo de votre boîte ou une app que vous avez dévellopée. Ou bien, si vous ne trouvez pas de réponse à votre problème sur cette page, nous vous invitons à vous inscrire à notre liste de discussion ici"); ?> <strong>support@laboite.cc</strong> :</p>
				<FORM ACTION="http://kundenserver.de/cgi-bin/mailinglist.cgi" METHOD="POST" TARGET="_BLANK"><INPUT CHECKED NAME="subscribe_r" TYPE="RADIO" VALUE="subscribe">
				<?php echo _("Oui, je souhaite m'inscrire à la liste de discussion"); ?>
				<BR><INPUT NAME="subscribe_r" TYPE="RADIO" VALUE="unsubscribe">
				<?php echo _("Veuillez me retirer de la liste de discussion"); ?><BR>
				<?php echo _("Veuillez indiquer votre adresse email ici :"); ?>
				<BR><INPUT class="input-large" MAXLENGTH="51" NAME="mailaccount_r" SIZE="51" type="email"><BR>
				<?php echo _("Veuillez à nouveau indiquer votre adresse email ici pour vérification :"); ?>
				<BR><INPUT class="input-large" MAXLENGTH="51" NAME="mailaccount2_r" SIZE="51" type="email"><BR>
					<button type="submit" class="btn btn-inverse"><i class="icon-ok-circle icon-white"></i> <?php echo _("S'inscrire"); ?></button>
					<INPUT NAME="FBMLNAME" TYPE="HIDDEN" VALUE="support@laboite.cc"><INPUT NAME="FBLANG" TYPE="HIDDEN" VALUE="fr"><INPUT NAME="FBURLERROR_L" TYPE="HIDDEN" VALUE="http://kundenserver.de/mailinglist/error.fr.html"><INPUT NAME="FBURLSUBSCRIBE_L" TYPE="HIDDEN" VALUE="http://kundenserver.de/mailinglist/subscribe.fr.html"><INPUT NAME="FBURLUNSUBSCRIBE_L" TYPE="HIDDEN" VALUE="http://kundenserver.de/mailinglist/unsubscribe.fr.html"><INPUT NAME="FBURLINVALID_L" TYPE="HIDDEN" VALUE="http://kundenserver.de/mailinglist/invalid.fr.html"></FORM>
			</section>
		</div><!--/.span9 -->
	</div><!--/.row -->

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
