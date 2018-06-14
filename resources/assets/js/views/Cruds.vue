<template>
    <div class="page">
        <div class="heading">
            <h1>Cruds</h1>
        </div>
        <transition-group name="list-complete" tag="p">
          <CrudComponent
                  v-for="crud in cruds"
                  v-bind="crud"
                  :key="crud.id"
                  @update="update"
                  @delete="del"
                  class="list-complete-item"
          ></CrudComponent>
        </transition-group>
        <div>
            <button @click="create()">Add</button>
        </div>
    </div>
</template>

<script>
  function Crud({ id, color, name}) {
    this.id = id;
    this.color = color;
    this.name = name;
  }
  import CrudComponent from '../components/Crud.vue';
  export default {
    data() {
      return {
        cruds: [],
        working: false,
      }
    },
    methods: {
      create() {
        this.mute = true;
        window.axios.get('/api/cruds/create').then(({ data }) => {
          this.cruds.push(new Crud(data));
          this.mute = false;
        });
      },
      read() {
        this.mute = true;
        window.axios.get('/api/cruds').then(({ data }) => {
          data.forEach(crud => {
            this.cruds.push(new Crud(crud));
          });
          this.mute = false;
        });
      },
      update(id, color) {
        this.mute = true;
        window.axios.put(`/api/cruds/${id}`, { color }).then(() => {
          this.cruds.find(crud => crud.id === id).color = color;
          this.mute = false;
        });
      },
      del(id) {
        this.mute = true;
        window.axios.delete(`/api/cruds/${id}`).then(() => {
          let index = this.cruds.findIndex(crud => crud.id === id);
          this.cruds.splice(index, 1);
          this.mute = false;
        });
      }
    },
    watch: {
      mute(val) {
        document.getElementById('mute').className = val ? "on" : "";
      }
    },
    components: {
      CrudComponent
    },
    created() {
      this.read();
      console.log('The id is: ' + this.$route.params.userId);
    }
  }
</script>
<style>
    #app {
        margin-left: 1em;
    }
    .heading h1 {
        margin-bottom: 0;
    }
    .list-complete-item {
      transition: all 1s;
      display: inline-block;
      margin-right: 10px;
    }
    .list-complete-enter, .list-complete-leave-to
    /* .list-complete-leave-active below version 2.1.8 */ {
      opacity: 0;
      transform: translateY(30px);
    }
    .list-complete-leave-active {
      position: absolute;
    }
</style>
