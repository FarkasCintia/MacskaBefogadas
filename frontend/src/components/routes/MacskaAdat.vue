<template>
<div class="my-table">
  <table>
      <tr>
          <th>Örökbe adó neve:</th>
          <td>{{rows.Onev}}</td>
      </tr>
      <tr>
          <th>Email:</th>
          <td>{{rows.email}}</td>
      </tr>
      <tr>
          <th>Telefonszám:</th>
          <td>{{rows.telefon}}</td>
      </tr>
      <tr>
          <th>ivartalanított:</th>
          <td>{{rows.ivartalanitott}}</td>
      </tr>
      <tr>
          <th>neme:</th>
          <td>{{rows.neme}}</td>
      </tr>
      <tr>
          <th>Születési dátum:</th>
          <td>{{rows.szuletesiDatum}}</td>
      </tr>
      <tr>
          <th>Fajta neve:</th>
          <td>{{rows.fajtaNev}}</td>
      </tr>
      <tr>
          <th>Oltások:</th>
          <td v-for="(cell, index) in row" :key="index">{{cell.oltasNev}}</td>
      </tr>
  </table>
  <br>
  <p id="p" :class="{'d-none':rows.Orogbefogadott == 0}">Ez a macska már örökbe van fogadva</p>
  <button class="btn btn-info text-center" @click="Orokbefogadas()" :class="{'d-none':rows.Orogbefogadott == 1}">Örökbefogadás</button>
  </div>
</template>

<script>
   const axios = require("axios").default;

export default {
  name: "MacskakAdat",
  data() {
    return {
      queryGet: "macskaRekordById",
      queryOltasok: "oltasokRekordById",
      queryOrokbefogadott: "orokbefogadas",
      title: null,
      columns: [],
      rows: [],
      resData: null,
      row: []
    };
  },
  created() {
    this.getRows();
    this.QueryOltasok();
  },
  methods: {
    getRows() {
        let macskaId = this.$route.params.macskaId;
      //ajax kérés (get)
      axios
        .get(this.url, {
          params: {
            query: this.queryGet,
            macskaId: macskaId
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.rows = this.resData.rows[0];
          console.log("Rows:", this.resData);
        })
        .catch((error) => {
          console.log(error);
        });
    },
     QueryOltasok() {
        let macskaId = this.$route.params.macskaId;
      //ajax kérés (get)
      axios
        .get(this.url, {
          params: {
            query: this.queryOltasok,
            macskaId: macskaId
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.row = this.resData.rows;
          console.log("Rows:", this.resData);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    Orokbefogadas(){
        let macskaId = this.$route.params.macskaId;
      //ajax kérés (get)
      axios
        .get(this.url, {
          params: {
            query: this.queryOrokbefogadott,
            macskaId: macskaId
          },
        })
        .then((res) => {
          console.log(res.data);
          if(res.data.status == "Ok"){

              this.rows.Orogbefogadott = 1;
          }else{
              alert("Hiba történt")
          }
        })
        .catch((error) => {
          console.log(error);
        });
    }
  },
};
</script>

<style>
 div table{
     margin: auto auto;
 }
 #p {
     text-align: center;
 }

</style>