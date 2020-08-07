<template>

  <div class="grid grid-cols-12">
    <div class="
      col-span-2 xs:col-span-12
      text-white text-left xs:text-center text-4xl
      xs:text-3xl sm:text-2xl md:text-2xl">
      Filter by:
    </div>
    <ul class="
    col-span-10 xs:col-span-12
    flex justify-between filter text-white text-5xl">
      <li v-for="(technology, index) in technologies" :key=index
          class="
        xs:text-3xl
        sm:text-4xl
        md:text-4xl">
        <a class="cursor-pointer"
           v-bind:class="{'text-black': technology.name == selectedTech}"
           v-on:click="$emit('filter-by-lang', technology.name)">
          <font-awesome-icon class="side-menu-icon" :icon="[technology.category, technology.icon]"/>
          <span class="block text-xs ">{{technology.name}}</span>
        </a>
      </li>
    </ul>
  </div>

</template>

<script>
  export default {
    name: "Technologies",
    props: ['technologies', 'selectedTech']
  }
</script>
