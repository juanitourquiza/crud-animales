import VueRouter from "vue-router";
import Vue from "vue";

Vue.use(VueRouter);

import Home from "./components/Home.vue";
import Animales from "./components/Animales.vue";
import AnimalesInfo from "./components/AnimalesInfo.vue";
import AnimalesBorrar from "./components/AnimalesBorrar.vue";
import AnimalesAgregar from "./components/AnimalesAgregar.vue";
import AnimalesEditar from "./components/AnimalesEditar.vue";
import Error404 from "./components/Error404.vue";

const rutas = [
  {
    path: "/",
    component: Home
  },
  {
    path: "/animales",
    component: Animales
  },
  {
    path: "/animal/:id",
    component: AnimalesInfo
  },
  {
    path: "/animalborrar/:id",
    component: AnimalesBorrar
  },
  {
    path: "/animalagregar",
    component: AnimalesAgregar
  },
  {
    path: "/animaleditar/:id",
    component: AnimalesEditar
  },
  {
    path: "/users",
    redirect: "/animales"
  },
  {
    path: "*",
    component: Error404
  }
];

export default new VueRouter({
  routes: rutas,
  mode: "history"
});
