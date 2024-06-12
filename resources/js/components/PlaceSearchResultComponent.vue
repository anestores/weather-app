<template>
    <div class="row">
        <h5>{{ placeResult.name }}</h5>
        <h6>{{ placeResult.location.formatted_address }}</h6>
        <ul>
            <li v-for="category in placeResult.categories" :key="category.id">
                <img :src="category.icon.prefix + 'bg_32' + category.icon.suffix" :alt="category.name"/>
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['placeResult'],
    data() {
        return {
        }
    },
    methods: {
        mounted() {
        },
    }
}
</script>

<style scoped>

.row {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

</style>

