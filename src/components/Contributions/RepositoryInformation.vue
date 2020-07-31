<template>
  <div>
    <a v-bind:href=repository.url target="_blank" class="text-2xl font-bold underline block">{{repository.name}}</a>
    <p class="pt-2 font-light leading-loose" v-html=repository.description></p>
    <RepositoryMetadata :repository="repository"/>
  </div>

</template>
<script>
  import RepositoryMetadata from "./RepositoryMetadata";

  export default {
    name: 'RepositoryInformation',
    components: {RepositoryMetadata},
    props: {
      repository: {}
    }
  }
</script>
