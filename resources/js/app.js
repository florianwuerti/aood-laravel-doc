require('./bootstrap');
require('./manage');


window.Vue = require('vue');
import Buefy from 'buefy';

Vue.use(Buefy);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

var app = new Vue({
    el: '#app',
    props: {
        permissions: permissions,
        rolesSelected: rolesSelected
    },
    data: {
        auto_password: true,
        password_options: 'keep',
        permissionType: 'basic',
        resource: '',
        crudSelected: ['create', 'read', 'update', 'delete'],
        rolesSelected: rolesSelected
    },
    methods: {
        crudName: function (item) {
            return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
        },
        crudSlug: function (item) {
            return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function (item) {
            return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
        }
    }


});