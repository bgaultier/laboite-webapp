<?php $title = _("Guide - laboîtestar.fr"); ?>

<?php ob_start() ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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

		.img-polaroid {
			margin-left: 30px;
		}
	</style>
	<div class="row">
		<div id="help-sidebar" class="span3 bs-docs-sidebar visible-desktop">
			<ul class="nav nav-list bs-docs-sidenav affix-top" data-spy="affix">
				<li><a href="#introduction"><i class="icon-chevron-right"></i> <?php echo _("Introduction"); ?></a></li>
				<li><a href="#userguide"><i class="icon-chevron-right"></i> <?php echo _("Guide d'utilisation"); ?></a></li>
				<li><a href="#instructions"><i class="icon-chevron-right"></i> <?php echo _("Guide de montage du kit"); ?></a></li>
				<li><a href="#mailinglist"><i class="icon-chevron-right"></i> <?php echo _("Liste de discussion"); ?></a></li>
			</ul>
		</div>
		<div class="span9">
			<section id="introduction">
				<div class="page-header">
					<h1><?php echo _("Introduction"); ?></h1>
				</div>
				<p class="lead"><?php echo _("Les boîtes STAR sont des petites horloges connectées qui affichent des informations de mobilité provenant d'Internet."); ?></p>
				<div class="row">
					<img class="img-polaroid" style="width: 388px;" src="templates/images/packshot.JPG">
				</div>
			</section>
			<section id="userguide">
				<div class="page-header">
					<h1><?php echo _("Guide d'utilisation"); ?></h1>
				</div>
				<p><?php echo _("Votre boîte est un équipement autonome qui a besoin d'être alimenté et raccordé à Internet. Pour utiliser votre boîte, veuillez suivre les instructions suivantes :"); ?></p>
				<h2><?php echo _("Instructions pour la version Ethernet"); ?></h2>
				<ol>
					<li>
						<?php echo _("Raccordez votre boîte à Internet. Pour cela, branchez un câble réseau entre votre box internet et votre boîte (le port Ethernet est situé sur le côté droit)"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step6.gif">
						</div>
					</li>
					<li>
						<?php echo _("Branchez ensuite votre boîte sur une prise électrique (en utilisant la prise ronde située également à droite de votre boîte)"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step7.gif">
						</div>
					</li>
					<li>
						<?php echo _("Yes ! Votre boîte est fonctionnelle et commence à afficher des informations ! Pour la configurer, veuillez télécharger l'application StarBusMétro sur"); ?> <a href="https://play.google.com/store/apps/details?id=com.bookbeo.starbusmetro">Google Play</a> <?php echo _("ou"); ?> <a href="https://itunes.apple.com/fr/app/starbusmetro/id899970416?mt=8">App Store</a>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step8.gif">
						</div>
					</li>
					<li>
						<?php echo _("Lancez l'app <strong>StarBusMétro</strong> puis, dans le menu latéral, sélectionnez <strong>Scannez un QR code</strong>. Un message <strong>Appairage réussi</strong> apparaît !"); ?>
						<div class="row">
							<img class="img-polaroid" style="height: 280px;" src="templates/images/step4a.png">
							<img class="img-polaroid" style="height: 280px;" src="templates/images/step4b.png">
						</div>
					</li>
					<li>
						<?php echo _("Vous pouvez alors configurer à volonté votre boîte. Cliquez sur <strong>Enregister</strong> et votre boîte se met à jour au bout de quelques instants"); ?>
					</li>
				</ol>
				<h2><?php echo _("Instructions pour la version Wifi"); ?></h2>
				<p><?php echo _("Pour connecter votre boîte à Internet, vous aurez besoin d'un téléphone iOS ou Android, de votre boîte Wifi et d'un câble USB"); ?></p>
				<ol>
					<li>
						<?php echo _("Pour que votre boîte se connecte au Wifi, il faut lui indiquer le nom et le mot de passe de votre réseau. Pour cela, vous aurez d'installer l'app Apiara disponible ci-dessous :"); ?><br>
						<a class="btn" href="https://itunes.apple.com/us/app/apiara-blinkup/id928892745?mt=8"><i class="fa fa-apple"></i> App store</a>
						<a class="btn" href="https://play.google.com/store/apps/details?id=com.electricimp.electricimp&hl=fr"><i class="fa fa-android"></i> Google Play</a>
					</li>
					<li>
						<?php echo _("Une fois installée, lancez l'app et indiquez le nom de votre réseau ainsi que la clé Wifi (ces informations sont souvent indiqués derrière votre box internet) et passez à l'étape suivante (sans appuyez sur <em>Send Blinkup</em>)"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step1w.png">
						</div>
					</li>
					<li>
						<?php echo _("Branchez électriquement votre boîte en utilisant le câble USB. Une fois alimentée, une lumière rouge clignotante peut être observée par la fente située à l'arrière de votre boîte"); ?>
					</li>
					<li>
						<?php echo _("Introduisez alors le haut de votre téléphone dans la fente arrière de la boîte (avec l'écran du téléphone dirigé vers la prise USB) et appuyez sur <em>Send Blinkup</em>"); ?>
					</li>
					<li>
						<?php echo _("Après un décompte de 3 secondes, l'écran de votre téléphone va émettre une suite de flashs blancs à destination du module wifi qui devrait émettre une lumière verte au bout de quelques instants"); ?>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step2w.png">
						</div>
					</li>
					<li>
						<?php echo _("Une fois ces étapes effectuées, votre boîte se connectera au réseau wifi que vous lui avez indiquer. Si vous souhaitez changer ce réseau, nous vous invitons à débrancher votre boîte et à reprendre à l'étape 1 ci-dessus"); ?>
					</li>
					<li>
						<?php echo _("Yes ! Votre boîte est fonctionnelle et commence à afficher des informations ! Pour la configurer, veuillez télécharger l'application StarBusMétro sur"); ?> <a href="https://play.google.com/store/apps/details?id=com.bookbeo.starbusmetro">Google Play</a> <?php echo _("ou"); ?> <a href="https://itunes.apple.com/fr/app/starbusmetro/id899970416?mt=8">App Store</a>
						<div class="row">
							<img class="img-polaroid" style="width: 288px;" src="templates/images/step8.gif">
						</div>
					</li>
					<li>
						<?php echo _("Lancez l'app <strong>StarBusMétro</strong> puis, dans le menu latéral, sélectionnez <strong>Scannez un QR code</strong>. Un message <strong>Appairage réussi</strong> apparaît !"); ?>
						<div class="row">
							<img class="img-polaroid" style="height: 280px;" src="templates/images/step4a.png">
							<img class="img-polaroid" style="height: 280px;" src="templates/images/step4b.png">
						</div>
					</li>
					<li>
						<?php echo _("Vous pouvez alors configurer à volonté votre boîte. Cliquez sur <strong>Enregister</strong> et votre boîte se met à jour au bout de quelques instants."); ?>
					</li>
				</ol>
			</section>
			<section id="instructions">
				<div class="page-header">
					<h1><?php echo _("Guide de montage du kit"); ?></h1>
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
							<li><a href="http://store.arduino.cc/product/M000006"><?php echo _("Un câble USB type B"); ?></a></li>
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
						<a class="btn btn-mini btn-primary" href="laboite_stl4.zip"><i class=" icon-download icon-white"></i> <?php echo _("boitiers.stl v4"); ?></a>
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
						<div style="margin-bottom:8px;"><?php echo _("Raccordez le câble USB à votre ordinateur (après avoir installer l'"); ?><a href="https://www.arduino.cc/en/Main/OldSoftwareReleases#previous"><?php echo _("IDE Arduino"); ?></a> <?php echo _("(la version <strong>1.0.5</strong> est recommandée pour avoir une compatibilité avec la librairie ht1632)"); ?></div>
						<span class="label label-warning"><?php echo _("Attention"); ?></span> <?php echo _("Si le téléversement échoue, veuillez installer ces pilotes"); ?> <a href="ch341ser_mac.zip">Mac</a> <?php echo _("ou"); ?> <a href="CH341SER.EXE">Windows</a>
					</li>
					<li style="margin-top:8px;">
						<div><?php echo _("Téléchargez la librairie ht1632c puis décompressez le contenu de l'archive dans votre répertoire Arduino"); ?> <code>/libraries</code></div>
						<a class="btn btn-mini btn-primary" href="ht1632c.zip"><i class=" icon-download icon-white"></i> <?php echo _("ht1632c.zip"); ?></a>
					</li>
					<li>
						<div><?php echo _("Téléchargez le croquis Arduino puis décompressez le contenu de l'archive dans votre répertoire Arduino (le répertoire laboite-master devra être renommé en laboite)"); ?></div>
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
