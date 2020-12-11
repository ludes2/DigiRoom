<template> 
<div class="">  
    <nav class="m-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link" @click.prevent="setActive('presences')" :class="{ active: isActive('presences') }" id="presences" href="#presences">Presences</a>
            <a class="nav-item nav-link" @click.prevent="setActive('states')" :class="{ active: isActive('states') }" id="states" href="#states">States</a>
            <a class="nav-item nav-link" @click.prevent="setActive('temperature')" :class="{ active: isActive('temperature') }" id="temperature" href="#temperature">Temperature</a>
            <a class="nav-item nav-link" @click.prevent="setActive('humidity')" :class="{ active: isActive('humidity') }" id="humidity" href="#humidity">Humidity</a>
            <a class="nav-item nav-link" @click.prevent="setActive('lux')" :class="{ active: isActive('lux') }" id="lux" href="#lux">Lux</a>
            <a class="nav-item nav-link" @click.prevent="setActive('all')" :class="{ active: isActive('all') }" id="all" href="#all">All</a>
        </div>
    </nav>

    <room-metrics-component></room-metrics-component>   

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" :class="{ 'active show': isActive('presences') }" id="presences">
            <presence-chart-container v-if="isActive('presences')"></presence-chart-container>
        </div>
        <div class="tab-pane fade" :class="{ 'active show': isActive('temperature') }" id="temperature">
            <temperature-chart-container v-if="isActive('temperature')"></temperature-chart-container>
        </div>
        <div class="tab-pane fade" :class="{ 'active show': isActive('humidity') }" id="humidity">
            <humidity-chart-container v-if="isActive('humidity')"></humidity-chart-container>
        </div>
        <div class="tab-pane fade" :class="{ 'active show': isActive('lux') }" id="lux">
           <lux-chart-container v-if="isActive('lux')"></lux-chart-container>
        </div>
        <div class="tab-pane fade" :class="{ 'active show': isActive('states') }" id="states">
           <state-chart-container v-if="isActive('states')"></state-chart-container>
        </div>
        <div class="tab-pane fade" :class="{ 'active show': isActive('all') }" id="all">
            <div class="card-deck">
                <presence-chart-container v-if="isActive('all')"></presence-chart-container>
                <state-chart-container v-if="isActive('all')"></state-chart-container>
                <temperature-chart-container v-if="isActive('all')"></temperature-chart-container>
                <humidity-chart-container v-if="isActive('all')"></humidity-chart-container>
                <lux-chart-container v-if="isActive('all')"></lux-chart-container>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import RoomMetricsComponent from './RoomMetricsComponent.vue'
    export default {
        components: { RoomMetricsComponent },
        data: function () {
            return {
                activeItem: 'presences',
                room: {}
            }
        },
        mounted(){
            this.room = this.$store.state.room.name;
        },
        methods: {
            isActive(menuItem) {
                return this.activeItem === menuItem
            },
            setActive(menuItem) {
                this.activeItem = menuItem
            }
        },
    }
</script>