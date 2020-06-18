<template>
    <div class="table">
        <h4><strong>Profissional :</strong>  {{employee_name}}</h4>
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
         <span class="count"><strong> #</strong> {{ tmpItems.length}}</span>
        <br>
        <hr>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Data</th>
                    <th>Contato</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in tmpItems" :key="item.id">
                    <td>{{ item.client }}</td>
                    <td>{{ item.service }}</td>
                    <td>{{ item.date }}</td>
                    <td class="icon">
                         <a :href="'https://wa.me/'+ item.client.phone" target="_blank"><img src="/img/whatsapp.svg" alt="whatsapp icone"></a>
                    </td>
                </tr>
            </tbody>
        </table>
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
            items: [],
            tmpItems: [],
            fields: ['Cliente', 'Serviço', 'Data', 'Contato'],
            startDate: new Date('2018-01-01'),
            endDate: new Date(),
            employee_name: localStorage.getItem('employee_name'),
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
                    client: service.client.name,
                    service: service.service_type,
                    date: service.scheduled_date,
                    contact: service.client.phone
                    
                    
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

    .icon {
        align-self: stretch;
    }

     .count {
        float: right;
        justify-self: right;
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
        max-width: 1000px;
        width: 95%;
        margin: 20px auto;
    }
</style>