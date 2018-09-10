<template>
	<form method="POST" :action="urlvalue" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
	
		<slot name="csrf-field"></slot>
		<slot name="method-field"></slot>
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Name</label></div>
			<div class="field-body">
			<div class="field control">
				<input class="input" name="name" type="text" :value="nameValue" placeholder="Name">
				<span class="help is-danger" v-text="errors.get('name')"></span>
			</div>
			</div>
		</div>	
	
		<div  class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Sport</label></div>
			<div class="field-body">
				<div class="field control">
	    			<span class="select">
		          	<select name="sport_id">
					<option :value="sportId">{{ sportValue }}</option>
					  <option v-for="sport in sports" :value="sport.id" >{{ sport.name }}</option>
				</select>
				</span>
				<span class="help is-danger" v-text="errors.get('sport_id')"></span>
			</div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Slogan</label></div>
			<div class="field-body">
			<div class="field control">
				<input class="input" name="slogan" type="text" :value="sloganValue" placeholder="Slogan">
				<span class="help is-danger" v-text="errors.get('slogan')"></span>
			</div>
			</div>
		</div>	
	
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Website</label></div>
			<div class="field-body">
			<div class="field control">
				<input class="input" name="website" type="text" :value="websiteValue" placeholder="Website e.g. http://example.com">
				<span class="help is-danger" v-text="errors.get('website')"></span>
			</div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Sponsor</label></div>
			<div class="field-body">
			<div class="field control">
				<input class="input" name="sponsor" type="text" :value="sponsorValue" placeholder="Sponsor">
				<span class="help is-danger" v-text="errors.get('sponsor')"></span>
			</div>
			</div>
		</div>	

		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Location</label></div>
			<div class="field-body">
			<div class="field control">
				<textarea class="textarea" name="location" type="text" :value="locationValue" placeholder="Location"></textarea>
				<span class="help is-danger" v-text="errors.get('location')"></span>
			</div>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div v-if=isUpdate class="field-label is-normal"><label class="label">Established</label></div>
			<div class="field-body">
			<div class="field control">
				<input class="input" name="established" type="text" :value="establishedValue" placeholder="Established e.g. 1983"></div>
				<span class="help is-danger" v-text="errors.get('established')"></span>
			</div>
		</div>	
		
		<div class="field is-horizontal">
			<div class="field-label is-normal"></div>
			<div class="field-body">
				<div class="field control"><button class="button is-primary">{{ buttonName }} </button></div>
			</div>
		</div>	
		

	</form>

</template>	


<script>

export default {
	props: ['dataprop','sports','url','old'],
	data : function() {
		return {
			isUpdate :  this.dataprop,
			err: [],
			errors: new Errors()
		}
	},
	methods: {
		onSubmit() {
		axios.post('/teams',
	       			{
			   	 	name: this.nameValue,
			   	 	sport_id: this.sportId,
			   	 	website: this.websiteValue,
			   	 	sponsor: this.sponsorValue,
			   	 	location: this.locationValue,
			   	 	established: this.establishedValue,
			        	slogan: this.sloganValue
				  })
				.then(function (response) {console.log(response);})
//				.catch(function (error) {console.log(error);});
				.catch(error => this.errors.record(error.response.data));
		}
	},
	mounted() {
//		axios.get('/test').then(response => this.err = response.data);


		
	},
	computed : {
		urlvalue: function() {
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
		},
		nameValue: function() {
			if(this.isUpdate) return this.dataprop['name'];
			else return this.old['name']; 
		},
		sportValue: function() {
			if(this.isUpdate)
			{
				return this.sports[this.dataprop['sport_id'] - 1]['name'];
			}
			else
			{
				if(this.old['sport_id'])
				return this.sports[this.old['sport_id'] - 1]['name'];
			        else
				return 'Select A Sport'	
			}
		},
		sportId: function() {
			if(this.isUpdate)
			{
				return this.dataprop['sport_id'];
			}
			else
			{
				if(this.old['sport_id'])
				return this.old['sport_id'];
			        else
				return ''	
			}
		},
		sloganValue: function() {
			if(this.isUpdate) return this.dataprop['slogan'];
			else return this.old['slogan']; 
		},
		sponsorValue: function() {
			if(this.isUpdate) return this.dataprop['sponsor'];
			else return this.old['sponsor']; 
		},
		websiteValue: function() {
			if(this.isUpdate) return this.dataprop['website'];
			else return this.old['website']; 
		},
		establishedValue: function() {
			if(this.isUpdate) return this.dataprop['established'];
			else return this.old['established']; 
		},
		locationValue: function() {
			if(this.isUpdate) return this.dataprop['location'];
			else return this.old['location']; 
		}

	}
}

class Errors {

	constructor() {
		this.errors = {};
	}

	get(field){
		if(this.errors[field])
		{
			return this.errors[field][0];
		}
	}

	record(errors){
		this.errors = errors;
	}

	clear(field){
		delete this.errors[field];
	}

}

</script>
