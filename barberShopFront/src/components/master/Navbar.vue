<template>
    <div id="navbar">
        <div id="head-line"></div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                 <router-link class="navbar-brand logo" to="/">BARBER SHOP</router-link>
                 <p> <a class="badge badge-success" href="https://wa.me/5511954357267" target="_blank"> <i class="fa fa-whatsapp"></i> (11) 95435-7267 </a></p>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <router-link v-if="logged" class="nav-link" to='/cliente'>Clientes</router-link>
                        </li>

                        <li class="nav-item">
                            <router-link v-if="logged" class="nav-link" to='/servico'>Agenda de Serviços</router-link>
                        </li>

                        <li class="nav-item">
                            <router-link v-if="logged" class="nav-link" to='/relatorio'>Relatórios</router-link>
                        </li>

                        <li class="nav-item">
                            <a v-if="logged" id="white" class="nav-link btn btn-outline-dark" @click="logout">Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="foot-line"></div>
    </div>
</template>


<script>

export default {
    data () {
        return {
            logged: false
        }
    },
    methods: {
        logout () {
            localStorage.removeItem('employee_id');
            localStorage.removeItem('employee_id');
            localStorage.removeItem('employee_id');
            window.location.href = "/";
        }
    },
    created () {
        if (localStorage.getItem('employee_id') == null) { 
            this.logged = false;
        } else {
            this.logged = true;
        }
    }

}

</script>
<style scoped>
    #white:hover {
        color: #ffff;
    }

    #navbar {
        max-width: 1200px;
        box-sizing: border-box;
        margin: auto;
    }

    img {
        width: 130px;
        height: auto;
    }

    nav {
        padding: 10px;
    }

    #foot-line {
        height: 5px;;
        background-color: #000000;
    }

    .nav-item {
        padding-right: 10px;
        padding-left: 10px;
    }
    
    p {
        font-size: 1em;
        margin: auto;
    }

</style>
