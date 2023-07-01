<script lang="ts">
import axios from 'axios'
import Boton from '../Boton.vue'

export default {
  components: { Boton },
    data() {
        return {
            Socio:
            {
                id:"",
                nombre_apellido: "",
                direccion: "",
                telefono: "",
                fecha_alta: new Date().toISOString().substring(0,10),
                activo:1,
            }

        }
    },
    created(){
       this.buscar()
    },
    methods: {
        async ActualizarSocio(Socio ){
            console.log(Socio);
                      const res = await axios.put('http://127.0.0.1:8000/apiv1/socios/'+this.$route.params.id, Socio)
                        
            
        },
        async buscar(){
            const res = await axios.get('http://127.0.0.1:8000/apiv1/socios/'+this.$route.params.id);
            this.Socio = res.data;
            console.log(this.Socio)
        }
       
    }
}


</script>
<template>
    <h2>Actualizar Socio</h2>
   
    <input v-model=Socio.nombre_apellido type="text" label='nombre y apellido' placeholder="apellido y nombre">
    <input v-model=Socio.telefono type="text" label='Telefono' placeholder="telefono">
    <input v-model=Socio.direccion type="text" label='direccion' placeholder="Direccion">
   
    <router-link :to='{name:"Socios"}'><boton class="alert"  texto="Volver"></boton></router-link>
    <boton class="primary" @click="ActualizarSocio(Socio)" texto="Actualizar"></boton>
</template>

<style scope>
input{
    width: 50%;
    font-size: 1.2em;
    display: flex;
    align-content: center;
    padding: 10px;
    margin: 15px;
}

</style>