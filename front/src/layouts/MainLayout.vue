<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen=!leftDrawerOpen"
        />

        <q-toolbar-title>
          Logeo de usuario
        </q-toolbar-title>

        <div>
          <q-btn label="Salir" color="red" icon="logout" dense no-caps
          @click="logout"
          />
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <q-list>
        <q-item-label
          header
        >
          Essential Links
        </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'

const linksList = [
  {
    title: 'login',
    caption: 'iniciar sesion',
    icon: 'group',
    link: '/login'
  },
  {
    title: 'datos',
    caption: 'datos',
    icon: 'token',
    link: '/token'
  },

]
import {useCounterStore} from 'stores/example-store'

export default defineComponent({
  name: 'MainLayout',

  components: {
    EssentialLink
  },
  data(){
    return {
      leftDrawerOpen: false,
      essentialLinks: linksList,
      token: localStorage.getItem('token'),
      store: useCounterStore(),
    }
  },
  methods:{
    logout(){
      console.log(this.store.token)

      this.$axios.post('http://localhost:8000/api/logout', null ,
        { headers: {"Authorization" : `Bearer ${this.store.token}`} }
      )
      .then(res=>{
        console.log(res.data);
        this.store.isLogin=false;
        this.$router.push('/login');
        localStorage.removeItem('token')
      })
    }
  }

/*  setup () {
    const leftDrawerOpen = ref(false)

    return {
      essentialLinks: linksList,
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      },
      logout () {

      }
    }
  }*/
})
</script>
