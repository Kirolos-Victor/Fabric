import './bootstrap';
import {createApp} from 'vue';

const app = createApp({});

import MovieIndexComponent from "./components/movies/Index.vue";
import MovieCreateComponent from "./components/movies/Create.vue";
import MovieUpdateComponent from "./components/movies/Update.vue";
import ButtonComponent from "./components/ButtonComponent.vue";

app.component('movie-index-component', MovieIndexComponent);
app.component('movie-create-component', MovieCreateComponent);
app.component('movie-update-component', MovieUpdateComponent);

app.component('button-component', ButtonComponent);

app.mount('#app');
