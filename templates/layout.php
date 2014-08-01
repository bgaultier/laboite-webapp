<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title ?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Baptiste Gaultier">
      <link href="templates/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="templates/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="templates/images/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="templates/images/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="templates/images/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="templates/images/apple-touch-icon-57-precomposed.png">
      <link rel="shortcut icon" href="templates/images/favicon.png">
      <script type="text/javascript" src="templates/jquery/jquery.min.js"></script>
      <style type="text/css">
        @media (max-width: 980px) {
          /* Enable use of floated navbar text */
          .navbar-text.pull-right {
            float: none;
            padding-left: 5px;
            padding-right: 5px;
          }
        }

        .form-signin {
          background-color: #FFFFFF;
          border: 1px solid #E5E5E5;
          border-radius: 5px 5px 5px 5px;
          box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
          margin: 20px auto 20px;
          max-width: 300px;
          padding: 19px 29px 29px;
        }

        .form-signin .form-signin-heading, .form-signin .checkbox {
          margin-bottom: 10px;
        }

        .form-signin input[type="text"], .form-signin input[type="password"] {
          font-size: 16px;
          height: auto;
          margin-bottom: 15px;
          padding: 7px 9px;
        }
    </style>
  </head>
  <body data-spy="scroll" data-target=".bs-docs-sidebar">
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>"><img alt="laboîte" src="templates/images/logo.svg"></a>
            <div class="nav-collapse collapse">
              <p class="navbar-text pull-right">
                <?php
                  if(isset($_SESSION['id']))
                    echo '<a href="account" class="navbar-link" style="color: #fff;"><i class="icon-user icon-white"></i> ' . $_SESSION['email'] . '</a>';
                  else
                    echo '<a href="login" class="navbar-link">' . _('Connexion') . '</a>';
                ?>
              </p>
              <ul class="nav">
                <li<?php if( ('/help' != $_SERVER['REQUEST_URI']) && ('/about' != $_SERVER['REQUEST_URI']) && ('/apps' != $_SERVER['REQUEST_URI'])) echo ' class="active"' ?>><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>"><?php if(isset($_SESSION['id'])) echo _('Mes boîtes'); else echo _('Accueil'); ?></a></li>
                <?php
                  if(isset($_SESSION['id'])) {
                    echo "<li";
                    if('/apps' == $_SERVER['REQUEST_URI'])
                      echo ' class="active"';
                    echo "><a href=\"apps\">" . _('Apps') . "</a></li>";
                  }
                ?>
                <li<?php if('/help' == $_SERVER['REQUEST_URI']) echo ' class="active"' ?>><a href="help"><?php echo _('Aide'); ?></a></li>
                <li<?php if('/about' == $_SERVER['REQUEST_URI']) echo ' class="active"' ?>><a href="about"><?php echo _('À propos'); ?></a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>

      <div class="container">
        <?php echo $content; ?>
      </div><!--/.container-->
      <!-- Le javascript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script type="text/javascript" src="templates/bootstrap/js/bootstrap.js"></script>
    </body>
</html>
