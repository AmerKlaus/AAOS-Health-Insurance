<!DOCTYPE html>

<html>
	<head><title>User Registration</title></head>
	<body>
		<form method="post" action="/User/register">
			<label>name:<input type="text" name="name-input"></label>
			<label>policy number:<input type="text" name="policy-number-input"></label>
			<label>email:<input type="email" name="email-input"></label>
			<label>address:<input type="text" name="address-input"></label>
			<label>username:<input type="text" name="username-input"></label>
		

			<label>password:<input type="password-input" name="password-input"></label>


		

			<button type="submit">Register</button>

		</form>
		<a href="/User/login">Go to login page</a>
	</body>
</html>