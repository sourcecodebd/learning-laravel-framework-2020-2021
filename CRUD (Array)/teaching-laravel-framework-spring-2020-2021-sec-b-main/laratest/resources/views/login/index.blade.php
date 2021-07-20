<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	<h1>Login Page</h1>

	<form method="post">
		<!-- @csrf -->
		{{csrf_field()}}
		<fieldset>
			<legend>Login</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
					<td><Button><a style="text-decoration: none" href="/E-Pay">Back</a></Button></td>
				</tr>
			</table>
		</fieldset>
	</form>

    {{session('msg')}}

</body>
</html>
