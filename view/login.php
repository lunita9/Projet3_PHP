<!DOCTYPE html>
<html lang="fr">
    
    <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <style type="text/css"> 

      /* Styles de base */
      body {
        background: url('') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
		padding-top:70px;
		font-family: "Bitter";
		
      }

	/* Images */
      div img {
        width: 100%;
      }
	  
	  footer{
		margin-bottom: 15px;
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
               <li class="active"><a href="index.php">Accueil</a></li>
               <li><a href="index.php?action=bio">Biographie</a></li>
               <li><a href="index.php?action=admin">Administration</a></li>
             </ul>
           </div>
		</div>
       </nav>
    </header>
        
       
    <form action="index.php?action=validation" method="post">
        <table>
            <tr>
                <td>
                    <label>Pseudo: </label>
                </td>
                <td>
                    <input type="text" name="pseudo" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <label>Mot de passe: </label>
                </td>
                <td>
                    <input type="password" name="mdp" value="" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="connexion" value="Connexion" />
                </td>
            </tr>
        </table>
    </form>
        
  </body>
</html>
