<template>
  <div>
    <h1>Users</h1>

    <form @submit.prevent="addUser" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Vards" v-model="user.name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="E-pasts" v-model="user.email">
      </div>

      <button type="submit" class="btn btn-outline-success">saglabat</button>
    </form>
    <div class="card card-body mb-2" v-for="user in users" v-bind:key="user.id">
      <h3>{{user.name}}</h3>
      <p>{{user.email}}</p>
      <hr>
      <button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>
<script>
import { type } from "os";
export default {
  data() {
    return {
      users: [],
      user: {
        id: "",
        name: "",
        email: ""
      },
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchUsers();
  },

  methods: {
    fetchUsers() {
      fetch("api/users")
        .then(res => res.json())
        .then(res => {
          this.users = res.data;
        });
    },

    deleteUser(id) {
      if (confirm("Vai tiesam dzest?")) {
        console.log(id);
        fetch("api/users/" + id, {
          method: "delete"
        })
          .then(res => res.json())
          .then(data => {
            alert("User dzests");
            this.fetchUsers();
          })
          .catch(err => console.log(err));
      }
    },

    addUser() {
      if (this.edit === false) {
        //add
        fetch("api/users", {
          method: "POST",
          body: JSON.stringify(this.user),
          headers: {
            "content-type": "application/json"
          }
        })
          .then(res => res.json())
          .then(data => {
            this.user.name = "";
            this.user.email = "";
            alert("User pievienota");
            this.fetchUsers();
          })
          .catch(err => console.log(err));
      } else {
        //update
      }
    }
  }
};
</script>