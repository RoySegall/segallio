<template>
  <div class="grid grid-cols-12 items-center h-full">
    <div class="col-span-2 xs:col-span-12"><Logo v-bind:logo=repository.logo /></div>
    <div class="col-span-10 xs:col-span-12 h-full"><RepositoryInformation :repository="repository"/></div>
  </div>
</template>

<script>
  import Logo from "./Logo";
  import RepositoryInformation from "./RepositoryInformation";

  export default {
    name: "Repository",
    components: {RepositoryInformation, Logo},
    props: ['repository']
  }
</script>
