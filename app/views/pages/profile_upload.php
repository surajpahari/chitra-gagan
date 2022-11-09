 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background-color:red;
			font-family: 'Roboto Condensed', sans-serif;
   			 margin: 0;
    		background: #eee;
    		height: auto;
		}
		body>*{
			color:white;
		}
		input>*{
			border:none;

		}
		form{
			display:flex;
			justify-content:space-between center;
			align-items: center;
			flex-direction:column;
		}
		form>*{
			margin:3px;
		}
		input[type="submit"],button{
			padding: 0.5rem 2rem;
   			border: 1px #ccc solid;
    		display: inline-block;
    		margin: 2rem 0 0;
    		border-radius: 50px;
    		text-decoration: none;
    		color: #333;
    		transition: background 500ms ease;
		}
		h1{
			text-align:center;
			color: black;

		}
		input[name="title"]{
			border-radius:5px;
			line-height:40px;
			font:bold;
			font-size:20px;
			border:none;
			min-width:400px;
		}
		input:focus{
			outline:none;
		}
		#fileName{
			background-color:black;
			padding:5px;
			border-radius:5px;
			border-radius:5px;
			line-height:40px;
			font:bold;
			font-size:20px;
			border:none;
			min-width:400px;
		}
		body {
    		max-width: 900px;
    		margin: auto;
    		box-shadow: 30px 0px 40px rgb(0 0 0 / 10%), -30px 0px 40px rgb(0 0 0 / 10%);
			}
		#rlInput{
			color:black;
		}
	</style>


</head>
<body>
	<h1>Change profile </h1>
	<div id="formBox">
		<form action="<?php echo URLROOT; ?>/images/profile_upload" method="POST" enctype="multipart/form-data">
			<!-- <label for="title">Resource Title</label> -->
			<input id="rlInput"type="file" name="file">
			<input type="submit" name="submit" value="submit">
		</form>
	</div>
<?php $profile_path ='../../profile/'?>
<h1>Your profile</h1>
<img src=<?=$profile_path.$data[0]->profile?> alt="your profile"> 