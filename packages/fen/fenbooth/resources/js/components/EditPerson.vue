<template>
    <div>
        <h3 class="text-center">Edit Person Details</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updatePerson">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="person.firstname">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="person.lastname">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="person.title">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return { person: {} }
    },
    created() {
        this.axios.get(`/api/people/${this.$route.params.id}`).then((res) => { this.person = res.data; });
        console.log(res.data);
    },
    methods: {
        updatePerson() {
            this.axios.patch(`/api/people/${this.$route.params.id}`, this.person).then((res) => { this.$router.push({ name: 'people' }); });
        }
    }
} 
</script>