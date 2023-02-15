<template>
    <div class="container my-5">

        <button type="button" class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#myModal"
            @click="formReset">Add Person</button>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title text-muted">Add New Candidate</h5>
                        <button type="button" class="close close_modal" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <!-- <div class="text-sm text-danger" if="errors != ''">
                            <p v-for="error in errors" class="mb-0" :key="error"><small>{{ error }} </small></p>
                        </div> -->

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" v-model="form.firstname">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="email" class="form-control" v-model="form.lastname">
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" v-model="form.title">
                        </div>

                        <button v-if="person_id == ''" type="button" class="btn btn-primary"
                            @click="addPerson">Submit</button>

                        <button v-else type="button" class="btn btn-primary" @click="updatePerson">Update</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5" v-if="people && people.data.length > 0">
            <div class="col-3 my-3" v-for="(person, index) in people.data" :key="index">
                <div class="card">
                    <img class="card-img-top" v-bind:src="'/storage/' + person.image" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">{{ person.firstname }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ person.title }}</h6>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal"
                            @click="editPerson(person)">Edit</button>

                        <router-link :to="{ name: 'edit', params: { id: person.id } }"
                            class="btn btn-success">Edit</router-link>

                    </div>
                </div>
            </div>
        </div>
        <pagination align="center" :data="people" @pagination-change-page="list"></pagination>
    </div>
</template>

<script>
import pagination from 'laravel-vue-pagination'
export default {
    components: {
        pagination
    },
    data() {
        return {
            person_id: '',
            people: {
                type: Object,
                default: null
            },
            form: {
                firstname: '',
                lastname: '',
                title: ''
            }
        }
    },
    mounted() {
        this.list()
    },
    created() {
        this.axios.get('/api/people/').then(response => {
            this.people = response.data;
        });
    },
    methods: {
        deleteProduct(id) {
            this.axios.delete('/api/people/${id}').then(response => {
                let i = this.people.map(data => data.id).indexOf(id);
                this.people.splice(i, 1)
            });
        },
        async list(page = 1) {
            await axios.get(`/api/people?page=${page}`).then(({ data }) => {
                this.people = data
            }).catch(({ response }) => {
                console.error(response)
            })
        },
        formReset() {
            person_id.value = '';
            form.firstname = '';
            form.lastname = '';
            form.title = '';
        },
        addPerson() {

        },
        updatePerson() {
            this.axios.patch('/api/people/' + this.person_id, this.form).then((res) => { this.$router.push({ name: 'people' }); });
        },
        // updatePerson() {
        //     try {
        //         this.axios.patch('http://localhost:8000/api/people/' + this.person_id, this.form)
        //         getEmployee()
        //         formReset()
        //         $("#myModal").modal('hide');
        //     } catch (e) {
        //         if (e.response.status == 422) {
        //             var data = [];
        //             for (const key in e.response.data.errors) {
        //                 data.push(e.response.data.errors[key][0]);
        //             }
        //             errors.value = data;
        //         }
        //     }
        // },
        editPerson(person) {
            this.person_id = person.id;
            this.form.firstname = person.firstname;
            this.form.lastname = person.lastname;
            this.form.title = person.title;
        }
    }
}

    // export default {
    //     name: "people",
    //     components: {
    //         pagination
    //     },
    //     data() {
    //         return {
    //             people: {
    //                 type: Object,
    //                 default: null
    //             }
    //         }
    //     },
    //     mounted() {
    //         this.list()
    //     },
    //     methods: {
    //         async list(page = 1) {
    //             await axios.get(`http://localhost:8000/api/people?page=${page}`).then(({ data }) => {
    //                 this.people = data
    //             }).catch(({ response }) => {
    //                 console.error(response)
    //             })
    //         }
    //     }
    // }
</script>