<div id="app" class="box content">
<div class="columns">
<div class="column">
<nav class="panel has-text-centered ">
  <p class="panel-heading">
   Select a team to Update
  </p>
<p class="panel-tabs">
	@if(Route::currentRouteName() == 'teams')
	{{ $data->links() }}
	@endif
</p>
	<form method="POST" action="/teams/search">
	{{ csrf_field() }}
<div class="panel-block">
    <p class="control has-icons-left">
      <input class="input" name="searchedname" type="text" placeholder="Search" value="{{ old('searchedname') }}">
      <span class="icon  is-left">
        <i class="fa fa-search"></i>
      </span>
    </p>
  </div>
</form>


	@foreach($data as $team)
<a class="panel-block"><button class="button is-link" @click="showModal = true;   dataObj =  {{ $team }}"> {{ $team->name }} </button></a>
	@endforeach
<div class="panel-block is-full-width">

  </div>
</nav>
	<modal v-if="showModal" :dataprop=dataObj  @close="showModal = false"> 
		<template slot="modal-title">Update Team</template>
		<template slot="modal-body">
			<teameditform :dataprop=dataObj  :sports="{{ $sports }}" >
				<template slot="csrf-field">
				{{ csrf_field() }}
				</template>
				<template slot="method-field">
				{{ method_field('PATCH') }}
				</template>
			</teameditform>
		</template>
		<template slot="modal-footer"></template>
	</modal>	

</div>

<div class="column">
	<nav class="panel has-text-centered ">
		<p class="panel-heading">Easily create a Team</p>
	</nav>

	@if($errors->any()) 
		<errors :errors="{{$errors->toJson()}}"  v-if="showMessage" @close="showMessage = false" ></errors>
	@endif
	
	<teameditform :dataprop=false :sports="{{ $sports }}" :old="{{ json_encode(Session::getOldInput()) }}" >
		<template slot="csrf-field">{{ csrf_field() }}</template>
	</teameditform>
</div>


</div>
</div>
