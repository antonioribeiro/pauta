
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

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        notesLink: null,
        portalId: null,
    },

    computed: {
        siteLink() {
            const link = new RegExp('.*alerjln1.alerj.rj.gov.br(.*)').exec(this.notesLink);

            if (link && link[1]) {
                return "http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id="+this.portalId+"&url=" +
                    btoa(link[1] + '?OpenDocument&ExpandView')
            }

            return ''
        }
    },

    mounted() {
        new ClipboardJS('.copy');
    }
});


// http://alerjln1.alerj.rj.gov.br/scpro1923.nsf/f4b46b3cdbba990083256cc900746cf6/B8E8D0BD4D58DAE2832583C900613C46

//
// /scpro1923.nsf/f4b46b3cdbba990083256cc900746cf6/B8E8D0BD4D58DAE2832583C900613C46
// http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=144&url=L3NjcHJvMTkyMy5uc2YvZjRiNDZiM2NkYmJhOTkwMDgzMjU2Y2M5MDA3NDZjZjYvQjhFOEQwQkQ0RDU4REFFMjgzMjU4M0M5MDA2MTNDNDY/T3BlbkRvY3VtZW50JkV4cGFuZFZpZXc=



