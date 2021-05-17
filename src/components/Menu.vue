<template>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
      <router-link
        class="navbar-brand"
        to="/"
      >Home</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse"
        id="navbarNavDropdown"
      >
        <ul class="navbar-nav">

          <!-- Alapadatok -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Alapadatok
            </a>
            <ul
              class="dropdown-menu"
              aria-labelledby="navbarDropdownMenuLink"
            >
              <li><router-link
                   :class="{'dropdown-item': true, disabled: userName==null}"
                  to="/alapadatok/autok/"
                >Autók</router-link></li>
              <li><router-link
                   :class="{'dropdown-item': true, disabled: userName==null}"
                  to="/alapadatok/berlok/"
                >Bérlők</router-link></li>
            </ul>
          </li>

          <!-- Kölcsönzés -->
          <li class="nav-item">
            <router-link
              class="nav-link active"
              aria-current="page"
              to="/kolcsonzes/"
            >Kölcsönzés</router-link>
          </li>

					<!-- Kimutatások -->
          <li class="nav-item">
            <router-link
              class="nav-link"
              to="/kimutatasok/"
            >Kimutatások</router-link>
          </li>

					<!-- Kapcsolat -->
          <li class="nav-item">
            <router-link
              class="nav-link"
              to="/kapcsolat/"
            >Kapcsolat</router-link>
          </li>

            <!-- login -->
          <li class="nav-item">
            <router-link
              class="nav-link"
              to="/login/"
              v-if="userName=='' || userName==null"
            >Login</router-link>
          </li>


         <!-- logout drop down -->
          <li
            class="nav-item dropdown"
            v-if="userName!=''"
          >
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              v-if="userName!=''"
            >
              {{userName}}
            </a>
            <ul
              v-if="userName!=''"
              class="dropdown-menu"
              aria-labelledby="navbarDropdown"
            >
              <li><a
                  class="dropdown-item"
                  href="#"
                  @click.prevent="logout()"
                >Logout</a></li>
            </ul>
          </li>   



		<!-- ModalValidate -->
          <li class="nav-item">
            <router-link
              class="nav-link"
              to="/modalValidate/"
            >Modális űrlap</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</template>

<script>
const axios = require("axios").default;
axios.defaults.withCredentials = true;
export default {
    name: "Menu",
    props: ["userName"],
    methods: {
    logout() {
      let params = {
        query: "logoutUser",
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res.data);
          //redirect login
          if (this.$route.name != "login") {
            this.$router.push({ name: "login" });
          }
          this.$emit("changeUser");
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    },
  },
};
</script>

<style>
</style>