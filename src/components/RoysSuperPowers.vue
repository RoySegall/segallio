<template>
    <div class="h-screen w-screen pl-32 pr-32 pt-10 text-center about-me">
        <h2 class="text-3xl mb-4"><b>Who am I?</b></h2>
        <hr />

        <div class="grid grid-cols-6 pt-6">
            <div class="col-span-2">
                <g-image class="pr-4" src="~/assets/images/profile.jpg" fit="contain"/>
            </div>
            <div class="col-span-4 text-left">{{superpowers}}</div>
        </div>
    </div>
</template>

<script>
  import superpowers from '@/data/superpowers.yaml'
export default {
  name: 'RoysSuperPowers',
  data () {
    return {
      superpowers
    }
  },
}
</script>

<style lang="scss">
    .about-me {
        hr {
            border-bottom: solid 1px black;
        }
    }
</style>
