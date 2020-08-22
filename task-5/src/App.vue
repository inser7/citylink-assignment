<template>
  <div id="app">
    <div class="jumbotron text-center">
      <h1>Олимпиада</h1>
    </div>

    <div class="container">

        <Olympiad />


    </div>

  </div>
</template>

<script>
import Olympiad from './components/Olympiad.vue'

export default {
  name: 'App',
  components: {
    Olympiad
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
