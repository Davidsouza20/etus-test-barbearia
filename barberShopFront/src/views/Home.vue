<template>
    <div class="flex">
        <div class="box">
            <router-link tag="li" to="/login" class="link">
                <img src="/img/professional.png" alt="Profissional">
                <br>
                <h3>Profissional</h3> 
             </router-link>
        </div>
       
         <div class="box">
            <router-link tag="li" to="/login" class="link">
                <img src="/img/gestor.png" alt="Gestor">
                <br>
                <h3>Gestor</h3> 
             </router-link>
        </div>
    </div>


</template>
<script>


export default {
    components: {

    }
}
</script>

<style scoped>
    .link {
        text-decoration: none;
        list-style: none;
    }
  
    .box {
        margin: 25px;
        border: 1px solid;
        border-radius: 20px;
        width: 250px;
        height: 250px;
        cursor:pointer;
    }

    .flex {
        margin: 150px auto;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        align-items: center;
    }

    img {
        width: 180px;
        height: 180px;
        padding: 25px;
    }
</style>