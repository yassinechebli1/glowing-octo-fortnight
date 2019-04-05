<!DOCTYPE html>
<html>
<head>
	<title>dgtu</title>
</head>
<body>
	<form action="{{ route('handleRegister') }}" method="POST" >
                   @csrf

                   name : <input type="text" name="name">
                   email : <input type="text" name="email">
                   password :<input type="text" name="password">

                   <button type="submit">Envoyer</button>

               </form>

</body>
</html>