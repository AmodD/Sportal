<div id="app" class="box">

	<createtour :sports="{{$sports->toJson()}}">

				<template slot="csrf-field">
				{{ csrf_field() }}
				</template>

	</createtour>  

</div>
