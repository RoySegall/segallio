<template>
    <Layout>
        <IntroductionOfRoy/>
        <AboutRoy/>
        <RoyJobs/>
    </Layout>
</template>

<script>
  import IntroductionOfRoy from "~/components/IntroductionOfRoy.vue"
  import AboutRoy from "~/components/AboutRoy.vue"
  import RoyJobs from "~/components/RoyJobs.vue"

  export default {
    components: {
      IntroductionOfRoy,
      AboutRoy,
      RoyJobs
    }
  }
</script>
