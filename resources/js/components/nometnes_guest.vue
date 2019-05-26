<template>
    <div class="content"> 
        <h1 style="text-align:center; margin-bottom:1em;">Nometnes</h1>

        <a href="/kontakti" style="margin-left:2em;">Vēlos pieteikties nometnei!</a>

        <br>

         <div class="card card-body mb-2" style="width: 18rem;" v-for="nometne in nometnes" v-bind:key="nometne.id" >
            <h3> {{nometne.nosaukums}} </h3>
            <p> {{nometne.apraksts}} </p> 
            <hr>
        </div>
    </div>
</template> 

<script>
import { type } from 'os';

    export default {
        data() {
            return {
                nometnes: [],
                nometne: {
                    id: '',
                    nosaukums: '',
                    apraksts: ''    
                },  
                nometne_id: '',
                pagination: {}, 
                edit: false
            }
        },

        created() {
            this.fetchNometnes();
        }, 

        methods: {
            fetchNometnes() {
                fetch('api/nometnes')
                .then( res => res.json())
                .then( res => {
                    this.nometnes = res.data;
                })
            },
        }
    }
    
</script>

