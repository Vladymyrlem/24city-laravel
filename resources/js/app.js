import './bootstrap';

import {createApp} from 'vue';
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
