
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('tabs', require('./components/Tabs.vue'));
Vue.component('tab', require('./components/TabsDetails.vue'));


Vue.component('psd', require('./components/ParticipantSportDetails.vue'));
Vue.component('teameditform', require('./components/TeamEditForm.vue'));
Vue.component('errors', require('./components/FormServerErrors.vue'));
Vue.component('createtour', require('./components/TourCreateForm.vue'));
Vue.component('addevent', require('./components/AddEvent.vue'));
Vue.component('addparticipanttoevent', require('./components/AddParticipantToEvent.vue'));

/*
 import example from './components/Example.vue' ;
 import modal from './components/Modal.vue' ;
 import teameditform from './components/TeamEditForm.vue' ;
 import errors from './components/FormServerErrors.vue' ;
*/


const app = new Vue({
    el: '#app',
    data : { 
   		showModal : false,
		dataObj : Object
    },
    /*
    props: ['dataprop','sports', 'errors','url','old'],
    components : { example , modal , teameditform , errors }
*/   
});



