<template>
    <app-table-panel
        :title="'Pautas (' + pagination.total + ')'"
        titleCollapsed="Pauta"
        :per-page="perPage"
        :filter-text="filterText"
        @input-filter-text="filterText = $event.target.value"
        @set-per-page="perPage = $event"
        :collapsedLabel="collapsedLabel"
        :is-selected="selected.id !== null"
        what="1"
    >
        <template slot="buttons">
            <button
                v-if="can('sessions:create')"
                class="btn btn-primary btn-sm pull-right"
                @click="createSession()"
                title="Nova sessão"
            >
                <i class="fa fa-plus"></i>
            </button>
        </template>

        <app-table
            :pagination="pagination"
            @goto-page="gotoPage($event)"
            :columns="getTableColumns()"
        >
            <tr
                @click="selectSession(session)"
                v-for="session in sessions.data.rows"
                :class="{
                    'cursor-pointer': true,
                    'bg-primary-lighter text-white': isCurrent(
                        session,
                        selected,
                    ),
                }"
            >
                <td class="align-middle">
                    {{ session.date_formatted }}
                </td>

                <td class="align-middle">
                    {{ session.time_formatted }}
                </td>

                <td class="align-middle">
                    {{ session.session_type.name }}
                </td>

                <td class="align-middle text-center">
                    <app-active-badge
                        :value="session.published_at"
                        :labels="['sim', 'não']"
                    ></app-active-badge>
                </td>

                <td class="align-middle text-right">
                    <button
                        v-if="can('sessions:publish') && !session.published_at"
                        class="btn btn-sm btn-micro btn-info"
                        @click="publish(session)"
                        title="Publicar"
                    >
                        <i class="fa fa-check"></i> publicar
                    </button>

                    <button
                        v-if="can('sessions:publish') && session.published_at"
                        class="btn btn-sm btn-micro btn-danger"
                        @click="unpublish(session)"
                        title="Despublicar"
                    >
                        <i class="fa fa-ban"></i> despublicar
                    </button>
                </td>
            </tr>
        </app-table>

        <app-session-form :show.sync="showModal"></app-session-form>
    </app-table-panel>
</template>

<script>
import { mapActions } from 'vuex'
import crud from '../../views/mixins/crud'
import sessions from '../../views/mixins/sessions'
import permissions from '../../views/mixins/permissions'

const service = {
    name: 'sessions',

    uri: 'sessions',
}

export default {
    mixins: [crud, sessions, permissions],

    data() {
        return {
            service: service,

            showModal: false,
        }
    },

    computed: {
        collapsedLabel() {
            return this.selected.id !== null
                ? this.selected.date_formatted +
                      ' - ' +
                      this.selected.time_formatted +
                      ' - ' +
                      this.selected.session_type.name
                : ''
        },
    },

    methods: {
        ...mapActions(service.name, ['selectSession']),

        getTableColumns() {
            let columns = ['Data', 'Hora', 'Tipo']

            columns.push({
                type: 'label',
                title: 'Publicada',
                trClass: 'text-center',
            })

            columns.push('')

            return columns
        },

        trash(session) {
            confirm('Deseja realmente DELETAR esta sessão?', this).then(
                value => {
                    value && this.$store.dispatch('sessions/delete', session)
                },
            )
        },

        publish(session) {
            confirm('Confirma a PUBLICAÇÃO desta sessão?', this).then(value => {
                value && this.$store.dispatch('sessions/publish', session)
            })
        },

        unpublish(session) {
            confirm('Confirma a DESPUBLICAÇÃO desta sessão?', this)
                .then(this)
                .then(value => {
                    value && this.$store.dispatch('sessions/unpublish', session)
                })
        },

        createSession() {
            this.showModal = true
        },
    },
}
</script>
