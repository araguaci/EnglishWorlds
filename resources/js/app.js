/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('comments-component', require('./components/CommentsComponent.vue'));
new Vue({
	el: '#app',
});

$(document).ready(function() {
	$('.ui.dropdown').dropdown();
	$('.ui.search.dropdown').dropdown({maxSelections: 5});
	$('#post-status-form').form({
		on: 'blur',
		fields: {
			body: {
				identifier: 'body',
				rules: [
					{
						type: 'empty',
						prompt: 'Can\'t post an empty status'
					}
				]
			},
			tags: {
				identifier: 'tags',
				rules: [
					{
						type: 'empty',
						prompt: 'You must pick at least 1 tag'
					},
					{
						type: 'minCount[1]',
						prompt: 'You must pick at least 1 tag'
					},
					{
						type: 'maxCount[5]',
						prompt: 'You can only choose up to 5 tags'
					}
				]
			}
		}
	});
});
