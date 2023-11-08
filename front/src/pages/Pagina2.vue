<template>
  <q-page>
    <h2>datos leidos con axios</h2>
    <h6>{{ token }}</h6>
    <pre>{{ productos }}</pre>
  </q-page>
</template>

<script>

export default {
  name: 'PaginaPage2',
  data(){
    return {
      token: localStorage.getItem('token'),
      productos: []
    }
  },
  mounted(){
    this.productosGet();
  },
  methods:{
    productosGet(){
      this.$axios.get('http://localhost:8000/api/productos',
        { headers: {"Authorization" : `Bearer ${this.token}`} }
      )
      .then(res=>{
        console.log(res.data);
        this.productos = res.data
      })
    }
  }
}
</script>
