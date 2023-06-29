<script lang="ts">
import Footer from "../src/components/Footer.vue";
import Boton from '../src/components/Boton.vue'


export default {
  components: { Footer, Boton }

}
</script>
<template>
  <body>

    <nav>
      <div class="logo">
        <img src="../src/assets/logo_libro.svg" alt="logo">
        <h2>App Prestamos de Libros</h2>
      </div>
    <div>
      <router-link to="/">Inicio</router-link>
      <router-link to="/about">acerca de</router-link>
      <router-link to="/socios">Socios</router-link>
    </div>
    </nav>
 
    <section> <router-view></router-view>
      
    </section>
    <Footer></Footer>
  </body>
</template>


<style scoped>
* {
  padding: 0px;
  margin: 0px;
  box-sizing: content-box;

}
.logo{
  padding: 10px;
  display: flex;
  align-items: center;
}
.logo img{
  padding: 25px;
  width: 50px;
  height: 50px;
}

body {}

nav {
  top: 0;
  display: flex;
  align-items: center;
  align-content: space-between;
  justify-content: space-between;
  height: 10%;
  background: #079d46;
  color: aliceblue;
}

nav a {
  padding: 20px;
  text-transform: uppercase;
  color: antiquewhite;
}
nav a:hover {
  padding: 20px;
  text-transform: uppercase;
  color: rgb(158, 211, 0);
}
section{
  height: 85%;
  padding: 25px;
}
</style>