@extends('fenbooth::layouts.app')

@section('head')
<title>People</title>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
@endsection

@section('content')
<template>
    <div class="container my-5">
        <div class="row my-5" @v-if="people && people.data.length > 0">
            <div class="col-3 my-3" v-for="(person, index) in people.data" :key="index">
                <div class="card">
                    <img class="card-img-top" v-bind:src="'/storage/' + person.image" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">@{{ person.firstname }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">@{{ person.title }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <pagination align="center" :data="people" @pagination-change-page="list"></pagination>
    </div>
</template>
@endsection

@section('javascript')
<script>
import pagination from 'laravel-vue-pagination'
export default {
    components: {
        pagination
    },
    data() {
        return {
            people: {
                type: Object,
                default: null
            }
        }
    },
    mounted() {
        this.list()
    },
    created() {
        this.axios.get('http://localhost:8000/api/people/').then(response => {
            this.people = response.data;
        });
    },
    methods: {
        deleteProduct(id) {
            this.axios.delete('http://localhost:8000/api/people/${id}').then(response => {
                let i = this.people.map(data => data.id).indexOf(id);
                this.people.splice(i, 1)
            });
        },
        async list(page = 1) {
            await axios.get(`http://localhost:8000/api/people?page=${page}`).then(({ data }) => {
                this.people = data
            }).catch(({ response }) => {
                console.error(response)
            })
        }
    }
}
</script>
@endsection