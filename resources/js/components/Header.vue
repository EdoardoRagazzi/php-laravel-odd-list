<template >
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Boolpress</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Navbar dinamica con ciclo v-for and array costruito sullo script con data() return  -->
      <ul class="navbar-nav">
        <li class="nav-item" v-for="(link,index) in menuBoolpress" :key="index">
          <router-link :to="{name : link.routeName}" class="nav-link">{{link.label}}</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
</template>
<script>


export default {
    name: 'Header',
    data(){
      return{
        menuBoolpress: [
          {
            label: 'Home',
            routeName: 'home'
          },
          {
            label: 'About',
            routeName: 'about'
          },
          {
            label: 'Contact',
            routeName: 'contact'
          },
          {
            label:'Post',
            routeName:'post'
          }
  
        ]
      }
    }
     
}
</script>

<style lang="scss" scoped>

</style>
