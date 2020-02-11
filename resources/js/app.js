
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./input_functions');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});


/**
 * to add active class to sidebar buttons
 * @author Fahad Bakhsh
 * @returns null
 */

var sidbarItems = document.querySelectorAll('.sidebar-item');
sidbarItems.forEach(item => {
    item.addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        if (!current[0]) {
            this.className += " active";
        }
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
});

/**
 * to add active class to sidebar buttons
 * @author Fahad Bakhsh
 * @returns null
 */

var sidbarGrubs = document.querySelectorAll('.sidebar-group');
var sidbartitles = document.querySelectorAll('.sidebar-title');

sidbartitles.forEach(title => {
    title.addEventListener("click", function () {
        sidebarGroup = title.parentElement.parentElement;
        iconUp = sidebarGroup.querySelector('.fa-caret-up');
        iconDown = sidebarGroup.querySelector('.fa-caret-down');

        items = sidebarGroup.querySelectorAll('.sidebar-item');
        items.forEach(item => {
            if (item.classList.contains('d-none')) {
                item.classList.remove('d-none');
                iconUp.classList.remove('d-none');
                iconDown.classList.add('d-none');
            } else {
                item.classList.add('d-none');
                iconDown.classList.remove('d-none');
                iconUp.classList.add('d-none');
            }
        });

    });
});





