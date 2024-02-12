

<?php 
  if (isset($_POST['telecharger']) && (isset($_FILES['photo'] ))) {
     // récupérer des informations sur notre image
     $image_name = $_FILES['photo']['name']; // nom de notre fichier

     $image_tmp_name = $_FILES['photo']['tmp_name']; // dossier temporaire
    
     $image_error = $_FILES['photo']['error']; // valeur d'erreur de notre image
    
     if($image_error === 0 ) {
    
     // Enregistrer l'image dans notre dossier uploads
    
     $destination = "./upload/".$image_name ; 
    
     move_uploaded_file($image_tmp_name, $destination);
   
     echo " L'image a bien été enregistrée";}
   
     else {
    
     echo " Il y a eu une erreur lors du téléchargement de l'image";
  
     }}?>
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ;?>">
  <input type="file" name="upload">
</form>