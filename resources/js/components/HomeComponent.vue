<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                            <div class="row">
                                <div class="col-md-4">
                                    <h2>{{ weather.current.location.name }}</h2>
                                    <h6>
                                        <i class="fas fa-thermometer-half"></i> {{ weather.current.forecast.temp_min }}°C&nbsp;&nbsp;<i class="fas fa-sun"></i> {{ weather.current.forecast.temp_max }}°C
                                        &nbsp;&nbsp;<i class="fas fa-tint"></i> {{ weather.current.forecast.humidity }}&nbsp;&nbsp;<i class="fas fa-wind"></i> {{ weather.current.forecast.pressure }}
                                    </h6>
                                </div>
                                <div class="col-md-4">
                                    <h1 class="text-center">{{ weather.current.forecast.temp }}°C</h1>
                                    <h5 class="text-center">{{ weather.current.condition.desc.toUpperCase() }}</h5>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                    <img :src=weather.current.condition.icon alt="icon" height="80px" class="img-container">
                                    <h6 class="link-style">5-day Weather Forecast</h6>
<!--                                    <div class="form-group">-->
<!--                                        <button @click="placesSearch" class="form-control btn btn-primary">Places Search</button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data', 'todayInWords'],
    data() {
        return {
            currentDateTime: '',
        }
    },
    methods: {

    },
    mounted() {
        setInterval(() => {
            const now = new Date();
            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            const currentDate = now.toLocaleString(undefined, dateOptions);
            const currentTime = now.toLocaleString(undefined, timeOptions);
            this.currentDateTime = `${currentDate}, ${currentTime}`;
        }, 1000);
    }
}
</script>

<style scoped>

.card-body .row {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.link-style {
    text-decoration: underline;
    cursor: pointer;
}

.img-container {
    margin-right: 10px;
}

</style>


<!--                                <h4>5-Day Forecast</h4>-->
<!--                                <ul class="list-unstyled">-->
<!--                                    <li v-for="(forecast, forecastIndex) in weather.forecast.forecast" :key="forecastIndex">-->
<!--                                        <ul class="list-unstyled">-->
<!--                                            <li v-for="(forecastDaily, forecastDailyIndex) in forecast" :key="forecastDailyIndex">-->
<!--                                                <div v-if="forecastDaily.formatted_date">-->
<!--                                                    {{ forecastDaily.formatted_date }} {{ forecastDaily.day }} {{ forecastDaily.formatted_time }}-->
<!--                                                    Sunrise: {{ forecastDaily.formatted_sunrise }} Sunset: {{ forecastDaily.formatted_sunset }}-->
<!--                                                </div>-->
<!--                                                <div v-if="forecastDaily.desc">-->
<!--                                                    {{ forecastDaily.desc.toUpperCase() }}-->
<!--                                                </div>-->
<!--                                                <div v-if="forecastDaily.icon">-->
<!--                                                    <img :src=forecastDaily.icon alt="icon">-->
<!--                                                </div>-->
<!--                                                <div v-if="forecastDaily.temp">-->
<!--                                                    Temperature Min: {{ forecastDaily.temp_min }}°C Max: {{ forecastDaily.temp_max }}°C Pressure: {{ forecastDaily.pressure }} Humidity: {{ forecastDaily.humidity }}-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                </ul>-->
