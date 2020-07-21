<template>
    <ul>
        <li v-for="superpower in superpowers" class="text-right pt-2">
            <span class="pr-3 text-xl">{{superpower['name']}}</span>
            <font-awesome-icon class="star full ml-1 text-xl" v-for="i in superpower['level']" :icon="['fas', 'star']"/>
            <font-awesome-icon class="star empty ml-1 text-xl" v-for="i in 5 - superpower['level']" :icon="['fal', 'star']"/>
        </li>
    </ul>
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
    .star {
        &.full {
            color: #6bcff1;
        }

        &.empty {
            color: #f7b75e;
        }
    }

</style>
