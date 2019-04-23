<template>
    <form>
        <div class="form-group">
            <label for="portalId">ID do Portal</label>
            <input
                v-model="portalId"
                class="form-control"
                id="portalId"
                placeholder=""
            />
        </div>

        <div class="form-group">
            <label for="notesLink">Link no Lotus Notes</label>
            <div class="input-group mb-3">
                <input
                    v-model="notesLink"
                    class="form-control"
                    id="notesLink"
                />

                <div class="input-group-append" v-if="notesLink">
                    <button
                        @click="clearNotesLink()"
                        class="btn btn-danger"
                        type="button"
                    >
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group" v-if="siteLink">
            <label for="siteLink">
                Link no Portal (<a
                    href="#"
                    class="copy"
                    data-clipboard-target="#siteLink"
                    >copiar</a
                >) (<a :href="siteLink" target="_blank">testar</a>)
            </label>

            <input
                v-model="siteLink"
                id="siteLink"
                class="form-control"
                placeholder=""
            />
        </div>
    </form>
</template>

<script>
const ClipboardJS = require('clipboard')

export default {
    data() {
        return {
            service: { name: 'budgets', uri: 'budgets' },
            notesLink: null,
            portalId: '144',
        }
    },

    computed: {
        base64Link() {
            const link = new RegExp('.*alerjln1.alerj.rj.gov.br(.*)').exec(
                this.notesLink,
            )

            if (link && link[1]) {
                return btoa(link[1] + '?OpenDocument&ExpandView')
            }

            return null
        },

        siteLink() {
            if (this.base64Link) {
                return (
                    'http://www3.alerj.rj.gov.br/lotus_notes/default.asp?id=' +
                    this.portalId +
                    '&url=' +
                    this.base64Link
                )
            }

            return ''
        },
    },

    methods: {
        clearNotesLink() {
            this.notesLink = ''

            document.getElementById('notesLink').focus()
        },
    },

    mounted() {
        new ClipboardJS('.copy')
    },
}
</script>
