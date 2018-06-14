<template>
  <div id="app">
  <div class="header">
      <Header/>
    </div>

        <transition name="router-animation" enter-active-class="animated fadeInUp" leave-active-class="animated fadeOutUp" mode="out-in" :duration="{ enter: 800, leave: 800 }">
          <router-view></router-view>
        </transition>

        <div class="footer">
          <Footer/>
        </div>
  </div>
</template>

<script>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
export default {
  name: 'App',
  components: {
    Header,
    Footer
}
}
</script>

<style>
@import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
.header{
  -webkit-transition: all .55s ease-in;
 -moz-transition: all .55s ease-in;
 -ms-transition: all .55s ease-in;
 -o-transition: all .55s ease-in;
 transition: all .55s ease-in;
}

.footer{
  transition: all 1s ease;
}
</style>
