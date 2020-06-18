<template>
    <div class="table">
        <h4><strong>Profissional:</strong>  {{employee_name}}</h4>
        <hr>
        <div class="form-group flex">
            <div>
               Inicio
               <datepicker name='iniio' bootstrap-styling v-model="startDate"></datepicker> 
            </div>
            <div>
                Fim
                <datepicker name='fim' bootstrap-styling v-model="endDate"></datepicker> 
            </div>

            <button @click="filter" class="btn btn-success ">Filtrar</button>    
        </div>
         <hr>
        <h3>Relatório de Serviços</h3>
        <b-table striped hover :items="tmpItems" :fields="fields"></b-table>
    </div>
    

</template>
<script>
import api from '../services/api'
import moment from 'moment'
import Datepicker from 'vuejs-datepicker'

export default {
    components: {
        Datepicker
    },
    
    data() {
        return {
            services: [],
            fields: ['Cliente', 'Serviço', 'Data'],
            items: [],
            startDate: new Date(),
            endDate: new Date(),
            tmpItems: [],
            employee_name: localStorage.getItem('employee_name')
        }
    },
    
    methods: {
        filter() {
            const filteredItems = this.items.filter(item => {
                let date = new Date(item.Data);
                return (date >= this.startDate && date <= this.endDate);
            });
            this.tmpItems = filteredItems;
        },
          
    },

    async created() {
        await api.get('service')
        .then(res => this.services = res.data)
        .catch(err => console.log(err)); 

        

        this.services.map((service) => {
            if (service.employee_id == localStorage.getItem('employee_id')) {
                this.items.push({
                    'Cliente': service.client.name,
                    'Serviço': service.service_type,
                    'Data': service.scheduled_date
                })
            }    
        });

        this.tmpItems = this.items;   
        
    },

}
</script>
<style scoped>
    *{
        margin-top: 25px;
        font-family: 'Roboto300', sans-serif;
    }

    button {
        height: 45px;
        align-self: flex-end;
    }

    .flex {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: wrap;
        margin: 40px auto;

    }

    .table {
        max-width: 900px;
        width: 95%;
        margin: 20px auto;
    }
</style>