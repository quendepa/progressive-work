<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.min.css" />

    </head>

    <section class="spacer">
        <div class="row">
            
               <div class="cadre" id="cadre">
                  <h1>De Paola Quentin</h1>
                  <h4>Junior web developpeur</h4>
                </div> 
                
                <img class="id col-sm-2" id="id" class="img"src="img/id.jpg">
              <div class="animation-description" id="animation-description">
                <div class="description" id="description" class="col-sm-12">

                 Junior web developpeur , back et front end , actuellement en formation a Becode charleroi.
                 Métrise le html , css , javascript , php , python , react . Actuellement à la recherche d'un stage.
                  
                </div>
              </div>
              
               
        </div>
    </section>


    <div id="pinMaster">
      <div id="pinContainer">
       <section class="panel black">
          <div class="container-fluid">
          <div class="row ">
          <div class="col-md-12">

            <h1 class="repo">Repositories github</h1>
            <ul id="api"> </ul>

          </div>
          </div>
          </div>
        </section>
      </div>

 <section class="spacer">

 

   <form role="form" id="contactForm" data-toggle="validator" class="shake" method="post" action="acceuil.php">
   

     <div class="col-sm-12 col-sm-offset-4" id="form">
    
        <div class="well">
          <div id="tv" >
          <div class="titre-form">
           <h1>Formulaire de contact</h1>
          </div>
           <div class="row form">
                                
            <div class="form-group col-sm-5">
                <label for="nom" class="h4" >Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" 
                 required data-error="entrez votre nom">
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group col-sm-5">
                <label for="prenom" class="h4" >Prenom:</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrez votre prénom" 
                required data-error="NEW ERROR MESSAGE">
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group col-sm-10">
                <label for="email" class="h4" >Email:</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre adresse email" required>
                <div class="help-block with-errors"></div>
            </div>
                               
                            
            <div class="form-group col-sm-10">
                <label for="message" class="h4" >Message:</label>
                <textarea name="messages" id="messages" class="form-control" rows="5" placeholder="Entrez votre message" required></textarea>
                <div class="help-block with-errors"></div>
            </div>
             
            <div class="send form-group col-sm-7">
                <button type="submit"  id="form-submit" class="btn btn-success btn-lg" value="submit" name="submit">Submit</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
            </div>

                       
         </div>   
        </div>
      </div>
     </div>
   </form>
 </section>

  <footer>
   

       <a href = "mailto: quentindepaola404@gmail.com" >
         <img class="gmail" class="img"src="img/mail-google.png">
       </a>
    
       <a href="https://github.com/quendepa">
         <img class="github" class="img"src="img/git.png">
       </a>

       <a href="https://www.linkedin.com/in/quentin-de-paola/">
         <img class="linkedin" class="img"src="img/linkedin.png">
       </a>

    
  </footer>
    
        
      
      <script src = https://cdnjs.cloudflare.com/ajax/libs/gsap/3.1.1/gsap.min.js></script>
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js" > </script> 
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js" > </script> 
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js" > </script> 
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" > </script>
      <script src="scipt.js"></script>
    </body>
   

</html>

<?php


if(isset($_POST['submit'])){

   // nom
    

     $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
     
     

   // prenom
    
   
     $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);

    

   // EMAIL
    

     $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    

   // MESSAGE
    
    
        $messages =filter_var($_POST['messages'], FILTER_SANITIZE_STRING);


    $today = date("Y-m-d H:i:s");

    //envoie des informations a la base de donnée
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=progressivework;charset=utf8', 'root', 'root');
        $sent = $bdd->prepare('INSERT INTO email(email, messages, dates) VALUES (:email,:messages,:dates)');
        $sent->execute(array(
            
            'email'=>$email,
            'messages'=>$messages,
            'dates'=>$today,
        ));
        echo '<script>alert("Formulaire envoyé");</script>';
        $messages;
    } catch ( PDOException $e ) {

        return 'Cannot connected on database : Error -> ' . $e->getMessage() . '<br/>';
        die();

    }


    $EmailTo = "quentindepaola404@gmail.com";
    $Subject = "formulaire de contact";
    // preparation de l email 
    $Body = "";
    $Body .= "\n";
    $Body .= "nom: ";
    $Body .= $nom;
    $Body .= "\n";
    $Body .= "prenom: ";
    $Body .= $prenom;
    $Body .= "\n";
    $Body .= "email: ";
    $Body .= $email;
    $Body .= "\n";
    $Body .= "messages: ";
    $Body .= $messages;
    $Body .= "\n";


          
            
   
    // envoie de l'email
   $succes= mail($EmailTo, $Subject, $Body, "From:".$email);
   

    
  }



?>
