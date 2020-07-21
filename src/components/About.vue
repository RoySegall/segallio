<template>
    <div class="about-me">
        <SideMenu/>

        <section class="text w-screen text-white text-center">
            <h2 class="text-4xl font-bold pb-4 mt-24">About me</h2>

            <p class="text-2xl w-3/4 m-auto pb-4">
                Since I remember my self I know that I love to explore. Every time something electrical went down,
                everyone knew that they need to give it to me so I could tear it down and see the inside. Explore the
                anatomy and see the kit, the electrical components and I did not afraid for breaking stuff since the
                electrical item is going to garbage.
            </p>

            <p class="text-2xl w-3/4 m-auto block pb-4">
                Over the years, I change my position to the chair in front the desktop and started to learn by myself
                how to program. That eventually helped me land jobs in hi-tech companies and created sites for various
                customers (Harvard for example 🙄).
            </p>

            <p class="text-2xl w-3/4 m-auto block pb-4">
                In addition to my daily job I love to contribute to open source projects and always look for cutting
                edge technologies. Except for that, I own two cats, with my lovely fiance, which goes by the names
                <a href="https://www.instagram.com/tomandsamthecats/" class="underline">Tom and Sam</a>. The female cat,
                Tom, is a real lady while sam, the male cat, is a real trouble maker, but in a cute way 😁.
            </p>
        </section>

        <section class="filler">
            <SuperPowers/>
        </section>
    </div>
</template>

<script>
  import SuperPowers from './About/SuperPowers';
  import Story from './About/Story';

  import SideMenu from "~/components/SideMenu.vue"

  export default {
    components: {
      SuperPowers,
      Story,
      SideMenu,
    },
    name: 'About',
    data() {
      return {}
    },
  }
</script>

<style lang="scss">

    .about-me {

        .text {
            background: #69c8e8;
        }

        section {
            padding-top: 2em;
            height: 50vh;
        }

        .filler {
            height: 50vh;
        }
    }
</style>
