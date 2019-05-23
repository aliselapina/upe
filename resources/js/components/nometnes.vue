<template>
    <div> 
        <h1>Nometnes</h1>
        <form @submit.prevent="addNometne" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nosaukums" 
                v-model="nometne.nosaukums">
            </div>
              <div class="form-group">
                <input type="date" class="form-control" placeholder="Sākuma datums" 
                v-model="nometne.sakums">
            </div>
              <div class="form-group">
                <input type="date" class="form-control" placeholder="Beigu datums" 
                v-model="nometne.beigas">
            </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Vieta" 
                v-model="nometne.vieta">
            </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Dalībnieku skaits" 
                v-model="nometne.dalib_sk">
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" placeholder="Apraksts" 
                v-model="nometne.apraksts"> </textarea>

            </div>
            <button type="submit" class="btn btn-outline-success">saglabat</button>
        </form>

        <div class="card card-body mb-2" v-for="nometne in nometnes" v-bind:key="nometne.id" >
            <h3> {{nometne.nosaukums}} </h3>
            <p> {{nometne.apraksts}} </p> 
            <hr>
            <button @click="deleteNometne(nometne.id)" class="btn btn-danger mb-2" >Delete</button>
            <button @click="editNometne(nometne)" class="btn btn-warning mb-2" >Edit</button>
            <button @click="openNometne(nometne.id)" class="btn btn-success" >Open</button>
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
                window.location.href = "api/nometne/"+id;
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
                    method: 'put',
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
                this.nometne.nosaukums = nometne.nosaukums;
                this.nometne.sakums = nometne.sakums.substr(0, 10);
                this.nometne.beigas = nometne.beigas.substr(0, 10);
                this.nometne.vieta = nometne.vieta;
                this.nometne.dalib_sk = nometne.dalib_sk;
                this.nometne.apraksts = nometne.apraksts;

                console.log(nometne.id);
            }

        }
    }
</script>
