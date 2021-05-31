<template>
<div>
  <div>
    <form class="d-flex" @submit.prevent="Search()">
          <input v-model="search"
            class="form-control me-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button id="search" class="btn btn-outline-success" type="submit">Search</button>
        </form>
  </div>
  <div class="cont">
  <div class="row row-cols-1 row-cols-md-2 g-4 p-5">
    <div v-for="(row, indexR) in rows" :key="indexR" class="col">
      <div id="card" class="card">
        <img :src="getPicture(row.kep)" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">{{row.nev}}</h5>
          <p class="card-text">            
            {{row.fajtaNev}}
          </p>
          <router-link :to="`/MacskaAdat/${row.macskaId}`" class="btn btn-primary" v-if="loginAccessLevel > 0" id="but">Adatok</router-link>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</template>

<script>
const axios = require("axios").default;

export default {
  name: "MacskakT",
  data() {
    return {
      queryGet: "macskakT",
      title: null,
      columns: [],
      rows: [],
      resData: null,
      search: "",
      querySearch: "fajtakereses"
    };
  },
  created() {
    this.getRows();
  },
  computed: {
    loginAccessLevel() {
      return this.$root.$data.loginAccessLevel;
    },
  },
  methods: {
    getRows() {
      //ajax kérés (get)
      axios
        .get(this.url, {
          params: {
            query: this.queryGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.rows = this.resData.rows;
          console.log("Title:", this.title);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    Search(){
      axios
        .get(this.url, {
          params: {
            query: this.querySearch,
            search: this.search, 
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.rows = this.resData.rows;
          console.log("Title:", this.title);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getPicture(kep) {
      return kep ? require("@/assets/kep/" + kep) : "";
    },
  },
};
</script>

<style>
  #but{
    background-color: darkorange;
    border: darkred;
  }
  h5{
    color:darkblue;
  }
  
  #card{
    border: 1px solid darkorange;
    box-shadow: 5px 10px gray;
     
  }
  #search{
    background-color: mediumaquamarine;
  }
  .cont {
  max-width: 800px;
  margin: auto auto;

}
.my-card-body {
  padding: 15px;
}
.div col {
  margin: auto auto;
}
</style>