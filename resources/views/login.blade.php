<!DOCTYPE html>
<html>
<head>
	<title>dgtu</title>
</head>
<body>
	
               	@auth

                   <p>Bonjour {{Auth::user()->name}}</p>
                   {{Auth::user()->created_at->diffInMinutes()}}
                   @endauth
                   @guest
                   <form action="{{ route('handleLogin') }}" method="POST" >
                   @csrf
                  
                   email : <input type="text" name="email">
                   password :<input type="password" name="password">

                   <button type="submit">Envoyer</button>

               </form>
               @endauth


</body>
</html>