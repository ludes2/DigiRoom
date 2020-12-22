<template> 
<div class="">  
    <div class="card-deck mb-3">
        <div class="card">
            <div class="card-body"><i class="fas fa-users fa-2x"></i><h5 class="card-title">Events:&nbsp;<span class="badge badge-info">{{ events }}</span></h5>
            </div>
        </div>
        <div class="card">
            <div class="card-body"><i class="fas fa-user-clock fa-2x"></i><h5 class="card-title">Event hours:&nbsp;<span class="badge badge-info">{{ eventHours }}</span></h5>
            
            </div>
        </div>
        <div class="card">
            <div class="card-body"><i class="fas fa-ghost fa-2x"></i><h5 class="card-title">Ghost Meetings:&nbsp;<span class="badge badge-info">{{ ghostMeetings }}</span></h5>
            
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data: function () {
            return {
                events: null,
                eventHours: null, 
                ghostMeetings: null,  
                room: {}             
            }
        },
        mounted() {
            this.room = this.$store.getters.getRoom
            if (this.room.id != null){
                this.fetchEvents();
                this.fetchEventHours();
                this.fetchGhostMeetings();
            }
        },
        methods: {
            fetchEvents(){
                axios.get('/api/events/' + this.room.id)
                .then(response => {
                    this.events = response.data;
                    })
                .catch(error => {
                    console.log(error);
                })
            },   
            fetchEventHours(){
                axios.get('/api/eventHours/' + this.room.id)
                .then(response => {
                    this.eventHours = response.data;
                    })
                .catch(error => {
                    console.log(error);
                })
            },
            fetchGhostMeetings(){
                axios.get('/api/ghostMeetings/' + this.room.id)
                .then(response => {
                    this.ghostMeetings = response.data;
                    })
                .catch(error => {
                    console.log(error);
                })
            }
        },
        watch: {
            'room.id': function(){
                if (this.room.id != null){
                    this.fetchEvents();
                    this.fetchEventHours();
                    this.fetchGhostMeetings();
                }
            }
        }
    }
</script>