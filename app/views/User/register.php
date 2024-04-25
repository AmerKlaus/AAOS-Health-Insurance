<!DOCTYPE html>

<html>
	<head><title>User Registration</title></head>
	<body>
		<form method="post" action="/User/register">
			<label>Name:<input type="text" name="name-input"></label>
			<label>Policy Number:<input type="text" name="policy-number-input"></label>
			<label>Email:<input type="email" name="email-input"></label>
			<label>Address:<input type="text" name="address-input"></label>
			<label>Username:<input type="text" name="username-input"></label>
		

			<label>Password:<input type="password-input" name="password-input"></label>


		

			<button type="submit">Register</button>

		</form>
		<a href="/User/login">Go to login page</a>
	</body>
</html>