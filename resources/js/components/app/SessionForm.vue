<template>
    <div>
        <b-modal v-model="showModal" title="Nova sessão" @shown="onShow()">
            <template>
                form!!
            </template>

            <template slot="modal-footer">
                <button @click="close()" class="btn btn-success btn-sm">
                    Fechar
                </button>
            </template>
        </b-modal>
    </div>
</template>

<script>
import crud from '../../views/mixins/crud'
import sessions from '../../views/mixins/sessions'

const service = {
    name: 'sessions',

    uri: 'sessions',
}

export default {
    mixins: [crud, sessions],

    props: ['show'],

    data() {
        return {
            busy: false,

            service: service,
        }
    },

    methods: {
        close() {
            this.showModal = false
        },

        closeModal() {
            this.showModal = false
        },

        onShow() {
            this.busy = false
        },
    },

    computed: {
        showModal: {
            get() {
                return this.show
            },

            set(showModal) {
                this.$emit('update:show', showModal)
            },
        },
    },
}
</script>
