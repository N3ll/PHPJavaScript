<?php 
session_start();

if(($_SESSION['logged_in'])){
	include './logged_in.php';
}else{
	include './logged_out.php';
}
?>

<nav>
	<ul>
		<li><a href="#">Yoga Poses</a></li>
		<li class="subList">
			<span id="levels">Yoga Levels <img id="arrow" src="./pictures/arrow.png"></span>
			<ul class="dropdown">
				<li><a href="#">All levels</a></li>
				<li><a href="#">Level 1</a></li>
				<li><a href="#">Level 2</a></li>
				<li><a href="#">Level 3</a></li>
				<li><a href="#">Level 4</a></li>
			</ul>
		</li>
		<li><a href="./recipes.php">Healthy and Delicious</a></li>
	</ul>
</nav>
</div>

<div id="overlay">
	<div id="background"></div>

	<form id="loginForm" name="login" method="POST" action="checkUser.php">
		<fieldset id="bordered">
			<legend>Register:</legend>
			<p>Username:<input type="text" name="username"></p>
			<p>Password:<input type="password" name="pass"></p>
			<p>Repeat pass:<input type="password" name="pass2"></p>
		</fieldset>
		<fieldset>
			<legend>Log in:</legend>
			<p>Username:<input type="text" name="userExist"></p>
			<p>Password:<input type="password" name="passExist"></p>
		</fieldset>
		<div class="btns">
			<button id="btnSubmit" class="btn" type="button" value="Submit">Submit</button>
			<button id="cancel" class="btn" type="button" value="Cancel">Cancel</button>
		</div>
	</form>
</div>
</header>
</body>
</html>
