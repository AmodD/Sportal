<template>
	<form method="POST" :action="urlValue">
	
		<slot name="csrf-field"></slot>
		<slot name="method-field"></slot>
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Name</label></div>
			<div class="field-body">
<div class="field control"><input class="input" name="name" type="text" :value="dataprop['name']" placeholder="Name"></div>
			</div>
		</div>	
	
		<div v-if=showSport  class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Sport</label></div>
			<div class="field-body">
				<div class="field control">
	    			<span class="select">
		          	<select name="sport_id">
				          <option value="">Select Sport</option>
					  <option v-for="sport in sports" :value="sport.id" >{{ sport.name }}</option>
				</select>
				</span>
			</div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Slogan</label></div>
			<div class="field-body">
<div class="field control"><input class="input" name="slogan" type="text" :value="dataprop['slogan']" placeholder="Slogan"></div>
			</div>
		</div>	
	
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Website</label></div>
			<div class="field-body">
<div class="field control"><input class="input" name="website" type="text" :value="dataprop['website']" placeholder="Website"></div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Sponsor</label></div>
			<div class="field-body">
<div class="field control"><input class="input" name="sponsor" type="text" :value="dataprop['sponsor']" placeholder="Sponsor"></div>
			</div>
		</div>	

		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Location</label></div>
			<div class="field-body">
<div class="field control"><textarea class="textarea" name="location" type="text" :value="dataprop['location']" placeholder="Location"></textarea></div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Established</label></div>
			<div class="field-body">
<div class="field control"><input class="input" name="established" type="text" :value="dataprop['established']" placeholder="Established"></div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div class="field-label is-normal"></div>
			<div class="field-body">
				<div class="field control"><button class="button is-primary" >{{ buttonName }} </button></div>
			</div>
		</div>	
		

	</form>

</template>	


<script>

export default {
	props: ['dataprop','sports'],
	data : function() {
		return {
			isUpdate :  this.dataprop
		}
	},
	computed : {
		urlValue: function() {
			if(this.isUpdate) return '/teams/' + this.dataprop["id"] ;
			else return '/teams';
		},
		buttonName: function() {
			if(this.isUpdate) return 'Save Changes';
			else return 'Create'; 
		},
		showSport: function() {
			if(this.isUpdate) return false;
			else return true; 
		}

	}
}

</script>
