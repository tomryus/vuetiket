import Vue from 'vue'
import VueRouter from 'vue-router'
import CategoryComponent from '../components/Category/CategoryComponent.vue'
import CreateCategoryComponent from '../components/Category/CreateCategoryComponent.vue'
import EditCategoryComponent from '../components/Category/EditCategoryComponent.vue'
import HomeComponent from '../components/HomeComponent.vue'
import TiketComponent from '../components/tiket/TiketComponent.vue'
import CreateTiketComponent from '../components/tiket/CreateTiketComponent.vue'
import EditTiketComponent from '../components/tiket/EditTiketComponent.vue'
import TransactionComponent from '../components/Transaction/TransactionComponent.vue'


const routes =[
    {name :'home',              path:'/home',                   component: HomeComponent},
    {name : 'category',         path:'/category',               component: CategoryComponent},
    {name : 'createcategory',   path:'/category/create',        component: CreateCategoryComponent},
    {name : 'editcategory',     path : '/category/edit:id',     component: EditCategoryComponent},

    {name: 'tiket',             path : '/tiket',                component: TiketComponent},
    {name: 'createtiket',       path : '/tiket/create',         component: CreateTiketComponent},
    {name : 'edittiket',        path : '/tiket/edit:id',        component: EditTiketComponent},

    {name : 'transaction',      path : '/transaction',          component: TransactionComponent}

    
    ]
Vue.use(VueRouter)

const router = new VueRouter({
    routes,//mengarah ke conts routes
    hasbang:false,
    mode:'history',
})
export default router