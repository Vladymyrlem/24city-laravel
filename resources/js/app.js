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
import Pagination from './components/Pagination'
import Select2 from 'vue3-select2-component'
import SelectCategory from './components/SelectCategory'
import Payments from './components/Payments'
import SelectedNews from './components/SelectedNews'
import Tags from './components/Tags'

const app = createApp({})
app.component('phone-numbers', Phones)
app.mount('#phones')

const email = createApp({})
email.component('emails', Email)
email.mount('#emails')

const address = createApp({})
address.component('address', Address)
address.mount('#address')

const socials = createApp({})
socials.component('social-list', Social)
socials.mount('#social-list')

const connectivity = createApp({})
connectivity.component('connectivity-list', Connectivity)
connectivity.mount('#connectivity-list')

axios.defaults.baseURL = 'http://24city.laravel/api'; // Замініть на адресу вашого API

const selectedPosts = createApp({});
selectedPosts.config.globalProperties.$axios = axios;

selectedPosts.component('related-posts', SelectedPosts);
selectedPosts.mount('#related-posts');

const selectedNews = createApp({})
selectedNews.component('related-news', SelectedNews)
selectedNews.mount('#related-news')

const tags = createApp({})
tags.component('tags', Tags)
tags.mount('#company-tags')

const imageUpload = createApp({})
imageUpload.config.globalProperties.$axios = axios;

imageUpload.component('image-upload', ImageUpload)
imageUpload.mount('#company-thumbnail')

const gallery = createApp({})
gallery.component("vue-multi-image-upload", VueMultiImageUpload)
gallery.mount('#gallery')

const payments = createApp({})
payments.component("payment-methods", Payments)
payments.mount('#payments')
// const pagination = createApp({})
// pagination.component('paging-list', Pagination)
// pagination.mount('#pagination-list')

// import Select2Component
// Create a Vue application
const select2 = createApp({})
// select2.use(Select2)

// Define a new global component called button-counter
select2.component('select2', SelectCategory)
select2.mount('#select2')
