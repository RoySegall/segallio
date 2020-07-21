<template>
    <section class="superpowers w-screen text-center">
        <h2 class="text-4xl font-bold pb-4">Super powers</h2>
        <ul class="w-3/12 m-auto">
            <li v-for="superpower in superpowers" class="pt-2 flex justify-between">
                <div>
                    <span class="pr-3 text-xl">{{superpower['name']}}</span>
                </div>
                <div>
                    <font-awesome-icon class="star full ml-1 text-xl text-right" v-for="i in superpower['level']" :icon="['fas', 'star']"/>
                    <font-awesome-icon class="star empty ml-1 text-xl text-right" v-for="i in 5 - superpower['level']" :icon="['fal', 'star']"/>
                </div>
            </li>
        </ul>
    </section>

</template>

<script>
  import superpowers from '@/data/superpowers.yml'

  export default {
    name: 'SuperPowers',
    data() {
      return {
        superpowers
      }
    },
  }
</script>

<style lang="scss">

    .superpowers {
        h2 {
            color: #efb15e;
        }
    }
    .star {
        &.full {
            color: #6bcff1;
        }

        &.empty {
            color: #f7b75e;
        }
    }

</style>
