<template>
  <nav class="navbar navbar-light bg-white shadow-sm p-0">
      <div class="container">          
         <!-- <ul class="navbar-nav flex-row mr-auto"> -->
         <ul class="navbar-nav flex-row mx-auto">

         <li class="nav-item p-2">
            <router-link class="nav-link" :to="{ name: 'home' }">Home</router-link>
         </li>

         <li class="nav-item p-2" >
            <router-link class="nav-link" :to="{ name: 'projects' }">Projects</router-link>
         </li>

         <li class="nav-item p-2" >
            <router-link class="nav-link" :to="{ name: 'about' }">About me</router-link>
         </li>

         <li class="nav-item p-2" >
            <router-link class="nav-link" :to="{ name: 'contact' }">Contatti</router-link>
         </li>

         <li class="nav-item p-2" >
            <router-link class="nav-link" :to="{ name: 'cv' }">CV</router-link>
         </li>
         </ul>
         <!-- <ul class="navbar-nav flex-row ms-auto">
         <li class="nav-item p-2">
            <a class="nav-link" href="/login">Login</a>
         </li>
         <li class="nav-item p-2">
            <a class="nav-link" href="/register">Register</a>
         </li>
         </ul> -->
      </div>
  </nav>
</template>

<script>
export default {
  name: 'Header',
}

</script>

<style>

</style>