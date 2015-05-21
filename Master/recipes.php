<?php 
$pageTitile = 'World of yoga';
require './header.php';
// session_start();
print_r($_SESSION);

$conn= mysqli_connect('localhost','neli','123','yogies');

if(!$conn){
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="description">

		<img id="pie" src="./pictures/pie.jpg">

		<p>
			<h2>This recipe is gluten free, sugar free and guilt free... and it tastes delicious. </h2>

			I love to create healthy desserts, and this one is a winner! 
			It’s easy, amazingly tasty and super healthy. You can even eat this one during a detox.

			<p>To make it extra tasty, serve with some chopped almonds and a little cinnamon.</p>

			<div id="left">

				<p><Raw Apple Pie/p>

					<p>Ingredients</p>

					<ul>The Base:</ul>
					<li>2 ½ cup almond flour</li>
					<li>1 cup dates, pits removed</li>
					<li>¼ - ½ tsp salt</li>

					<ul>The Filling:</ul>
					<li>3 apples, cores removed</li>
					<li>1 cup dates</li>
					<li>juice of ½ lemon</li>
					<li>1 tsp cinnamon</li>
					<li>½ tsp powdered ginger</li>
					<li>pinch of nutmeg (optional)</li>

					<p style="text-align: center"> Method</p>
					<ol>For the Base</ol>
					<li>Blend all the ingredients until a sticky dough forms.</li>
					<li>Add the least amount of salt and add more if you wish.</li>
					<li>If your dough is not sticky enough to form a strong base, add more dates.</li>
					<li>Transfer your dough to a cake pan and press firmly into the pan</li>

					<ol>For the Filling</ol>
					<li>Blend all the ingredients until a chunky apple mixture appears (you may want to have a smooth filling, in that case, blend longer).</li>
					<li>Spoon on top of the almond base and place the whole pie in the fridge for min 15 mins</li>

					<p>Enjoy!</p>
					<p>Irina</p>
				</div>
			</p>


			<?php  
			
			$errorCom = '';
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(isset($_SESSION['user'])){
					$comment = trim($_POST['comment']);
					$commentToEnter = $comment;
					$commentToEnter= mysqli_real_escape_string($conn, $commentToEnter);
					$userCommmented=$_SESSION['user'];
					$sql = 'INSERT INTO comments (username,comment) VALUES ("'.$userCommmented.'","'.$commentToEnter.'")';	
					mysqli_query($conn, $sql);

				}else{
					$errorCom='You have to log in to leave a comment';
				}
			}
			?>

			<form id="comments" name="comments" action="" method="POST">
				<textarea id="comment" name="comment"></textarea>
				<div class="errorCom"><?php echo $errorCom; ?></div>

				<button id="btnCom" type="submit">Submit</button>
			</form>


			<?php 
			$sql='SELECT * FROM comments';
			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result))
			{
				echo '<div class="comFromDB"> <p>By:'.$row['username'].'</p>' . $row['comment'] . '</div>';
			}

			?>


		</div>
	</body>
	</html>

	<?php 
	require 'footer.php';
	?>
