<template>
  <v-container grid-list-lg>
    <v-layout wrap>
      <v-flex xs12>
        <v-btn to="/animales" color="primary">Listado</v-btn>
      </v-flex>
      <v-flex xs12 sm12>
        <panel titulo="Información General">
          <div v-if="!submitted">
            <div>
              <v-text-field
                label="Nombre"
                placeholder="Ingrese su nombre"
                id="name"
                required
                v-model="item.name"
                name="name"
              ></v-text-field>
            </div>
            <div class="mt-2">
              <v-text-field
                label="Tipo"
                placeholder="Ingrese el tipo de Animal"
                id="lastname"
                required
                v-model="item.tipo"
                name="tipo"
              ></v-text-field>
            </div>
            <div class="mt-2">
              <v-text-field
                label="Edad"
                placeholder="Ingrese su edad"
                id="email"
                required
                v-model="item.edad"
                name="edad"
              ></v-text-field>
            </div>
            <div class="mt-2">
              <v-text-field
                label="Registro"
                placeholder="Ingrese su registro"
                id="register"
                required
                v-model="item.register"
                name="register"
              ></v-text-field>
            </div>
            <v-btn @click="agregarAnimal" color="brown">Crear</v-btn>
          </div>

          <div v-else>
            <h4>Animal Creado!</h4>
          </div>
        </panel>
      </v-flex>
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
  name: "agregar-animales",
  data() {
    return {
      item: {
        id: null,
        name: "",
        edad: "",
        tipo: "",
        register: ""
      },
      submitted: false
    };
  },
  methods: {
    agregarAnimal() {
      var data = {
        name: this.item.name,
        tipo: this.item.tipo,
        edad: this.item.edad,
        register: this.item.register
      };
      let json = JSON.stringify(data);
      let params = "json=" + json;
      let headers = new Headers({
        "Content-Type": "application/x-www-form-urlencoded"
      });
      axios
        .post("http://127.0.0.1:8001/apis/animales", params, {
          header: headers
        })
        .then(response => {
          this.item.id = response.data.id;
          console.log(response.data);
        })
        .catch(error => {
          console.log(error);
        });
      this.submitted = true;
    },

    newAnimal() {
      this.submitted = false;
      this.item = {};
    }
  }
};
</script>

<style>
.submit-form {
  max-width: 300px;
  margin: auto;
}
</style>
