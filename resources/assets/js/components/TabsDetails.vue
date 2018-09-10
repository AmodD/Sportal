<template>

		<div v-show="isActive"><slot></slot></div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
	props : {
		name : { required : true },
		selected : { default : false }
	},

	data(){
		return { isActive : false }
	},
	mounted(){
		this.isActive = this.selected;
	},
	computed: {
		href() { return '#'+this.name.toLowerCase().replace(/ /g,'-');
// repalce by looking for any / globally /g 
         }

	}
	
    }	
	
	
</script>
