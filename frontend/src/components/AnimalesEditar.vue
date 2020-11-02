<template>
  <v-container grid-list-lg>
    <v-layout wrap >
      <v-flex xs12>
        <v-btn to="/animales" color="primary">Listado</v-btn>
      </v-flex>

      <v-flex xs12 sm12>
        <panel titulo="Editar Información General">
          <div v-if="!submitted">
            <div>
              <v-text-field
                label="Nombre"
                placeholder="Ingrese su nombre"
                id="name"
                v-model="item.name"
                name="name"
              ></v-text-field>
            </div>
            <div class="mt-2">
              <v-text-field
                label="Tipo"
                placeholder="Ingrese el tipo de animal"
                id="tipo"
                v-model="item.tipo"
                name="tipo"
              ></v-text-field>
            </div>
            <div class="mt-2">
              <v-text-field
                label="Edad"
                placeholder="Ingrese su edad"
                id="edad"
                v-model="item.edad"
                name="edad"
              ></v-text-field>
            </div>
            <div class="mt-2">
              <v-text-field
                label="Register"
                placeholder="Ingrese su registro"
                id="register"
                v-model="item.register"
                name="register"
              ></v-text-field>
            </div>
            <v-btn @click="editarAnimal" color="brown">Editar</v-btn>
          </div>

          <div v-else>
            <h4>Animal Editado!</h4>
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
  name: "editar-animal",
  data() {
    return {
      item: {
        name: this.name,
        edad: this.tipo,
        tipo: this.edad,
        register: this.register
      },
    
      submitted: false
    };
  },
  beforeMount() {
    var id = this.$route.params.id;
    axios
      .get(`http://127.0.0.1:8001/apis/animales/${id}`)
      .then(response => {
        this.item.name = response.data[0].name;
        this.item.tipo = response.data[0].tipo;
        this.item.edad = response.data[0].edad;
        this.item.register = response.data[0].register;
      })
      .catch(error => {
        console.log(error);
      });
  },
  methods: {
    editarAnimal() {
      var id = this.$route.params.id;
      var data = {
        name: this.item.name,
        tipo: this.item.tipo,
        edad: this.item.edad,
        register: this.item.register
      };

      console.log(data);
      let json = JSON.stringify(data);
      let params = "json=" + json;
      let headers = new Headers({
        "Content-Type": "application/x-www-form-urlencoded"
      });
      axios
        .put(`http://127.0.0.1:8001/apis/animales/${id}`, params, {
          header: headers
        })
        .then(response => {
          this.item.id = response.data.id;
        })
        .catch(error => {
          console.log(error);
        });
      this.submitted = true;
    },
  }
};
</script>

<style>
.submit-form {
  max-width: 300px;
  margin: auto;
}
</style>
