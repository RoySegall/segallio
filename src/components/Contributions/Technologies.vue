<template>
  <ul class="flex filter text-white text-5xl">
    <li class="pr-6">
      Filter by:
      <span class="block text-xs">Click on the icon to filter contributions.</span>
      <span class="block text-xs">Click again to disable the filter.</span>
    </li>
    <li v-for="(technology, index) in technologies" :key=index  class="pr-16">
      <a class="cursor-pointer"
         v-bind:class="{'text-black': technology.name == selectedTech}"
         v-on:click="$emit('filter-by-lang', technology.name)">
        <font-awesome-icon class="side-menu-icon" :icon="[technology.category, technology.icon]"/>
        <span class="block text-xs">{{technology.name}}</span>
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
