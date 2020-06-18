<template>
    <div id="footer">
        <div class="division"></div>        
        <p>{{ date.getFullYear() }} Todos os direitos reservados</p>
        <br><br><br>
    </div>
    
</template>

<script>
export default {
    data () {
        return {
            date: new Date()
        }  
    }, 
}
</script>

<style scoped>
    #footer {  
        background-color: #ffffff;
        width: 100%;
        margin-top: 20px;       
    }
    .division {
        height: 5px;;
        background-color: #000000;
    }

    p {
        font-size: 12px;
        margin: 20px 20px 0 20px;
    }

    img {
        width: 100px;
        margin: 5px;
    }
</style>