<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/people" class="nav-item nav-link">Speaker List </router-link>
                    <router-link to="/people/add" class="nav-item nav-link">Create</router-link>
                    
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
<script>
export default {}
</script>