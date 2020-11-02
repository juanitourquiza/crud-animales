<template>
  <v-container grid-list-lg>
    <v-layout wrap v-for="item in animal" :key="item.id">
      <v-flex xs12>
        <v-btn to="/animales" color="primary">Listado</v-btn>
        <v-btn :to="`/animalborrar/${item.id}`" color="green" dark>Borrar</v-btn>
        <v-btn :to="`/animaleditar/${item.id}`" color="brown" dark>Editar</v-btn>
      </v-flex>

      <v-flex xs12 sm12>
        <panel titulo="Información General">
          <div>
            <span class="title">Nombre:</span>
            <span class="subheading">{{ item.name }}</span>
          </div>
          <div class="mt-2">
            <span class="title">Tipo:</span>
            <span class="subheading">{{ item.tipo }}</span>
          </div>
          <div class="mt-2">
            <span class="title">Edad:</span>
            <span class="subheading">{{ item.edad }}</span>
          </div>
          <div class="mt-2">
            <span class="title">Registro:</span>
            <span class="subheading">{{ item.register }}</span>
          </div>
        </panel>
      </v-flex>
      <v-btn to="/animalagregar" color="primary">Nuevo</v-btn>
      <v-flex xs12>
        <router-view />
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import axios from "axios";
import Panel from "./Panel.vue";
export default {
  components: {
    Panel
  },
  data() {
    return {
      animal: {}
    };
  },
  beforeMount() {
    var id = this.$route.params.id;
    axios
      .get(`http://127.0.0.1:8001/apis/animales/${id}`)
      .then(response => {
        this.animal = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
};
</script>

<style></style>
