<template>
    <Layout>
        <Introduction/>
        <About/>
        <Jobs/>
        <Blogs/>
        <RecentProjects/>
    </Layout>
</template>

<script>
  import Introduction from "~/components/Introduction.vue"
  import About from "~/components/About.vue"
  import Jobs from "~/components/Jobs.vue"
  import Blogs from "~/components/Blogs.vue"
  import RecentProjects from "~/components/RecentProjects.vue"

  export default {
    components: {
      Introduction,
      About,
      Jobs,
      Blogs,
      RecentProjects,
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
