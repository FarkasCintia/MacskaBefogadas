<template>
<div>
  <div class="hatter"></div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link class="nav-link active" aria-current="page" to="/"
              >Home</router-link
            >
          </li>
          <li class="nav-item" v-if="loginAccessLevel == 0">
            <router-link class="nav-link active" aria-current="page" to="/login/"
              >Login</router-link
            >
          </li>
          
          <li class="nav-item">
                <router-link class="nav-link active" to="/macskak/"
                  >Macskak</router-link
                >
              </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
          <li class="nav-item dropdown" v-if="loginAccessLevel == 2">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Adatkezelesek
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- <li>
                <router-link class="dropdown-item" to="/macskak/"
                  >macskak</router-link
                >
              </li> -->
              <li>
                <router-link class="dropdown-item" to="/MacskaFeltoltes/"
                  >Macska adatkezelese</router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/Fajtakhozzaadas/"
                  >Fajta adatkezelese</router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/Oltasokhozzaadas/"
                  >Oltasok adatkezelese</router-link
                >
              </li>
              <li>
                <router-link class="dropdown-item" to="/Macskaoltasaihozzaadas/"
                  >Macskaoltasai adatkezelese</router-link
                >
              </li>
            </ul>
          </li>
          <li class="nav-item" v-if="loginAccessLevel > 0">
           <button class="btn nav-link " @click="Logout()">Kijelentkezés</button>
          </li>
          <!-- <li class="nav-item">
            <a
              class="nav-link disabled"
              href="#"
              tabindex="-1"
              aria-disabled="true"
              >Disabled</a
            >
          </li> -->
        </ul>
        
      </div>
    </div>
  </nav>
  </div>
</template>

<script>

const axios = require("axios").default;
axios.defaults.withCredentials = true;

export default {
  name: "Menu",
  computed: {
    loginAccessLevel() {
      return this.$root.$data.loginAccessLevel;
    },
  },
  methods: {
    Logout() {
       let params = {
        query: "logoutUser",
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res.data);
          this.$root.$data.loginAccessLevel = res.data.loginAccessLevel;
          this.$root.$data.loginUserName = res.data.loginUserName;
          this.$root.$data.loginId = res.data.loginId;
          this.$root.$data.loginEmail = res.data.loginEmail;
          // let loginAccessLevel = res.data.loginAccessLevel;
          // let loginUserName = res.data.loginUserName;
          this.$router.push({ name: "home" });
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    }
  }
};

</script>

<style>

</style>