import Vue from 'vue';
import VueRouter from 'vue-router'

// Importazione componenti pagine Vue.Router
import Home from './pages/Home';
import About from './pages/About';
import Contact from './pages/Contact';
import Post from './pages/Post';
import SinglePost from './pages/SinglePost'

Vue.use( VueRouter )

const router = new VueRouter({
    // specificare il tipo di scaffolding e struttura
    mode:'history',
    // array di oggetti ---- Name = Nome delle rotte ----- Component = Componente di una pagina /le quali per distinguerle dalle altre andranno dentro una cartella pages
    routes:[
        {
            path:'/',
            name:'home',
            component: Home
        },
        {
            path:'/about',
            name:'about',
            component: About
        },
        {
            path:'/contact',
            name:'contact',
            component: Contact
        }, 
        {
            path:'/post',
            name:'post',
            component: Post
        }, 
        {
            path:'/post/:slug',
            name: 'post-detail',
            component: SinglePost
        }
      
    ]
});

export default router;