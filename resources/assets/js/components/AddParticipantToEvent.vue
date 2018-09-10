<template>

	<form method="POST" action="/events">

		<slot name="csrf-field"></slot>
		<slot name="method-field"></slot>

		<input  v-on:keyup="searchPlayer" v-model="search"  name="search" class="input" type="text" placeholder="Search Player">

		<div class="box" v-for="player in searched">
			<strong>{{ player.name }}</strong>
		</div>	

	</form>

</template>	


<script>

export default {
	props: ['dataobj','individual'],
	data : function() {
		return {
			search : "",
			searched : 0 
		}
	},
	mounted() {
		console.log("attempting ajax call");
	},
	methods : {
	searchPlayer(){
		if(this.search.length > 2) {
		axios.get('/search/players?name='+this.search)
		.then(response => [
			this.searched = response.data  
		
		])
		  .catch(function (error) {
			    console.log(error);
		  });// catch
		} // if loop
	}// searchPlayer()
	}// methods
}// export default

</script>
