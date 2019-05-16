<template>
    <div> 
        <h1>Nometnes</h1>
        <form @submit.prevent="addNometne" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nosaukums" 
                v-model="nometne.nosaukums">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="ID" 
                v-model="nometne.id">
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
                <textarea type="text" class="form-control" placeholder="Apraksts" 
                v-model="nometne.apraksts"> </textarea>

            </div>
            <button type="submit" class="btn btn-outline-success">saglabat</button>
        </form>

        <div class="card card-body mb-2" v-for="nometne in nometnes" v-bind:key="nometne.id" >
            <h3> {{nometne.nosaukums}} </h3>
            <p> {{nometne.apraksts}} </p> 
            <hr>
            <button @click="deleteNometne(nometne.id)" class="btn btn-danger" >Delete</button>
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
                    this.nometne.brigas='';
                    this.nometne.vieta= '';
                    this.nometne.apraksts='';
                    this.nometne.id= '';
                    alert('Nometne pievienota');
                    this.fetchNometnes();
                })
                .catch(err => console.log(err));
            }
            else {
                //update
            }
            }

        }
    }
</script>
