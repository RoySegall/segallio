<template>
  <ul class="flex filter text-white text-5xl">
    <li class="pr-6">Filter by:</li>
    <li v-for="(technology, index) in technologies" :key=index  class="pr-6">
      <a class="cursor-pointer"
         v-bind:class="{'text-black': technology.name == selectedTech}"
         v-on:click="$emit('filter-by-lang', technology.name)">
        <font-awesome-icon class="side-menu-icon" :icon="['fab', technology.icon]"/>
      </a>
    </li>
  </ul>
</template>

<script>
  export default {
    name: "Technologies",
    props: ['technologies', 'selectedTech']
  }
</script>
