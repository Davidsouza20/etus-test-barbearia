<template>
    <div id="employee">
       <h3>Login do Gestor</h3>

       <div class="client-form">
           <form action="">
               <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="E-mail do Cliente" v-model="email" v-on:keyup="checkForm">
                </div>

                <div v-if="errors['email'] == true" class="alert alert-danger" role="alert">
                    <span>Email inválido<br></span>
                </div> 

                <button @click="login" class="btn btn-dark">Entrar</button>
           </form>
           <br>
            <span v-if="errorMessage" class="alert alert-danger">{{ errorMessage }}<br></span>
       </div>
       <sweetalert-icon v-if="response == 'success'" icon="success" />   
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
            response: '',
            errorMessage: ''
        }
    },

    methods: {
        checkForm() {     
            this.errors['email'] = !this.email || !this.validEmail(this.email) ? true : false;
        },

        validEmail: (email) => {
            let isValid = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return isValid.test(email);
        },

        async login(e) {
            //reset error message
            this.errorMessage = '';
            e.preventDefault();
        
            if(this.errors['email'] == false) {
                await api.get(`employee/${this.email}`)
                .then(res => this.response = res.data)
                .catch(err => console.log(err));  

                if(this.response == 'Profissional não cadastrado') {
                    this.errorMessage = 'Gestor não cadastrado';       
                } else {
                    localStorage.setItem('employee_id', this.response.id);
                    localStorage.setItem('employee_email', this.response.email);
                    localStorage.setItem('employee_name', this.response.name);
                    localStorage.setItem('employee_manager', true);

                    this.response = 'success';
                    setTimeout(() => {
                    window.location.href = '/relatorio-gestor';
                    }, 500)    
                } 
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

    #employee {
        margin: 200px auto;
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