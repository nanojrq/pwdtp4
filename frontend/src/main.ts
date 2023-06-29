import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import Router from './router/routes.ts'
import axios from 'axios'
import VueAxios from 'vue-axios'

const app = createApp(App)
app.use(VueAxios, axios)
app.use(Router)


app.mount('#app')