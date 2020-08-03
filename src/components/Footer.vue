<template>
  <div class="footer text-center w-screen text-to-read xs:pt-4">
    Designed with
    <font-awesome-icon class="icon" :icon="['fas', 'heart']"/> by
    <b>Roy</b> and <b>Noy</b>
  </div>
</template>

<script>
  export default {
    name: "Footer"
  }
</script>

<style lang="scss">
  .footer {

    .icon {
      color: #ffa2a2;
    }
  }
</style>
