<template>
    <div class="home">
      <h1>Welcome to the home page!</h1>
        <p>
          <!-- named route -->
          <router-link :to="{ name: 'cruds', params: { userId: 123 }}">Cruds Page</router-link>
        </p>
      </div>
</template>

<script>

</script>
<style>

</style>
