<?php $title = _("Aide - laboîte.cc"); ?>

<?php ob_start() ?>
  <style type="text/css">
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
    <div id="help-sidebar" class="span3 bs-docs-sidebar">
      <ul class="nav nav-list bs-docs-sidenav affix-top" data-spy="affix">
        <li class="active"><a href="#overview"><i class="icon-chevron-right"></i> <?php echo _("Vue d'ensemble"); ?></a></li>
        <li><a href="#devices"><i class="icon-chevron-right"></i> <?php echo _("Boîtes"); ?></a></li>
        <li><a href="#server"><i class="icon-chevron-right"></i> <?php echo _("Serveurs"); ?></a></li>
        <li><a href="#apps"><i class="icon-chevron-right"></i> <?php echo _("Apps"); ?></a></li>
        <li><a href="#api"><i class="icon-chevron-right"></i> <?php echo _("API"); ?></a></li>
      </ul>
    </div>
    <div class="span9">
      <section id="overview">
        <div class="page-header">
          <h1><?php echo _("Vue d'ensemble"); ?></h1>
        </div>
        <p class="lead"><?php echo _("Le projet laboîte est un projet open-source composé de :"); ?>
          <ul class ="lead">
            <li style="margin-bottom : 20px;"><a href="#devices"><?php echo _("Boîtes"); ?></a><?php echo _(" : des petits écrans connectés à Internet."); ?></li>
            <li><a href="#server"><?php echo _("Serveurs"); ?></a><?php echo _(" : des machines qui permettent de configurer les boîtes et les "); ?><a href="#apps"><?php echo _("apps"); ?></a>.</li>
          </ul>
        </p>
        <img style="display: block; margin-left: auto; margin-right: auto;" src="<?php echo _("templates/images/overview_fr_FR.svg"); ?>" class="img-polaroid">
      </section>
      <section id="devices">
        <div class="page-header">
          <h1><?php echo _("Boîtes"); ?></h1>
        </div>
        <p><?php echo _("Les boîtes sont des équipements connectés à Internet équipés d'un écran et de capteurs optionnels. Les boîtes sont basées sur la plateforme "); ?><a href="<?php echo _("http://arduino.cc/fr/"); ?>">Arduino</a>. <?php echo _("Elles peuvent être construites à partir des composants suivants  : "); ?>
          <ul>
            <li><a href="http://store.arduino.cc/eu/index.php?main_page=product_info&cPath=11&products_id=197"><?php echo _("Un Arduino Ethernet"); ?></a><?php echo _(" : c'est l'intelligence du projet laboîte, l'Arduino se connecte au "); ?><a href="#server"><?php echo _("serveur"); ?></a><?php echo _(" et récupère les différentes "); ?><a href="#apps"><?php echo _("apps"); ?></a><?php echo _(". Il traite ensuite ces données et les affiche."); ?></li>
            <li><a href="http://www.sureelectronics.net/goods.php?id=1095"><?php echo _("Une matrice de LED SURE electronics"); ?></a><?php echo _(" : une matrice de 32×16 pixels avec deux couleurs."); ?></li>
          </ul>
        </p>
        <img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/laboite.jpg" class="img-polaroid">
      </section>
      <section id="server">
        <div class="page-header">
          <h1><?php echo _("Serveurs"); ?></h1>
        </div>
        <p>
          <?php echo _("Le serveur est une machine qui accueille PHP + MySQL ainsi qu'une application web open-source. Cette application permet la configuration à distance de "); ?><a href="#devices"><?php echo _("boîtes"); ?></a><?php echo _(" et d'"); ?><a href="#apps"><?php echo _("apps"); ?></a><?php echo _(". Cette application web peut être téléchargée depuis github et installer sur votre serveur. Il est également possible d'utiliser gratuitement l'instance du serveur "); ?><a href="<?php echo $_SERVER['SERVER_NAME']; ?>"><?php echo $_SERVER['SERVER_NAME']; ?></a><?php echo _(" (ce serveur)."); ?>
        </p>
        <a class="btn btn-primary" href="assets/bootstrap.zip"><i class=" icon-download icon-white"></i> <?php echo _("Télécharger la web app laboîte"); ?></a>
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
						<small><?php echo _("<strong>Time</strong><br> affiche l'heure d'une ville dans le monde"); ?></small>
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
						<small><?php echo _("<strong>Weather</strong><br> affiche les conditions météo"); ?></small>
					</li>
					<li class="thumbnail" style="width : 92px; text-align:center;">
            <div style="height : 40px;">
              <img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-buses.svg" >
            </div>
						<small><?php echo _("<strong>Buses</strong><br> affiche les minutes avant le passage d'un bus"); ?></small>
					</li>
					<li class="thumbnail" style="width : 92px; text-align:center;">
            <div style="height : 40px;">
              <img style="display: block; margin-left: auto; margin-right: auto;" src="templates/images/apps/icon-waves.svg" >
            </div>
						<small><?php echo _("<strong>Waves</strong><br> affiche les conditions d'un spot"); ?></small>
					</li>					
			  </ul>
      </section>
      <section id="api">
        <div class="page-header">
          <h1><?php echo _("API"); ?></h1>
        </div>
        <p>
          <?php echo _("Une API permet à votre boîte d'accéder à ses différentes apps en utilisant un protocole et un format compréhensible par une machine. Les deux protocoles applicatifs disponibles sont "); ?><a href="http://datatracker.ietf.org/doc/draft-ietf-core-coap/">CoAP</a><?php echo _(" et "); ?><a href="datatracker.ietf.org/doc/rfc2616/">HTTP</a><?php echo _(". Les formats de représentation de données sont "); ?><a href="http://wikipedia.org/wiki/Extensible_Markup_Language">XML</a><?php echo _(" et "); ?><a href="http://wikipedia.org/wiki/JavaScript_Object_Notation">json</a><?php echo _(". Voici un exemple de fichier XML contenant trois apps (<strong>Time</strong>, <strong>Buses</strong> et <strong>Weather</strong>) :"); ?>
        </p>
        <pre>
<span class="text-warning">&lt;?xml</span><span class="text-success"> version=</span>"1.0" <span class="text-success">encoding=</span>"utf-8"<span class="text-warning">?&gt;</span>
<span class="text-info">&lt;response&gt;
	&lt;version&gt;</span>0.1<span class="text-info">&lt;/version&gt;
	&lt;time&gt;</span>18:18<span class="text-info">&lt;/time&gt;
	&lt;nextbus&gt;</span>5<span class="text-info">&lt;/nextbus&gt;
	&lt;weather&gt;
		&lt;today&gt;</span>0<span class="text-info">&lt;/today&gt;
		&lt;temperature&gt;</span>25<span class="text-info">&lt;/temperature&gt;
		&lt;tomorrow&gt;</span>1<span class="text-info">&lt;/tomorrow&gt;
		&lt;low&gt;</span>15<span class="text-info">&lt;/low&gt;
		&lt;high&gt;</span>28<span class="text-info">&lt;/high&gt;
	&lt;/weather&gt;
&lt;/response&gt;</span></pre>
        <p><?php echo _("Les mêmes informations au format json : "); ?>
        </p>
        <pre>{
    <span class="text-error">"version"</span>: <span class="text-error">"0.1"</span>,
    <span class="text-error">"time"</span>: <span class="text-error">"19:10"</span>,
    <span class="text-error">"nextbus"</span>: <span class="text-error">"1"</span>,
    <span class="text-error">"weather"</span>: {
        <span class="text-error">"today"</span>: <span class="text-error">0</span>,
        <span class="text-error">"temperature"</span>: <span class="text-error">25</span>,
        <span class="text-error">"tomorrow"</span>: <span class="text-error">1</span>,
        <span class="text-error">"low"</span>: <span class="text-error">"15"</span>,
        <span class="text-error">"high"</span>: <span class="text-error">"28"</span>
    }
}</pre>
        <p>
          <?php echo _("Ces fichiers peuvent être récupérés en utilisant l'url suivante : "); ?><code><a href="http://api.<?php echo $_SERVER['SERVER_NAME'] . '/964de680.xml' ?>">http://api.<?php echo $_SERVER['SERVER_NAME'] . '/' . htmlentities('<apikey>.<xml|json>');; ?></a></code>
        </p>
      </section>
    </div><!--/.span9 -->
  </div><!--/.row -->
  
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
