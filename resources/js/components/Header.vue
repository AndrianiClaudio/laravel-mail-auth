<template>
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">

               <li class="nav-item">
                  <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
               </li>

               <li class="nav-item" >
                  <router-link class="nav-link" :to="{ name: 'about' }">About me</router-link>
               </li>

               <li class="nav-item" >
                  <router-link class="nav-link" :to="{ name: 'contact' }">Contatti</router-link>
               </li>
             </ul>
             <ul v-if="!logged" class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/register">Register</a>
               </li>
             </ul>
             <ul v-else class="navbar-nav ms-auto">
                <li class="nav-item">
                   <a href="/logout" class="nav-link" >logout</a>

                  <a class="nav-link" href="/logout"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="/logout" method="POST" class="d-none">
                  </form>
                </li>
             </ul>
          </div>
      </div>
  </nav>
</template>

<script>
export default {
  name: 'Header',
  data () {
     return {
        logged: false,
     }
  },
  created() {
   // check user is log
   axios.get('/api/checkAuth')
   .then(res=> {
      this.logged = res.data.data;
      console.log(this.logged );
   });
  }
}
</script>

<style>

</style>