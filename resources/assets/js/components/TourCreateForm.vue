<template>

	<form method="POST" action="/tournaments">
	
	<slot name="csrf-field"></slot>
	<slot name="method-field"></slot>
		
	<div class="field is-grouped">
	    	<span class="select control">
			<select name="sport">
				<option  v-for="sport in sports" :value="sport.id" >{{ sport.name }}</option>
			</select>
		</span>
		<div class="control is-expanded">
			<input name="name" class="input" type="text" placeholder="Name of the Tournament e.g. 3rd Pune Softball Championships 2017  ">
		</div>
	</div>
	<div class="field">
	  <p class="control">
	    <button class="button is-success">
	      Create
	    </button>
	  </p>
	</div>	
	</form>	

</template>	


<script>

export default {
	props: ['sports'],
	mounted() {
		console.log("heare i am");
	},

}


</script>
