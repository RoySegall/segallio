<template>
  <div class="pt-2">
    <div class="inline">
      Position: <span class="font-bold">{{repository.position}}</span>,
      Technologies:
    </div>
    <ul class="pl-2 technologies inline">
      <li v-for="technology in repository.technologies" class="inline-block">
        {{technology}}
      </li>
    </ul>
  </div>
</template>
<script>
  export default {
    name: 'RepositoryMetadata',
    props: {
      repository: {}
    }
  }
</script>
