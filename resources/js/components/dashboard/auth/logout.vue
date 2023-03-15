<template>
    <div>
        <h2>Log</h2>
    </div>
</template>

<script>
export default {
    created() {
        localStorage.removeItem('token')
        localStorage.removeItem('id')

        Toast.fire({
            icon: 'success',
            title: 'Logged Out successfully'
        })
        this.$router.push('/auth/login')
    }
}
</script>

<style scoped>
</style>
