<template>
  <div id="app">
    <navbar/>
    <router-view />
    <Footer/>
  </div>
</template>

<script>
import Navbar from './components/master/Navbar.vue'
import Footer from './components/master/Footer'

export default {
  name: 'app',
  components: {
    Navbar,
    Footer,
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');


#app {
  max-width: 1200px;
  box-sizing: border-box;
  margin: 0 auto;
  background-color: #fafafa;
  font-family: 'Roboto', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
