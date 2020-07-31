<template>
  <ul class="flex filter text-white text-5xl">
    <li class="pr-6">Filter by:</li>
    <li v-for="technology in technologies" class="pr-6">
      <a>
        <font-awesome-icon class="side-menu-icon" :icon="['fab', technology.icon]"/>
      </a>
    </li>
  </ul>
</template>

<script>
  export default {
    name: "Filter",
    props: ['technologies']
  }
</script>
