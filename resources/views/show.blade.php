<!DOCTYPE html>
<html>
<head>
	<title>ghy</title>
</head>
<body>
	<form action="{{route('handleUpdateClassroom',['id'=>$cl->id])}}" method="POST">
		@csrf
		<input type="text"  name="tables"  value="{{$cl->tables}}">
		<input type="text"  name="components" value="{{$cl->components}}">
		<input type="text"  name="title"  value="{{$cl->title}}">
		<button>Update</button>
	</form>

</body>
</html>