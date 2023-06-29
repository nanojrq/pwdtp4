<template>
  <h1>listado de Socios</h1>

  <RouterLink class="crear" to="socios/crear"><img src="../../assets/editar.svg" alt="">Crear Socio</RouterLink>


  <select v-model=activo name="is_activo" id="activo">
    <option value='activo'>Activos</option>
    <option value='inactivo'>Inactivos</option>
    <option value='todos'>Todos</option>

  </select>
  
  <table>
    <thead>
      <tr>
        <td>id</td>
        <td> nombre</td>
        <td>fecha alta</td>
        <td> direccion</td>
        <td> telefono</td>
        <td> acciones</td>
      </tr>
    </thead>
    <tbody>

      <tr v-for="socio in items" :key="socio">

        <template v-if=" activo  === 'activo'">
          <template v-if='socio.activo === 1'>
            <td>{{ socio.id }}</td>
            <td>{{ socio.nombre_apellido }}</td>
            <td>{{ socio.fecha_alta }}</td>
            <td>{{ socio.direccion }}</td>
            <td>{{ socio.telefono }}</td>
      <tr>

        <td>
          <router-link :to="{ name: 'ActualizarSocio', params: { id: socio.id } }">
            <Boton texto="editar" v-bind:class="{ primary: true }"></Boton>
          </router-link>
        </td>
        <td>
          <Boton texto="eliminar" v-bind:class="{ warning: true }" @click="borrar(socio.id)"></Boton>
        </td>
        <td>
          <Boton texto="abrir" v-bind:class="{ alert: true }"></Boton>
        </td>
      </tr>
      </template>
      </template>
      <template v-if=" activo  === 'inactivo'">
          <template v-if='socio.activo === 0'>
            <td>{{ socio.id }}</td>
            <td>{{ socio.nombre_apellido }}</td>
            <td>{{ socio.fecha_alta }}</td>
            <td>{{ socio.direccion }}</td>
            <td>{{ socio.telefono }}</td>
      <tr>

        <td>
          <router-link :to="{ name: 'ActualizarSocio', params: { id: socio.id } }">
            <Boton texto="editar" v-bind:class="{ primary: true }"></Boton>
          </router-link>
        </td>
        <td>
          <Boton texto="eliminar" v-bind:class="{ warning: true }" @click="borrar(socio.id)"></Boton>
        </td>
        <td>
          <Boton texto="abrir" v-bind:class="{ alert: true }"></Boton>
        </td>
      </tr>
      </template>
      </template>
      <template v-if=" activo  === 'todos'">
   
            <td>{{ socio.id }}</td>
            <td>{{ socio.nombre_apellido }}</td>
            <td>{{ socio.fecha_alta }}</td>
            <td>{{ socio.direccion }}</td>
            <td>{{ socio.telefono }}</td>
      <tr class="acciones">

        <td >
          <router-link :to="{ name: 'ActualizarSocio', params: { id: socio.id } }">
            <Boton texto="editar" v-bind:class="{ primary: true }"></Boton>
          </router-link>
        </td>
        <td>
          <Boton texto="eliminar" v-bind:class="{ warning: true }" @click="borrar(socio.id)"></Boton>
        </td>
        <td>
          <Boton texto="abrir" v-bind:class="{ alert: true }"></Boton>
        </td>
      </tr>
      </template>
   
      </tr>

    </tbody>
  </table>
</template>

<script lang="ts">
import axios from 'axios';
import Boton from '../Boton.vue';
export default {
  components: { Boton },
  data() {
    return {
      items: [],
      activo: 'activo'

    };
  },
  computed: {

  },
  created() {
    this.listarSocios();
  },
  methods: {
    
    buscarSocio(Items){
      Items.find()

    },
    async listarSocios() {
      const res = await axios.get("http://192.168.20.10/apiv1/socios");
      this.items = res.data;
      console.log(res.data);
    },
    borrar(id) {
      axios.delete('http://192.168.20.10/apiv1/socios/' + id)
        .then((response) => {
          console.log(response)
          if (response.data === null) { alert("socio eliminado") }
          this.listarSocios();
        })
        .catch((error) => { alert('el socio no puede eliminarse porque tiene registro de prestamos') });

    }
  }

}
</script>
<style scoped>
table {
  background: #fff;
  border-radius: 10px;
  inset: 10px 50px 10px;
  box-shadow: 5px 5px 50px rgb(4, 96, 96, 0.2);
  width: 100%;
  color: black;
  margin: 20px;
  padding: 15px;
}

thead {
  text-align: center;
  text-transform: uppercase;
  font-size: 1.6;
  color: rgb(4, 96, 96);
  background: #ccc;

}

td,
tr {
  text-align: center;
}

.crear {
  background: #272ef6;
  padding: 10px 20px;
  color: #fff
}

.crear img {
  margin-right: 10px;
}
select{
  margin:10px;
  padding: 10px;
  font-size:1em
}
tr .acciones{
  text-aling:center;
  background:#ccc;
}
</style>