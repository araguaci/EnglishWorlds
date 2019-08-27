/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

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
