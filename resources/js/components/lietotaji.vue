<template>
  <div>
    <h1>Lietotaji</h1>

    <form @submit.prevent="addLietotajs" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Vards" v-model="lietotaj.name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="E-pasts" v-model="lietotaj.email">
      </div>

      <button type="submit" class="btn btn-outline-success">saglabat</button>
    </form>
    <div class="card card-body mb-2" v-for="lietotaj in lietotajs" v-bind:key="lietotaj.id">
      <h3>{{lietotaj.name}}</h3>
      <p>{{lietotaj.email}}</p>
      <hr>
      <button @click="deleteLietotajs(lietotaj.id)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>
<script>
import { type } from "os";
export default {
  data() {
    return {
      lietotajs: [],
      lietotaj: {
        id: "",
        name: "",
        email: ""
      },
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchLietotaji();
  },

  methods: {
    fetchLietotaji() {
      fetch("api/users")
        .then(res => res.json())
        .then(res => {
          this.lietotajs = res.data;
        });
    },

    deleteLietotajs(id) {
      if (confirm("Vai tiesam dzest?")) {
        console.log(id);
        fetch("api/users/" + id, {
          method: "delete"
        })
          .then(res => res.json())
          .then(data => {
            alert("Lietotajs dzests");
            this.fetchLietotaji();
          })
          .catch(err => console.log(err));
      }
    },

    addLietotajs() {
      if (this.edit === false) {
        //add
        fetch("api/users", {
          method: "POST",
          body: JSON.stringify(this.lietotaj),
          headers: {
            "content-type": "application/json"
          }
        })
          .then(res => res.json())
          .then(data => {
            this.lietotaj.name = "";
            this.lietotaj.email = "";
            alert("lietotajs pievienota");
            this.fetchLietotaji();
          })
          .catch(err => console.log(err));
      } else {
        //update
      }
    }
  }
};
</script>