<template>
    <Layout>
        <IntroductionOfRoy />
        <AboutRoy />
    </Layout>
</template>

<script>
  import IntroductionOfRoy from "~/components/IntroductionOfRoy.vue"
  import AboutRoy from "~/components/AboutRoy.vue"

  export default {
    components: {
      IntroductionOfRoy,
      AboutRoy
    }
  }
</script>
