<template>
  <v-container>
    <v-layout justify-center>
      <v-flex xs12>
        <v-card>
           <v-col
            cols="12"
            sm="6"
            md="3"
          >
            <v-text-field
              label="Buscar"
              v-model="searchQuery"
            ></v-text-field>
          </v-col>
        
          <v-toolbar color="green" dark flat>
            <v-toolbar-title>Listado Animales</v-toolbar-title>
          </v-toolbar>
          <v-list>
            <v-list-tile
              :to="`/animal/${animal.id}`"
              v-for="animal in resultQuery"
              :key="animal.id"
            > {{ animal.name }}</v-list-tile>
          </v-list>
        </v-card>
        <v-btn to="/animalagregar" color="primary">Nuevo</v-btn>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      searchQuery: '',
      animales: []
    };
  },
  beforeMount() {
    axios
      .get("http://127.0.0.1:8001/apis/animales")
      .then(response => {
        this.animales = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
  computed: {
        resultQuery() {
            if (this.searchQuery) {
                return this.animales.filter((item) => {
                    return this.searchQuery.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
                })
            } else {
                return this.animales;
            }
        },
    },
};
</script>

<style></style>
