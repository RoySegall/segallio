<template>
  <Layout>
    <Introduction/>
    <About/>
    <Jobs/>
    <Blogs/>
    <Contributions/>
<!--    <Map/>-->
<!--    <Footer/>-->
  </Layout>
</template>

<script>
  import Introduction from "~/components/Introduction.vue"
  import About from "~/components/About.vue"
  import Jobs from "~/components/Jobs.vue"
  import Blogs from "~/components/Blogs.vue"
  import Contributions from "~/components/Contributions.vue"
  import Map from "~/components/Map.vue"
  import Footer from "~/components/Footer.vue"

  export default {
    components: {
      Introduction,
      About,
      Jobs,
      Blogs,
      Contributions,
      Map,
      Footer
    }
  }
</script>

<style lang="scss">

  html {
    scroll-behavior: smooth;
  }

  .leaflet-map-pane {
    z-index: 2 !important;
  }

  .leaflet-google-layer {
    z-index: 1 !important;
  }

</style>
