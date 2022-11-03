<template>
    <button class="btn btn-primary float-end" @click.prevent="fetchData()">{{ this.$props.buttonName }}</button>
</template>

<script>
import axios from "axios";

export default {
    name: "ButtonComponent",
    props: ['buttonName', 'buttonKey'],
    setup(props) {
        function fetchData() {
            axios.post('/fetch-data/' + props.buttonKey).then(() => {
                window.location.href = '/movies?page=1';
            })
        }

        return {fetchData};
    }
}
</script>

<style scoped>
button {
    margin-left: 10px;
    margin-bottom: 20px;
}
</style>
