<template>
    <Layout>
        <IntroductionOfRoy />
        <RoysSuperPowers />
    </Layout>
</template>

<script>
  import IntroductionOfRoy from "~/components/IntroductionOfRoy.vue"
  import RoysSuperPowers from "~/components/RoysSuperPowers.vue"

  export default {
    components: {
      IntroductionOfRoy,
      RoysSuperPowers
    }
  }
</script>
