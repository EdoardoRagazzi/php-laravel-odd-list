

import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Importazione componenti pagine Vue.Router
import Home from './pages/Home';


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
        // {
        //     path:'/hello',
        //     name:'hello',
        //     component: Hello,
        // },
    ]
});

export default router;