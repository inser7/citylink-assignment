<template>
  <div class="justify-content-center">
    <div class="form-group row">
      <label for="participants" class="col-sm-2 col-form-label">Участники</label>
      <div class="col-sm-8">
        <input v-model="newParticipants" type="text" class="form-control" id="participants"
               placeholder="Введите имена участников через запятую" @keyup.enter="AddNewRows()">
      </div>
      <div class="col-sm-2">
        <button class="btn btn-primary mb-2" v-on:click="AddNewRows()">Добавить</button>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <table class="table table-striped" v-if="participants.length">
          <thead>
          <tr>
            <th @click="sort('id')">
              <i class="fas fa-sort-down"
                    v-if="((currentSort === 'id') && (currentSortDir === 'asc'))"></i>
              <i class="fas fa-sort-up"
                    v-if="((currentSort === 'id') && (currentSortDir === 'desc'))"></i>
              <i class="fas fa-sort"
                 v-if="(currentSort !== 'id')"></i>
              Id
            </th>
            <th @click="sort('name')">
              <i class="fas fa-sort-down"
                 v-if="((currentSort === 'name') && (currentSortDir === 'asc'))"></i>
              <i class="fas fa-sort-up"
                 v-if="((currentSort === 'name') && (currentSortDir === 'desc'))"></i>
              <i class="fas fa-sort"
                 v-if="(currentSort !== 'name')"></i>
              Имя
            </th>
            <th @click="sort('score')">
              <i class="fas fa-sort-down"
                 v-if="((currentSort === 'score') && (currentSortDir === 'asc'))"></i>
              <i class="fas fa-sort-up"
                 v-if="((currentSort === 'score') && (currentSortDir === 'desc'))"></i>
              <i class="fas fa-sort"
                 v-if="(currentSort !== 'score')"></i>
              Очки
            </th>
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


    <modal v-if="showErrorModalFlag" v-on:close="showErrorModalFlag = false">
      <div slot="header">
        <h3>Ошибка</h3>
      </div>
      <span slot="body">
        {{ errorMessage }}
      </span>
    </modal>

  </div>
</template>

<script>
import Modal from './modal.vue'

export default {
  name: 'Olympiad',

  components: {
    Modal
  },

  data: function () {
    return {
      participants: [],

      currentSort: 'id',
      currentSortDir: 'asc',
      newParticipants: '',
      errorMessage: '',
      showErrorModalFlag: false,
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

      if ( self.newParticipants === '' || self.newParticipants === null || self.newParticipants.value === 0 ) {
        self.showErrorModalFlag = true;
        this.errorMessage = 'Поле ввода не может быть пустым';
        return;
      }

      // let regex = /^[а-я]*$/
      let regex = /^[а-яА-Я, ]*$/;
      if ( !regex.test( self.newParticipants ) ) {
        self.showErrorModalFlag = true;
        this.errorMessage = 'Доступны только кириллические буквы и запятая';
        return;
      }

      let nameArr = self.newParticipants.split( ',' );
      // eslint-disable-next-line no-debugger
      nameArr.forEach( function ( element ) {
        self.participants.push( {
          id: self.participants.length + 1,
          name: element,
          score: Math.ceil( Math.random() * 100 )
        } );
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
