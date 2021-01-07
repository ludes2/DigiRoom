export default {
	state: {
        room: {
            id: null,
            name: ''
        },
        period: {
            from: null,
            to: null
        }
	},
	actions: {
        //asynchronous
        setRoom(state, room){
            state.commit('setRoom', room);
        },
        setFrom(state, from){
            state.commit('setFrom', from);
        },
        setTo(state, to){
            state.commit('setTo', to);
        }
	},
	mutations: {   
        //synchronous
        setRoom(state, payload){
            state.room.id = payload.room.id;
            state.room.name = payload.room.name;
        },
        setFrom(state, payload){
            state.period.from = payload;
            console.log("from: " + payload);
        },
        setTo(state, payload){
            state.period.to = payload;
            console.log("to: " + payload);
        }
    },
    getters: {
        getRoom: state => state.room,
        getPeriod: state => state.period,
	},
}