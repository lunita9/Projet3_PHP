<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <script  type="text/javascript" src="tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
  tinymce.init({
    selector: '#contenu', menubar: false, toolbar: false, readonly: 1
  });
  </script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        
        <style type="text/css"> 

      /* Styles de base */
      body {
        background: url('public/images/alaska.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
		padding-top:60px;
		font-family: "Bitter";
		
      }

	/* Images */
      div img {
        width: 100%;
      }
	  
	  footer{
		margin-bottom: 50px;
	  }
	  
	  .jumbotron{
		margin-top: 20%;
        background-color: rgba(255, 255, 255, 0.5);
	  }

    </style>
    </head>
    
        
    <body>
        <header>
        <div class="container-fluid">
         <nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
           <div class="navbar-header">
               <button type="button" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
              <a href="#" class="navbar-brand" >Billet simple pour l'Alaska<br/>par Jean Forteroche</a>
            </div>
           <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav">       
               <li class=""><a href="index.php#accueil">Accueil</a></li>
               <li><a href="index.php#qui">Biographie</a></li>
               <li><a href="index.php#contact">Administration</a></li>
             </ul>
           </div>
		</div>
       </nav>
    </header>
        
        
    
    <div class="container">

      <div class="jumbotron row" id="accueil">
          <h1 class="text-center">Bienvenue en Alaska</h1>
          <?= $content ?>


        
      </div>


<?php if($afficheBio) { ?>
      <div class="jumbotron row" id="qui">
        <h1 class="text-center">Qui est Jean Forteroche?</h1>
        <img class="col-sm-12 col-md-5 col-md-push-7" src="public/images/forteroche.jpg" alt="Equipe"> 
        <p class="col-sm-12 col-md-7 col-md-pull-5">L'Alaska a toujours inspiré Jean Forteroche. Il s'est juré de visiter cet endroit et d'écrire un roman sur chaque pays qu'il aura visité. Ainsi ce moment est arrivé et espère que ses extraits vous feront rêver.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. </p>
      </div>
<?php } ?>

<?php if($afficheAccesAdmin) { ?>
      <div class="jumbotron row" id="contact">
        <h1 class="text-center">Se connecter</h1>
          <form class="col-lg-6" action="index.php?action=validation" method="post">
        
              <legend>Connexion</legend>
                <div class="form-group">
                  <label>Pseudo : </label>
                  <input type="text" name="pseudo" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label>Mot de passe : </label>
                  <input type="password" name="mdp" value="" class="form-control"/>
                </div>

                <input type="submit" name="connexion" value="Connexion"/>
            </form>     
          
      </div>
<?php } ?>
    </div>
   <!-- Pied de page
    ================================================== -->
    <footer class="text-center">
	  <a class="btn btn-default" href="#"><i class="fa fa-twitter fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-facebook fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-google-plus fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-flickr fa-2x"></i></a>
      <a class="btn btn-default" href="#"><i class="fa fa-spotify fa-2x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Javascript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    
         
            
    </body>
</html>