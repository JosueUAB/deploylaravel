<template>
  <q-page class="q-pa-lg">
    <h6>Ingresar</h6>
    <q-input label="email" v-model="email"/>
    <q-input label="password" v-model="password" type="password"/>
    <q-btn @click="login" label="ingresar"
    color="primary" class="full-width q-mt-md"
    :loading="loading"
    />
  </q-page>
</template>

<script>
import {useCounterStore} from 'stores/example-store'
export default {
  name: 'LoginPage',
  data (){
    return {
      loading: false,
      email:'admin@test.com',
      password:'123',
      store: useCounterStore(),
    }
  },
  methods:{
    login(){
      this.loading=true
      this.$axios.post('http://localhost:8000/api/login',{
        email: this.email,
        password: this.password
      }).then(res=>{
        this.loading= false
        if(res.data.res){
          console.log(res.data);
          this.store.isLogin=true;
          this.$router.push('/');
          this.store.token=res.data.token;
          console.log(this.store.token);
          localStorage.setItem('token',res.data.token)
        }
      })
    }
  }
}
</script>
