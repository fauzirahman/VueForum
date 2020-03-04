<template>
  <v-footer class="pa-3">
      Bitflames Forums
    <v-spacer></v-spacer>
    <div>&copy; {{ new Date().getFullYear() }}</div>
  </v-footer>
</template>


<script>
    import toolbar from './Toolbar'

    export default {
      components:{toolbar}
    }
</script>

<style>

</style>
