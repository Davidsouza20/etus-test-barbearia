<template>
    <div id="client">
       <h3>Cadastrar Cliente</h3>

       <div class="client-form">
           <form action="">
               <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nome do Cliente" v-model="name" v-on:keyup="checkForm">
                </div>

               <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail do Cliente" v-model="email" v-on:keyup="checkForm">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Telefone do Cliente" v-model="phone" mask="+55 (##) #####-####" v-on:keyup="checkForm">
                </div>
               
                <div v-if="errors['name'] == true" class="alert alert-danger" role="alert">
                    <span>Insira o nome do cliente<br></span>
                </div> 

                <div v-if="errors['email'] == true" class="alert alert-danger" role="alert">
                    <span>Insira um E-mail válido<br></span>
                </div> 


                <div v-if="errors['phone'] == true" class="alert alert-danger" role="alert">
                    <span>Insira um telefone válido<br></span>
                </div> 


                <button @click="addClient" class="btn btn-dark">Cadastrar</button>
           </form>
       </div>
       
    </div>
</template>


<script>
import api from '../services/api'
export default {
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            errors: [],
        }
    },

    methods: {
        checkForm() {     
            this.errors['email'] = !this.email || !this.validEmail(this.email) ? true : false;
            this.errors['name'] = !this.name ? true : false;
            this.errors['phone'] = !this.validPhhone(this.phone) ? true : false;    
        },

        validEmail: (email) => {
            let isValid = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return isValid.test(email);
        },

        validPhhone: (phone) => {
            let isValid = /^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/;
            return isValid.test(phone);
        }, 
            
        async addClient(e) {
            e.preventDefault();
            const client = {
                name: this.name,
                email: this.email,
                phone: this.phone
            }

            if(this.errors['email'] == false && this.errors['name'] == false && this.errors['phone'] == false) {
                await api.post('client', client)
                .then(res => console.log(res.data.msg)) //this.response = res.data)
                .catch(err => console.log(err));  

                
            }
       }
    }   
}
</script>


<style scoped>
    *{
        margin-top: 25px;
        font-family: 'Roboto300', sans-serif;
    }
   
    .client-form {
        margin: 20px auto;
        max-width: 500px;
        width: 95%;
        height: 400;
        color: #ffff;
        padding: 10px;
        font-family: cursive;
        border-radius: 15px;
        cursor: pointer;

    }

</style>