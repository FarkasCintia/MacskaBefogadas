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
      <table class="table table-bordered my-table-fit">
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
            >
              {{
                indexD == 2 || indexD == 5
                  ? cell == 0
                    ? "nem"
                    : "igen"
                  : indexD == 6
                  ? cell == 0
                    ? "fiú"
                    : "lány"
                  : cell
              }}
            </td>
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
                <label for="nev" class="form-label">Nev</label>
                <input
                  type="text"
                  class="form-control"
                  id="nev"
                  v-model="row.nev"
                  required
                />
                <div class="invalid-feedback">Kötelező!</div>
              </div>

              <!-- Ivartalanitott -->
              <div class="col-md-9">
                <label for="ivartalanitott" class="form-label"
                  >ivartalanitott</label
                >
                <div class="dropdown">
                  <button
                    class="btn btn-secondary dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    {{row.ivartalanitott == 0 ? "nem" : "igen"}}
                  </button>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton1"
                  >
                    <li><p class="dropdown-item" @click="row.ivartalanitott = 1">igen</p></li>
                    <li>
                      <p class="dropdown-item" @click="row.ivartalanitott = 0">nem</p>
                    </li>
                  </ul>
                </div>               
                <div class="invalid-feedback">Kötelező!</div>
              </div>

              <!-- neme -->
              <div class="col-md-3">
                <label for="c" class="form-label">neme</label>
                 <div class="dropdown">
                  <button
                    class="btn btn-secondary dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    {{row.neme == 0 ? "fiú" : "lány"}}
                  </button>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton1"
                  >
                    <li><p class="dropdown-item" @click="row.neme = 1">lány</p></li>
                    <li>
                      <p class="dropdown-item" @click="row.neme = 0">fiú</p>
                    </li>
                  </ul>
                </div>
                <div class="invalid-feedback">Kötelező!</div>
              </div>

              <!-- SzDatum -->
              <div class="col-md-4">
                <label for="szuletesiDatum" class="form-label"
                  >szuletesiDatum</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="szuletesiDatum"
                  v-model="row.szuletesiDatum"
                  required
                />
                <div class="invalid-feedback">Kötelező!</div>
              </div>
              <!-- FajtaId -->
              <div class="col-md-3">
                <label for="c" class="form-label">FajtaId</label>
                <input
                  type="number"
                  class="form-control"
                  id="fajtaId"
                  v-model="row.fajtaId"
                  required
                  min="1"
                  max="10"
                />
                <div class="invalid-feedback">Kötelező!</div>
              </div>

              <!-- orokbeaAdoId -->
              <div class="col-md-3">
                <label for="c" class="form-label">orokbeAdoId</label>
                <input
                  type="number"
                  class="form-control"
                  id="orokbeAdoId"
                  v-model="row.orokbeAdoId"
                  required
                  min="1"
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

class Macskak {
  constructor(
    macskaId,
    nev,
    ivartalanitott,
    fajtaId,
    orokbeAdoId,
    neme,
    szuletesiDatum,
    kep
  ) {
    this.macskaId = macskaId;
    this.nev = nev;
    this.ivartalanitott = ivartalanitott;
    this.fajtaId = fajtaId;
    this.orokbeAdoId = orokbeAdoId;
    this.neme = neme;
    this.szuletesiDatum = szuletesiDatum;
    this.kep = kep;
  }
}

export default {
  name: "Macskak",
  data() {
    return {
      queryGet: "macskakT",
      title: null,
      columns: [],
      rows: [],
      resData: null,
      row: new Macskak(0, null, 0, null, null, 0, null, null),

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
        query: "macskakDelete",
        macskaId: id,
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
        query: "macskaUpdate",
        macskaId: this.row.macskaId,
        nev: this.row.nev,
        ivartalanitott: this.row.ivartalanitott,
        fajtaId: this.row.fajtaId,
        orokbeAdoId: this.row.orokbeAdoId,
        neme: this.row.neme,
        szuletesiDatum: this.row.szuletesiDatum,
        kep: this.row.kep,
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
        query: "macskaHozzaadas",
        macskaId: this.row.macskaId,
        nev: this.row.nev,
        ivartalanitott: this.row.ivartalanitott,
        fajtaId: this.row.fajtaId,
        orokbeAdoId: this.row.orokbeAdoId,
        neme: this.row.neme,
        szuletesiDatum: this.row.szuletesiDatum,
        kep: this.row.kep,
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
      let id = row.macskaId;
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
      this.modalTitle = "Új macska bevitele";
      this.status = "insert";

      this.row = new Macskak(0, null, null, 0, 0, null, null, null);
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

@media(max-width:1024px){
  .table thead{
    display: none;
  }
  .table, .table tbody, .table tr, .table td{
    display: block;
    width: 100%;
  }
  .table tr{
    margin-bottom: 15px;
  }
  .table td{
    text-align: left;
    text-align: left;
    position: relative;
  }
  
}

</style>