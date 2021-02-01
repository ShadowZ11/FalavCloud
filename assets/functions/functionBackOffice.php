<?php

require_once("conf.inc.php");
require_once("functions.php");

function setIsSelected($userIndex, $value, $field)
{
	if ($_SESSION['users'][$userIndex][$field] === $value) {
		echo 'selected';
	}
}

function getAllUsers()
{
	selectAllUsers();
	showAllUsers();
}

function selectAllUsers()
{
	$connect = connectFalaDB();

	$sqlUsers = $connect->query("SELECT * FROM users");
	$users = $sqlUsers->fetchAll();

	$_SESSION['users'] = $users;
}

function showAllUsers()
{
	$i = 0;
	while (isset($_SESSION['users'][$i]["email"]) && isset($_SESSION['users'][$i]["prenom"])) {
?>
		<tr calss="oneUser">
			<td><?php echo ($_SESSION['users'][$i]['pseudo']); ?></td>
			<td><?php echo ($_SESSION['users'][$i]['prenom']); ?></td>
			<td><?php echo ($_SESSION['users'][$i]['email']); ?></td>
			<td><?php echo ($_SESSION['users'][$i]['date_inscription']); ?></td>
			<td>
				<select name="<?php echo $i ?>-verifier">
					<option value="1" <?php setIsSelected($i, "1", "VF"); ?>>Oui</option>
					<option value="0" <?php setIsSelected($i, "0", "VF"); ?>>Non</option>
				</select>
			</td>
			<td>
				<select name="<?php echo $i ?>-rang">
					<option value="3" <?php setIsSelected($i, "3", "RANG"); ?>>Administrateur</option>
					<option value="2" <?php setIsSelected($i, "2", "RANG"); ?>>Artiste</option>
					<option value="1" <?php setIsSelected($i, "1", "RANG"); ?>>Regulier</option>
				</select>

			</td>
			<td>
				<button name="modify" value="<?php echo $i ?>"><i class="fas fa-pen"></i></button>
			</td>
			<td>
				<button name="delete" value="<?php echo $i ?>"><i class="far fa-trash-alt"></i></button>
			</td>
		</tr>
<?php
		$i++;
	}
}
?>