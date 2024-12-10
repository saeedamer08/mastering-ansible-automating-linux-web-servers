<!DOCTYPE html lang="nl">
<html>
	<title>Demo gold servers</title>
	<style>.block {text-align: center;margin-bottom:10px;}.block:before {content: '';display: inline-block;height: 100%;vertical-align: middle;margin-right: -0.25em;}.centered {display: inline-block;vertical-align: middle;width: 300px;}
	table {border: 2px solid red; background-color: #FFC;} th {border-bottom: 5px solid #000;} td {border-bottom: 2px solid #666;}
	</style>
	<body>
		<div class="block" style="height: 99%;">
		<div class="centered">
			<h1>Demo gold servers</h1>
			<p>Served by {{ ansible_hostname }} ({{ ansible_eth1.ipv4.address }}).</p>
			<p>Which databases are saved on database server?</p>
		<?php
		    try {
				$dbuser = 'dbuser';
				$dbpass = 'dbpasswd';
				$host = '10.0.5.40';
				$dbname='windesheim';
				$connect = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass);
			} catch (PDOException $e) {
					echo "Error : " . $e->getMessage() . "<br/>";
				die();
			}
			$sql = 'SELECT datname, datdba, encoding, datcollate FROM pg_database';
			echo "<table>";
			echo "<tr><th>Databasename</th><th>Owner</th><th>Encoding</th><th>datcollate</th>";
			foreach ($connect->query($sql) as $row)
			{
			echo "<tr><td>";
			echo $row['datname'];
			echo "</td><td>";
			echo $row['datdba'];
			echo "</td><td>";
			echo $row['encoding'];
			echo "</td><td>";
			echo $row['datcollate'];
			echo "</td></tr>";
			}
			echo "</table>";
		?>
		 </div>
		</div>
	</body>
</html>
