export default {
	state: {
        room: {
            id: null,
            name: ''
        },
	},
	actions: {
        //asynchronous
        setRoom(state, room){
            state.commit('setRoom', room);
        }
	},
	mutations: {   
        //synchronous
        setRoom(state, payload){
            state.room.id = payload.room.id;
            state.room.name = payload.room.name;
        }
    },
    getters: {
        getRoom: state => state.room
	},
}