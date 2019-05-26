<template>
    <div> 
        <h1 style="text-align:center; margin-bottom:1em;">Atbalstītāji</h1>
        <form @submit.prevent="addatbalstitaj" class="mb-3" style="margin-left:5em">
            <p>Izveidot jaunu atbalstītāju:</p>
            <div class="form-group" style="width: 36rem; ">
                <input type="text" class="form-control" placeholder="Nosaukums" 
                v-model="atbalstitaj.nosaukums">
            </div>
              <div class="form-group" style="width: 36rem;">
                <input type="text" class="form-control" placeholder="Mājaslapa" 
                v-model="atbalstitaj.majaslapa">
            </div>
              <div class="form-group" style="width: 36rem;">
                <input type="number" class="form-control" placeholder="Numurs" 
                v-model="atbalstitaj.numurs">
            </div>
              <div class="form-group" style="width: 36rem;">
                <input type="text" class="form-control" placeholder="E-pasts" 
                v-model="atbalstitaj.epasts">
              </div>
              <div class="form-group" style="width: 36rem;">
                <input type="text" class="form-control" placeholder="Atbalsta veids" 
                v-model="atbalstitaj.atbalsta_veids">
              </div>
               <!-- <div class="form-group" style="width: 36rem;">
                <input type="number" class="form-control" placeholder="nometnes id" 
                v-model="atbalstitaj.nometne_id">
              </div> -->
            <button type="submit" class="btn btn-outline-success">Saglabāt</button>
        </form>

        <div class="card card-body mb-2" v-for="atbalstitaj in atbalstitajs" v-bind:key="atbalstitaj.id" >
            <h3> {{atbalstitaj.nosaukums}} </h3>
            <p> {{atbalstitaj.majaslapa}} </p> 
            <hr>
            <button @click="deleteatbalstitaj(atbalstitaj.id)" class="btn btn-danger mb-2" >Delete</button>
            <button @click="editatbalstitaj(atbalstitaj)" class="btn btn-warning mb-2" >Edit</button>
            <button @click="openatbalstitaj(atbalstitaj.id)" class="btn btn-success" >Open</button>
        </div>
    </div>
</template> 

<script>
import { type } from 'os';
    export default {
        data() {
            return {
                atbalstitajs: [],
                atbalstitaj: {
                    id: '',
                    nosaukums: '',
                    majaslapa: ''    
                },  
                pagination: {}, 
                edit: false
            }
        },

        created() {
            this.fetchatbalstitajs();
        }, 

        methods: {
            fetchatbalstitajs() {
                fetch('api/atbalstitaji')
                .then( res => res.json())
                .then( res => {
                    this.atbalstitajs = res.data;
                })
            }, 

            deleteatbalstitaj(id) {
                if(confirm('Vai tiesam dzest?')) {
                    console.log(id);
                    fetch('api/atbalstitaj/'+id, { 
                        method: 'delete'
                    }) 
                    .then ( res => res.json())
                    .then (data => {
                        alert('atbalstitaj dzesta');
                        this.fetchatbalstitajs();
                    })
                    .catch(err => console.log(err))
                }
            },

            openatbalstitaj(id) {
                window.location.href = "api/atbalstitaj/"+id;
            },

            addatbalstitaj() {
            if(this.edit === false){
                //add
                fetch('api/atbalstitaj',{
                    method: 'POST',
                    body: JSON.stringify(this.atbalstitaj),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.atbalstitaj.nosaukums= '';
                    this.atbalstitaj.majaslapa= '';
                    this.atbalstitaj.numurs='';
                    this.atbalstitaj.epasts= '';
                    this.atbalstitaj.rekviziti= '';
                    this.atbalstitaj.atbalsta_veids='';
                    this.atbalstitaj.nometne_id='';
                    alert('atbalstitajs pievienots');
                    this.fetchatbalstitajs();
                })
                .catch(err => console.log(err));
            }
            else {
                //update
                 fetch('api/atbalstitaj',{
                    method: 'put',
                    body: JSON.stringify(this.atbalstitaj),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.atbalstitaj.nosaukums= '';
                    this.atbalstitaj.majaslapa= '';
                    this.atbalstitaj.numurs='';
                    this.atbalstitaj.epasts= '';
                    this.atbalstitaj.rekviziti= '';
                    this.atbalstitaj.atbalsta_veids='';
                    this.atbalstitaj.nometne_id='';
                    alert('atbalstitajs atjaunots');
                    this.fetchatbalstitajs();
                })
                .catch(err => console.log(err));
            }
            },

            editatbalstitaj(atbalstitaj) {
                this.edit = true;
                this.atbalstitaj.id = atbalstitaj.id;
                this.atbalstitaj.nosaukums = atbalstitaj.nosaukums;
                this.atbalstitaj.majaslapa = atbalstitaj.majaslapa;
                this.atbalstitaj.numurs = atbalstitaj.numurs;
                this.atbalstitaj.epasts = atbalstitaj.epasts;
                this.atbalstitaj.rekviziti = atbalstitaj.rekviziti;
                this.atbalstitaj.atbalsta_veids = atbalstitaj.atbalsta_veids;
                this.atbalstitaj.nometne_id = atbalstitaj.nometne_id;
                console.log(atbalstitaj.id);
            }

        }
    }
</script>
