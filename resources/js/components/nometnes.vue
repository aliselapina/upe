<template>
    <div class="content"> 
        <h1 style="text-align:center; margin-bottom:1em;">Nometnes</h1>


        <form @submit.prevent="addNometne" class="mb-3" style="margin-left:5em">
            <p>Izveidot jaunu nometni:</p>
            <div class="form-group" style="width: 36rem;">
                <input type="text" class="form-control" placeholder="Nosaukums" 
                v-model="nometne.nosaukums">
            </div>
              <div class="form-group" style="width: 18rem; display:inline-block;">
                  <p>Sākuma datums:</p>
                <input type="date" class="form-control" placeholder="Sākuma datums" 
                v-model="nometne.sakums">
            </div>
              <div class="form-group" style="width: 18rem; display:inline-block;">
                  <p>Beigu datums:</p>
                <input type="date" class="form-control" placeholder="Beigu datums" 
                v-model="nometne.beigas">
            </div>
              <div class="form-group" style="width: 10rem; ">
                <input type="number" class="form-control" placeholder="Dalībnieku skaits" 
                v-model="nometne.dalib_sk">
            </div>
              <div class="form-group" style="width: 36rem;">
                <input type="text" class="form-control" placeholder="Vieta" 
                v-model="nometne.vieta">
            </div>
            <div class="form-group" style="width: 36rem;">
                <textarea type="text" class="form-control" placeholder="Apraksts" 
                v-model="nometne.apraksts"> </textarea>

            </div>
            <button type="submit" class="btn btn-outline-success" style="width: 5rem; ">Saglabāt</button>
        </form>

        <div class="card card-body mb-2" style="width: 22rem;" v-for="nometne in nometnes" v-bind:key="nometne.id" >
            <h3> {{nometne.nosaukums}} </h3>
            <p> {{nometne.apraksts}} </p> 
            <hr>
            <div class="btn-group" role="group" aria-label="Basic example">
            <button @click="openNometne(nometne.id)" class="btn btn-success" >Skatīt</button>
            <button @click="apply(nometne)" class="btn btn-primary" >Pieteikties</button>
            <button @click="editNometne(nometne)" class="btn btn-warning " >Rediģēt</button>
            <button @click="deleteNometne(nometne.id)" class="btn btn-danger" >Dzēst</button>
            </div>
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

            deleteNometne(id) {
                if(confirm('Vai tiesam dzest?')) {
                    console.log(id);
                    fetch('api/nometne/'+id, { 
                        method: 'delete'
                    }) 
                    .then ( res => res.json())
                    .then (data => {
                        alert('Nometne dzesta');
                        this.fetchNometnes();
                    })
                    .catch(err => console.log(err))
                }
            },

            openNometne(id) {
                window.location.href = '/nometne/'+id;
            },

            addNometne() {
            if(this.edit === false){
                //add
                fetch('api/nometne',{
                    method: 'POST',
                    body: JSON.stringify(this.nometne),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.nometne.nosaukums= '';
                    this.nometne.sakums= '';
                    this.nometne.beigas='';
                    this.nometne.vieta= '';
                    this.nometne.dalib_sk= '';
                    this.nometne.apraksts='';
                    alert('Nometne pievienota');
                    this.fetchNometnes();
                })
                .catch(err => console.log(err));
            }
            else {
                //update
                 fetch('api/nometne',{
                    method: 'PUT',
                    body: JSON.stringify(this.nometne),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                
                .then(res => res.json())
                .then(data => {
                    this.nometne.nosaukums= '';
                    this.nometne.sakums= '';
                    this.nometne.beigas='';
                    this.nometne.vieta= '';
                    this.nometne.dalib_sk= '';
                    this.nometne.apraksts='';
                    alert('Nometne atjaunota');
                    this.fetchNometnes();
                })
                .catch(err => console.log(err));
            }
            },

            editNometne(nometne) {
                this.edit = true;
                this.nometne.id = nometne.id;
                this.nometne.nometne_id = nometne.nometne_id;
                this.nometne.nosaukums = nometne.nosaukums;
                this.nometne.sakums = nometne.sakums.substr(0, 10);
                this.nometne.beigas = nometne.beigas.substr(0, 10);
                this.nometne.vieta = nometne.vieta;
                this.nometne.dalib_sk = nometne.dalib_sk;
                this.nometne.apraksts = nometne.apraksts;

                console.log(nometne.id);
            },


            aplly(nometne) {
                
            }

        }
    }
</script>

<style>
    .card {
        display: inline-block;
        margin: 1em;
    };

</style>

