<select id = "List">
<?php
        // Connexion a la BDD 
        try
       {
        $bdd = new PDO('mysql:host=localhost;dbname=pauvrete;charset=utf8', 'root', 'root');
       }
       catch (Exception $e)
       {
           die('Erreur : ' . $e->getMessage());
       }
       
       $reponse = $bdd->query("SHOW TABLES");
       
							
		while ($row = $reponse->fetch()) {
			
			$reponse2 = $bdd->query("Select DISTINCT indicateur_Name from ".$row['Tables_in_pauvrete'].";");
			
			$nom = $reponse2->fetch();
				$snom = $nom['indicateur_Name'];
			
			 ?> <option><?php echo $snom ?></option> <?php 
				 
		}
		
				
		
  ?>
  
</select>


<script type = "text/javascript">
var select = document.getElementById("List");
select.onchange = function(){
 alert(this.options[this.selectedIndex].innerHTML);
}
</script>