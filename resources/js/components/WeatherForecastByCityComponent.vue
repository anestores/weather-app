<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                {{ cityName }}
                            </div>
                            <div class="col-md-4">
                                {{ currentDateTime }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>5-day Weather Forecast</h3>
                        <div v-for="(weather, index) in data" :key="index" class="weather-entry">
                            <ul class="list-unstyled">
                                <li v-for="(forecast, forecastIndex) in weather.forecast.forecast" :key="forecastIndex">
                                    <ul class="list-unstyled">
                                        <li v-for="(forecastDaily, forecastDailyIndex) in forecast" :key="forecastDailyIndex">
                                            <div v-if="forecastDaily.formatted_date">
                                                {{ forecastDaily.formatted_date }} {{ forecastDaily.day }} {{ forecastDaily.formatted_time }}
                                                Sunrise: {{ forecastDaily.formatted_sunrise }} Sunset: {{ forecastDaily.formatted_sunset }}
                                            </div>
                                            <div v-if="forecastDaily.desc">
                                                {{ forecastDaily.desc.toUpperCase() }}
                                            </div>
                                            <div v-if="forecastDaily.icon">
                                                <img :src=forecastDaily.icon alt="icon">
                                            </div>
                                            <div v-if="forecastDaily.temp">
                                                Temperature Min: {{ forecastDaily.temp_min }}°C Max: {{ forecastDaily.temp_max }}°C Pressure: {{ forecastDaily.pressure }} Humidity: {{ forecastDaily.humidity }}
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['cityName', 'data'],
    data() {
        return {
            currentDateTime: '',
        }
    },
    components: {

    },
    methods: {
        initForm() {
            this.data.forEach(item => {

                console.log(item.forecast.forecast);
            });

        },
    },
    computed: {
        groupedForecast() {
            const grouped = {};
            this.data.forEach(item => {
                if (item.forecast.forecast) {
                // && item.forecast.forecast.datetime
                    const date = item.forecast.forecast.datetime.formatted_date;
                    if (!grouped[date]) {
                        grouped[date] = [];
                    }
                    grouped[date].push(item);
                }
            });
            return grouped;
        }
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
