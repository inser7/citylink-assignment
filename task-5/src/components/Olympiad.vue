<template>
  <div class="justify-content-center">
    <div class="form-group row">
      <label for="participants" class="col-sm-2 col-form-label">Участники</label>
      <div class="col-sm-8">
        <input v-model="newParticipants" type="text" class="form-control" id="participants"
               placeholder="введите имена участников через запятую">
      </div>
      <div class="col-sm-2">
        <button class="btn btn-primary mb-2" v-on:click="AddNewRows()">Добавить</button>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <thead>
          <tr>
            <th @click="sort('id')">
              <span class="fa fa-chevron-down"
                    v-if="((currentSort === 'id') && (currentSortDir === 'asc'))"></span>
              <span class="fa fa-chevron-up"
                    v-if="((currentSort === 'date') && (currentSortDir === 'desc'))"></span>
              Id
            </th>
            <th @click="sort('name')">
              <span class="fa fa-chevron-down"
                    v-if="((currentSort === 'name') && (currentSortDir === 'asc'))"></span>
              <span class="fa fa-chevron-up"
                    v-if="((currentSort === 'name') && (currentSortDir === 'desc'))"></span>
              Имя</th>
            <th @click="sort('score')">
              <span class="fa fa-chevron-down"
                    v-if="((currentSort === 'score') && (currentSortDir === 'asc'))"></span>
              <span class="fa fa-chevron-up"
                    v-if="((currentSort === 'score') && (currentSortDir === 'desc'))"></span>
              Очки</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(participant, index) in sortedParticipants" v-bind:key="index">
            <td>{{ participant.id }}</td>
            <td>{{ participant.name }}</td>
            <td>{{ participant.score }}</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  name: 'Olympiad',

  data: function () {
    return {
      participants: [],

      currentSort: 'id',
      currentSortDir: 'asc',
      newParticipants: '',
    }
  },

  computed: {
    sortedParticipants: function () {
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      return this.participants.sort( ( a, b ) => {
        let modifier = 1;
        if ( this.currentSortDir === 'desc' ) modifier = -1;
        if ( a[ this.currentSort ] < b[ this.currentSort ] ) return -1 * modifier;
        if ( a[ this.currentSort ] > b[ this.currentSort ] ) return 1 * modifier;
        return 0;
      } );
    }
  },

  methods: {
    AddNewRows: function () { // Добавить новую строку в таблицу
      let self = this;
      let nameArr = self.newParticipants.split( ',' );
      // // eslint-disable-next-line no-debugger
      // debugger
      nameArr.forEach( function ( element, index ) {
        self.participants.push( { id: index, name: element, score: Math.ceil( Math.random() * 100 ) } );
      } );
      self.newParticipants = null;
    },


    sort: function ( s ) {
      //if s == current sort, reverse
      if ( s === this.currentSort ) {
        this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
      }
      this.currentSort = s;
    },

  }
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

td, th {
  padding: 5px;
}

th {
  cursor: pointer;
}
</style>
