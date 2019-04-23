import { mapState } from 'vuex'

export default {
    computed: {
        ...mapState({
            sessions: state => state.sessions,
        }),
    },
}
