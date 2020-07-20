<template>
    <ul>
        <li v-for="superpower in superpowers" class="text-right">
            <span class="pr-3">{{superpower['name']}}</span>
            <font-awesome-icon class="star full"  v-for="i in superpower['level']" icon="star" />
            <font-awesome-icon class="star empty"  v-for="i in 5 - superpower['level']" icon="star" />
        </li>
    </ul>
</template>

<script>
  import superpowers from '@/data/superpowers.yml'
export default {
  name: 'SuperPowers',
  data () {
    return {
      superpowers
    }
  },
}
</script>

<style lang="scss">
    .star {
        &.full {
            color: blue;
        }

        &.empty {
            color: #ff9900;
        }
    }

</style>
