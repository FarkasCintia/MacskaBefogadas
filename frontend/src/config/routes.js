//1. routes komponensek impotrtálása
import Home from "../components/routes/Home.vue";
import Login from "../components/routes/Login.vue";
import MacskakT from "../components/routes/MacskaCard.vue";
import MacskaAdat from "../components/routes/MacskaAdat.vue";
import MacskaFeltoltes from "../components/routes/MacskaFeltoltes.vue";
import Fajtakhozzaadas from "../components/routes/Fajtakhozzaadas.vue";
import Oltasokhozzaadas from "../components/routes/Oltasokhozzaadas.vue";
import Macskaoltasaihozzaadas from "../components/routes/Macskaoltasaihozzaadas.vue";


//2. route - komponens hozzárendelés
const routes =[
    {
        name: "home",
        path: "/",
        component: Home,
        meta: { requiresAuth: false }
     },
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: { requiresAuth: false }
     },
     {
         name: "MacskakT",
         path: "/macskak",
         component: MacskakT,
         meta: { requiresAuth: false }
     },
     {
         name: "MacskaAdat",
         path: "/macskaAdat/:macskaId",
         component: MacskaAdat,
         meta: { requiresAuth: true }
     },
     {
         name: "Macskak",
         path: "/MacskaFeltoltes/",
         component: MacskaFeltoltes,
         meta: { requiresAuth: true }
     },
     {
         name: "Fajtak",
         path: "/fajtakhozzaadas/",
         component: Fajtakhozzaadas,
         meta: { requiresAuth: true }
     },
     {
         name: "Oltasok",
         path: "/oltasokhozzaadas/",
         component: Oltasokhozzaadas,
         meta: { requiresAuth: true }
     },
     {
         name: "Macskaoltasai",
         path: "/macskaOltasaihozzaadas/",
         component: Macskaoltasaihozzaadas,
         meta: { requiresAuth: true }
     }
    

];


//3 hogy lássuk kívülről
export default routes;