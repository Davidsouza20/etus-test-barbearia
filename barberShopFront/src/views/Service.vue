<template>
    <div id="client">
       <h3>Cadastrar Serviço</h3>

       <div class="client-form">
           <form action="" v-on:change="checkForm">
               
                <div class="form-group">
                    <select id="inputState" class="form-control" v-model="clientId">
                        <option selected>Nome do Cliente...</option>
                        <option v-for="client in clients" :key="client.id" :value="client.id">
                            {{ client.id }} {{ client.name }}
                        </option>
                    </select>
                </div>

               

                <div class="form-group">
                     <datepicker bootstrap-styling v-model="date" v-on:change="checkForm"></datepicker> 
                </div>
                
                <div class="form-group">
                    <b-form-timepicker 
                        v-model="time" 
                        locale="pt"
                        placeholder="Escolha a hora..."
                        v-on:change="checkForm"
                    ></b-form-timepicker>
                </div>


               <div class="form-group">
                    <input type="text" class="form-control" name="service-type" placeholder="Tipo do Serviço" v-model="serviceType" v-on:keyup="checkForm">
                </div>

                <div v-if="errors['client-id'] == true" class="alert alert-danger" role="alert">
                    <span>Selecione o nome do cliente<br></span>
                </div> 

                <div v-if="errors['time'] == true" class="alert alert-danger" role="alert">
                    <span>Selecione a hora do agendamento<br></span>
                </div> 

                <div v-if="errors['service-type'] == true" class="alert alert-danger" role="alert">
                    <span>Selecione o tipo de Serviço<br></span>
                </div>          

                <button @click="addService" class="btn btn-dark">Cadastrar</button>
           </form>
       </div>    

       <sweetalert-icon v-if="response" icon="success" />
    </div>
</template>


<script>
import api from '../services/api'
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'

export default {
    components: {
        Datepicker,
    },

    data() {
        return {
            clients: [],
            clientId: 'Nome do Cliente...',
            serviceType: '',
            errors: [],
            date: new Date(),
            time: '',
            response: ''
        }
    },

    methods: {
        checkForm() {     
            this.errors['client-id'] = !this.clientId || this.clientId == 'Nome do Cliente...' ? true : false;
            this.errors['time'] = !this.time ? true : false; 
            this.errors['service-type'] = !this.serviceType ? true : false;    
        },
            
        async addService(e) {
            e.preventDefault();
            const service = {
                employee_id: 10, //this.employeeId,
                client_id: this.clientId,
                scheduled_date: moment(this.date).format('YYYY-MM-DD'),
                scheduled_hour: this.time,
                service_type: this.serviceType
            }

            if(this.errors['client-id'] == false && this.errors['time'] == false && this.errors['service-type'] == false) {
                await api.post('service', service)
                .then(res => this.response = res.data)
                .catch(err => console.log(err));  

                if(this.response.service) {
                    this.response = true;
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000)
                }
            

                
            }
       }
    }, 
    
    async created() {
        await api.get('client')
        .then(res => this.clients = res.data)
        .catch(err => console.log(err));  
    }
}
</script>


<style scoped>
    *{
        margin-top: 25px;
        font-family: 'Roboto300', sans-serif;
    }

    .client-list {
        color: #000000;
        padding: 0;
        margin: 0;
        text-align: left;
        justify-content: left;
    }
   
    .client-form {
        margin: 20px auto;
        max-width: 500px;
        width: 95%;
        height: 400;
        padding: 10px;
        font-family: cursive;
        border-radius: 15px;
        cursor: pointer;

    }

</style>