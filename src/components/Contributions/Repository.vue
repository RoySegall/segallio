<template>
  <div class="grid grid-cols-6 items-center">
    <div class="col-span-1"><Logo v-bind:logo=repository.logo /></div>
    <div class="col-span-5"><RepositoryInformation :repository="repository"/></div>
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
