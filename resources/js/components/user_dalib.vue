<template>
  <div>
    <h1 style="text-align:center; margin-bottom:1em;">Lietotāji</h1>
    <div class="card card-body mb-2" v-for="user in users" v-bind:key="user.id">
      <h3>{{user.name}}</h3>
      <p>{{user.email}}</p>
      <hr>
      
      <button @click="openUser(user.id)" class="btn btn-success" >Skatīt</button>
    </div>
  </div>
</template>

<script>
import { type } from 'os';
export default {
  data() {
    return {
      users: [],
      user: {
        id: '',
        name: '',
        email: '',
        password: ''
      },
      edit: false
    };
  },

  created() {
    this.fetchUsers();
  },

  methods: {
    fetchUsers() {
      fetch('api/users')
        .then(res => res.json())
        .then(res => {
          this.users = res.data;
        });
    },

     openUser(id) {
                window.location.href = 'api/user/'+id;
            },
  }
}
</script> 