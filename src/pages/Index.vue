<template>
    <Layout>
        <Introduction/>
        <About/>
        <Jobs/>
        <Blogs/>
    </Layout>
</template>

<script>
  import Introduction from "~/components/Introduction.vue"
  import About from "~/components/About.vue"
  import Jobs from "~/components/Jobs.vue"
  import Blogs from "~/components/Blogs.vue"

  export default {
    components: {
      Introduction,
      About,
      Jobs,
      Blogs,
    }
  }
</script>
