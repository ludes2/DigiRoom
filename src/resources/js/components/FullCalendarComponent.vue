<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import { Calendar } from '@fullcalendar/core'
import frLocale from '@fullcalendar/core/locales/fr'
import ShowEventModalComponent from './ShowEventModalComponent'
import $ from 'jquery'

export default {
  components: {
    FullCalendar,
    ShowEventModalComponent
  },
  data() {
    return {
        showEventModal: false,
        calendarOptions: {
            plugins: [ dayGridPlugin, timeGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }, 
            events: {
                url: 'http://localhost:8080/events',
            },
            eventClick: function() {
                this.showEventModal = true;
            }.bind(this),
            locale: 'de-ch',
            selectable: true,
        },  
    }
  },
  methods: {
    handleEventClick: function() {
        this.showEventModal = true;
        
    }
  }
}
</script>
<template>
<div>
    <FullCalendar 
    :options="calendarOptions">
        <template v-slot:eventContent='arg'>
            <b>{{ arg.timeText }}</b><br>
            <i>{{ arg.event.title }}</i>
        </template>
    </FullCalendar>

    <show-event-modal-component
        :show="showEventModal"
    />
</div>
</template>