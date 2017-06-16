<div class="box content">
@php
//dd($data);
@endphp
<table class="">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	@foreach($data as $user)

	<tr>
	<form  id="update{{ $user->id }}"  method="POST" action="/users/{{$user->id}}">
        	{{ csrf_field() }}
		{{ method_field('PATCH') }}
			<td><input class="input" name="name" type="text" value="{{ $user->name }}"  placeholder="{{ $user->name }}"></td>
			<td>{{ $user->email }}</td>
			<td><button class="button is-success">Update</button></td>
	</form>
	<form  id="delete{{ $user->id }}"  method="POST" action="/users/{{$user->id}}">
        	{{ csrf_field() }}
		{{ method_field('DELETE') }}
		<td><button class="button is-danger">Delete</button></td>
	</form>
	</tr>
	@endforeach
	@foreach($errors->all() as $error)
	<blockquote>{{ $error }} </blockquote>
	@endforeach
    </tbody>
  </table>
</div>
