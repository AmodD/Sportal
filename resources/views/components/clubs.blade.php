
<div class="box content">
<table class="">
    <thead>
      <tr>
        <th>Club/Academy/Federation Names</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	@foreach($data as $club)

	<tr>
	<form  id="update{{ $club->id }}"  method="POST" action="/clubs/{{$club->id}}">
        	{{ csrf_field() }}
		{{ method_field('PATCH') }}
			<td><input class="input" name="name" type="text" value="{{ $club->name }}"  placeholder="{{ $club->name }}"></td>
			<td><button class="button is-success">Update</button></td>
	</form>
	</tr>
	@endforeach
	@foreach($errors->all() as $error)
	<blockquote>{{ $error }} </blockquote>
	@endforeach
    </tbody>
  </table>
</div>
