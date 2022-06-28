<template>
    <div>
        <nav>
            <ul>
                <li><router-link to="/etudiants">Etudiants</router-link></li>
                <li><router-link to="/formations">Formations</router-link></li>
            </ul>
        </nav>
        <router-view>daas</router-view>
        <div class="container my-4" style="margin-top: 200px">
            <router-view></router-view>
            <h1>sfdffffffffffffffffffffffffffff</h1>
            <h1>sfdffffffffffffffffffffffffffff</h1>
            <h1>sfdffffffffffffffffffffffffffff</h1>
            <h1>sfdffffffffffffffffffffffffffff</h1>
        </div>
    </div>

</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>

</style>
