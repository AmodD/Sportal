<template>

	<div>
		<div class="tabs is-boxed">
  			<ul>
				<li v-for="tab in tabs" :class=" { 'is-active' : tab.isActive } ">
					<a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
       				</li>   
			</ul>
                </div>

    		 <div class="tab-details">
		 	<slot></slot>
	 	</div>
	 </div>


</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

	data() {
		return { tabs:[] };
	},

	created() {
		this.tabs = this.$children;
	},

	methods : {
		selectTab(selectedTab){
		console.log("selecting "+selectedTab.name);
		this.tabs.forEach(tab => {
			tab.isActive = (tab.name == selectedTab.name);
		});
	    }
	}

    }
</script>
