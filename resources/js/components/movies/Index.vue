<template>
    <div class="card">
        <div class="card-header">Movies</div>
        <div class="card-body">
            <a class="btn btn-success mt-3" href="/movies/create">Add a movie</a>
            <button-component class="mb-4 mt-3" v-for="(button,key) in this.$props.buttons" :buttonKey="key"
                              :buttonName="getButtonName(key)"></button-component>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">imdbID</th>
                    <th scope="col">Type</th>
                    <th>Poster</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="movies.data.length != 0" v-for="(movie,index) in movies.data">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ movie.title }}</td>
                    <td>{{ movie.year }}</td>
                    <td>{{ movie.imdbID }}</td>
                    <td>{{ movie.type }}</td>
                    <td><img v-show="movie.poster !=null" :src="movie.poster"></td>
                    <td>
                        <a class="btn btn-secondary" :href="'/movies/'+movie.id+'/edit'">Update</a>
                        <button class="btn btn-danger" @click.prevent="deleteMovie(movie.id)">Delete</button>
                    </td>

                </tr>
                <tr v-else>
                    <th colspan="7" class="text-center">No data</th>
                </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center"
                 v-if="movies.data.length !=0">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" v-if="movies.prev_page_url != null"
                                             :href="movies.prev_page_url">Previous</a></li>
                    <li class="page-item" v-for="number in movies.last_page" :class="currentPage(number)"><a class="page-link"
                                                                                :href="'/movies?page='+number">{{
                            number
                        }}</a>
                    </li>
                    <li class="page-item"><a class="page-link" v-if="movies.next_page_url != null"
                                             :href="movies.next_page_url">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";
import Swal from "sweetalert2";

export default {
    name: "Index",
    props: ['movies', 'buttons'],
    setup(props) {
        let movies = ref(props.movies)

        function getButtonName(value) {
            if (value == 'BUTTON_ONE') {
                return 'Button One';
            } else if (value == 'BUTTON_TWO') {
                return 'Button Two';
            } else {
                return 'Button Three';
            }
        }

        function currentPage(number) {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const page = urlParams.get('page')
            if (number == page) {
                return 'active';
            }

        }

        function deleteMovie(movieId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/movies/' + movieId).then(() => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        window.location.reload();
                    })
                }
            })
        }


        return {getButtonName, movies, deleteMovie,currentPage};
    }
}
</script>

<style scoped>
img {
    width: 100px;
    height: 100px;
}

button {
    margin-left: 10px;
}
</style>
