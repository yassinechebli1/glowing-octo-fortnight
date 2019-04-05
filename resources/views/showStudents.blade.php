<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


@if($errors->any())
	<p>{{$errors->first()}}</p>
@endif

<table border>
		<thead>
			<th>identifiant</th>
					<th>name</th>
							<th>age</th>
									<th>photo</th>
		</thead>
		<tbody>
			@foreach($cl->students as $student)
			<tr>
				
				<td>{{$student->id}}</td>
				<td>{{transformName($student->name)}}</td>
				<td>{{$student->age}}</td>
				<td>{{$student->photo}}</td>
				<td><a href="{{route('deletStudent',['id'=>$student->id]) }}">Delete</a></td>

			</tr>
			@endforeach
		</tbody>
		</table>
</body>
</html>