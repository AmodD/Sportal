
<template>
	<div class="modal is-active">
  		<div class="modal-background"></div>
    		<div class="modal-card">
        		<header class="modal-card-head">
				<p class="modal-card-title"> 
					<slot name="modal-title"></slot>
				</p>
	            		<button class="delete" @click="$emit('close')" ></button>
		        </header>
			<section class="modal-card-body">
				<slot name="modal-body"></slot>
			</section>
		        <footer class="modal-card-foot">
				<slot name="modal-footer"></slot>	
			</footer>
		
	        <button class="modal-close" @click="$emit('close')"></button> <!-- make an anouncement by emmiting an custom event -->
		</div>
	</div>
</template>

<script>
// https://forum-archive.vuejs.org/topic/2036/component-inside-component-unknown-custom-element-error-vueify/4
import example from './Example.vue';

export default {
	props: ['dataprop'],
	components : { 'example' : example }
}

</script>
