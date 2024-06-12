<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" v-if="data.length > 0">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                CURRENT WEATHER
                            </div>
                            <div class="col-md-4">
                                {{ currentDateTime }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div v-for="(weather, index) in data" :key="index" class="weather-entry">
                            <WeatherByCityComponent :childKey="index" :weather="weather"/>
                        </div>
                    </div>
                </div>
                <div class="card" v-else>
                    <div class="card-header">
                        Fetching weather data...
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import WeatherByCityComponent from './WeatherByCityComponent';

export default {
    props: [],
    data() {
        return {
            currentDateTime: '',
            data: [],
        }
    },
    methods: {
        initForm() {
            this.data = [];
            this.getWeather();
        },
        async getWeather() {
            axios.get('/getweatherdata')
                .then(response => {
                    this.data = response.data.data;
                })
                .catch(error => {
                })
        },
    },
    components: {
        WeatherByCityComponent,
    },
    mounted() {
        setInterval(() => {
            const now = new Date();
            const dateOptions = { weekday: 'short', year: 'numeric', month: 'long', day: 'numeric' };
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            const currentDate = now.toLocaleString(undefined, dateOptions);
            const currentTime = now.toLocaleString(undefined, timeOptions);
            this.currentDateTime = `${currentDate} ${currentTime}`;
        }, 1000);
        this.initForm();
    }
}
</script>
