import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
import Login from '../components/login/Login'
import Signup from '../components/login/Signup'
import CreateCategory from '../components/category/CreateCategory'
import Forum from '../components/forum/Forum'
import Read from '../components/forum/read'
import Create from '../components/forum/create'
import Logout from '../components/login/Logout'

const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/category', component: CreateCategory },
    { path: '/forum', component: Forum, name:'forum' },     
    { path: '/ask', component: Create },
    { path: '/question/:slug', component: Read, name:'read' },     
  ]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`,
    hashbang : false,
    mode : "history"
})

export default router