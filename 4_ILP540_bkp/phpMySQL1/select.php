<?php
/**
 * Select Table Data
 * Fectching aata from database using mysqli_fetch_array() function and without table tag
 */

require_once('connection.php');

// Mysql query to select data from table
$mysql_query = "SELECT * FROM users";
$result = $conn->query($mysql_query);

// while($user_data = mysqli_fetch_array($result)) {
//		 echo $user_data['id'] . ' ' . $user_data['nome'] . ' ' . $user_data['email'] .' ' .	$user_data['datanasc'] . '<br />';
// }

//Connection Close
mysqli_close($conn);
?>
<?php 
require_once('connection.php');
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<meta charset="UTF-8"> 
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">		<title>Exibir dados</title> 
	</head> 
	<body> 
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Nome</th>
						<th scope="col">E-Mail</th>
						<th scope="col">Data Nascimento</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($data = mysqli_fetch_array($result)) {
					?> 
              <tr> 
                <th scope="row"><?= $data['id']; ?></th>
                <td><?= $data['nome']; ?></td> 
                <td><?= $data['email']; ?></td> 
                <td><?= date('d/m/Y', strtotime($data['datanasc'])); ?></td>
                <td><a href="delete.php?id=<?= $data['id']; ?>">Excluir</a></td> 
              </tr> 
					<?php
            }
          ?>			 
				</tbody>
			</table>
		</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>	</body> 
</html>