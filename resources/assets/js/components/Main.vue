<template>
  <div id="app">
      <transition name="router-animation" enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
        <router-view></router-view>
      </transition>
  </div>
</template>

<script>
export default {
  name: 'Main'
}
</script>

<style>
@import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
</style>
