<template>
    <Layout>
        <Introduction/>
        <About/>
        <Jobs/>
    </Layout>
</template>

<script>
  import Introduction from "~/components/Introduction.vue"
  import About from "~/components/About.vue"
  import Jobs from "~/components/Jobs.vue"

  export default {
    components: {
      Introduction,
      About,
      Jobs
    }
  }
</script>
