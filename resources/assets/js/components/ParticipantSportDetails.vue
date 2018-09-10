<template>
<div>
<article class="message">
  <div class="message-header">
	  <p>{{ sportname }}</p>
  </div>
</article>
	
<div><span class="tag" v-for="year in seasons" :name="year" >{{ year }}</span></div>
<br>
<div class="tags">
  <span class="tag is-warning" v-for="team in teams">{{ team.name }}</span>
</div>
<a class="button is-dark is-small"></a>			

</div>
</template>

<script>
    export default {
	props : ['sportname','seasons','teams'],   
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
