<template>
  <section class="filler about-me-superpowers">
    <h2 class="about-me-superpowers-h2">Super powers</h2>
    <ul class="about-me-superpowers-ul">
      <li v-for="superpower in superpowers" class="pt-2 flex justify-between">
        <div><span class="pr-3 text-xl">{{superpower['name']}}</span></div>
        <div>
          <font-awesome-icon class="star-full" v-for="_ in superpower['level']" :icon="['fas', 'star']"/>
          <font-awesome-icon class="star-empty" v-for="_ in 5 - superpower['level']" :icon="['fal', 'star']"/>
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
