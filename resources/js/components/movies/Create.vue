<template>
    <div class="card">
        <div class="card-header">
            Create A Movie
        </div>
        <div class="card-body">
            <form id="myForm">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                    <div v-if="errors.title !== ''" class="text-danger col-9 mt-2">
                        {{ errors.title }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control" id="year" name="year">
                    <div v-if="errors.year !== ''" class="text-danger col-9 mt-2">
                        {{ errors.year }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="imdbID">imdbID</label>
                    <input type="text" class="form-control" id="imdbID" name="imdbID">
                    <div v-if="errors.imdbID !== ''" class="text-danger col-9 mt-2">
                        {{ errors.imdbID }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" id="type" name="type">
                    <div v-if="errors.type !== ''" class="text-danger col-9 mt-2">
                        {{ errors.type }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="poster">Poster(URL)</label>
                    <input type="text" class="form-control" id="poster" name="poster">
                    <div v-if="errors.poster !== ''" class="text-danger col-9 mt-2">
                        {{ errors.poster }}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4 float-end" @click.prevent="createMovie()">Create
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {reactive} from "vue";

export default {
    name: "Create",
    setup() {
        let errors = reactive({
            title: '',
            year: '',
            imdbID: '',
            type: '',
            poster: '',
        });

        function createMovie() {
            let getForm = document.getElementById('myForm');

            axios.post('/movies', getForm).then(() => {
                window.location.href = '/movies'

            }).catch(e => {
                let error = e.response.data.errors;
                errors.title = error.title ? error.title[0] : '';
                errors.year = error.year ? error.year[0] : '';
                errors.imdbID = error.imdbID ? error.imdbID[0] : '';
                errors.type = error.type ? error.type[0] : '';
                errors.poster = error.poster ? error.poster[0] : '';

            })
        }

        return {errors, createMovie}
    }
}
</script>

<style scoped>
.form-group {
    margin-top: 20px;
}
</style>
