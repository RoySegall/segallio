<template>
    <div class="h-screen w-screen pl-32 pr-32 pt-10 text-center about-me">
        <h2 class="text-3xl mb-4"><b>Who am I?</b></h2>
        <hr/>

        <div class="grid grid-cols-6 pt-6">
            <div class="col-span-1">
                <g-image class="profile-pic" src="~/assets/images/profile.jpg" fit="contain"/>

                <Social />
            </div>
            <div class="ml-4 col-span-5">
                <div class="grid grid-cols-6">
                    <div class="col-span-4 text-left">
                        <Story/>
                    </div>
                    <div class="col-span-2 text-right">
                        <SuperPowers/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import SuperPowers from './About/SuperPowers';
  import Story from './About/Story';
  import Social from './About/Social';

  export default {
    components: {
      SuperPowers,
      Story,
      Social
    },
    name: 'About',
    data() {
      return {}
    },
  }
</script>

<style lang="scss">

    .profile-pic {
        border: solid 1px #f7b75e;
    }

    .about-me {
        hr {
            border-bottom: solid 1px #f7b75e;
        }
    }
</style>
