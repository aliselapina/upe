<template>
    <div> 
        <h1 style="text-align:center; margin-bottom:1em;">Atbalstītāji</h1>

        <div class="card card-body mb-2" v-for="atbalstitaj in atbalstitajs" v-bind:key="atbalstitaj.id" >
            <h3> {{atbalstitaj.nosaukums}} </h3>
            <p> {{atbalstitaj.majaslapa}} </p> 
            <hr>
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
            }
        }
    }

</script>