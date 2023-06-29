<script lang="ts">

export default {
    props: {
        texto: {
            type: String,
            default: 'enviar'
        }   
        
    },
    data() {
        return {


        }
    }

}

</script>

<template>
    <button class='btn'>{{ texto }}</button>
</template>

<style scoped>
.btn {
    margin: 5px;
    padding: 10px;
}

.btn.primary {
    background: rgb(33, 112, 177);
    color: #fff;
}
.btn img{
    width: 15px;
}

.btn.danger {
    background: rgb(235, 199, 0);
    
    color: black;
}

.btn.warning {
  
    background: rgba(231, 2, 2);
    color: #fff
}

.btn.alert {
    background: rgb(250, 175, 0);
    color: black;
}</style>