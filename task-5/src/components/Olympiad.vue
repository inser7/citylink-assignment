<template>
  <div class="justify-content-center">
    <div class="form-group row">
      <label for="participants" class="col-sm-2 col-form-label">Участники</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="participants" placeholder="введите имена участников через запятую">
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary mb-2">Добавить</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Olympiad',
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
