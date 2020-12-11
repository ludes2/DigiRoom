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
        }
    },
    mounted() {
        this.room = this.$store.state.room.name;
        this.fetchRooms();
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
        }
    }
}

</script>