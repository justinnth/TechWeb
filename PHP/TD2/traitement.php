<?php
	//code php

	if (isset($_POST['send'])){
		if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['naissance'])) {
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$age = htmlspecialchars(age($_POST['naissance']));	
			if (!empty($_POST['sport']))
				$sports = $_POST['sport'];
			if (!empty($_POST['email'])) 
				$email = htmlspecialchars($_POST['email']);

			$aff = "Bonjour $nom $prenom. Vous avez $age ans.";
		}
		else {
			echo '<script type="text/javascript">';
				echo 'alert("Complétez tous les champs");';
				echo "window.history.back();";
			echo "</script>";
		}
	} 
	else 
		header("Location:index.html");

	function age($date) {
		$age = date('Y') - date('Y', strtotime($date));
		if (date('md') < date('md', strtotime($date)))
			return $age - 1;
		return $age;
	}
?>




<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
     <title>Votre profil</title>
</head>
<body>

	<p><?= $aff ?></p>
	<?php if (!empty($email)): ?>
	<p>E-mail : <?= $email ?></p>
	<?php endif; ?>
	<?php if (!empty($sports)): ?>
	<p>Sports préférés :</p>
	<ul>
	<?php
	foreach ($sports as $sport) {
		echo "<li>$sport</li>";
	}
	?>
	</ul>
	<?php endif; ?>


</body>
</html>
