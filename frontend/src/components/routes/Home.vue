<template>
  <div id="content">
    <div id="ht">
      <h1>Home</h1>
      <br>
      <h2>Üdv látogató</h2>
      <p id="p">1.Ha nem jelentkeztél be akkor csak megnézni tudod a macsákat <br>
         2.Ha bejelentkeztél nyugodtan fogadj örökbe de ne felejts el kijelentkezni és írni nekem <br>
         3.Ha nincs fiokod írj nekem a anyamtyukja címre<br>
         4.Ha örökbe akarsz adni macskát akkor írj nekem<br>
      </p>
      <h3>Érezzd jól magad</h3>
    </div>
  </div>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style>
#p{
  color: darkred;
  text-align: center;
}
h2, h3{
  color: darkorange;
  text-align: center;
}
h1{
  text-align: center;
  background-color: darkorange;
  
}
#content{
  background-image: url("../../assets/kep/cicaHatter.gif");
  background-repeat: no-repeat;
  height: 500px;
 
}
#ht{
  background-color: rgba(255, 255, 255, 0.8);
}
</style>