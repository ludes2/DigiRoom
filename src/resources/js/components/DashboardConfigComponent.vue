<template> 
<div class="">
    <div class="card bg-light border-0">
        <div class="card-body">
            <div class="form-group form-row">
                <label for="buildings" class="text-md-left">Room&nbsp;</label>
                <div class="input-group">
                    <select v-model="room" name="rooms" id="rooms" class="form-control" @change="changeRoom()">
                        <option disabled value="">Select a Room...</option>
                        <option v-for="room in rooms" v-bind:key="room.id" v-bind:value="{room: room}">{{ room.name }}</option>
                    </select>
                </div>
            </div>

            <div class="form-group form-row">
                <label for="from" class="text-md-left">From</label>
                <div class="input-group" @click="changeFrom()">
                    <input v-model="period.from" type="text" class="form-control date" id="from" name="from">
                </div>
            </div>

            <div class="form-group form-row">
                <label for="to" class="text-md-left">To</label>
                <div class="input-group">
                    <input  v-model="period.to" type="text" class="form-control date" id="to" name="to" @change="changeTo()">
                </div>
            </div>
        </div> <!-- card-body -->
    </div> <!-- card -->
</div>
</template>

<script>
export default {
    data: function () {
        return {
            rooms: [],
            room: {},
            period: {
                from: null,
                to: null,
            },
        }
    },
    mounted() {
        this.room = this.$store.state.room.name;
        this.fetchRooms();
        this.period = this.$store.state.period;
    },
    methods: {
        fetchRooms(){
            axios.get('/api/rooms')
            .then(response => {
                this.rooms = response.data;
                })
            .catch(error => {
                console.log(error);
            })
        },
        changeRoom(){
            this.$store.dispatch('setRoom', this.room);
        },
        changeFrom(){
            this.$store.dispatch('setFrom', this.period.from);
        },
        changeTo(){
            this.$store.dispatch('setTo', this.period.to);
        }
    }
}

</script>