import Vue from 'vue';

const App = require('../../resources/js/components/SelectedPosts');
new Vue({
    el: '#related-posts',
    render: (h) => h(App),
});
