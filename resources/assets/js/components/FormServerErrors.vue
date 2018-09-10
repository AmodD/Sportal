<template>
	<div class="notification is-danger">
           <button class="delete" @click="$emit('close')"></button>
	   <ul>
		<li v-for="error in flaterrors">{{ error }} </li>
	   </ul>
	</div>
</template>



<script>

export default {
	props: ["errors"],
	data : function() {
		return {
		flaterrors : [].concat.apply([], Object.values(this.errors))
		}
	}	
}

</script>
