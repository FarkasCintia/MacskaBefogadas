<template>
  <div>
    <h1>{{ title }}</h1>
    <div class="table-responsive">
        <div class="text-center m-2">
            <button
              class="btn btn-outline-dark btn-sm my-ctrl-btn"
              @click="onClickedRefresh()"
            >
              <i class="bi bi-bootstrap-reboot"></i>
            </button>

            <!-- Insert row -->
            <button
              class="btn btn-outline-success btn-sm my-ctrl-btn"
              @click="onClickedInsert()"
            >
              <i class="bi bi-bookmark-plus-fill"></i>
            </button>
            </div>
      <table class="table table-striped my-table-fit">
        <thead class="tabl-dark">
          <th class="text-center">
            <!-- Frissítés -->
            
          </th>

          <!-- Fejléc -->
          <th
            v-for="(column, columnKey, indexH) in columns"
            :key="indexH"
            :class="{
              'my-hide': indexH == 0,
            }"
          >
            {{ column }}
          </th>
        </thead>

        <tbody>
          <!-- Adatsorok -->
          <tr v-for="(row, indexR) in rows" :key="indexR">
            <td class="text-center">
              <!-- update -->
              <button
                class="btn btn-outline-warning btn-sm my-ctrl-btn"
                @click="onClickedUpdate(row)"
              >
                <i class="bi bi-capslock-fill"></i>
              </button>
              <!-- Delete -->
              <button
                class="btn btn-outline-danger btn-sm my-ctrl-btn"
                @click="onClickedDelete(row)"
              >
                <i class="bi bi-bookmark-dash-fill"></i>
              </button>
              <!-- delete -->
            </td>

            <!-- adatcellák (oszlopok) -->
            <td
              v-for="(cell, key, indexD) in row"
              :key="indexD"
              :class="{
                'my-hide': indexD == 0,
              }"
            >{{cell}}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- űrlap -->
    <!-- Button trigger modal -->
    <!-- <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      @click="formShow()"
    >
      Launch static backdrop modal
    </button> -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="myModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              {{ modalTitle }}
            </h5>
            <button
              type="button"
              class="btn-close"
              aria-label="Close"
              @click="formCancel()"
            ></button>
          </div>

          <!-- Űrlap -->
          <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate>
              <!-- nev -->
              <div class="col-md-3">
                <label for="macskaId" class="form-label">macskaId</label>
                <input
                  type="text"
                  class="form-control"
                  id="macskaId"
                  v-model="row.macskaId"
                  required
                />
                <div class="invalid-feedback">Kötelező!</div>
              </div>
            </form>
          </div>
          <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate>
              <!-- nev -->
              <div class="col-md-3">
                <label for="oltasId" class="form-label">oltasId</label>
                <input
                  type="text"
                  class="form-control"
                  id="oltasId"
                  v-model="row.oltasId"
                  required
                />
                <div class="invalid-feedback">Kötelező!</div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              @click="formCancel()"
            >
              Cancel
            </button>
            <button type="button" class="btn btn-primary" @click="formSave()">
              Save
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require("axios").default;
const bootstrap = require("bootstrap");

class Macskaoltasai {
  constructor(
      macskaOltasaId,
    macskaId,
    oltasId
  ) {
    this.macskaOltasaId = macskaOltasaId;
    this.macskaId = macskaId;
    this.oltasId = oltasId;
  }
}

export default {
  name: "Macskaoltasai",
  data() {
    return {
      queryGet: "macskaoltasaiT",
      title: null,
      columns: [],
      rows: [],
      resData: null,
      row: new Macskaoltasai(0, 0, 0),

      //űrlap
      modalTitle: null,
      status: null,

      myModal: null,
      modalX: null,
      form: null,
    };
  },
  created() {
    this.getRows();
  },
  // oldal betötlődés után
  mounted() {
    //modal
    this.myModal = document.getElementById("myModal");
    this.modalX = new bootstrap.Modal(this.myModal);

    //űrlap validációhoz
    this.form = document.querySelector(".needs-validation");
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
    deleteRow(id) {
      console.log(id);
      //post
      let params = {
        query: "macskaoltasaiDelete",
        macskaOltasaId: id,
      };
      axios
        .post(this.url, params)
        .then(() => {
          this.getRows();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateRow() {
      //post
      let params = {
        query: "macskaoltasaiUpdate",
        macskaOltasaId: this.row.macskaOltasaId,
        macskaId: this.row.macskaId,
        oltasId: this.row.oltasId,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          this.getRows();
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    insertRow() {
      //post
      let params = {
        query: "macskaOltasaihozzaadas",
        macskaOltasaId: this.row.macskaOltasaId,
        macskaId: this.row.macskaId,
        oltasId: this.row.oltasId,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          this.getRows();
          console.log(res.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    onClickedDelete(row) {
      this.status = "delete";
      let id = row.macskaOltasaId;
      if (confirm("Töröljem?")) {
        this.deleteRow(id);
      }
    },
    onClickedUpdate(row) {
      this.modalTitle = "Adat módosítás";
      this.status = "update";
      this.row = { ...row };
      //űrlap indít
      this.formShow();

      // //Űrlap szimuláció
      // // this.row.szin = "Zöld";
      // // this.row.evjarat = 2017;
      // // this.row.tipus = "Suzuki";
      // //Frissítsd a sort a row alapján
      // //this.updateRow();
      console.log(row);
    },
    onClickedInsert() {
      this.modalTitle = "Új fajta bevitele";
      this.status = "insert";

      this.row = new Macskaoltasai(0, 0, 0);
      //űrlap indít
      this.formShow();

      //űrlap szimuláció
      // this.row.rendszam = "AAA111";
      // this.row.tipus = "Merci";
      // this.row.evjarat = 2010;
      // this.row.szin = "Fekete";

      //Hozzáadja az új sort
      //this.insertRow();
    },
    onClickedRefresh() {
      this.status = "refresh";
      this.getRows();
    },

    // Űrlap kezelés
    formCancel() {
      this.modalX.hide();
    },
    formShow() {
      this.modalX.show();
    },
    formSave() {
      this.form.classList.add("was-validated");
      if (this.form.checkValidity()) {
        //űrlap adatkezelés
        if (this.status == "insert") {
          this.insertRow();
        } else if (this.status == "update") {
          this.updateRow();
        }

        //Űrlap bezár
        this.modalX.hide();
      } else {
        return;
      }
    },
  },
};
</script>

<style>
.my-ctrl-btn {
  padding: 0 1px !important;
  margin: 0 2px;
  width: 25px;
  height: 25px;
}

.my-hide {
  display: none;
}
</style>