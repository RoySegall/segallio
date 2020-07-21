<template>
    <ul class="flex justify-center m-2 icons">
        <li class="pl-3 pr-8"><a href="https://www.facebook.com/RoySegall" target="_blank">
            <font-awesome-icon class="icon text-4xl" :icon="{ prefix: 'fab', iconName: 'facebook-square' }"/>
        </a></li>
        <li class="pr-8"><a href="https://www.twitter.com/RoySegall" target="_blank">
            <font-awesome-icon class="icon text-4xl" :icon="{ prefix: 'fab', iconName: 'twitter-square' }"/>
        </a></li>
        <li class="pr-8"><a href="https://www.github.com/RoySegall" target="_blank">
            <font-awesome-icon class="icon text-4xl" :icon="{ prefix: 'fab', iconName: 'github' }"/>
        </a></li>
        <li><a href="https://www.linkedin.com/in/roysegall" target="_blank">
            <font-awesome-icon class="icon text-4xl" :icon="{ prefix: 'fab', iconName: 'linkedin' }"/>
        </a></li>
    </ul>
</template>

<script>
  export default {
    name: 'Social',
    data() {
      return {}
    },
  }
</script>

<style lang="scss">
    .icon {
        color: black;
        -webkit-transition: color .5s; /* Safari */
        transition: color .5s;

        &:hover {
            color: #f7b75e;

        }
    }
</style>
