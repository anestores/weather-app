<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            PLACES SEARCH
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select name="city" id="city" class="form-control" v-model="city">
                                        <option value="" selected>Select City</option>
                                        <option v-for="city in cities" :key="city" :value="city">
                                            {{ city }}
                                        </option>
                                    </select>
                                    <div v-if="errors && errors.city" class="text-danger">{{ errors.city[0] }}</div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="searchText">Enter Place to Search</label>
                                    <input type="text" class="form-control" id="searchText" v-model="searchText" placeholder="Coffeeshop, Mall, Airport">
                                    <div v-if="errors && errors.searchText" class="text-danger">{{ errors.searchText[0] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button @click="fetchPlaces" class="form-control btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button @click="clearForm" class="form-control btn btn-secondary">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5" v-if="placesResult.length > 0">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        SEARCH RESULTS
                    </div>
                    <div class="card-body">
                        <ul>
                            <li v-for="placeResult in placesResult" :key="placeResult.fsq_id">
                                <div class="row">
                                    <div class="row-with-underline">
                                        <h5>{{ placeResult.name }}</h5>
                                        <h6>{{ placeResult.location.formatted_address }}</h6>
                                        <ul>
                                            <li v-for="category in placeResult.categories" :key="category.id">
                                                <img :src="category.icon.prefix + 'bg_32' + category.icon.suffix" :alt="category.name"/>
                                                {{ category.name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['cities', 'foursquare_api_key'],
    data() {
        return {
            city: '',
            placesResult: [],
            searchText: '',
            errors: [],
        }
    },
    methods: {
        initForm() {
            this.city = '';
            this.clearForm();
        },
        clearForm() {
            this.placesResult = [];
            this.searchText = '';
            this.errors = [];
        },
        async fetchPlaces() {
            this.errors = {};

            if (this.city === '') {
                this.$set(this.errors, 'city', ['City is required.']);
            }

            if (this.searchText === '') {
                this.$set(this.errors, 'searchText', ['Search text is required.']);
            }
            if (Object.keys(this.errors).length > 0) {
                return false;
            }            try {
                const response = await axios.get('https://api.foursquare.com/v3/places/search', {
                    params: {
                        // Add your parameters here
                        query: this.searchText,
                        near: this.city,
                        // limit: 10
                    },
                    headers: {
                        Authorization: this.foursquare_api_key
                    }
                });
                this.placesResult = response.data.results;
            } catch (error) {
                console.error(error);
            }
        },
    },
    mounted() {
        this.initForm();
    }
}
</script>

<style>
ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin: 5px 0;
}

img {
    vertical-align: middle;
    margin-right: 5px;
    color: skyblue;
}

.card-body .row .row-with-underline {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

</style>
