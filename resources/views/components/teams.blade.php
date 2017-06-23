<div id="app" class="box content">
<div class="columns">
<div class="column">
<nav class="panel has-text-centered ">
  <p class="panel-heading">
   Select a team to Update
  </p>
<p class="panel-tabs">
	{{ $data->links() }}
</p>
<div class="panel-block">
    <p class="control has-icons-left">
      <input class="input" type="text" placeholder="Search">
      <span class="icon  is-left">
        <i class="fa fa-search"></i>
      </span>
    </p>
  </div>
	@foreach($data as $team)
<a class="panel-block"><button class="button is-link" @click="showModal = true;   dataObj =  {{ $team }}"> {{ $team->name }} </button></a>
	@endforeach
<div class="panel-block is-full-width">

  </div>
</nav>
	<modal v-if="showModal" :dataprop=dataObj  @close="showModal = false"> 
		<template slot="modal-title">Update Team</template>
		<template slot="modal-body">
			<teameditform :dataprop=dataObj >
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
  <p class="panel-heading">
   Quickly Create a Team
  </p>
</nav>

			<teameditform :dataprop=false :sports="{{ $sports }}">
				<template slot="csrf-field">
				{{ csrf_field() }}
				</template>
			</teameditform>

</div>

</div>
</div>
