<template>
    <div>
        <h3 class="text-center">Create</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addPerson">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" v-model="person.firstname">
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" v-model="person.lastname">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="person.title">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
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
    methods: {
        addPerson() {
            this.axios.post('http://localhost:8000/api/people', this.person).then(response => (this.$router.push({ name: 'people' })))
                .catch(err => console.log(err))
                .finally(() => this.loadin = false)
        }
    }
} 
</script>