<template>
  <Layout>
    <Introduction/>
    <About/>
    <Jobs/>
    <Blogs/>
    <Map/>
  </Layout>
</template>

<script>
  import Introduction from "~/components/Introduction.vue"
  import About from "~/components/About.vue"
  import Jobs from "~/components/Jobs.vue"
  import Blogs from "~/components/Blogs.vue"
  import Map from "~/components/Map.vue"

  export default {
    components: {
      Introduction,
      About,
      Jobs,
      Blogs,
      Map,
    }
  }
</script>

<style lang="scss">

  .section {
    padding-left: 10rem;
    padding-right: 8rem;
    text-align: left;
  }
</style>
