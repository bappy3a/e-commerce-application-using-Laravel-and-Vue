<template>

</template>

<script>
    export default {
        mounted() {
          localStorage.removeItem('token')
          localStorage.removeItem('user')
          this.$snotify.success('Successfully Logout','success')
          this.$router.push({ name: 'home' })
        }
    };
</script>