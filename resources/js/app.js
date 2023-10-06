import './bootstrap';

import {createApp} from 'vue';
import axios from 'axios';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Phones from './components/Phones'
import Email from './components/Email'
import Social from './components/Social'
import Connectivity from './components/Connectivity'
import Address from './components/Address'
import SelectedPosts from './components/SelectedPosts'
import ImageUpload from './components/ImageUpload'
import {VueMultiImageUpload} from '@zakerxa/vue-multiple-image-upload';

const app = createApp({})
app.component('phone-numbers', Phones)
app.mount('#phones')

const email = createApp({})
email.component('emails', Email)
email.mount('#emails')

const address = createApp({})
address.component('emails', Address)
address.mount('#address')

const socials = createApp({})
socials.component('social-list', Social)
socials.mount('#social-list')

const connectivity = createApp({})
connectivity.component('connectivity-list', Connectivity)
connectivity.mount('#connectivity-list')

axios.defaults.baseURL = 'http://24city-laravel/api'; // Замініть на адресу вашого API

const selectedPosts = createApp({});
selectedPosts.config.globalProperties.$axios = axios;

selectedPosts.component('related-posts', SelectedPosts);
selectedPosts.mount('#related-posts');

const imageUpload = createApp({})
imageUpload.config.globalProperties.$axios = axios;

imageUpload.component('image-upload', ImageUpload)
imageUpload.mount('#company-thumbnail')

const gallery = createApp({});
gallery.component("vue-multi-image-upload", VueMultiImageUpload);
gallery.mount('#gallery')


