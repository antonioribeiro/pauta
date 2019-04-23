import Form from '../../classes/Form'

import * as mutationsMixin from './mixins/mutations.js'
import * as actionsMixin from './mixins/actions.js'
import * as statesMixin from './mixins/states.js'
import * as gettersMixin from './mixins/getters.js'

const __emptyModel = {
    id: null,
    date: null,
    time: null,
    session_type_id: null,
    published_at: null,
}

let state = merge_objects(
    {
        form: new Form(clone(__emptyModel)),

        emptyForm: clone(__emptyModel),

        mode: null,

        model: {
            name: 'sessions',

            table: 'sessions',

            class: { singular: 'Session', plural: 'Sessions' },
        },

        service: {
            name: 'sessions',

            uri: 'sessions',
        },
    },

    statesMixin.common,
)

let actions = merge_objects(actionsMixin, {
    selectSession(context, payload) {
        context.dispatch('sessions/select', payload, { root: true })
    },

    publish(context, payload) {
        post(makeDataUrl(context) + '/' + payload.id + '/publish')
    },

    unpublish(context, payload) {
        post(makeDataUrl(context) + '/' + payload.id + '/unpublish')
    },
})

let mutations = mutationsMixin
let getters = gettersMixin

export default {
    state,
    actions,
    mutations,
    getters,
    namespaced: true,
}
