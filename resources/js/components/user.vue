<template>
  <div>
    <h1 style="text-align:center; margin-bottom:1em;">Lietotāji</h1>
    <form @submit.prevent="addUser" class="mb-3" style="margin-left: 2em;">
    <p>Izveidot jaunu lietotāju:</p>
      <div class="form-group" style="width: 25rem;">
        <input type="text" class="form-control" placeholder="Vārds" v-model="user.name">
      </div>
      <div class="form-group" style="width: 25rem;">
        <input type="email" class="form-control" placeholder="E-pasts" v-model="user.email">
      </div>
      <div class="password" style="width: 25rem;"> 
        <input type="password" class="form-control" placeholder="Parole" v-model="user.password">
      </div>

      <button type="submit" class="btn btn-outline-success" style="width: 5rem; margin-top:1rem;">Saglabāt</button>
    </form>
    <div class="card card-body mb-2" v-for="user in users" v-bind:key="user.id">
      <h3>{{user.name}}</h3>
      <p>{{user.email}}</p>
      <hr>
      <button @click="openUser(user.id)" class="btn btn-success" >Skatīt</button>
      <button @click="deleteUser(user.id)" class="btn btn-danger">Dzēst</button>
      <button @click="editUser(user)" class="btn btn-warning mb-2" >Rediģēt</button>
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

    deleteUser(id) {
      if (confirm('Vai tiesam dzest?')) {
        console.log(id);
        fetch('api/user/' + id, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Lietotājs dzēsts');
            this.fetchUsers();
          })
          .catch(err => console.log(err));
      }
    },

    openUser(id) {
                window.location.href = 'api/user/'+id;
            },

    addUser() {
      if (this.edit === false) {
        //add
        fetch('api/user', {
          method: 'POST',
          body: JSON.stringify(this.user),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.user.name = '';
            this.user.email = '';
            this.user.password = '';
            alert('Lietotājs pievienots');
            this.fetchUsers();
          })
          .catch(err => console.log(err));
      } else {
        //update
        fetch('api/user',{
                    method: 'put',
                    body: JSON.stringify(this.user),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.user.name= '';
                    this.user.email= '';
                    this.user.password='';
                    alert('Lietotajs atjaunota');
                    this.fetchUsers();
                })
                .catch(err => console.log(err));
            }
    },
      editUser(user) {
                this.edit = true;
                this.user.id = user.id;
                this.user.name = user.name;
                this.user.email = user.email;
                this.user.password = user.password;
                console.log(user.id);
            }
    
  }
};
</script>