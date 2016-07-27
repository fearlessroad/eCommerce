<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bios</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#createBio").submit(function(e){
				e.preventDefault();
				var name = $("#name").val();
				var age = $("#age").val();
				$.ajax({
					method:"GET",
					url:"/bios/add_user/"+name+"/"+age
				}).done(function(data){
					$("#bios").append("<input></input>");
					$("#bios").append(data);
					$("#name").val("");
					$("#age").val("");
				})
			})
		})
		$(document).on('click','.bio', function(e){
			e.currentTarget.innerHTML = "";
			console.log(e);
		});
	</script>
</head>
<body>
	<form id="createBio">
		<label>Name: <input type="text" id="name"></label>
		<label>Age: <input type="number" id="age"></label>
		<button>Submit</button>
	</form>
	<div id="bios">
<?php foreach($myUsers as $user){
?>
	<h3>Not from AJAX</h3>
	<h1><?=$user['name']?></h1>	
	<h2><?=$user['age']?></h2>	
<?php }
?>
	</div>
	
</body>
</html>