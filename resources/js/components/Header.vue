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
             <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/register">Register</a>
               </li>
             </ul>
          </div>
      </div>
  </nav>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style>

</style>