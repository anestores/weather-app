<template>
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
            <h6 class="link-style" @click="getWeatherForecast(childKey)">5-day Weather Forecast</h6>
        </div>
    </div>
</template>

<script>
export default {
    props: ['weather', 'childKey'],
    data() {
        return {
        }
    },
    methods: {
        getWeatherForecast(city) {
            window.location.href = '/getweatherforecast/'+ city;
        }
    },
    mounted() {
    },
}
</script>

<style scoped>

.row {
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

