<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<header></header>
	<main>
		@if(Session::has('msg'))
           <h4>{{Session::get('msg')}}</h4>
           @endif
		<table border>
			@foreach($cl as $c)
			<tr>
				
				<td>{{$c->id}}</td>
				<td><a href="{{route('handleDeleteClassroom',['id'=>$c->id])}}">delete</a></td>
				<td><a href="{{route('handleUpdateClassroom',['id'=>$c->id])}}">Update</a></td>
				<td>{{ $c->students_count }}</td>
			<td><a href="{{route('showStudents',['id'=>$c->id])}}">Voir details etudiants</a></td>

			</tr>
			@endforeach
		</table>
		<img src="{{$icons}}">

	</main>
	<footer></footer>
</body>
</html>