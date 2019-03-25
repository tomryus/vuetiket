import Vue from 'vue'
import VueRouter from 'vue-router'
import CategoryComponent from '../components/Category/CategoryComponent.vue'
const routes =[
    {name : 'category', path:'/Category', component: CategoryComponent}

    ]
Vue.use(VueRouter)

const router = new VueRouter({
    routes,//mengarah ke conts routes
    hasbang:false,
    mode:'history',
})
export default router