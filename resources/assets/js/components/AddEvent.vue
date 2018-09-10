
<template>

	<form method="POST" action="/events">

		<slot name="csrf-field"></slot>
		<slot name="method-field"></slot>

		<div class="field">
			<label class="label is-small">{{ dataobj.tour.name }} {{ dataobj.season.year }}</label>
		</div>

<div class="field">
  <div class="control">
    <input class="input" name="event_name" type="text" placeholder="Name of the Event">
    <input type="hidden" name="season_id" :value="dataobj.season.id" >
  </div>
</div>

		<div class="field is-grouped">
	    		<span class="select control">
			<select name="format">
				<option  v-for="format in formats" :value="format.id" >{{ format.name }}</option>
			</select>
			</span>
	    		<span class="select control">
			<select name="level">
				<option  v-for="level in levels" :value="level.id" >{{ level.name }}</option>
			</select>
			</span>
	    		<span class="select control">
			<select name="gender">
				<option value="0" >Only Females</option>
				<option value="1" >Only Males</option>
				<option value="2" >Mixed</option>
			</select>
			</span>
	    		<span class="select control">
			<select name="type">
				<option value="1" >Knock Outs</option>
				<option value="2" >League</option>
				<option value="3" >Group cum Knock-Outs</option>
				<option value="4" >Series</option>
				<option value="5" >Friendly</option>
			</select>
			</span>
		</div>

<div class="control">
  <button class="button is-primary">Add</button>
</div>		

	</form>

</template>	


<script>

export default {
	props: ['dataobj','formats','levels']
}

</script>
