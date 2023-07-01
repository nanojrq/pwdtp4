<script lang="ts">
import axios from 'axios'

export default {
    data() {
        return {
            Socio:
            {
                id: "",
                nombre_apellido: "",
                direccion: "",
                telefono: "",
                fecha_alta: new Date().toISOString().substring(0, 10),
                activo: 1,
            }

        }
    },
    methods: {
        async crearSocio() {
            let socio =
            {
                id: this.Socio.id,
                nombre_apellido: this.Socio.nombre_apellido,
                direccion: this.Socio.direccion,
                telefono: this.Socio.telefono,
                activo: this.Socio.activo,
                fecha_alta: this.Socio.fecha_alta
            }
          
            console.log(socio)     
            await axios.post('http://127.0.0.1:8000/apiv1/socios/nuevo', socio).
            then((response)=>{
                console.log(response.data)
                this.$router.push('/socios')
            })
            .catch()
    }

}
}


</script>
<template>
    <h2>Crear nuevo Socio</h2>

    <input v-model=Socio.nombre_apellido type="text" label='nombre y apellido' placeholder="apellido y nombre">
    <input v-model=Socio.telefono type="text" label='Telefono' placeholder="telefono">
    <input v-model=Socio.direccion type="text" label='direccion' placeholder="Direccion">

    <button @click="crearSocio()">guardar</button>
    <router-link :to='{name:"Socios"}'><button>Volver</button></router-link>
</template>

<style scope>
input {
    width: 50%;
    font-size: 1.2em;
    display: flex;
    align-content: center;
    padding: 10px;
    margin: 15px;
}
</style>